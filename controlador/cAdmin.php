<?php
    require_once('modelo/mAdmin.php');

    class CAdmin{
        public $mensaje;
        public $nombre;
        public $correo;
        public $pw;

        public function insertar_admin(){
            if(!empty($_POST['nombre'])){
                $this->nombre=$_POST['nombre'];

                if(!empty($_POST['correo'])){
                    $this->correo=$_POST['correo'];

                    if(isset($_POST['pw']) && !empty($_POST['pw'])){
                        $pw=$_POST['pw'];
                        $this->pw=password_hash($pw,PASSWORD_DEFAULT);

                        if(isset($_POST['pw2']) && !empty($_POST['pw2'])){
                            $pw2=$_POST['pw2'];
                            $pwOk=password_hash($pw2,PASSWORD_DEFAULT);

                            if($pw==$pw2){
                                require_once('modelo/mAdmin.php');
                                $objAdmin= new MAdmin();
                                $this->mensaje=$objAdmin->alta_admin($this->nombre,$this->correo,$this->pw);
                            }else{
                                $this->mensaje="La contraseña no es la misma";
                            }   
                        }
                    }else{
                        $this->mensaje="La contraseña está vacía";
                    }
                }else{
                    $this->mensaje="El correo está vacío";
                }
            }else{
                $this->mensaje="El nombre está vacío";
            }

            return $this->mensaje;
        }

        public function iniciar_sesion(){
            if(!empty($_POST['correo'])){
                $this->correo=$_POST['correo'];

                if(isset($_POST['pw']) && !empty($_POST['pw'])){
                    $this->pw=$_POST['pw'];
                    $objAdmin=new MAdmin();
                    $usuario=$objAdmin->iniciar_sesion($this->correo,$this->pw);

                    if (password_verify($this->pw, $usuario['pw'])) {
                        $this->mensaje = "Inicio de sesión correcto";
                        $_SESSION['id']=$usuario['idUsuario'];
                        $_SESSION['perfil']=$usuario['perfil'];
                        $_SESSION["nombre"]=$usuario['nombre'];
                        
                    } else {
                        $this->mensaje = "Contraseña incorrecta";
                    }
                }
            }else{
                $this->mensaje="Hay que rellenar el correo";
            }

            $_SESSION["mensaje"]=$this->mensaje;
            return $usuario;
        }
    }
?>