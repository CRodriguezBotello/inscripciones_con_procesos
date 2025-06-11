<?php
    require_once('controlador/cProfesor.php');

    //Llamada al metodo para listar a los profesores
    $objProfesor=new CProfesor();
    $Profesores=$objProfesor->listar_profesores();

    //vista para mostrar todos los profesores
    include('vista/v_Profesores.php');
?>