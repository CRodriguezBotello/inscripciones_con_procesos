<!DOCTYPE html>
<html>
    <head>
        <title>Dar de alta un profesor</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h3>Alta de profesores</h3>
        <form action="proceso_nuevo_profesor.php" method="post">
            <label for="nombre">Nombre del profesor/a: </label>
            <input type="text" name="nombre">
            <br/>
            <label for="correo">Ingrese su correo: </label>
            <input type="text" name="correo">
            <br/>
            <label for="pw">Ingrese contraseña provisional: </label>
            <input type="password" name="pw">
            <br/>
            <input type="submit" value="ENVIAR">
            <input type="reset" value="REINICIAR">
        </form>
    </body>
</html>