<!DOCTYPE html>
<html>
    <head>
        <title>Menu de Administrador</title>
        <meta charset="utf-8">
    </head>
    <body>
        <!-- Vista del menu del administrador -->
        <h3>Hola, Administrador <?php echo $usuario['nombre']; ?></h3>
        <!-- enlace para dar de alta a los profesores -->
        <p>Dar de alta un profesor: <a href="proceso_alta_profesor.php">Dar de alta</a></p>
        <!-- enlace para dar de alta a las clases -->
        <p>Dar de alta a una clase: <a href="proceso_alta_clase.php">Dar de alta</a></p>
        <!-- enlace para dar de alta a las actividades -->
        <p>Dar de alta a una Actividad: <a href="proceso_alta_actividad.php">Dar de alta</a></p>
        <!-- enlace para dar de alta a las etapas -->
        <p>Dar de alta a una etapa: <a href="proceso_alta_etapa.php">Dar de alta</a></p>

        <!-- enlace para borrar profesores -->
        <p><a href="proceso_listar_profesores.php">Borrar profesores</a></p>
    </body>
</html>