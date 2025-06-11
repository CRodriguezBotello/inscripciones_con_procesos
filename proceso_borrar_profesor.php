<?php
    require_once('controlador/cProfesor.php');

    //llamada al metodo del controlador de profesor para borrar al profesor
    $objProfesor= new CProfesor();
    $mensaje=$objProfesor->borrar_profesor();

    //vista para mostrar el mensaje
    include('vista/v_mensaje_BorrarProfesor.php');
?>