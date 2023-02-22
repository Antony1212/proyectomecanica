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
        $mes_actual = date('Y-m');
        $query = "SELECT COUNT(*) as total_reparaciones FROM reparaciones WHERE ingreso LIKE '$mes_actual%'";
        $result = $cbd->query($query);
        return $result;
    }
    public function mostrarEmpleados1M($tablaBD = 'empleados'){
        $cbd = ConexionBD::cBD();
        $mes_actual = date('Y-m');
        $query = "SELECT * as total_reparaciones FROM reparaciones WHERE ingreso LIKE '$mes_actual%'";
        $result = $cbd->query($query);
        return $result;
    }

    public function VerCotisacionM(){
        $cbd = ConexionBD::cBD();

      $query = "SELECT * FROM vehiculo as v, reparaciones as r WHERE v.Placa_vehiculo=r.id_vehiculo AND r.estado ='Cotizacion Pendiente de envio'  ORDER BY r.ingreso";

        $result = $cbd->query($query);
        return $result;
    }

    public function mostrarProductosM($tablaBD = 'empleados'){
        $cbd = ConexionBD::cBD();
        $query = "SELECT *
                FROM productos";
        $result = $cbd->query($query);
        return $result;
    }

    public function ActualizarCotisacionM($tablaBD = 'empleados'){
        $cbd = ConexionBD::cBD();
        $dni=$_SESSION['id_u'];
        $query = "SELECT * FROM `usuario` as u, `reparaciones` as r,`vehiculo` as v,`cotizacion` as c WHERE u.id_usuario=$dni AND u.id_usuario=v.dni AND v.Placa_vehiculo=r.id_vehiculo AND r.estado='Pendiente de Confirmacion' and r.id_reparacion=c.id_reparacion;";
        
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

    public function mostrarVehiculosClienteM($tablaBD = 'grupomecanico'){

        $cbd = ConexionBD::cBD();
        $usuario=$_SESSION['id_u'];
        
        $query = "SELECT * FROM `usuario` as u ,vehiculo as v,reparaciones as r Where u.id_usuario=$usuario AND u.id_usuario=v.dni AND v.Placa_vehiculo=r.id_vehiculo";
        
        $result = $cbd->query($query);
        return $result;
    }

    public function mostrarDetallesVehiculosClienteM($datosC,$tablaBD = 'grupomecanico'){

        $cbd = ConexionBD::cBD();
        extract($datosC);
        
        $query = "SELECT * FROM `dettallereparacion` WHERE id_reparacion=$Reparacion ORDER BY Fecha asc";
        
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

    public function mostrarVehiculosasignadosM($tablaBD = 'empleados'){
        $cbd = ConexionBD::cBD();
        $equipopertenece=$_SESSION['Equipo'];
        $query = "SELECT * FROM vehiculo as v, reparaciones as r WHERE v.Placa_vehiculo=r.id_vehiculo AND r.estado ='Asignado' and Equipo='$equipopertenece' ORDER BY r.ingreso";
        
        $result = $cbd->query($query);
        return $result;
    }

     public function mostrarVehiculosestimacionM($tablaBD = 'empleados'){
        $cbd = ConexionBD::cBD();
        $equipopertenece=$_SESSION['Equipo'];
        $query = "SELECT * FROM vehiculo as v, reparaciones as r WHERE v.Placa_vehiculo=r.id_vehiculo AND r.estado ='Estimación del presupuesto' and Equipo='$equipopertenece' ORDER BY r.ingreso";
        
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

    public function ReparacionesM($tablaBD = 'empleados'){
        $cbd = ConexionBD::cBD();
        $equipopertenece=$_SESSION['Equipo'];
        $query = "SELECT * FROM vehiculo as v, reparaciones as r WHERE v.Placa_vehiculo=r.id_vehiculo AND r.estado ='Cotizacion Aprobada' and Equipo='$equipopertenece' ORDER BY r.ingreso";
        
        $result = $cbd->query($query);
        return $result;
    }

    public function VerReparacionesM($tablaBD = 'empleados'){
        $cbd = ConexionBD::cBD();
        $equipopertenece=$_SESSION['Equipo'];
        $query = "SELECT * FROM vehiculo as v, reparaciones as r WHERE v.Placa_vehiculo=r.id_vehiculo AND r.estado ='En Reparacion' and Equipo='$equipopertenece' ORDER BY r.ingreso";
        
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

    public function AutorizarCotizacionM($datosC, $tablaBD = 'empleados'){
        $cbd = ConexionBD::cBD();
        date_default_timezone_set("America/Lima");
        
		$fechaactual= date('Y-m-d H:i:s');
        extract($datosC);

        $query = "INSERT INTO `dettallereparacion`(`id_detalle`, `id_reparacion`, `descripcion`, `imagen`, `Titulo`, `precio`, `ID_PROD_PRODUCTO`, `Fecha`) 
        VALUES (null,'$aceptado','El Cliente Dio Conformidad Para La Reparacion Y el Costo estimado de la reparacion'
        ,'','Aceptacion De Cotizacion','','','$fechaactual')";
        
        $resultado = $cbd->query($query);


        return $resultado;    
    }

    public function AutorizarCotizacion1M($datosC, $tablaBD = 'empleados'){
        $cbd = ConexionBD::cBD();
        date_default_timezone_set("America/Lima");
        
		$fechaactual= date('Y-m-d H:i:s');
        extract($datosC);

      

        
        $query = "UPDATE `cotizacion` SET `Estado`='Aprobado' WHERE id_Cotizacion=$Cotizacion And id_reparacion=$aceptado";
       
        $resultado = $cbd->query($query);


        return $resultado;    
    }

    public function FinReparacionM($datosC, $tablaBD = 'empleados'){
        $cbd = ConexionBD::cBD();
        date_default_timezone_set("America/Lima");
        
		$fechaactual= date('Y-m-d H:i:s');
        extract($datosC);

      

        
        $query = "UPDATE `reparaciones` SET `Estado`='Reparacion Finalizada', `salida`='$fechaactual' WHERE id_reparacion=$Fin";
       
        $resultado = $cbd->query($query);

        $query = "INSERT INTO `dettallereparacion`(`id_detalle`, `id_reparacion`, `descripcion`, `imagen`, `Titulo`, `precio`, `ID_PROD_PRODUCTO`, `Fecha`) 
        VALUES (null,'$Fin','La Reparacion Fue Culminada'
        ,'','Reparacion Finalizada','','','$fechaactual')";
       
        $resultado = $cbd->query($query);


        return $resultado;    
    }

    public function AutorizarCotizacion2M($datosC, $tablaBD = 'empleados'){
        $cbd = ConexionBD::cBD();
        date_default_timezone_set("America/Lima");
        
		$fechaactual= date('Y-m-d H:i:s');
        extract($datosC);


        $query = "UPDATE `reparaciones` SET `estado`='Cotizacion Aprobada'  WHERE `id_reparacion`=$aceptado";
        
        $resultado = $cbd->query($query);

        return $resultado;    
    }

    public function puM($datosC, $tablaBD = 'empleados'){
        $cbd = ConexionBD::cBD();
        extract($datosC);

        date_default_timezone_set("America/Lima");
        
		$fechaactual= date('Y-m-d H:i:s');
        $query = "UPDATE `reparaciones` SET `estado`='En Reparacion'  WHERE `id_reparacion`=$aceptacion";
        
        $resultado = $cbd->query($query);

        $query = "INSERT INTO `dettallereparacion`(`id_detalle`, `id_reparacion`, `descripcion`, `imagen`, `Titulo`, `precio`, `ID_PROD_PRODUCTO`, `Fecha`) 
        VALUES (null,'$aceptacion','Se Inicio Con La Reparacion Del Vehiculo','','Inicio De Las Reparaciones','','','$fechaactual')";
        
        $resultado = $cbd->query($query);
        
        return $resultado;    
    }

    public function actualizarreparacionM($datosC, $tablaBD = 'dettallereparacion'){
        $cbd = ConexionBD::cBD();

        date_default_timezone_set("America/Lima");
        
		$fechaactual= date('Y-m-d H:i:s');

        extract($datosC);


        $query = "INSERT INTO $tablaBD (`id_detalle`, `id_reparacion`, `descripcion`, `imagen`, `Titulo`, `precio`, `ID_PROD_PRODUCTO`,`Fecha` ) 
        
        VALUES (null,'$dato_secreto','$descripcion','','$nombre','','$producto','$fechaactual')";
       
        $resultado = $cbd->query($query);
        $query = " UPDATE `reparaciones` SET `estado`='Estimación del presupuesto' WHERE id_reparacion=$dato_secreto";
        
      
        $resultado = $cbd->query($query);
        return $resultado;    
    }

    public function AsignarGrupoM($datosC, $tablaBD = 'reparaciones'){
        $cbd = ConexionBD::cBD();

        date_default_timezone_set("America/Lima");
        
		$fechaactual= date('Y-m-d H:i:s');

        extract($datosC);
        $query = " UPDATE `reparaciones` SET `estado`='Asignado', `Equipo`='$equipo' WHERE id_reparacion=$reparacion";
      
        $resultado = $cbd->query($query);

        $query = "INSERT INTO `dettallereparacion`(`id_detalle`, `id_reparacion`, `descripcion`, `imagen`, `Titulo`, `precio`, `ID_PROD_PRODUCTO`, `Fecha`) 
        VALUES (null,'$reparacion','El vehiculo se asigno a el Equipo de mecanicos N°$equipo','','Asignacion de equipo','','','$fechaactual')";
      
        $resultado = $cbd->query($query);
        return $resultado;    
    }

    public function CrearCotizacionM($datosC){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        
        $query = "INSERT INTO `detalle_cotizacion`(`id_colmna_cotizacion`, `cotizacion`, `producto`, `cantidad`, `precio`, `Estado`) 
                    VALUES (null,$id_Cotizacion,'$producto',$cantidad,$precio,'Pendiente De Envio')";
      
        $resultado = $cbd->query($query);   
        
        return $resultado;    
       

        
    }

    public function CrearCotiazarM($datosC){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        
        $query = "INSERT INTO `cotizacion`(`id_Cotizacion`, `id_reparacion`, `Fecha`) VALUES (null,'$cotizar','$fechar')";
      
        $resultado = $cbd->query($query);   
        
        return $resultado;    
       

        
    }

    public function generarCotiazarM($datosC){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $query = "SELECT * FROM `cotizacion` ,reparaciones where cotizacion.id_reparacion='$cotizar'and `Fecha`='$fechar' AND cotizacion.id_reparacion=reparaciones.id_reparacion";
        $resultado = $cbd->query($query);
        return $resultado; 
    }

    public function TerminarcotizacionM($datosC){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        
    
        date_default_timezone_set("America/Lima");
        
		$fechaactual= date('Y-m-d H:i:s');

        $query = " UPDATE `reparaciones` SET `estado`='Cotizacion Pendiente de envio' WHERE id_reparacion=$reparacion";

        
        $resultado = $cbd->query($query);   

        $query = "INSERT INTO `dettallereparacion`(`id_detalle`, `id_reparacion`, `descripcion`, `imagen`, `Titulo`, `precio`, `ID_PROD_PRODUCTO`, `Fecha`) 
        VALUES (null,'$reparacion','El Equipo Asignado A Su Vehiculo Estimo Un Presupuesto Mostrando El Costo Total De La Reparacion','','Estimacion De Presupuesto','','','$fechaactual')";
        $resultado = $cbd->query($query);  
        return $resultado;    
       

        
    }

    public function borrarEmpleadoM($datosC, $tablaBD = 'empleados'){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $query = "DELETE FROM $tablaBD WHERE id='$id'";
        $resultado = $cbd->query($query);
    }
    public function pruebaM($datosC){
        $cbd = ConexionBD::cBD();
        extract($datosC);
    
        $query = "SELECT * FROM `reparaciones` as `r`,`detalle_cotizacion` as dc,cotizacion AS c  where r.id_reparacion=$Cotias AND c.id_reparacion=r.id_reparacion AND dc.cotizacion=c.id_Cotizacion";
        
        
        $resultado = $cbd->query($query);
        return $resultado; 
    }
    public function prueba1M($datosC){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $query = "SELECT * FROM `reparaciones` as `r`, `vehiculo` as `v`,`cotizacion` as `c`,`usuario` as `u` 
        where r.id_reparacion=$Cotias AND r.id_vehiculo=v.Placa_vehiculo AND v.dni=u.id_usuario AND c.id_reparacion= $Cotias";
                    
        
         $resultado = $cbd->query($query);
        return $resultado;  
    }
    
    public function prueba2M($datosC){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        
    
        

        $query = " UPDATE `reparaciones` SET `estado`='Pendiente de Confirmacion' WHERE id_reparacion=$Cotias";
        
        $resultado = $cbd->query($query);   
        return $resultado;    
       

        
    }

    public function prueba3M($datosC){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        
    
        

        $query = " UPDATE `reparaciones` SET `estado`='Cotizacion Pendiente de envio' WHERE id_reparacion=$Cotias";
        
        $resultado = $cbd->query($query);   
        return $resultado;    
       

        
    }
} 
?>