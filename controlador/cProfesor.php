<?php
    session_start();
    require_once('modelo/mProfesor.php');
    
    class CProfesor{
        public $mensaje;
        public $nombre;
        public $correo;
        public $pw;

        //metodo para añadir los profesores a la base de datos
        public function insertar_profesor(){
            if(!empty($_POST['nombre'])){
                //comprobamos que hemos añadido el nombre
                $this->nombre=$_POST['nombre'];

                if(!empty($_POST['correo'])){
                    //comprobamos que hemos añadido el correo
                    $this->correo=$_POST['correo'];

                    if(!empty($_POST['pw'])){
                        //comprobamos que hemos añadido la contraseña
                        $pw=$_POST['pw'];
                        $this->pw=password_hash($pw,PASSWORD_DEFAULT);

                        //llamada al metodo del modelo para añadir al profesor
                        $objProfesor= new MProfesor();
                        $this->mensaje=$objProfesor->nuevo_profesor($this->nombre,$this->correo,$this->pw);
                    }else{
                        //mensaje de error
                        $this->mensaje="Falta la contraseña del profesor";
                    }
                }else{
                    //mensaje de error
                    $this->mensaje="Falta el correo del profesor";
                }
            }else{
                //mensaje de error
                $this->mensaje="Falta el nombre del profesor";
            }
                //devuelve el mensaje
            return $this->mensaje;
        }

        //metodo para añadir al alumno a la base de datos
        public function insertar_alumno(){
            if(!empty($_POST['nombre'])){
                //comprobamos que hemos añadido el nombre
                $this->nombre=$_POST['nombre'];

                if(!empty($_POST['clase'])){
                    //comprobamos que hemos añadido la clase a la que pertenece
                    $clase=$_POST['clase'];

                        //Llamada al metodo del modelo para añadir el alumno
                        $objProfesor= new MProfesor();
                        $this->mensaje=$objProfesor->nuevo_alumno($this->nombre,$clase);
                }else{
                    //mensaje de error
                    $this->mensaje="Falta la clase del alumno";
                }
            }else{
                //mensaje de error
                $this->mensaje="Falta el nombre del alumno";
            }
                //devolvemos el mensaje
            return $this->mensaje;
        }

        public function listar_profesores(){
            //llamada al modelo para listar los profesores
            $objProfesor= new MProfesor();
            $datos=$objProfesor->listar_profesores();
            return $datos;
        }

        //metodo para buscar si el profesor es tutor
        public function buscar_tutor(){
            if (isset($_GET["id"])) {
                //comprobamos que hemos recogido bien el id
                $id = $_GET["id"];

                $objProfesor= new MProfesor();
                $tutor=$objProfesor->buscar_tutor($id);

                if ($tutor != "Este profesor no es tutor") {
                    //si el profesor es tuto, añade los datos del tutor a la sesion
                    $_SESSION["idP"]=$tutor["idUsuario"];
                    $_SESSION["nombreP"]=$tutor["nombre"];
                    $_SESSION["correoP"]=$tutor["idUsuario"];
                    $_SESSION["pwP"]=$tutor["idUsuario"];
                    $_SESSION["perfilP"]=$tutor["idUsuario"];
                    $_SESSION["idClaseP"]=$tutor["idUsuario"];
                    $_SESSION["codigoP"]=$tutor["idUsuario"];
                    $_SESSION["tutorP"]=$tutor["idUsuario"];
                    $_SESSION["etapaP"]=$tutor["idUsuario"];
                }
                // devuelve el tutor
                return $tutor;
            }
        }

        //metodo para buscar al profesor
        public function buscar_profesor(){
            if (isset($_GET["id"])) {
                //comprobamos que recogemos el id
                $id = $_GET["id"];
            }

            //Llamada al metodo del modelo para buscar al profesor
            $objProfesor= new MProfesor();
            $profesor=$objProfesor->buscar_profesor($id);
            //devuelve el profesor
            return $profesor;
        }

        //metodo para borrar al profesor
        public function borrar_profesor(){

            if (isset($_GET["id"])) {
                //comprobamos que hemos añadido el id del profesor
                $idprofesor= $_GET["id"];

                //Llamada al metodo para borrar al profesor
                $objProfesor= new MProfesor();
                $this->mensaje=$objProfesor->eliminar_profesor($idprofesor);
                //devuelve el mensaje
                return $this->mensaje;
            }
            
        }

        //metodo para modificar al profesor
        public function modificar_profesor(){

            if (!empty($_POST["nombre"])) {
                //comprobamos que hemos añadido el nombre
                $this->nombre = $_POST["nombre"];

                if(!empty($_POST['correo'])){
                    //comprobamos que hemos añadido el correo
                     $this->correo=$_POST['correo'];

                    if(!empty($_POST['idProfesor'])){
                        //comrpobamos que hemos añadido el id del profesor
                       $idprofesor=$_POST['idProfesor'];

                       //llamada al metodo del modelo para modificar al profesor
                        $objProfesor= new MProfesor();
                        $this->mensaje=$objProfesor->modificar_profesor($idprofesor, $this->nombre,$this->correo);
                    }else{
                        //mensaje de error
                        $this->mensaje="Falta el id del profesor";
                    }
                }else{
                    //mensaje de error
                    $this->mensaje="Falta el correo del profesor";
                }
                
            }else{
                //mensaje de error
                $this->mensaje="Falta el nombre del profesor";
            }

            //devuelve el mensaje
            return $this->mensaje;
        }

        //metodo para 
        public function listar_alumnos_actividades(){
            if(!empty($_GET['id'])){
                //comprobamos que hemos añadido el id
                $idActividad=$_GET['id'];

                if(!empty($_GET['idProfesor'])){
                    //comprobamos que hemos añadido el id del profesor
                    $idProfesor=$_GET['idProfesor'];

                    //llamada al metodo del modelo para inscribir los alumnos
                    $objModelo=new MProfesor();
                    $datos=$objModelo->listar_alumnos_actividades($idProfesor,$idActividad);
                }  
            }

            //devolvemos los datos
            return $datos;
        }

        //metodo para inscribir a los alumnos
        public function inscripcion_alumnos(){
            if(!empty($_POST['id'])){
                //comprobamos que hemos añadido el id del profesor
                $idActividad=$_POST['id'];

                if(isset($_POST['alumnos']) && !empty($_POST['alumnos'])){
                    //comprobamos que hemos añadido los alumnos
                    $alumnos=$_POST['alumnos'];

                    $objModelo=new MProfesor();
                    foreach($alumnos as $alumno){ //inscribe al alumno en la actividad si no está vacío
                        if(!empty($alumno)){
                            $this->mensaje=$objModelo->inscripcion_alumnos($idActividad,$alumno);
                        }
                    }
                    
                }else{
                    //mensaje de error
                    $this->mensaje="Debe seleccionar al menos un alumno";
                }
            }else{
                //mensaje de error
                $this->mensaje="Error al obtener la actividad";
            }

            return $this->mensaje;
        }
        
    }
?>