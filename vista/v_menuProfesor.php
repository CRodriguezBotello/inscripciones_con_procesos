<!DOCTYPE html>
<html>
    <head>
        <title>Menu de Profesores</title>
        <meta charset="utf-8">
    </head>
    <body>
        <!-- Vista del menu del profesor -->
        <h3>Hola, Profesor <?php echo $usuario['nombre']; ?></h3>
        <!-- enlace para dar de alta a los alumnos -->
        <p><a href="proceso_alta_alumnos.php">Inscribir Alumnos</a></p>
        <!-- enlace para modificar los datos de los profesores -->
        <p><a href="proceso_modificar_profesor.php?&id=<?php echo $usuario['idUsuario']; ?>">Modificar sus datos</a></p>
    </body>
</html>