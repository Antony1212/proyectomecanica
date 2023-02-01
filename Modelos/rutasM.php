<?php //  Modelos/rutasM.php
class RutasM{
    public function procesaRutasM($ruta){
        if( $ruta == "ingreso" || 
        $ruta == 'empleados' || 
        $ruta == 'registrar' ||
        $ruta == 'asignacion' ||
        $ruta == 'Principal' ||
        $ruta == 'vehiculo' ||
        $ruta == 'registrarempresa' ||
        $ruta == 'registrarplaca' ||  
        $ruta == 'registrarmecanico' || 
        $ruta == 'ingresousuario' ||
        $ruta == 'salir' ||
        $ruta == 'editar')
        {
            $pagina = "Vistas/Modulos/".$ruta. ".php";
        }
        else if($ruta == 'index'){
            $pagina = "Vistas/Modulos/ingreso.php";
        }
        else {
            $pagina = "Vistas/Modulos/ingreso.php";
        }
        
        
        return $pagina;
    }

}
?>