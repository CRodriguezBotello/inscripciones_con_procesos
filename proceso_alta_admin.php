<?php
    require_once('controlador/cAdmin.php');

        // Llamada al metodo del controlador para añadir el administrador del controlador Admin   
    $objAdmin= new CAdmin();
    $mensaje= $objAdmin->insertar_admin();

    if($mensaje == "Nuevo administrador añadido"){
        //vista si el administrador ha sido añadido
        include('vista/v_mensaje_inicio.php');
    }else{
        //vista si el administrador no ha sido añadido
        include('vista/v_error_inicio.php');
    }
    
?>