<?php
    require_once('config/configdb.php');

    class MClase{
        public $mensaje;
        private $conexion;

        public function __construct(){

            $this->conexion= new mysqli(SERVIDOR,USUARIO,PASSWORD,BBDD);
            $this->conexion->set_charset('utf8');
        }

        public function listar_etapas(){

            $sql= "SELECT idEtapa,nombre FROM etapas";
            $resultado=$this->conexion->query($sql);

            $Etapas=[];
            if ($resultado->num_rows > 0) {
                while($fila=$resultado->fetch_assoc()){
                    
                    $Etapas[$fila["idEtapa"]]=$fila["nombre"];
                }
            }else{
                exit('No hay filas en la tabla de Etapas');
            }
            return $Etapas;
        }
    }
?>