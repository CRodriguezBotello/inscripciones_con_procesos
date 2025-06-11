<?php
    require_once('controlador/cProfesor.php');

    $objProfesor=new CProfesor();
    $Profesores=$objProfesor->listar_profesores();

    include('vista/v_Profesores.php');
?>