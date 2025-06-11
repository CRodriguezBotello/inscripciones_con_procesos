<?php
    require_once('modelo/mEtapas.php');

    class CEtapas{
        public $mensaje;

        
        public function listar_etapas(){
            $objEtapas= new MEtapas();
            $datos=$objEtapas->listar_etapas();
            return $datos;
        }
    }
?>