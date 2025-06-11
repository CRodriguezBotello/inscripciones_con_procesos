<?php

    //llamada al modelo del controlador de etapas para listar las etapas
    require_once 'controlador/cEtapas.php';
    $objEtapa = new CEtapas();
    $Etapas=$objEtapa->listar_etapas();
    //vista del formulario para añadir actividades
    include("vista/v_form_actividad.php");
?>