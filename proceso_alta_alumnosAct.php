<?php
    session_start();
    //llamada al modelo del controlador de etapas para listar las etapas
    require_once 'controlador/cActividad.php';
    $objAct = new CActividad();
    $actividades=$objAct->listar_actividades();
    //vista del formulario para añadir alumnos
    include("vista/v_listar_actividades.php");
?>