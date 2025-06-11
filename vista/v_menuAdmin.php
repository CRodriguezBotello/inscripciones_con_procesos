<!DOCTYPE html>
<html>
    <head>
        <title>Menu de Administrador</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h3>Hola, <?php echo $_SESSION['nombre']; ?></h3>
        <p>Dar de alta un profesor: <a href="proceso_alta_profesor.php">Dar de alta</a></p>
        <p>Dar de alta a una clase: <a href="proceso_alta_clase.php">Dar de alta</a></p>
        <p><a href="proceso_listar_profesores.php">Borrar profesores</a></p>
    </body>
</html>