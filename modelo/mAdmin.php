<?php
    require_once('config/configdb.php');

    class MAdmin{
        public $mensaje;
        private $conexion;

        //metodo construct
        public function __construct(){

            $this->conexion= new mysqli(SERVIDOR,USUARIO,PASSWORD,BBDD);
            $this->conexion->set_charset('utf8');
        }

        //metodo para buscar si hay administradores en la base de
        public function buscar_admin(){

            $sql="SELECT * FROM usuarios WHERE perfil='A';";
            //ejecutamos la consulta
            $resultado=$this->conexion->query($sql);

            if($resultado->num_rows > 0){
                //si el profesor es tutor, devuelve los datos
                $admin=true;
            }else{
                //mensaje de error
                $admin=false;
            }
                //devuelve el valor de admin
                return $admin;
        }
            // Metodo para añadir al administrador
        public function alta_admin($nombre,$correo,$pw){

            $sql= 'INSERT INTO usuarios (nombre, correo, pw, perfil) VALUES ("'.$nombre.'","'.$correo.'","'.$pw.'","A");';
                //ejecutamos la consulta            
            $resultado=$this->conexion->query($sql);
            if($resultado){
                //mensaje de exito
                $this->mensaje="Nuevo administrador añadido";
            }else{
                //mensaje de error
                $this->mensaje="No se ha podido dar de alta el administrador";
            }
            //devolvemos el mensaje
            return $this->mensaje;
        }

        //metodo para comprobar si los datos de la sesion que hemos puesto existen en la base de datos
         public function iniciar_sesion($correo,$pw){
            $sql="SELECT * FROM usuarios WHERE correo='$correo'";

            $resultado=$this->conexion->query($sql);
            if($resultado->num_rows > 0){
                //si el usuario existe, devuelve los datos del usuario
                $usuario = $resultado->fetch_assoc();
                return $usuario;
            }else{
                //mensaje de error
                $this->mensaje="Fallo al enviar formulario";
            }
            //devuelve el mensaje
            return $this->mensaje;
        }
    }
?>