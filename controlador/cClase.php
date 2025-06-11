<?php
    require_once('modelo/mClase.php');

    class CClase{
        public $mensaje;

        

            //metodo para añadir las clases a la base de datos
        public function insertar_clase(){
            if(!empty($_POST['codigo'])){
                //comprobamos que hemos añadido el codigo de la clase
                $codigo=$_POST['codigo'];

                if(isset($_POST['tutor'])){
                    // comprobamos que hemos añadido el tutor de la clase
                    $tutor=$_POST['tutor'];

                    if(isset($_POST['etapa'])){
                        //comprobamos que hemos añadido la etapa de la clase
                        $etapa=$_POST['etapa'];

                        //Llamada al modelo para añadir la clase
                        $objClase= new MClase();
                        $this->mensaje=$objClase->nueva_clase($codigo,$tutor,$etapa);
                    }else{
                        //mensaje de error
                        $this->mensaje="Falta la etapa de la clase";
                    }
                }else{
                    //mensaje de error
                    $this->mensaje="Falta el tutor de la clase";
                }
            }else{
                //mensaje de error
                $this->mensaje="Falta el codigo de la clase";
            }
            //devolvemos el mensaje
            return $this->mensaje;
        }
    }
?>