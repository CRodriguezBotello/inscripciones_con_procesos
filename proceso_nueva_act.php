<?php
    require_once('controlador/cActividad.php');

    //llamada al metodo del controlador de actividad para añadir una actividad
    $objAct=new CActividad();
    $mensaje=$objAct->insertar_actividad();

    //vista para mostrar el mensaje
    include('vista/v_mensaje_Act.php');
?>