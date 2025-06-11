<?php
    require_once('controlador/cProfesor.php');

    //llamada al metodo del controlador de profesor para añadir un alumnos
    $objProfesor=new CProfesor();
    $mensaje=$objProfesor->insertar_alumno();

    //vista para mostrar el mensaje
    include('vista/v_mensaje_BorrarProfesor.php');
?>