<?php
    require_once('modelo/mEtapas.php');

    class CEtapas{
        public $mensaje;

        //metodo para listar las etapas de la base de datos
        public function listar_etapas(){
            //Llamada al metodo del modelo para listar las etapas
            $objEtapas= new MEtapas();
            $datos=$objEtapas->listar_etapas();
            return $datos;
        }

        //metodo para añadir las clases a la base de datos
        public function insertar_etapa(){
            if(!empty($_POST['nombre'])){
                //comprobamos que hemos añadido el codigo de la clase
                $nombre=$_POST['nombre'];

                //Llamada al modelo para añadir la clase
                $objEtapas= new MEtapas();
                $this->mensaje=$objEtapas->insertar_etapa($nombre);
            }else{
                //mensaje de error
                $this->mensaje="Falta el nombre de la etapa";
            }
            //devolvemos el mensaje
            return $this->mensaje;
        }
    }
?>