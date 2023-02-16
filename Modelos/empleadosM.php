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

    public function registrarReparacionM($datosC, $tablaBD = 'reparaciones'){
        $cbd = ConexionBD::cBD();
        $Detalles = $datosC['Detalles'];
        $placa = $datosC['placa'];
        date_default_timezone_set("America/Lima");
		$fechaactual= date('Y-m-d H:i:s');

        $query = "INSERT INTO $tablaBD (`id_reparacion`, `id_vehiculo`, `estado`, `ingreso`,`des` ) VALUES 
            (Null,'$placa','Sin Asignacion', '$fechaactual', '$Detalles')";

        $result = $cbd->query($query);
    
        return $result;
    }

    public function consultarEmpleadosM($datosC, $tablaBD = 'vehiculo'){
        $cbd = ConexionBD::cBD();
        $placa = $datosC['placa'];

        $query = "SELECT * FROM $tablaBD WHERE Placa_vehiculo='$placa'";
        $res= $cbd->query($query);
        
        return $res;
    }

    public function mostrarEmpleadosM($tablaBD = 'empleados'){
        $cbd = ConexionBD::cBD();
        $query = "SELECT id, nombre, email, apellido, puesto, salario 
                FROM $tablaBD";
        $result = $cbd->query($query);
        return $result;
    }

    public function mostrarEquiposM($tablaBD = 'grupomecanico'){
        $cbd = ConexionBD::cBD();
        $query = "SELECT * 
                FROM $tablaBD";
        $result = $cbd->query($query);
        return $result;
    }

    public function mostrarRoll1M($tablaBD = 'grupomecanico'){
        $cbd = ConexionBD::cBD();
        $Equi=$_SESSION['Equipo'];
        $query = "SELECT * 
                FROM $tablaBD Where id_grupo=$Equi";
        $result = $cbd->query($query);
        return $result;
    }

    public function mostrarVehiculos1M($tablaBD = 'empleados'){
        $cbd = ConexionBD::cBD();
        $query = "SELECT * FROM vehiculo as v, reparaciones as r WHERE v.Placa_vehiculo=r.id_vehiculo AND r.estado ='Sin Asignacion' ORDER BY r.ingreso";
        
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

    public function detallevehiculoM($datosC){
        $cbd = ConexionBD::cBD();
        $id = $datosC['reparacion'];
        
        $query = "SELECT * FROM reparaciones as r,vehiculo as v,usuario as u WHERE id_reparacion=$id AND r.id_vehiculo=v.Placa_vehiculo AND v.dni=u.id_usuario";
        
        $result = $cbd->query($query);

        
        return $result;
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

    public function AsignarGrupoM($datosC, $tablaBD = 'reparaciones'){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $query = " UPDATE `reparaciones` SET `estado`='Asignado', `Equipo`='$equipo' WHERE id_reparacion=$reparacion";
      
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