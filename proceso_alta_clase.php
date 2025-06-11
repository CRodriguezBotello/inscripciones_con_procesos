<?php

    require_once('controlador/cProfesor.php');
    include('controlador/cEtapas.php');

    //llamada al modelo del controlador de profesor para listar los profesores
    $objProfesor=new CProfesor();
    $tutores=$objProfesor->listar_profesores();

    //llamada al modelo del controlador de etapas para listar las etapas
    $objEtapas=new CEtapas();
    $etapas=$objEtapas->listar_etapas();
    
    //vista del formulario para añadir clases
    include("vista/v_formulario_clase.php");
?>