<?php
    require_once('controlador/cProfesor.php');

    $objProfesor=new CProfesor();
    $mensaje=$objProfesor->modificar_profesor();

    include('vista/v_mensaje_BorrarProfesor.php');
?>