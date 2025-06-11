<?php
    require_once('config/configdb.php');

    class MActividad{
        public $mensaje;
        private $conexion;

        //metodo construct
        public function __construct(){

            $this->conexion= new mysqli(SERVIDOR,USUARIO,PASSWORD,BBDD);
            $this->conexion->set_charset('utf8');
        }

        //metodo para añadir la actividad a la base de datos
        public function nueva_actividad($nombre, $alumno, $etapas){

             try {
            
                $sql="INSERT INTO actividades (nombre, max_al_clases) VALUES ('$nombre',$alumno)";

                //ejecutamos la consulta
                $resultado=$this->conexion->query($sql);; 
                    
                $IdActividad = $this->conexion->insert_id;

                foreach ($etapas as $etapa) {
                    $sql = 'INSERT INTO actividades_etapas VALUES ('.$IdActividad.','.$etapa.')';
                    $this->conexion->query($sql);
                }

                if($resultado){
                //mensaje de exito
                $this->mensaje="Nueva actividad añadida";
            }else{
                //mensaje de error
                $this->mensaje="No se ha podido añadir la actividad";
            }

            } catch (mysqli_sql_exception $e) {
                if ($e->getCode() == 1062) {
                    //mensaje de error
                    $this->mensaje="Ya existe esta actividad en la Base de Datos";
                }else {
                    //mensaje de error
                    $this->mensaje="La actividad no ha sido insertada".$e->getMessage();
                }
                
            }

            //devuelve el mensaje
            return $this->mensaje;
        }

        public function listar_actividades(){
            // devuelve las actividades que hay en la base de datos, segun la etapa a la que pertenezca la clase del profesor
            $sql="SELECT * FROM actividades
                INNER JOIN actividades_etapas ON actividades.idActividad = actividades_etapas.idActividad
                INNER JOIN clases ON actividades_etapas.idEtapa = clases.idEtapa";

            //ejecutamos la consulta
            $resultado=$this->conexion->query($sql);
            
            $actividades=[];
            if($resultado->num_rows > 0){
                while($fila=$resultado->fetch_assoc()){
                    
                    $actividades[]=$fila;
                }
                //devolvemos el resultado
                return $actividades;
            }else{
                //mensaje de error
                $this->mensaje="No hay actividades";
            }

            //devolvemos el mensaje
            return $this->mensaje;
        }
    }
?>