<?php
    require_once('controlador/cClase.php');

    //llamada al metodo del controlador de CLase para añadir una clase
    $objClase=new CClase();
    $mensaje=$objClase->insertar_clase();

    //vista para mostrar el mensaje
    include('vista/v_mensaje_clase.php');
?>