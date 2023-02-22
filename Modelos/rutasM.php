<?php //  Modelos/rutasM.php
class RutasM{
    public function procesaRutasM($ruta){
        if(!isset($_SESSION['Ingreso'])) {
            if( $ruta == "ingreso" || 
                $ruta == 'ingresousuario'){
                    $pagina = "Vistas/Modulos/".$ruta. ".php";
                } else if($ruta == 'index'){
                    $pagina = "Vistas/Modulos/ingreso.php";
                }
                else {
                    $pagina = "Vistas/Modulos/ingreso.php";
                }
            
        }else{
            if( $ruta == "ingreso" || 
                $ruta == 'empleados' ||
                $ruta == 'reportevehiculos' ||
                $ruta == 'DetallesVehiculo' ||
                $ruta == 'vehiculo1' ||
                $ruta == 'Reparacionesiniciadas' ||
                $ruta == 'Preparaciones' ||
                $ruta == 'prueba3' ||
                $ruta == 'Confirmar' ||
                $ruta == 'prueba' ||   
                $ruta == 'Vehiculos' || 
                $ruta == 'registrar' ||
                $ruta == 'asignacion' ||
                $ruta == 'Principal' ||
                $ruta == 'vehiculo' ||
                $ruta == 'Vehiculopresupuesto' ||
                $ruta == 'Presupuesto' ||
                $ruta == 'vehiculoasignadoequipo' ||
                $ruta == 'registrarempresa' ||
                $ruta == 'registrarplaca' ||  
                $ruta == 'registrarmecanico' || 
                $ruta == 'ingresousuario' ||
                $ruta == 'salir' ||
                $ruta == 'Vistacotizacion' ||
                $ruta == 'asignacionvehiculo' ||
                $ruta == 'asignacionlisto' ||
                $ruta == 'editar')
        {
            $pagina = "Vistas/Modulos/".$ruta. ".php";
        } else if($ruta == 'index'){
            $pagina = "Vistas/Modulos/ingreso.php";
        }
        else {
            $pagina = "Vistas/Modulos/ingreso.php";
        }
        }


        
        
       
        
        
        return $pagina;
    }

}
?>