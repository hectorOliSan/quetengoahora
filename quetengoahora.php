<!DOCTYPE html>
<html lang="es">
<head>
  <title>Horario DAW</title>

  <style type="text/css">
    table {
      margin: auto;
      width: 80%;
    }
    table, th, td {
      border-collapse: collapse; 
      border: 2px solid;
    }

    td {
      max-width: 200px;
      padding: 5px;
    }
  </style>

</head>
<body>
  <?php
    $horario = array(
      "Lunes" => array(
        "EMR - Empresa e iniciativa emprendedora" => array(
          "docente" => "MARIA DEL SOL GARCIA TARAJANO", "aula" => "G201", "orden" => "08:00 - 08:55"
        ),
        "DSW - Desarrollo web en entorno servidor" => array(
          "docente" => "SERGIO RAMOS SUAREZ", "aula" => "G201", "orden" => "08:55 - 10:45" 
        ),
        "DEW - Desarrollo web en entorno cliente" => array(
          "docente" => "MARIA DEL CARMEN RODRIGUEZ SUAREZ", "aula" => "G201", "orden" => "11:15 - 14:00" 
        )
      ),


      "Martes" => array(
        "DPL - Despliegue de aplicaciones web" => array(
          "docente" => "MARIA ANTONIA MONTESDEOCA VIERA", "aula" => "G201", "orden" => "08:00 - 09:50"
        ),
        "DSW - Desarrollo web en entorno servidor" => array(
          "docente" => "SERGIO RAMOS SUAREZ", "aula" => "G201", "orden" => "09:50 - 12:10" 
        ),
        "DOR - Diseño de interfaces web" => array(
          "docente" => "ERMIS PAPAKONSTANTINOU BAEZ", "aula" => "G201", "orden" => "12:10-14:00" 
        )
      ),

      "Miércoles" => array(
        "DEW - Desarrollo web en entorno cliente" => array(
          "docente" => "MARIA DEL CARMEN RODRIGUEZ SUAREZ", "aula" => "G201", "orden" => "08:00 - 09:50" 
        ),
        "DSW - Desarrollo web en entorno servidor" => array(
          "docente" => "SERGIO RAMOS SUAREZ", "aula" => "G201", "orden" => "09:50 - 12:10" 
        ),
        "DOR - Diseño de interfaces web" => array(
          "docente" => "ERMIS PAPAKONSTANTINOU BAEZ", "aula" => "G201", "orden" => "12:10-14:00" 
        )
      ),

      "Jueves" => array(
        "DPL - Despliegue de aplicaciones web" => array(
          "docente" => "MARIA ANTONIA MONTESDEOCA VIERA", "aula" => "G201", "orden" => "08:00 - 10:45"
        ),
        "DEW - Desarrollo web en entorno cliente" => array(
          "docente" => "MARIA DEL CARMEN RODRIGUEZ SUAREZ", "aula" => "G201", "orden" => "11:15 - 13:05" 
        ),
        "EMR - Empresa e iniciativa emprendedora" => array(
          "docente" => "MARIA DEL SOL GARCIA TARAJANO", "aula" => "G201", "orden" => "13:05 - 14:00"
        )
      ),

      "Viernes" => array(
        "DOR - Diseño de interfaces web" => array(
          "docente" => "ERMIS PAPAKONSTANTINOU BAEZ", "aula" => "G201", "orden" => "08:00 - 09:50" 
        ),
        "DPL - Despliegue de aplicaciones web" => array(
          "docente" => "MARIA ANTONIA MONTESDEOCA VIERA", "aula" => "G201", "orden" => "09:50 - 10:45"
        ),
        "EMR - Empresa e iniciativa emprendedora" => array(
          "docente" => "MARIA DEL SOL GARCIA TARAJANO", "aula" => "G201", "orden" => "11:15 - 12:10"
        ),
        "DSW - Desarrollo web en entorno servidor" => array(
          "docente" => "SERGIO RAMOS SUAREZ", "aula" => "G201", "orden" => "12:10 - 14:00" 
        )
      )
    );

    foreach ($horario as $dia => $materia ) {
      echo "<table>
      <thead>
        <th colspan=4>$dia</th>
      </thead>";

      foreach ($materia as $materia =>$valor) {
          echo "<tr>";
          echo "<td>{$materia}</td>";
          echo "<td>{$valor['docente']}</td>";
          echo "<td>{$valor['aula']}</td>";
          echo "<td>{$valor['orden']}</td>";
          echo" </tr>";
      }

      echo "</table><br>";
    }

  ?>
  
</body>
</html>