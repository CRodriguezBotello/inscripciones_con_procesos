<?php
    require_once('config/configdb.php');

    class MProfesor{
        public $mensaje;
        private $conexion;

        public function __construct(){

            $this->conexion= new mysqli(SERVIDOR,USUARIO,PASSWORD,BBDD);
            $this->conexion->set_charset('utf8');
        }

        public function nuevo_profesor($nombre,$correo,$pw){
           $sql="INSERT INTO usuarios (nombre, correo, pw, perfil) VALUES ('$nombre','$correo','$pw','P')";

           $resultado=$this->conexion->query($sql);

           if($resultado){
                $this->mensaje="Nuevo profesor añadido";
            }else{
                $this->mensaje="No se ha podido dar de alta al profesor";
            }

            return $this->mensaje;
        }

        public function nuevo_alumno($nombre,$clase){
           $sql="INSERT INTO alumnos (nombre, idClase) VALUES ('$nombre','$clase')";

           $resultado=$this->conexion->query($sql);

           if($resultado){
                $this->mensaje="Nuevo alumno añadido";
            }else{
                $this->mensaje="No se ha podido dar de alta al alumno";
            }

            return $this->mensaje;
        }

        public function listar_profesores(){
            $sql="SELECT * FROM usuarios WHERE perfil='P'";

            $resultado=$this->conexion->query($sql);

            if($resultado->num_rows > 0){
                return $resultado;
            }else{
                $this->mensaje="No hay profesores";
                return $this->mensaje;
            }
        }

        public function buscar_tutor($id){
            $sql="SELECT * FROM usuarios INNER JOIN clases ON usuarios.idUsuario= clases.idTutor WHERE perfil='P' AND idUsuario = $id;";

            $resultado=$this->conexion->query($sql);

            if($resultado->num_rows > 0){
                $tutor=$resultado->fetch_assoc();
                return $tutor;
            }else{
                $this->mensaje="Este profesor no es tutor";
                return $this->mensaje;
            }
        }

        public function buscar_profesor($idprofesor){
            $sql="SELECT * FROM usuarios WHERE idUsuario=$idprofesor";

            $resultado=$this->conexion->query($sql);

            if($resultado){
                $profesor=$resultado->fetch_assoc();
                return $profesor;
            }else{
                $this->mensaje="No existe este profesor";
                return $this->mensaje;
            }
        }

        public function eliminar_profesor($idprofesor){
            $sql= "DELETE FROM usuarios WHERE idUsuario = $idprofesor";
            $resultado=$this->conexion->query($sql);

            if ($resultado) {
                $this->mensaje= "Profesor eliminado correctamente";
            }else{
                $this->mensaje= "El profesor no ha podido ser borrado";
            }

            return $this->mensaje;
        }

        public function modificar_profesor($idprofesor, $nombre, $correo){
            $sql= "UPDATE usuarios 
                    SET nombre = '$nombre', 
                    correo = '$correo' 
                    WHERE idUsuario = $idprofesor";
            $resultado=$this->conexion->query($sql);

            if ($resultado) {
                $this->mensaje= "Profesor actualizado correctamente";
            }else{
                $this->mensaje= "El profesor no ha podido ser actualizado";
            }

            return $this->mensaje;
        }

    }
?>