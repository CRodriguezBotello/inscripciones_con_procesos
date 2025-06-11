<?php
    require_once('controlador/cProfesor.php');

    $objProfesor=new CProfesor();
    $Profesor=$objProfesor->buscar_profesor();

    include('vista/v_form_mod_profesor.php');
?>