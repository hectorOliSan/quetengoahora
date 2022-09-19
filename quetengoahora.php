<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Horario DAW</title>

    <style type="text/css">
      body {
        font-family: consolas;
        text-align: center;
      }

      form {
        display: inline-block;
      }

      table {
        margin: auto;
        min-width: 50%;
      }

      table, th, td {
        border-collapse: collapse; 
        border: 2px solid;
      }

      th, td {
        padding: 3px;
      }
    </style>

  </head>
  <body>
    <?php
      $horario = array(
        "08:00 - 08:55" => array(
          "Lunes" => "EMR",
          "Martes" => "DPL",
          "Miércoles" => "DEW",
          "Jueves" => "DPL",
          "Viernes" => "DOR"
        ),


        "08:55 - 09:50" => array(
          "Lunes" => "DSW",
          "Martes" => "DPL",
          "Miércoles" => "DEW",
          "Jueves" => "DPL",
          "Viernes" => "DOR"
        ),

        "09:50 - 10:45" => array(
          "Lunes" => "DSW",
          "Martes" => "DSW",
          "Miércoles" => "DSW",
          "Jueves" => "DPL",
          "Viernes" => "DPL"
        ),

        "10:45 - 11:15" => array(
          "Lunes" => "",
          "Martes" => "",
          "Miércoles" => "",
          "Jueves" => "",
          "Viernes" => ""
        ),

        "11:15 - 12:10" => array(
          "Lunes" => "DEW",
          "Martes" => "DSW",
          "Miércoles" => "DSW",
          "Jueves" => "DEW",
          "Viernes" => "EMR"
        ),

        "12:10 - 13:05" => array(
          "Lunes" => "DEW",
          "Martes" => "DOR",
          "Miércoles" => "DOR",
          "Jueves" => "DEW",
          "Viernes" => "DSW"
        ),

        "13:05 - 14:00" => array(
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

      echo "<h2 style='text-align: center;'>Horario DAW</h2>";

      echo "<table>";
      echo "<th style='background-color: lightblue;'>-------------</th>";
      foreach ($horario['08:00 - 08:55'] as $dia => $materia) {
        echo "<th style='background-color: lightblue;'>$dia</th>";
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

      echo "<table>";
      foreach ($codigo as $materia =>$valor) {
        echo "<tr>";
        echo "<th style='background-color: lightblue;'>{$materia}</th>";
        echo "<td>{$valor['materia']}</td>";
        echo "<td>{$valor['docente']}</td>";
        echo "<td>{$valor['aula']}</td>";
        echo" </tr>";
      }
      echo "</table><br>";
    ?>

    <hr>

    <h2 style="text-align: center;">¿Qué toca ahora?</h2>

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
        <option value="08:00 - 08:55">08:00 - 08:55</option>
        <option value="08:55 - 09:50">08:55 - 09:50</option>
        <option value="09:50 - 10:45">09:50 - 10:45</option>
        <option value="10:45 - 11:15">10:45 - 11:15</option>
        <option value="11:15 - 12:10">11:15 - 12:10</option>
        <option value="12:10 - 13:05">12:10 - 13:05</option>
        <option value="13:05 - 14:00">13:05 - 14:00</option>
      </select>

      <input type="submit" value="Buscar">
    </form>

    <?php 
      if(count($_POST)) {
        
        echo "<h4 style='margin-left:auto; margin-right:auto; width:30%; background-color: lightblue;'>> {$_POST['dia']} - {$_POST['hora']}</h4>";

        if($_POST['hora'] != "10:45 - 11:15") {
          foreach ($horario[$_POST['hora']] as $hora => $dia) {
            if($hora == $_POST['dia']) {
              echo "<table>";
              echo "<tr>";
              echo "<th style='background-color: lightblue;'>$dia</th>";

              echo "<td>";
                print_r($codigo[$dia]['materia']);
              echo "</td>";

              echo "<td>";
                print_r($codigo[$dia]['docente']);
              echo "</td>";

              echo "<td>";
                print_r($codigo[$dia]['aula']);
              echo "</td>";

              echo" </tr>";
              echo "</table>";
            }
          }
          return;
        }
        
        echo "<table><tr><td>Descanso / Recreo</td></tr></table>";
      }
    ?>
  </body>
</html>