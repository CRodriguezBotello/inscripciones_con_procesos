<!DOCTYPE html>
<html>
    <head>
        <title>Menu de Profesores</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h3>Hola, <?php echo $usuario['nombre']; ?></h3>
        <p><a href="proceso_alta_alumnos.php">Inscribir Alumnos</a></p>
        <p><a href="proceso_modificar_profesor.php?&id=<?php echo $usuario['idUsuario']; ?>">Modificar sus datos</a></p>
    </body>
</html>