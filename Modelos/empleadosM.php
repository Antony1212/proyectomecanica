<?php  //Modelos/empleadosM.php
require_once "conexionBD.php";

class EmpleadosM extends ConexionBD{
 
    public function registrarEmpleadosM($datosC, $tablaBD = 'vehiculo'){
        $cbd = ConexionBD::cBD();
        $dni = $datosC['dni'];
        $placa = $datosC['placa'];
        $modelo = $datosC['modelo'];
        $Detalles = $datosC['Detalles'];
        $tipo = $datosC['tipo'];
        $foto = $datosC['foto'];

        $query = "INSERT INTO $tablaBD VALUES 
            (Null,'$dni', '$placa', '$modelo', '$Detalles', '$tipo', '$foto')";

        $result = $cbd->query($query);
    
        return $result;
    }

    public function consultarEmpleadosM($datosC, $tablaBD = 'vehiculo'){
        $cbd = ConexionBD::cBD();
        $placa = $datosC['placa'];

        $query = "SELECT * FROM $tablaBD WHERE Placa_vehiculo=$placa";
        $res= $cbd->query($query);
        echo "$query";
        return $res;
    }

    public function mostrarEmpleadosM($tablaBD = 'empleados'){
        $cbd = ConexionBD::cBD();
        $query = "SELECT id, nombre, email, apellido, puesto, salario 
                FROM $tablaBD";
        $result = $cbd->query($query);
        return $result;
    }

    public function editarEmpleadoM($datosC, $tablaBD = 'empleados'){
        $cbd = ConexionBD::cBD();
        $id = $datosC['id'];
        $query = "SELECT id, nombre, email, apellido, puesto, salario
                FROM $tablaBD WHERE id='$id'";
        $result = $cbd->query($query);
        $rows = $result->fetch_array(MYSQLI_ASSOC);
        return $rows;
    }

    public function actualizarEmpleadoM($datosC, $tablaBD = 'empleados'){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $query = "UPDATE $tablaBD
            SET id='$id', 
            nombre='$nombre', 
            apellido='$apellido', 
            email='$email', 
            puesto='$puesto', 
            salario='$salario'
            WHERE id='$id'";
        echo $query;
        $resultado = $cbd->query($query);
        return $resultado;    
    }

    public function borrarEmpleadoM($datosC, $tablaBD = 'empleados'){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $query = "DELETE FROM $tablaBD WHERE id='$id'";
        $resultado = $cbd->query($query);
    }
} 
?>