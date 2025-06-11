<?php
    session_start();
    require_once('modelo/mProfesor.php');
    
    class CProfesor{
        public $mensaje;
        public $nombre;
        public $correo;
        public $pw;

        public function insertar_profesor(){
            if(!empty($_POST['nombre'])){
                $this->nombre=$_POST['nombre'];

                if(!empty($_POST['correo'])){
                    $this->correo=$_POST['correo'];

                    if(!empty($_POST['pw'])){
                        $pw=$_POST['pw'];
                        $this->pw=password_hash($pw,PASSWORD_DEFAULT);

                        $objProfesor= new MProfesor();
                        $this->mensaje=$objProfesor->nuevo_profesor($this->nombre,$this->correo,$this->pw);
                    }else{
                        $this->mensaje="Falta la contraseña del profesor";
                    }
                }else{
                    $this->mensaje="Falta el correo del profesor";
                }
            }else{
                $this->mensaje="Falta el nombre del profesor";
            }

            return $this->mensaje;
        }

        public function insertar_alumno(){
            if(!empty($_POST['nombre'])){
                $this->nombre=$_POST['nombre'];

                if(!empty($_POST['clase'])){
                    $clase=$_POST['clase'];

                        $objProfesor= new MProfesor();
                        $this->mensaje=$objProfesor->nuevo_alumno($this->nombre,$clase);
                }else{
                    $this->mensaje="Falta la clase del alumno";
                }
            }else{
                $this->mensaje="Falta el nombre del alumno";
            }

            return $this->mensaje;
        }

        public function listar_profesores(){
            $objProfesor= new MProfesor();
            $datos=$objProfesor->listar_profesores();
            return $datos;
        }

        public function buscar_tutor(){
            if (isset($_GET["id"])) {
                $id = $_GET["id"];

                $objProfesor= new MProfesor();
                $tutor=$objProfesor->buscar_tutor($id);
                if ($tutor != "Este profesor no es tutor") {
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
                
                return $tutor;
            }
        }

        public function buscar_profesor(){
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
            }
            $objProfesor= new MProfesor();
            $profesor=$objProfesor->buscar_profesor($id);
            return $profesor;
        }

        public function borrar_profesor(){

            $idprofesor= $_GET["id"];
            $objProfesor= new MProfesor();
            $this->mensaje=$objProfesor->eliminar_profesor($idprofesor);
            return $this->mensaje;
        }

        public function modificar_profesor(){

            if (!empty($_POST["nombre"])) {
                $this->nombre = $_POST["nombre"];

                if(!empty($_POST['correo'])){
                     $this->correo=$_POST['correo'];

                    if(!empty($_POST['idProfesor'])){
                       $idprofesor=$_POST['idProfesor'];

                        $objProfesor= new MProfesor();
                        $this->mensaje=$objProfesor->modificar_profesor($idprofesor, $this->nombre,$this->correo);
                    }else{
                        $this->mensaje="Falta el id del profesor";
                    }
                }else{
                    $this->mensaje="Falta el correo del profesor";
                }
                
            }else{
                $this->mensaje="Falta el nombre del profesor";
            }

            return $this->mensaje;
        }
        
    }
?>