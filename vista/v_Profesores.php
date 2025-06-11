<!DOCTYPE html>
<html>
    <head>
        <title>Lista de Profesores</title>
        <meta charset="utf-8">
    </head>
    <body>
        <ol>
        <?php
            foreach($Profesores as $profesor){
                echo '<li> ' . $profesor['nombre'] . '<br><br><a href="proceso_borrar_profesor.php?&id=' . $profesor['idUsuario'] . '">Borrar</a></li>';
            }
        ?>
        </ol>
    </body>
</html>