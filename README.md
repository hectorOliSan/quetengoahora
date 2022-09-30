# quetengoahora

## A1.3 - Selección de horario de grupos/docentes
Modifica la aplicación "¿Qué tengo ahora?" para que se visualice un desplegable que permita escoger entre un listado de grupos y docentes.

Utiliza la etiqueta "optgroup" para separar a los docentes de los grupos:
- (https://www.w3schools.com/tags/tag_optgroup.asp)

La aplicación mostrará la información relativa al horario que el usuario seleccione en este desplegable.

<hr>

## A1.2 - ¿Qué tengo ahora Trabajando con arrays y funciones

Realiza las siguientes tareas

 - Crea un repositorio en github.com denominado **[tunombreyprimerapellido]-quetengoahora**

- Implementa en él un script en PHP con las siguientes características:
  - Declara e inicializa un array donde almacenes el horario del grupo 2º DAW - Mañana.

  - Define su estructura de manera que permita registrar de forma óptima, por cada actividad del horario, lo siguiente:

    - La materia que se imparte.
    - El/La docente que la imparte.
    - El taller donde se imparte.
    - El orden en que lo hace (primera hora, segunda hora....).

  - Implementa una función que recorra todo el array y muestre su contenido por pantalla.

  - Crea una función a la que le pases tres parámetros día de la semana, hora y minutos (en formato 24h) y te devuelva el módulo que se imparte en ese momento junto al taller y ella docente correspondientes. En caso de que, a la hora pasada por parámetro, no se imparta ningún módulo debe devolver algún valor que lo indique.

- Al ejecutar el script se debe mostrar al usuario toda la información relativa a la actividad que se está impartiendo en este momento y, seguidamente, el horario del grupo. Ambas funcionalidades las proporcionan los dos métodos implementados en los apartados anteriores.

Al finalizar, incluye en el campo de texto de esta actividad la ruta del repositorio y el identificador del commit con el que has dado por finalizada la tarea.

<hr>

### AA1.2.1 - Muestra el horario en formato HTML

Como ampliación de la A1.2, muestra el horario el una tabla HTML, de forma que en cada columna se muestre un día de la semana y en cada fila una franja horaria. Incluye las horas concretas y los nombres de los días en los títulos de las filas y las columnas.

Cuando finalices la actividad especifica, en el campo de texto de esta actividad, la ruta del repositorio y el identificador del commit en el que has finalizado la tarea propuesta.

<hr>

### AA1.2.2 - Visualiza el horario en una ventana independiente

Respecto a la actividad A1.2, en lugar de mostrar el horario del grupo tras los datos de la actividad actual, incluye un enlace con el texto "Consulta el horario" de forma que al pulsarlo, se abra una nueva ventana donde se muestre el horario.

Cuando finalices la actividad, especifica el nombre del repositorio y el identificador del commit correspondiente.

<hr>

### AA1.2.3 - Informa al usuario cuál es la siguiente clase

Respecto a la actividad A1.2, en caso de que en el momento en el que se ejecuta el script no se esté impartiendo ninguna actividad, informa al usuario de este hecho y además indícale que la próxima clase será dentro de X horas y Y minutos, el módulo, docente y aula donde se impartirá.

Cuando finalices la actividad, especifica el nombre del repositorio y el identificador del commit correspondiente.

<hr>

### AA1.2.4 - Carga el horario a partir de un XML

En relación a la actividad A1.2, en lugar de cargar los datos del horario directamente en el array, hazlo a partir de un fichero XML cuya estructura deberás definir tú.

Utiliza como ejemplos los ficheros adjuntos.

Cuando finalices la actividad especifica la URL del repositorio y el identificador del commit mediante el cuál has implementado la tarea.