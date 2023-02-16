<?php  //Modelos/adminM.php
    require_once "conexionBD.php";

    class AdminM extends ConexionBD{
        static public function IngresoM($datosC, $tablaBD){
            $cbd = ConexionBD::cBD();
            $usuario = $datosC['usuario'];
            $contraseña = $datosC['contraseña'];

            $query = "SELECT * FROM $tablaBD WHERE correo='$usuario'";
            
            $result = $cbd->query($query);
              

            return $result;
        }
        static public function IngresoplacaM($datosC, $tablaBD){
            $cbd = ConexionBD::cBD();
            $usuario = $datosC['placa'];
            

            $query = "SELECT * FROM $tablaBD WHERE Placa_vehiculo='$usuario'";
            
            $result = $cbd->query($query);
            
            return $result;
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
            $dni =  $datosC['dni'];
            $password = password_hash($dni, PASSWORD_DEFAULT);
            
            $query="INSERT INTO `usuario`(`id_usuario`, `correo`, `nombre`, `apellido`, `Dni`, `roll`, `fecharegistro`, `direccion`, `Departamento`) 
            VALUES ($dni,'$correo','$nombres','$apellidos','$password','Cliente','$fecha_nacimiento','$dirreccion','$departamento')";
            
            $result = $cbd->query($query);

            return $result;
            
            
        }

        static public function RegistroMecanicoM($datosC, $tablaBD){
            $cbd = ConexionBD::cBD();

            $nombres =   $datosC['nombres'];
            $apellidos =   $datosC['apellidos'];
            $fecha_nacimiento =   $datosC['fecha_nacimiento'];
            $dirreccion =   $datosC['dirreccion'];
            $correo =   $datosC['correo'];
            $Equipo =   $datosC['Equipo'];
            $Rango =   $datosC['Rango'];
            $dni =  $datosC['dni'];
            $password = password_hash($dni, PASSWORD_DEFAULT);
            
            
            $query="INSERT INTO `usuario`(`id_usuario`, `correo`, `nombre`, `apellido`, `Dni`, `roll`, `fecharegistro`, `direccion`, `rango`, `Equipo`) 
            VALUES ($dni,'$correo','$nombres','$apellidos','$password','Mecanico','$fecha_nacimiento','$dirreccion','$Rango','$Equipo')";
            
            $result = $cbd->query($query);
           
           return $result;
            
            
        }
        static public function RegistroFotoMecanicoM($datosC){
            $cbd = ConexionBD::cBD();

           
            $foto =  $datosC['foto'];
            $dni =  $datosC['dni'];
           
            
            
            $query="UPDATE `usuario` SET `foto`='$foto' WHERE id_usuario='$dni'";
            
            $result = $cbd->query($query);
           
           return $result;
            
            
        }

        static public function RegistroEmpresaM($datosC, $tablaBD){
            $cbd = ConexionBD::cBD();

            $nombres =   $datosC['nombres'];
           
            $fecha_nacimiento =   $datosC['fecha_nacimiento'];
            $dirreccion =   $datosC['dirreccion'];
            $departamento =   $datosC['departamento'];
            $correo =   $datosC['correo'];
            
            $dni =  $datosC['dni'];
            $password = password_hash($dni, PASSWORD_DEFAULT);
            
            $query="INSERT INTO `usuario`(`id_usuario`, `correo`, `nombre`, `apellido`, `Dni`, `roll`, `fecharegistro`, `direccion`, `Departamento`) 
            VALUES ($dni,'$correo','$nombres','','$password','Empresa','$fecha_nacimiento','$dirreccion','$departamento')";
            
            $result = $cbd->query($query);

            return $result;
            
            
        }
    }
?>