<!DOCTYPE html>
<html>
    <head>
        <title>Listado de Actividades</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h3>Actividades para inscribir alumnos:</h3>
        <?php
        //muestra todas las actividades para elegir en cual inscribir alumnos:
            foreach($actividades as $indice=>$actividad){
                echo '<p><a href="proceso_inscripcion.php?idProfesor='.$actividades[$indice]['idTutor'].'&id='.$actividades[$indice]['idActividad'].'">'.$actividades[$indice]['nombre'].'</a></p> <br>';
            }
        ?>
    </body>
</html>