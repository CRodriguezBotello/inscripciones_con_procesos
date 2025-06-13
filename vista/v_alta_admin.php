<!DOCTYPE html>
<html>
    <head>
        <title>Registro</title>
        <meta charset="utf-8">
    </head>
    <body>

        <?php
            if (isset($mensaje)) {
                echo $mensaje;
            }
        ?>
        <!-- Formulario para añadir administrador -->
        <h3>Nuevo Admin</h3>
        <form action="proceso_alta_admin.php" method="post">
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre">
            <br/>
            <label for="correo">Correo: </label>
            <input type="text" name="correo">
            <br/>
            <label for="pw">Contraseña: </label>
            <input type="password" name="pw">
            <br/>
            <label for="pw2">Repetir contraseña: </label>
            <input type="password" name="pw2">
            <br/>
            <input type="submit" value="ENVIAR">
            <input type="reset" value="REINICIAR">
        </form>
    </body>
</html>