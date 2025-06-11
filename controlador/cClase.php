<?php
    require_once('modelo/mClase.php');

    class CClase{
        public $mensaje;

        

        public function insertar_clase(){
            if(!empty($_POST['codigo'])){
                $codigo=$_POST['codigo'];

                if(isset($_POST['tutor'])){
                    $tutor=$_POST['tutor'];

                    if(isset($_POST['etapa'])){
                        $etapa=$_POST['etapa'];

                        $objClase= new MAdmin();
                        $this->mensaje=$objClase->nueva_clase($codigo,$tutor,$etapa);
                    }else{
                        $this->mensaje="Falta la etapa de la clase";
                    }
                }else{
                    $this->mensaje="Falta el tutor de la clase";
                }
            }else{
                $this->mensaje="Falta el codigo de la clase";
            }

            return $this->mensaje;
        }
    }
?>