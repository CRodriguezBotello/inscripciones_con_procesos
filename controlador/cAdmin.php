<?php
    require_once('modelo/mAdmin.php');

    class CAdmin{
        public $mensaje;
        public $nombre;
        public $correo;
        public $pw;

        //metodo para buscar si hay administradores
        public function buscar_admin(){

                $objAdmin= new MAdmin();
                $admin=$objAdmin->buscar_admin();

                // devuelve el tutor
                return $admin;
            }

            // Metodo para añadir administradores a la BBDD        
        public function insertar_admin(){
            if(!empty($_POST['nombre'])){
                //comprobamos que hemos añadido el nombre
                $this->nombre=$_POST['nombre'];

                if(!empty($_POST['correo'])){
                    //comprobamos que hemos añadido el correo
                    $this->correo=$_POST['correo'];

                    if(isset($_POST['pw']) && !empty($_POST['pw'])){
                        //comprobamos que hemos añadido la contraseña
                        $pw=$_POST['pw'];
                        $this->pw=password_hash($pw,PASSWORD_DEFAULT);

                        if(isset($_POST['pw2']) && !empty($_POST['pw2'])){
                            //comprobamos que hemos añadido la segunda contraseña
                            $pw2=$_POST['pw2'];
                            $pwOk=password_hash($pw2,PASSWORD_DEFAULT);

                            if($pw==$pw2){
                                //añadimos el administrador si las contraseñas son iguales
                                require_once('modelo/mAdmin.php');
                                $objAdmin= new MAdmin();
                                $this->mensaje=$objAdmin->alta_admin($this->nombre,$this->correo,$this->pw);
                            }else{
                                //mensaje de error
                                $this->mensaje="La contraseña no es la misma";
                            }   
                        }
                    }else{
                        //mensaje de error
                        $this->mensaje="La contraseña está vacía";
                    }
                }else{
                    //mensaje de error
                    $this->mensaje="El correo está vacío";
                }
            }else{
                //mensaje de error
                $this->mensaje="El nombre está vacío";
            }
            //devolvemos el mensaje
            return $this->mensaje;
        }

            // metodo para iniciar la sesion en la pagina web
        public function iniciar_sesion(){
            if(!empty($_POST['correo'])){
                //comprobamos que hemos añadido el correo
                $this->correo=$_POST['correo'];

                if(isset($_POST['pw']) && !empty($_POST['pw'])){
                    //comprobamos que hemos añadido la contraseña
                    $this->pw=$_POST['pw'];
                    $objAdmin=new MAdmin();
                    $usuario=$objAdmin->iniciar_sesion($this->correo,$this->pw);

                    if (password_verify($this->pw, $usuario['pw'])) {
                        //si la contraseña es correcta, almacena los datos de la sesion
                        $this->mensaje = "Inicio de sesión correcto";
                        $_SESSION['id']=$usuario['idUsuario'];
                        $_SESSION['perfil']=$usuario['perfil'];
                        $_SESSION["nombre"]=$usuario['nombre'];
                        
                    } else {
                        //mensaje de error
                        $this->mensaje = "Contraseña incorrecta";
                    }
                }
            }else{
                //mensaje de error
                $this->mensaje="Hay que rellenar el correo";
            }

            $_SESSION["mensaje"]=$this->mensaje;
            // devuelve los datos del usuario
            return $usuario;
        }
    }
?>