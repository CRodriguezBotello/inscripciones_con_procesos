<?php
    require_once('modelo/mActividad.php');

    class CActividad{
        public $mensaje;

        

        //metodo para listar las actividad para listar a los alumnos
        public function listar_actividades(){
            $datos=[];
            if(!empty($_GET['id'])){
                //comprobamos que hemos añadido el id del usuario
                $this->id=$_GET['id'];

                //Llamada al modelo para listar las actividades
                $objActividad=new MActividad();
                $datos=$objActividad->listar_actividades();
            }
            return $datos;
        }

            //metodo para añadir las actividades a la base de datos
        public function insertar_actividad(){
            if(!empty($_POST['nombre'])){
                //comprobamos que hemos añadido el nombre de la actividad
                $nombre=$_POST['nombre'];

                if(isset($_POST['alumno'])){
                    // comprobamos que hemos añadido la cantidad de alumnos
                    $alumno=$_POST['alumno'];
                    if (isset($_POST["etapas"]) && !empty($_POST["etapas"])) {

                    $etapas = $_POST["etapas"];

                    //Llamada al modelo para añadir la actividad
                    $objAct = new MActividad();
                    $this->mensaje=$objAct->nueva_actividad($nombre, $alumno, $etapas);
                    }else{
                        //mensaje de error
                        $this->mensaje="No se han elegido etapas";
                    }
                }else{
                    //mensaje de error
                    $this->mensaje="Falta el maximo de alumnos";
                }
            }else{
                //mensaje de error
                $this->mensaje="Falta el nombre de la actividad";
            }
            //devolvemos el mensaje
            return $this->mensaje;
        }
    }
?>