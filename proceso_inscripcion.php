<?php
    require_once('controlador/cProfesor.php');

    $objInscripcion=new CProfesor();
    $alumnos=$objInscripcion->listar_alumnos_actividades();

    include('vista/v_form_inscripcion.php');
?>