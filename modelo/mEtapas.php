<?php
    require_once('config/configdb.php');

    class MEtapas{
        public $mensaje;
        private $conexion;

        public function __construct(){

            $this->conexion= new mysqli(SERVIDOR,USUARIO,PASSWORD,BBDD);
            $this->conexion->set_charset('utf8');
        }

        public function nueva_clase($codigo,$tutor,$etapa){
           $sql="INSERT INTO clases (codigo, idTutor, idEtapa) VALUES ('$codigo','$tutor','$etapa')";

           $resultado=$this->conexion->query($sql);

           if($resultado){
                $this->mensaje="Nueva clase añadida";
            }else{
                $this->mensaje="No se ha podido añadir la clase";
            }

            return $this->mensaje;
        }
    }
?>