<?php
    require_once('config/configdb.php');

    class MClase{
        public $mensaje;
        private $conexion;

        //metodo construct
        public function __construct(){

            $this->conexion= new mysqli(SERVIDOR,USUARIO,PASSWORD,BBDD);
            $this->conexion->set_charset('utf8');
        }

        //metodo para añadir la clase a la base de datos
        public function nueva_clase($codigo,$tutor,$etapa){
           $sql="INSERT INTO clases (codigo, idTutor, idEtapa) VALUES ('$codigo','$tutor','$etapa')";

           //ejecutamos la consulta
           $resultado=$this->conexion->query($sql);

           if($resultado){
                //mensaje de exito
                $this->mensaje="Nueva clase añadida";
            }else{
                //mensaje de error
                $this->mensaje="No se ha podido añadir la clase";
            }

            //devuelve el mensaje
            return $this->mensaje;
        }
    }
?>