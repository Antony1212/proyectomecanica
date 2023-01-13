<?php  //Modelos/adminM.php
    require_once "conexionBD.php";

    class AdminM extends ConexionBD{
        public function IngresoM($datosC, $tablaBD = 'administradores'){
            $cbd = ConexionBD::cBD();
            $usuario = $datosC['usuario'];
            $clave = $datosC['clave'];
            $query = "SELECT usuario, clave FROM $tablaBD 
                WHERE usuario='$usuario' AND clave='$clave'";
            $result = $cbd->query($query);
            return $result->fetch_array(MYSQLI_ASSOC);
        }
        static public function RegistroM($datosC, $tablaBD){
            $cbd = ConexionBD::cBD();

            $nombres =   $datosC['nombres'];
            $apellidos =   $datosC['apellidos'];
            $fecha_nacimiento =   $datosC['fecha_nacimiento'];
            $dirreccion =   $datosC['dirreccion'];
            $departamento =   $datosC['departamento'];
            $correo =   $datosC['correo'];
            $apellidos =   $datosC['apellidos'];
            $apellidos =   $datosC['apellidos'];
            $apellidos =   $datosC['apellidos'];
            $apellidos =   $datosC['apellidos'];
            $dni =  $datosC['dni'];
            $password = password_hash($dni, PASSWORD_DEFAULT);
            
            $query="INSERT INTO `usuario`(`id_usuario`, `correo`, `nombre`, `apellido`, `Dni`, `roll`, `fecharegistro`, `direccion`, `Departamento`) 
            VALUES ($dni,'$correo','$nombres','$apellidos','$password','Cliente','$fecha_nacimiento','$dirreccion','$departamento')";
            
            $result = $cbd->query($query);

            return $result;
            
            
        }
    }
?>