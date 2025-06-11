<?php
    require_once('controlador/cProfesor.php');

    //llamada al metodo del controlador para modificar al profesor
    $objProfesor=new CProfesor();
    $mensaje=$objProfesor->modificar_profesor();

    //incluye la vista para mostrar el mensaje
    include('vista/v_mensaje_BorrarProfesor.php');
?>