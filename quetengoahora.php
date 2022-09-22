<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Horario DAW</title>

    <style type="text/css">
      * {
        font-family: consolas;
      }

      body {
        text-align: center;
      }

      form {
        display: inline-block;
      }

      input[type=text] {
        border: 0;
        font-size: 16px;
        font-weight: bold;
      }

      table {
        margin: auto;
        min-width: 80%;
      }

      table, th, td {
        border-collapse: collapse;
        border: 2px solid;
      }

      th, td {
        padding: 3px;
      }

      footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background: LightSlateGray;
      }
    </style>
    <script language="JavaScript">
      function updateReloj() {
        hora = new Date().toTimeString().replace(/.*(\d{2}:\d{2}:\d{2}).*/, "$1")
        document.form_reloj.reloj.value = hora

        setTimeout("updateReloj()",1000)
      }
    </script>
  </head>
  <body onload="updateReloj()">
    <?php
      //Configuración
      setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
      date_default_timezone_set('Europe/London');
    ?>

    <?php
      //Arrays
      $horario = array(
        "08:00-08:55" => array(
          "Lunes" => "EMR",
          "Martes" => "DPL",
          "Miércoles" => "DEW",
          "Jueves" => "DPL",
          "Viernes" => "DOR"
        ),


        "08:55-09:50" => array(
          "Lunes" => "DSW",
          "Martes" => "DPL",
          "Miércoles" => "DEW",
          "Jueves" => "DPL",
          "Viernes" => "DOR"
        ),

        "09:50-10:45" => array(
          "Lunes" => "DSW",
          "Martes" => "DSW",
          "Miércoles" => "DSW",
          "Jueves" => "DPL",
          "Viernes" => "DPL"
        ),

        "10:45-11:15" => array(
          "Lunes" => "",
          "Martes" => "",
          "Miércoles" => "",
          "Jueves" => "",
          "Viernes" => ""
        ),

        "11:15-12:10" => array(
          "Lunes" => "DEW",
          "Martes" => "DSW",
          "Miércoles" => "DSW",
          "Jueves" => "DEW",
          "Viernes" => "EMR"
        ),

        "12:10-13:05" => array(
          "Lunes" => "DEW",
          "Martes" => "DOR",
          "Miércoles" => "DOR",
          "Jueves" => "DEW",
          "Viernes" => "DSW"
        ),

        "13:05-14:00" => array(
          "Lunes" => "DEW",
          "Martes" => "DOR",
          "Miércoles" => "DOR",
          "Jueves" => "EMR",
          "Viernes" => "DSW"
        ),
      );

      $codigo = array(
        "EMR" => array(
            "materia" => "Empresa e iniciativa emprendedora", "docente" => "MARIA DEL SOL GARCIA TARAJANO", "aula" => "G201"
        ),

        "DSW" => array(
          "materia" => "Desarrollo web en entorno servidor", "docente" => "SERGIO RAMOS SUAREZ", "aula" => "G201"
        ),

        "DEW" => array(
          "materia" => "Desarrollo web en entorno cliente", "docente" => "MARIA DEL CARMEN RODRIGUEZ SUAREZ", "aula" => "G201"
        ),

        "DPL" => array(
          "materia" => "Despliegue de aplicaciones web", "docente" => "MARIA ANTONIA MONTESDEOCA VIERA", "aula" => "G201"
        ),

        "DOR" => array(
          "materia" => "Diseño de interfaces web", "docente" => "ERMIS PAPAKONSTANTINOU BAEZ", "aula" => "G201"
        ),
      );
    ?>

    <?php
      //Funciones
      function getDiaHora() {
        echo "<div style='margin:0; margin-right: 20px; float: right;'>";
        echo "<h4 style='margin-bottom: 0;'> Hoy es: " . ucfirst(utf8_encode(strftime("%A"))) . "</h4>";
        echo "<form name='form_reloj'>";
        echo "<input type='text' name='reloj' size='7' onfocus='window.document.form_reloj.reloj.blur()'>";
        echo "</form>";
        echo "</div> ";
        echo "<br><br>";
      }

      function mostrarHorario() {
        global $horario;

        echo "<h2 style='text-align: center;'>Horario DAW</h2>";

        echo "<table>";
        echo "<th style='background-color: LightSlateGray;'>-------------</th>";
        foreach ($horario['08:00-08:55'] as $dia => $materia) {
          echo "<th style='background-color: LightSlateGray;'>$dia</th>";
        }

        foreach ($horario as $hora => $dia) {
          echo "<tr>";
          echo "<th>$hora</th>";
          echo "<td>{$dia['Lunes']}</td>";
          echo "<td>{$dia['Martes']}</td>";
          echo "<td>{$dia['Miércoles']}</td>";
          echo "<td>{$dia['Jueves']}</td>";
          echo "<td>{$dia['Viernes']}</td>";
          echo "</tr>";
        }
        echo "</table><br>";
      }

      function mostrarAsignaturas() {
        global $codigo;
        echo "<table>";
        foreach ($codigo as $materia =>$valor) {
          echo "<tr>";
          echo "<th style='background-color: Moccasin;'>{$materia}</th>";
          echo "<td>{$valor['materia']}</td>";
          echo "<td>{$valor['docente']}</td>";
          echo "<td>{$valor['aula']}</td>";
          echo" </tr>";
        }
        echo "</table><br>";
      }

      function mostrarTabla($dia) {
        global $codigo;

        if($dia == "") {
          echo "<table><tr><td>Descanso / Recreo</td></tr></table>";
          echo "<br>";
          return;
        }

        echo "<table>";
        echo "<tr>";
        echo "<th style='background-color: Moccasin;'>$dia</th>";

        echo "<td>";
          print_r($codigo[$dia]['materia']);
        echo "</td>";

        echo "<td>";
          print_r($codigo[$dia]['docente']);
        echo "</td>";

        echo "<td>";
          print_r($codigo[$dia]['aula']);
        echo "</td>";

        echo "</tr>";
        echo "</table>";
        echo "<br>";
      }

      function diaSiguiente($diaActual, $horaActual) {
        global $horario;

        echo "<table><tr><td><span style='color: #FFFFFF00'>.</span></td></tr></table>";
        echo "<br>";

        echo "<h3 style='text-align: center;'>Pero la siguiente clase es:</h3>";

        $diaSig = ucfirst(utf8_encode(strftime("%A", strtotime("tomorrow"))));
        if (strtotime($horaActual) < strtotime("08:00")) {
          echo "<p>" . $diaActual  . ", 08:00 - 08:55</p>";
        } else {
          if($diaActual=="Viernes") {
            $diaSig = ucfirst(utf8_encode(strftime("%A", strtotime('+3 day', strtotime('now')))));
            echo "<p>" . $diaSig  . ", 08:00 - 08:55</p>";
          } elseif ($diaActual=="Sábado") {
            $diaSig = ucfirst(utf8_encode(strftime("%A", strtotime('+2 day', strtotime('now')))));
            echo "<p>" . $diaSig . ", 08:00 - 08:55</p>";
          } else {
            echo "<p>" . $diaSig . ", 08:00 - 08:55</p>";
          }
        }

        foreach ($horario["08:00-08:55"] as $hora => $dia) {
          if (strtotime($horaActual) < strtotime("08:00")) {
            if($hora == $diaActual) {
              mostrarTabla($dia);
              return;
            }
          }

          if($hora == $diaSig) {
            mostrarTabla($dia);
            return;
          }
        }
      }

      function queTocaAhora($diaActual, $horaActual) {
        global $horario;

        foreach ($horario as $hora => $dia) {
          if($diaActual == "Sábado" || $diaActual == "Domingo") break;
          if(strtotime($horaActual) < strtotime("08:00")) break;
          if(strtotime(substr_replace($hora, '', 0, 6)) >= strtotime($horaActual)) {
            mostrarTabla($dia[$diaActual]);
            return;
          }
        }

        diaSiguiente($diaActual, $horaActual);
      }

      function queToca() {
        global $horario,$codigo;

        if(count($_POST)) {

          echo "<h4 style='margin-left:auto; margin-right:auto;'>";
          echo "<span style='padding: 3px; background-color: LightSlateGray;'>";
          echo $_POST['dia'].", ".substr($_POST['hora'], "0", "5")." - ".substr($_POST['hora'], "6");
          echo "</span>";
          echo "</h4>";

          if($_POST['hora'] != "10:45-11:15") {
            foreach ($horario[$_POST['hora']] as $hora => $dia) {
              if($hora == $_POST['dia']) {
                mostrarTabla($dia);
                return;
              }
            }
          }

          echo "<table><tr><td>Descanso / Recreo</td></tr></table>";
        }
      }
    ?>

    <?php getDiaHora(); ?>

    <br>

    <h2 style="text-align: center;">Ahora toca:</h2>

    <?php
      queTocaAhora(ucfirst(utf8_encode(strftime("%A"))), date("H:i"));
    ?>

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

      <form action="quetengoahora.php" method="POST">
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
          <option value="08:00-08:55">08:00 - 08:55</option>
          <option value="08:55-09:50">08:55 - 09:50</option>
          <option value="09:50-10:45">09:50 - 10:45</option>
          <option value="10:45-11:15">10:45 - 11:15</option>
          <option value="11:15-12:10">11:15 - 12:10</option>
          <option value="12:10-13:05">12:10 - 13:05</option>
          <option value="13:05-14:00">13:05 - 14:00</option>
        </select>

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