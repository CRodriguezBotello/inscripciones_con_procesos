<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inscribir actividades</title>
</head>
<body>
    <h3>Inscribir a mis alumnos</h3>

    <?php if (is_array($alumnos)): ?>
        <form action="proceso_inscribir_alumnos.php" method="post">
            <input type="hidden" name="id" value="<?= $alumnos[0]['idActividad']; ?>">

            <label>Nombre de la actividad:</label>
            <input type="text" name="nombre" readonly value="<?= $alumnos[0]['nombre_actividad']; ?>">
            <br/>
            <?php 
                for ($i = 0; $i < $alumnos[0]['max_al_clases']; $i++){
                    echo '<label for="nombre">Alumno:</label>';
                    echo '<select name="alumnos[]">';
                    echo "<option value='' selected disabled hidden></option>";
                    foreach ($alumnos as $alumno){
                        echo "<option value='".$alumno['idAlumno']."'>".$alumno['nombre_alumno']."</option>";
                    }
                    echo '</select>';
                    echo '<br/>';
                }
            ?>
            <br/>
            <input type="submit" value="ENVIAR">
            <input type="reset" value="LIMPIAR">
        </form>
    <?php endif; ?>
</body>
</html>