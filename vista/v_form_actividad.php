<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir actividad</title>
</head>
<body>
    <h1>Añadir Actividad</h1>
    <form action="proceso_nueva_act.php" method="post">
        <label for="nombre">Actividad: </label><br/>
        <input type="text" name="nombre"><br/><br/>

        <label for="alumno">Maximo de alumnos: </label><br/>
        <input type="text" name="alumno"><br/><br/>

        <label for="etapas">Etapas:</label><br/>
        <?php
            foreach ($Etapas as $etapa) {
                // añadimos un checkbox nuevo por cada fila de etapas que haya en la base de datos
                echo '<input type="checkbox" name="etapas[]" value='.$etapa['idEtapa'].'>' .$etapa['nombre']. '<br/>';
            }
        ?>
        <br/>
        <br>
        <input type="submit" value="Enviar">
        <input type="reset" value="Reiniciar">
    </form>
</body>
</html>
