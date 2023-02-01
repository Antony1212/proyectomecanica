<?php  //Controladores/adminC.php
class AdminC{
    function __construct(){
        $this->adminM = new AdminM();
    }

    public function IngresoC(){

        if(isset($_SESSION['Ingreso'])) {
            header("location: index.php?ruta=Principal");
        }

        if(isset($_POST["usuario"] ))
        {
            
            $datosC = array(

                        "usuario"=>$_POST["usuario"], 
                        "contraseña"=>$_POST["contraseña"]);

            $tablaBD = "usuario";

            $inicio = AdminM::IngresoM($datosC, $tablaBD);
              

            if (!$inicio) {

                ?>
                <script>
                    $.confirm({
                        theme:'Material',
                        title: 'Error',
                        content: "El Usuario No Existe",
                        type: 'red',
                        typeAnimated: true,
                        columnClass: 'medium',
                        buttons: {
                            tryAgain: {
                                text: 'Intentar De Nuevo',
                                btnClass: 'btn-blue',
                                action: function(){
                                    location.href="index.php?ruta=ingresousuario";
                                }
                            },
                            
            
                        }
                        });
                </script>
            <?php

            }elseif ($inicio->num_rows)
            {
                
                $pw_temp=$_POST['contraseña'];
                $row = $inicio->fetch_array(MYSQLI_NUM);
                $inicio->close();
                if (password_verify($pw_temp, $row[4])){
                  
                    $username=$row[1];
                    $id_u=$row[0];
                    $roll=$row[5];
                    if ( $roll=="mecanico") {
                        $rango=$row[9];
                        $_SESSION['rango']=$rango;
                    }elseif ($roll=="Empresa") {
                        $_SESSION['nombre']=$row[2];
                    
                    }elseif ($roll=="Cliente") {
                        $_SESSION['nombre']=$row[2];
                    $_SESSION['apellido']=$row[3];
                    }elseif ($roll=="administrador") {
                        $_SESSION['nombre']=$row[2];
                    $_SESSION['apellido']=$row[3];
                    }

                    

                    
                   
                            
                    $_SESSION['username']=$username;
                    $_SESSION['id_u']=$id_u;
                    $_SESSION['roll'] =$roll;
                    
                    session_start();
                    setcookie('username',$_SESSION['username'],time()+ 5);
                    $GLOBALS['entrada']=true;
                    $_SESSION['Ingreso']=true;
                    header("location: index.php?ruta=Principal");
                               
                        
                        

                    
                }else {

                    ?>
                        <script>
                            $.confirm({
                                theme:'Material',
                                title: 'Error',
                                content: "Contraseña Incorrecta Ingrese Nuevamente",
                                type: 'red',
                                typeAnimated: true,
                                columnClass: 'medium',
                                buttons: {
                                    tryAgain: {
                                        text: 'Intentar De Nuevo',
                                        btnClass: 'btn-blue',
                                        action: function(){
                                            location.href="index.php?ruta=ingresousuario";
                                        }
                                    },
                                    
                    
                                }
                                });
                        </script>
                    <?php

                }
         
            }
        }

        
    }

    public function IngresoplacaC(){
        if(isset($_SESSION['Ingreso'])) {
            header("location: index.php?ruta=vehiculo");
        }

        if(isset($_POST["placa"] ))
        {
            
            $datosC = array(

                        "placa"=>$_POST["placa"]);

            $tablaBD = "vehiculo";

            $inicio = AdminM::IngresoplacaM($datosC, $tablaBD);
              

            if ($inicio->num_rows)
            {
                
               
                $row = $inicio->fetch_array(MYSQLI_NUM);
                $inicio->close();

                $username=$row[1];
                    $id_u=$row[0];
                    
                    $_SESSION['username']=$username;
                    $_SESSION['id_u']=$id_u;
                    $_SESSION['roll'] ="vehiculo";
                    $_SESSION['nombre']=$row[2];
                    $_SESSION['apellido']=$row[6];
                    session_start();
                    setcookie('username',$_SESSION['username'],time()+ 5);
                    $GLOBALS['entrada']=true;
                    $_SESSION['Ingreso']=true;
                    header("location: index.php?ruta=empleados");

            }else{

                ?>
                <script>
                    $.confirm({
                        theme:'Material',
                        title: 'Error',
                        content: "El Vehiculo No Existe O no Esta Registrado",
                        type: 'red',
                        typeAnimated: true,
                        columnClass: 'medium',
                        buttons: {
                            tryAgain: {
                                text: 'Intentar De Nuevo',
                                btnClass: 'btn-blue',
                                action: function(){
                                    location.href="index.php?ruta=ingreso";
                                }
                            },
                            
            
                        }
                        });
                </script>
            <?php

            }
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

    public function RegistroEmpresaC(){

        if(isset($_POST["correo"])){
            
            $a=$_POST["dni"];
                    $datosC = array(    
                                "nombres"=>$_POST["nombres"],
                                
                                "fecha_nacimiento"=>$_POST["fecha_nacimiento"], 
                                "dirreccion"=>$_POST["dirreccion"],
                                "departamento"=>$_POST["departamento"], 
                                "correo"=>$_POST["correo"], 
                                "dni"=>$_POST["dni"]);
                                
                    $tablaBD = "usuario";

                    $res = AdminM::RegistroEmpresaM($datosC, $tablaBD);

                    if (!$res) {
                        ?>
                        <script>
                            $.confirm({
                                theme:'Material',
                                title: 'Error',
                                content: "La Empresa Ya Esta Registrada",
                                type: 'red',
                                typeAnimated: true,
                                columnClass: 'medium',
                                buttons: {
                                    tryAgain: {
                                        text: 'Volver Al Menu Principal ',
                                        btnClass: 'btn-blue',
                                        action: function(){
                                            location.href="index.php?ruta=buscarempresa";
                                        }
                                    },
                                    trypago: {
                                        text: 'Ingresar Nuevos Datos',
                                        btnClass: 'btn-blue',
                                        action: function(){
                                            location.href="index.php?ruta=registrarempresa";
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
                                content: "La Empresa se registro correctamente",
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