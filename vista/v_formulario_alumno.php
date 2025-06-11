<!DOCTYPE html>
<html>
    <head>
        <title>Alta de Alumnos</title>
        <meta charset="utf-8">
    </head>
    <body>
        <!-- Formulario para añadir alumnos -->
        <h3>Dar de alta un alumno</h3>
        <form action="proceso_nuevo_alumno.php" method="post">
            <label for="nombre">Nombre del alumno: </label><br>
            <input type="text" name="nombre">
            <br/><br>
            <label for="clase">Clase a la que pertenece: </label><br>
            <input type="text" name="clase">
            <br/><br>
            <input type="submit" value="ENVIAR">
            <input type="reset" value="REINICIAR">
        </form>
    </body>
</html>