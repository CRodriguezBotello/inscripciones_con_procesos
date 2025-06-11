<?php
    require_once('config/configdb.php');

    class MEtapas{
        public $mensaje;
        private $conexion;

        //metodo construct
        public function __construct(){

            $this->conexion= new mysqli(SERVIDOR,USUARIO,PASSWORD,BBDD);
            $this->conexion->set_charset('utf8');
        }

        //metodo para listar las etapas que hay en la base de datos
        public function listar_etapas(){

            $sql= "SELECT * FROM etapas";
            //ejecutamos la consulta
            $resultado=$this->conexion->query($sql);

            $Etapas=[];
            if ($resultado->num_rows > 0) {
                //mete las etapas que hayamos recogido con la consulta en la variable $etapas
                while($fila=$resultado->fetch_assoc()){
                    
                    $Etapas[]=$fila;
                }
            }else{
                //mensaje de error
                exit('No hay filas en la tabla de Etapas');
            }
            //devuelve las etapas
            return $Etapas;
        }

        //metodo para añadir etapas a la base de datos
        public function insertar_etapa($nombre){
           $sql="INSERT INTO etapas (nombre) VALUES ('$nombre')";

           //ejecutamos la consulta
           $resultado=$this->conexion->query($sql);

           if($resultado){
                //mensaje de exito
                $this->mensaje="Nueva etapa añadida";
            }else{
                //mensaje de error
                $this->mensaje="No se ha podido añadir la etapa";
            }

            //devuelve el mensaje
            return $this->mensaje;
        }

        
    }
?>