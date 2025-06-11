<?php
    require_once('controlador/cProfesor.php');

    //llamada al modelo del controlador para buscar al profesor
    $objProfesor=new CProfesor();
    $Profesor=$objProfesor->buscar_profesor();

    //vista para modificar al profesor buscado
    include('vista/v_form_mod_profesor.php');
?>