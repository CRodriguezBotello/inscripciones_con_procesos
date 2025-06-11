<?php
    require_once('controlador/cProfesor.php');

    //llamada al metodo del controlador de profesor para añadir a un nuevo profesor
    $objProfesor=new CProfesor();
    $mensaje=$objProfesor->insertar_profesor();

    //vista para mostrar el mensaje
    include('vista/v_mensajeProfesor.php');
?>