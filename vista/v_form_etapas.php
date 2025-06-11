<!DOCTYPE html>
<html>
    <head>
        <title>Alta de Etapas</title>
        <meta charset="utf-8">
    </head>
    <body>
        <!-- Formulario para añadir etapas -->
        <h3>Dar de alta a una etapa</h3>
        <form action="proceso_nueva_etapa.php" method="post">
            <label for="nombre">Nombre de la etapa: </label><br>
            <input type="text" name="nombre">
            <br/><br>
            <input type="submit" value="ENVIAR">
            <input type="reset" value="REINICIAR">
        </form>
    </body>
</html>