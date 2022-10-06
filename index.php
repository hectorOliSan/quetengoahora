<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¿Qué tengo ahora?</title>
    <style type="text/css">
      * {
        font-family: consolas;
      }

      body {
        text-align: center;
      }

      input[type="text"] {
        border: 0;
        font-weight: bold;
      }

      table {
        margin: auto;
        min-width: 70%;
        font-size: 1rem;
      }

      table, th, td {
        padding: 5px;
        border: 2px solid;
        border-collapse: collapse;
      }

      footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background: LightSlateGray;
      }
    </style>
    <script>
      function updateReloj() {
        hora =
          new Date().toTimeString().replace(/.*(\d{2}:\d{2}:\d{2}).*/, "$1")
        document.form_reloj.reloj.value = hora

        setTimeout("updateReloj()",1000)
      }
    </script>
  </head>

  <body onload="updateReloj()">
    <?php
      date_default_timezone_set('Atlantic/Canary');

      //Arrays
      if(count($_POST)) {
        $horario = simplexml_load_file(".\\horarios\\".$_POST['horario'].".xml");
        $asignaturas = simplexml_load_file(".\\asignaturas\\"."asignaturas_".$_POST['horario'].".xml");

      } else {
        $horario = simplexml_load_file(".\\horarios\\2dawm.xml");
        $asignaturas = simplexml_load_file(".\\asignaturas\\asignaturas_2dawm.xml");
      }

      $tarde = true;
      if(array_values((array)$horario)[0]['id'] == "08:00 - 08:55") {
        $tarde = false;
      }
    ?>

    <?php
      //Funciones
      $diasSemana = array(
          "Domingo", "Lunes", "Martes",
          "Miércoles", "Jueves", "Viernes", "Sábado");

      function getDia() {
        global $diasSemana;
        return $diasSemana[strftime("%w")];
      }

      function getDiaSig($num) {
        global $diasSemana;
        $sig = strftime("%w") + $num;
        if($sig > 7) $sig-=7;
        return $diasSemana[$sig];
      }

      function getDiaHora() {
        echo "<div style='margin:0; float: right;'>";
        echo "<h4 style='margin-right: 20px; margin-bottom: 0;'> Hoy es: " . getDia() . "</h4>";
        echo "<form name='form_reloj'>";
        echo "<input type='text' name='reloj' size='7' onfocus='window.document.form_reloj.reloj.blur()'>";
        echo "</form>";
        echo "</div> ";
        echo "<br><br>";
      }

      function mostrarHorario() {
        global $horario;

        echo "<h3 style='text-align: center;'>Horario</h3>";

        echo "<table>";
        echo "<th style='background-color: LightSlateGray;'>-------------</th>";
        foreach ($horario as $hora => $dia) {
          foreach ($dia as $dia => $materia) {
            echo "<th style='background-color: LightSlateGray;'>$dia</th>";
          }
          break;
        }

        foreach ($horario as $hora => $dia) {
          echo "<tr>";
          echo "<th>{$dia['id']}</th>";
          foreach ($dia as $dia => $materia) {
            echo "<td>{$materia}</td>";
          }
          echo "</tr>";
        }
        echo "</table><br>";
      }

      function mostrarAsignaturas() {
        global $asignaturas;

        echo "<table>";
        foreach ($asignaturas as $codigo => $materia) {
          echo "<tr>";
          echo "<th style='background-color: Moccasin;'>{$codigo}</th>";
          foreach ($materia as $materia => $valor) {
            echo "<td>{$valor}</td>";
          }
          echo" </tr>";
        }
        echo "</table><br>";
      }

      function mostrarTabla($materia) {
        global $asignaturas;

        if($materia == "") {
          echo "<table><tr><td>Descanso / Recreo</td></tr></table>";
          echo "<br>";
          return;
        }

        echo "<table>";
        echo "<tr>";
        echo "<th style='background-color: Moccasin;'>$materia</th>";

        foreach ($asignaturas as $codigo => $asignatura) {
          if($materia == $codigo) {
            foreach($asignatura as $asignatura => $valor) {
              echo "<td>";
              echo $valor;
              echo "</td>";
            }
            break;
          }
        }

        echo "</tr>";
        echo "</table>";
        echo "<br>";
      }

      function diaSiguiente($diaActual, $horaActual) {
        global $horario, $tarde;

        echo "<table><tr><td>---</td></tr></table>";
        echo "<br>";

        echo "<h3 style='text-align: center;'>Pero la siguiente clase es:</h3>";

        $diaSig = getDiaSig(1);
        if ($tarde) {
          if (strtotime($horaActual) < strtotime("15:00")) {
            echo "<p>" . $diaActual  . ", 15:00 - 15:55</p>";
          } else {
            if($diaActual=="Viernes") {
              $diaSig = getDiaSig(3);
            } elseif ($diaActual=="Sábado") {
              $diaSig = getDiaSig(2);
            }
            echo "<p>" . $diaSig . ", 15:00 - 15:55</p>";
          }

        } else {
          if (strtotime($horaActual) < strtotime("08:00")) {
            echo "<p>" . $diaActual  . ", 08:00 - 08:55</p>";
          } else {
            if($diaActual=="Viernes") {
              $diaSig = getDiaSig(3);
            } elseif ($diaActual=="Sábado") {
              $diaSig = getDiaSig(2);
            }
            echo "<p>" . $diaSig . ", 08:00 - 08:55</p>";
          }
        }

        foreach ($horario as $hora => $dia) {
          if ($tarde) {
            if (strtotime($horaActual) < strtotime("15:00")) {
              foreach ($dia as $dia => $materia) {
                if($dia == $diaActual) {
                  mostrarTabla($materia);
                  return;
                }
              }
            }

          } else {
            if (strtotime($horaActual) < strtotime("08:00")) {
              foreach ($dia as $dia => $materia) {
                if($dia == $diaActual) {
                  mostrarTabla($materia);
                  return;
                }
              }
            }
          }

          foreach ($dia as $dia => $materia) {
            if($dia == $diaSig) {
              mostrarTabla($materia);
              return;
            }
          }
        }
      }

      function queTocaAhora($diaActual, $horaActual) {
        global $horario, $tarde;

        foreach ($horario as $hora => $dia) {
          if($diaActual == "Sábado" || $diaActual == "Domingo") break;

          if($tarde) {
            if(strtotime($horaActual) < strtotime("15:00")) break;
          } else {
            if(strtotime($horaActual) < strtotime("08:00")) break;
          }

          if(strtotime(substr_replace($dia['id'], '', 0, 8)) >= strtotime($horaActual)) {
            foreach ($dia as $dia => $materia) {
              if($diaActual == $dia) {
                mostrarTabla($materia);
                return;
              }
            }
          }
        }

        diaSiguiente($diaActual, $horaActual);
      }

      function queToca() {
        global $horario;

        if(count($_POST)>1) {

          echo "<h4 style='margin-left:auto; margin-right:auto;'>";
          echo "<span style='padding: 3px; background-color: LightSlateGray;'>";
          echo $_POST['dia'].", ".$_POST['hora'];
          echo "</span>";
          echo "</h4>";

          foreach ($horario as $hora => $dia) {
            if($_POST['hora'] == $dia['id']) {
              foreach ($dia as $dia => $materia) {
                if($_POST['dia'] == $dia) {
                  mostrarTabla($materia);
                  break;
                }
              }
            }
          }
        }
      }
    ?>

    <?php getDiaHora(); ?>

    <br><br>

    <form action="" method="POST">
      <label for="Horario">Horario:</label>
      <select id="Horario" name="horario">
        <optgroup label="Listado de Grupos">
          <option value="2dawm" selected>2º DAW M</option>
          <option value="2damm">2º DAM M</option>
          <option value="ceiabdta">CE Inteligencia Artificial y Big Data TA</option>
        </optgroup>
        <optgroup label="Docentes">
          <option value="sergioRamos">Sergio Ramos Suárez</option>
          <option value="" disabled>María del Carmen Rodríguez Suárez</option>
        </optgroup>
      </select>

      <input type="submit" value="Enviar">
    </form>

    <h2 style="text-align: center;">Ahora toca:</h2>

    <?php queTocaAhora(getDia(), date("H:i")); ?>

    <button onclick="window.modal.showModal();">Consulta el horario</button>
    <dialog style="min-width: 50%;" id="modal">

      <div">
        <?php
          mostrarHorario();
          mostrarAsignaturas();
        ?>
      </div>

      <button onclick="window.modal.close();">Cerrar</button>
    </dialog>

    <br><br><hr>

    <main>
      <h2 style="text-align: center;">Buscar:</h2>

      <form action="" method="POST">
        <label for="Dia">Día:</label>
        <select id="Dia" name="dia">
          <option value="Lunes">Lunes</option>
          <option value="Martes">Martes</option>
          <option value="Miércoles">Miércoles</option>
          <option value="Jueves">Jueves</option>
          <option value="Viernes">Viernes</option>
        </select>

        <label for="Hora">Hora:</label>
        <select id="Hora" name="hora">
        <?php
          if($tarde) {
            echo "<option value='15:00 - 15:55'>15:00 - 15:55</option>";
            echo "<option value='15:55 - 16:50'>15:55 - 16:50</option>";
            echo "<option value='16:50 - 17:45'>16:50 - 17:45</option>";
            echo "<option value='17:45 - 18:00'>17:45 - 18:00</option>";
            echo "<option value='18:00 - 18:55'>18:00 - 18:55</option>";
          } else {
            echo "<option value='08:00 - 08:55'>08:00 - 08:55</option>";
            echo "<option value='08:55 - 09:50'>08:55 - 09:50</option>";
            echo "<option value='09:50 - 10:45'>09:50 - 10:45</option>";
            echo "<option value='10:45 - 11:15'>10:45 - 11:15</option>";
            echo "<option value='11:15 - 12:10'>11:15 - 12:10</option>";
            echo "<option value='12:10 - 13:05'>12:10 - 13:05</option>";
            echo "<option value='13:05 - 14:00'>13:05 - 14:00</option>";
          }
        ?>
        </select>

        <?php
          if(count($_POST)) {
            echo "<input type='hidden' name='horario' value='".$_POST['horario']."'>";
          } else {
            echo "<input type='hidden' name='horario' value='2dawm'>";
          }
        ?>
        <input type="submit" value="Buscar">
      </form>

      <br>

      <?php queToca(); ?>
    </main>

    <footer>
      <p>Héctor Olivares Sánchez - DSW 2022</p>
    </footer>
  </body>
</html>