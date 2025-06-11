<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Profesor</title>
</head>
<body>
    <h1>Modificando al profesor <?php echo $Profesor["nombre"]?></h1>
    <form action="proceso_actualizar_profesor.php" method="post">
        
        <input type="hidden" name="idProfesor" value="<?php echo $Profesor["idUsuario"]?>">

        <label for="nombre">Nombre del Profesor</label><br>
        <input type="text" name="nombre" value="<?php echo $Profesor["nombre"]?>"><br><br>

        <label for="correo">Correo del Profesor</label><br>
        <input type="text" name="correo" value="<?php echo $Profesor["correo"]?>"><br><br>

        <input type="submit" value="ENVIAR">
        <input type="reset" value="REINICIAR">
    </form>
</body>
</html>