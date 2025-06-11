<?php
    require_once('controlador/cAdmin.php');
    $objAdmin= new CAdmin();
    $mensaje= $objAdmin->insertar_admin();

    if($mensaje == "Nuevo administrador añadido"){
        include('vista/v_mensaje_inicio.php');
    }else{
        include('vista/v_error_inicio.php');
    }
    
?>