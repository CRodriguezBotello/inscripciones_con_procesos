<?php
    require_once('controlador/cClase.php');

    $objClase=new CClase();
    $mensaje=$objClase->insertar_clase();

    include('vista/v_mensaje_clase.php');
?>