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
    }
?>