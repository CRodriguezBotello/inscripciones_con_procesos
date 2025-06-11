<?php
    require_once('controlador/cProfesor.php');

    $objProfesor=new CProfesor();
    $mensaje=$objProfesor->insertar_alumno();

    include('vista/v_mensaje_BorrarProfesor.php');
?>