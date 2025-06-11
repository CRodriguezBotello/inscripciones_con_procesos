<!DOCTYPE html>
<html>
    <head>
        <title>Inicio Sesion</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h3>Inicio Sesion</h3>
        <p>Ya hay un admin dado de alta</p>
        <form action="proceso_nueva_sesion.php" method="post">
            <label for="correo">Correo: </label>
            <input type="text" name="correo">
            <br/>
            <label for="pw">Contraseña: </label>
            <input type="password" name="pw">
            <br/>
            <input type="submit" value="ENVIAR">
            <input type="reset" value="REINICIAR">
        </form>
    </body>
</html>