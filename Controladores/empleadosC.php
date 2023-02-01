<?php  // Controladores/empleadosC.php
class EmpleadosC {
    function __construct(){
        $this->empleadosM = new EmpleadosM();
    }

    public function registrarEmpleadosC(){
        if(isset($_POST['placa'])){
            $datosC =array();
            $datosC['dni'] = $_POST['dni'];
            $datosC['placa'] = $_POST['placa'];
            $datosC['modelo'] = $_POST['modelo'];
            $datosC['Detalles'] = $_POST['Detalles'];
            $datosC['tipo'] = $_POST['tipo'];

            
            $result = $this->empleadosM->consultarEmpleadosM($datosC);
            
            if ($result->num_rows) {
                
                ?>
                <script>
                    $.confirm({
                        theme:'Material',
                        title: 'Error',
                        content: "La Placa Esta Registrada Consulte Los Vehiculos",
                        type: 'red',
                        typeAnimated: true,
                        columnClass: 'medium',
                        buttons: {
                            tryAgain: {
                                text: 'Ingresar Nuevamente',
                                btnClass: 'btn-red',
                                action: function(){
                                    location.href="index.php?ruta=registrarplaca";
                                }
                            },
                            tryAgain1: {
                                text: 'Consultar Vehiculo',
                                
                                action: function(){
                                    location.href="index.php?ruta=Consultavehiculo";
                                }
                            },
                            
            
                        }
                        });
                </script>
            <?php

            }else{


                $placa=$_POST['placa'];
                $ruta="Vistas/css/imagenes";


            
                if ($_FILES)
                {
                    $name = $_FILES['foto']['name'];
                    switch ($_FILES['foto']['type'])
                    {
                        case 'image/jpeg':  $ext = 'jpg'; break;
                        case 'image/jpeg':  $ext = 'jpg'; break;
                        case 'image/gif':   $ext = 'jpg'; break;
                        case 'image/png':   $ext = 'png'; break;
                        case 'image/tiff':  $ext = 'tif'; break;
                        default:            $ext = ''; break;
                    }
                    
                    if ($ext)
                    {   
                        
                            $vista="$placa.$ext";
                            
                            move_uploaded_file($_FILES['foto']['tmp_name'], $vista);
                            
            
                            if(file_exists($ruta) || @mkdir($ruta)){
                                
                                
                                    if (!rename("$vista", "$ruta/$vista")){
                                        echo "llego";
                                        $datosC['foto'] = "Error";
                                        $result = $this->empleadosM->registrarEmpleadosM($datosC);  

                                    

                                    }else{
                                        echo "llego";
                                        $datosC['foto'] = $vista;
                                        $result = $this->empleadosM->registrarEmpleadosM($datosC);  
                                        echo "$result";
                                    }
                                    
                            }
                            else{
                                
                                $datosC['foto'] = "ErrorCarpeta";
                                $result = $this->empleadosM->registrarEmpleadosM($datosC); 
            
                            }
    
                    }
                    else {
                        $datosC['foto'] = "Noimagen";
                        $result = $this->empleadosM->registrarEmpleadosM($datosC);
                    }        
                }
                else{
                    $datosC['foto'] = "Noimagen";
                    $result = $this->empleadosM->registrarEmpleadosM($datosC);
                }

            }

            

            

            
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