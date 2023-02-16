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
                $ruta == 'Vehiculos' || 
                $ruta == 'registrar' ||
                $ruta == 'asignacion' ||
                $ruta == 'Principal' ||
                $ruta == 'vehiculo' ||
                $ruta == 'registrarempresa' ||
                $ruta == 'registrarplaca' ||  
                $ruta == 'registrarmecanico' || 
                $ruta == 'ingresousuario' ||
                $ruta == 'salir' ||
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