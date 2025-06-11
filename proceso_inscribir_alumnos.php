<?php
    require_once('controlador/cProfesor.php');

    $objInscripcion=new CProfesor();
    $mensaje=$objInscripcion->inscripcion_alumnos();

    include('vista/v_mensajeInscripcion.php');
?>