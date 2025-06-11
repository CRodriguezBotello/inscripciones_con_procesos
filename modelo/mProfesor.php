<?php
    require_once('config/configdb.php');

    class MProfesor{
        public $mensaje;
        private $conexion;

        //metodo construct
        public function __construct(){

            $this->conexion= new mysqli(SERVIDOR,USUARIO,PASSWORD,BBDD);
            $this->conexion->set_charset('utf8');
        }

        //metodo para añadir al nuevo profesor
        public function nuevo_profesor($nombre,$correo,$pw){
           $sql="INSERT INTO usuarios (nombre, correo, pw, perfil) VALUES ('$nombre','$correo','$pw','P')";

           //ejecutamos la consulta
           $resultado=$this->conexion->query($sql);

           if($resultado){
                //mensaje de exito
                $this->mensaje="Nuevo profesor añadido";
            }else{
                //mensaje de error
                $this->mensaje="No se ha podido dar de alta al profesor";
            }

            //devuelve el mensaje
            return $this->mensaje;
        }

        //metodo para añadir al nuevo alumno
        public function nuevo_alumno($nombre,$clase){
           $sql="INSERT INTO alumnos (nombre, idClase) VALUES ('$nombre','$clase')";
            //ejecutamos la consulta
           $resultado=$this->conexion->query($sql);

           if($resultado){
                //si añade al alumnos, guarda este mensaje
                $this->mensaje="Nuevo alumno añadido";
            }else{
                //si no añade al alumnos, guarda este mensaje
                $this->mensaje="No se ha podido dar de alta al alumno";
            }
            //devuelve el mensaje
            return $this->mensaje;
        }

        //metodo para listar los profesores
        public function listar_profesores(){
            $sql="SELECT * FROM usuarios WHERE perfil='P'";
            //ejecutamos la consulta
            $resultado=$this->conexion->query($sql);

            if($resultado->num_rows > 0){
                //devuelve el resultado si hay profesores
                return $resultado;
            }else{
                //mensaje de error
                $this->mensaje="No hay profesores";
                //devuelve el mensaje
                return $this->mensaje;
            }
        }

            //metodo para buscar al tutor
        public function buscar_tutor($id){
            $sql="SELECT * FROM usuarios INNER JOIN clases ON usuarios.idUsuario= clases.idTutor WHERE perfil='P' AND idUsuario = $id;";
            //ejecutamos la consulta
            $resultado=$this->conexion->query($sql);

            if($resultado->num_rows > 0){
                //si el profesor es tutor, devuelve los datos
                $tutor=$resultado->fetch_assoc();
                return $tutor;
            }else{
                //mensaje de error
                $this->mensaje="Este profesor no es tutor";
                //devuelve el mensaje
                return $this->mensaje;
            }
        }

        //metodo para buscar un profesor en la base de datos
        public function buscar_profesor($idprofesor){
            $sql="SELECT * FROM usuarios WHERE idUsuario=$idprofesor";

            //ejecutamos la consulta
            $resultado=$this->conexion->query($sql);

            if($resultado){
                //si se encuentra al profesor, devuelve los datos
                $profesor=$resultado->fetch_assoc();
                return $profesor;
            }else{
                //mensaje de error
                $this->mensaje="No existe este profesor";
                return $this->mensaje;
            }
        }

        //metodo para eliminar al profesor
        public function eliminar_profesor($idprofesor){
            $sql= "DELETE FROM usuarios WHERE idUsuario = $idprofesor";
            //ejecutamos la consulta
            $resultado=$this->conexion->query($sql);

            if ($resultado) {
                //mensaje de exito
                $this->mensaje= "Profesor eliminado correctamente";
            }else{
                //mensaje de error
                $this->mensaje= "El profesor no ha podido ser borrado";
            }

            //devuelve el mensaje
            return $this->mensaje;
        }

        //metodo para modificar los profesores
        public function modificar_profesor($idprofesor, $nombre, $correo){
            $sql= "UPDATE usuarios 
                    SET nombre = '$nombre', 
                    correo = '$correo' 
                    WHERE idUsuario = $idprofesor";

            //ejecutamos la consulta
            $resultado=$this->conexion->query($sql);

            if ($resultado) {
                //mensaje de exito
                $this->mensaje= "Profesor actualizado correctamente";
            }else{
                //mensaje de error
                $this->mensaje= "El profesor no ha podido ser actualizado";
            }

            //devuelve el mensaje
            return $this->mensaje;
        }

        public function listar_alumnos_actividades($idProfesor, $idActividad){
            $sql = "SELECT actividades.idActividad, actividades.nombre AS nombre_actividad, actividades.max_al_clases, alumnos.nombre AS nombre_alumno, alumnos.idAlumno 
                    FROM actividades
                    INNER JOIN actividades_etapas ON actividades.idActividad = actividades_etapas.idActividad
                    INNER JOIN clases ON actividades_etapas.idEtapa = clases.idEtapa
                    INNER JOIN alumnos ON clases.idClase = alumnos.idClase
                    WHERE actividades.idActividad = $idActividad
                    AND clases.idTutor = $idProfesor";
        
            $resultado = $this->conexion->query($sql);
        
            // Creamos un array vacio para guardar el $resultado
            $datos = [];
        
            if ($resultado->num_rows > 0) {
                // Recorre cada fila del resultado y la mete en el array, habra tantas filas como alumnos haya en esa clase
                while ($fila = $resultado->fetch_assoc()) {
                    $datos[] = $fila;
                }
                // Devuelve el array
                return $datos;
            } else {
                //mensaje de error;
                $this->mensaje= "No se pudo obtener la clase";
                return $this->mensaje;
            }
        }

        //metodo para inscribir lo alumnos con las actividades
        public function inscripcion_alumnos($idActividad,$alumno){
            $sql="INSERT INTO inscripciones (idAlumno, idActividad) VALUES ($alumno,$idActividad)";

            //ejecutamos la consulta
            $resultado=$this->conexion->query($sql);

            if($resultado){
                //mensaje de exito
                $this->mensaje="Alumnos inscritos correctamente";
            }else{
                //mensaje de error
                $this->mensaje="Fallo al inscribir";
            }

            //devolvemos el mensaje
            return $this->mensaje;
        }

    }
?>