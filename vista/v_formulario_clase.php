<!DOCTYPE html>
<html>
    <head>
        <title>Alta de Alumnos</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h3>Dar de alta un alumno</h3>
        <form action="proceso_nueva_clase.php" method="post">
            <label for="codigo">Código de la clase: </label><br>
            <input type="text" name="codigo">
            <br/><br>
            <label for="tutor">Tutor de la clase: </label>
            <br/>
            <select name="tutor">
            <?php
                    foreach ($tutores as $tutor) {
                    // recorremos cada indice del array y mostramos su valor en el option
                    echo '<option value='.$tutor["idUsuario"].'>' .$tutor["nombre"]. '<br/>';
                }
            ?>
            </select>
            <br><br>
            <label for="etapa">Etapa de la clase: </label>
            <br/>
            <select name="etapa">
            <?php
                foreach ($etapas as $idEtapa => $etapa) {
                    // recorremos cada indice del array y mostramos su valor en el option
                    echo '<option name="etapa" value='.$idEtapa.'>' .$etapa. '<br/>';
                }
            ?>
            </select>
            <br><br>
            <input type="submit" value="ENVIAR">
            <input type="reset" value="REINICIAR">
        </form>
    </body>
</html>