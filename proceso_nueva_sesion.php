<?php
    // session_start();
    
    require_once('controlador/cAdmin.php');
    $objAdmin= new CAdmin();
    $usuario= $objAdmin->iniciar_sesion();

    if($_SESSION['perfil']==='A'){
        
        include('vista/v_menuAdmin.php');

    }else {
        if($_SESSION['perfil']==='P'){
            include('controlador/cProfesor.php');
            $objTutor= new CProfesor();
            $tutor=$objTutor->buscar_tutor();
            if ($tutor == "Este profesor no es tutor") {
                $mensaje=$tutor;
                include('vista/v_mensajeProfesor.php');    
            }else{
                include('vista/v_menuProfesor.php');
            }
            
        }else {
            include('vista/v_menuAlum.php');
            $_SESSION["mensaje"]="Los alumnos no pueden acceder aqui";
        }
    }
?>