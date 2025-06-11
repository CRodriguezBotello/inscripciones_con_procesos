<?php

    require_once('controlador/cProfesor.php');
    include('controlador/cEtapas.php');

    $objProfesor=new CProfesor();
    $tutores=$objProfesor->listar_profesores();

    $objEtapas=new CEtapas();
    $etapas=$objEtapas->listar_etapas();
    
    include("vista/v_formulario_clase.php");
?>