<?php
    require_once('controlador/cProfesor.php');

    $objProfesor=new CProfesor();
    $mensaje=$objProfesor->insertar_profesor();

    include('vista/v_mensajeProfesor.php');
?>