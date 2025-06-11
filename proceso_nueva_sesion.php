<?php
    // session_start();
    
            // Llamada al metodo para comprobar si los datos de la sesion que hemos puesto pertenecen a alguna sesion
    require_once('controlador/cAdmin.php');
    $objAdmin= new CAdmin();
    $usuario= $objAdmin->iniciar_sesion();

    if($_SESSION['perfil']==='A'){
        //si el perfil del usuario es administrador, muestra esta vista
        include('vista/v_menuAdmin.php');

    }else {
        if($_SESSION['perfil']==='P'){
            //si el perfil del usuario es profesor, comprobamos si el profesor añadido es tutor de alguna clase
            include('controlador/cProfesor.php');
            $objTutor= new CProfesor();
            $tutor=$objTutor->buscar_tutor();
            if ($tutor == "Este profesor no es tutor") {
                //si el profesor no es tutor, muestra la vista del mensaje de error
                $mensaje=$tutor;
                include('vista/v_mensajeProfesor.php');    
            }else{
                //si es tutor, muestra la vista del menú del tutor
                include('vista/v_menuProfesor.php');
            }
            
        }
    }
?>