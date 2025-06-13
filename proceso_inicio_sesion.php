<?php
    require_once('controlador/cAdmin.php');

    $objAdmin= new CAdmin();
    $admin=$objAdmin->buscar_admin();

    //si hay administradores, llevara al inicio de sesion, si no hay, lleva a crear un administrador
    if ($admin) {
        // incluye la vista para iniciar sesion
        include('vista/v_inicioSesion.php');    
    }else{
        // incluye la vista para crear un admin y un mensaje para indicar que no hay administradores
        $mensaje = "No hay administradores registrados en la base de datos";
        include ('vista/v_alta_admin.php');
    }
    
?>