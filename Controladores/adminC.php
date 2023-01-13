<?php  //Controladores/adminC.php
class AdminC{
    function __construct(){
        $this->adminM = new AdminM();
    }

    public function IngresoC(){
        if(isset($_SESSION['Ingreso']))
            header("location: index.php?ruta=empleados");
        if(isset($_POST["usuarioI"])){
            $datosC = array(    
                        "usuario"=>$_POST["usuarioI"], 
                        "clave"=>$_POST["claveI"]);
            $result = $this->adminM->IngresoM($datosC);
            if(isset($result)){
                session_start();
                $_SESSION['Ingreso']=true;
                header("location: index.php?ruta=empleados");
            }
            else
                echo "ERROR AL INGRESAR";
        }
    }
    public function RegistroC(){

        if(isset($_POST["correo"])){
            
            $a=$_POST["dni"];
                    $datosC = array(    
                                "nombres"=>$_POST["nombres"],
                                "apellidos"=>$_POST["apellidos"], 
                                "fecha_nacimiento"=>$_POST["fecha_nacimiento"], 
                                "dirreccion"=>$_POST["dirreccion"],
                                "departamento"=>$_POST["departamento"], 
                                "correo"=>$_POST["correo"], 
                                "dni"=>$_POST["dni"]);
                                
                    $tablaBD = "usuario";

                    $res = AdminM::RegistroM($datosC, $tablaBD);

                    if (!$res) {
                        ?>
                        <script>
                            $.confirm({
                                theme:'Material',
                                title: 'Error',
                                content: "Los Datos Ingresados Ya Fueron Registrado",
                                type: 'red',
                                typeAnimated: true,
                                columnClass: 'medium',
                                buttons: {
                                    tryAgain: {
                                        text: 'Volver Al Menu Principal ',
                                        btnClass: 'btn-blue',
                                        action: function(){
                                            location.href="index.php?ruta=buscarcliente";
                                        }
                                    },
                                    trypago: {
                                        text: 'Ingresar Nuevos Datos',
                                        btnClass: 'btn-blue',
                                        action: function(){
                                            location.href="index.php?ruta=registrar";
                                        }
                                    },
                    
                                }
                        });
                </script>
            <?php

                    }else{

                    ?>
                        <script>
                            $.confirm({
                                theme:'Material',
                                title: 'Cliente Registrado',
                                content: "El Cliente se registro correctamente",
                                type: 'green',
                                typeAnimated: true,
                                columnClass: 'medium',
                                buttons: {
                                    tryAgain: {
                                        text: 'Volver Al Menu Principal ',
                                        btnClass: 'btn-blue',
                                        action: function(){
                                            location.href="index.php?ruta=empleados";
                                        }
                                    },
                                    trypago: {
                                        text: 'Ingresar Vehiculo',
                                        btnClass: 'btn-blue',
                                        action: function(){
                                            location.href="index.php?ruta=registrarplaca";
                                        }
                                    },
                    
                                }
                            });
                        </script>
                    <?php

                    }
 
                    
                    
                    

            }

        
    }

    public function salirC(){
        session_destroy();
        header("location:index.php?=ingreso");
    }
}
?>