<!DOCTYPE html>
<html>
    <head>
        <title>Lista de Profesores</title>
        <meta charset="utf-8">
    </head>
    <body>
        <ol>
        <?php
            //muestra todos los profesores que haya en la base de datos
            foreach($Profesores as $profesor){
                //a cada profesor le pone un enlace para elegir si quieres borrar el profesor
                echo '<li> ' . $profesor['nombre'] . '<br><br><a href="proceso_borrar_profesor.php?&id=' . $profesor['idUsuario'] . '">Borrar</a></li>';
            }
        ?>
        </ol>
    </body>
</html>