<?php  // Controladores/empleadosC.php
class EmpleadosC {
    function __construct(){
        $this->empleadosM = new EmpleadosM();
    }

    public function registrarEmpleadosC(){
        if(isset($_POST['dni'])){
            $datosC =array();
            $datosC['dni'] = $_POST['dni'];
            $datosC['placa'] = $_POST['placa'];
            $datosC['modelo'] = $_POST['modelo'];
            $datosC['Detalles'] = $_POST['Detalles'];
            $datosC['tipo'] = $_POST['tipo'];
             $datosC['foto'] = $_POST['foto'];

            $result = $this->empleadosM->registrarEmpleadosM($datosC);
         
            header('location: index.php?ruta=empleados');
        }
    }

    //mostrar empleados
    public function mostrarEmpleadosC(){
        $result = $this->empleadosM->mostrarEmpleadosM();
        return $result;
    }

    //editar empleados
    public function editarEmpleadoC(){
        if(isset($_GET['id'])){
            $datosC = array('id'=>$_GET['id']);
            $result = $this->empleadosM->editarEmpleadoM($datosC);
            return $result;
        }
    }

    //actualizar empleados
    public function actualizarEmpleadoC(){
        if(isset($_POST['nombreE'])){
            $datosC = array(    'id'=>$_POST['idE'],
                                'nombre'=>$_POST['nombreE'],
                                'apellido'=>$_POST['apellidoE'],
                                'email' => $_POST['emailE'],
                                'puesto' => $_POST['puestoE'],
                                'salario' => $_POST['salarioE'],
                            );

            $result = $this->empleadosM->actualizarEmpleadoM($datosC);
            header('location: index.php?rutas=empleados');
            return $result;
        }
    }

    //borrar empleado
    public function borrarEmpleadoC(){
        if(isset($_GET['id'])){
            $datosC = array('id' => $_GET['id']);
            $tablaBD = 'empleados';
            $this->empleadosM->borrarEmpleadoM($datosC, $tablaBD);
            header('location: index.php?rutas=empleados');
        }
    }
}
?>