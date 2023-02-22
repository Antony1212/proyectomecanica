<?php  
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
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

            
            $res = $this->empleadosM->consultarEmpleadosM($datosC);
           
           if (mysqli_num_rows($res) > 0) {
                
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
                                        
                                        $datosC['foto'] = "Error";
                                        $result = $this->empleadosM->registrarEmpleadosM($datosC);  
                                        $placa = $this->empleadosM->registrarReparacionM($datosC);  
                                        
                                    

                                    }else{
                                        
                                        $datosC['foto'] = $vista;
                                        $result = $this->empleadosM->registrarEmpleadosM($datosC);  
                                        $placa = $this->empleadosM->registrarReparacionM($datosC);
                                    }
                                    
                            }
                            else{
                                
                                $datosC['foto'] = "ErrorCarpeta";
                                $result = $this->empleadosM->registrarEmpleadosM($datosC); 
                                $placa = $this->empleadosM->registrarReparacionM($datosC);
                            }
    
                    }
                    else {
                        $datosC['foto'] = "Noimagen";
                        $result = $this->empleadosM->registrarEmpleadosM($datosC);
                        $placa = $this->empleadosM->registrarReparacionM($datosC);
                    }        
                }
                else{
                    $datosC['foto'] = "Noimagen";
                    $result = $this->empleadosM->registrarEmpleadosM($datosC);
                    $placa = $this->empleadosM->registrarReparacionM($datosC);
                }

                ?>
                <script>
                    $.confirm({
                        theme:'Material',
                        title: 'Exito',
                        content: "El Vehiculo se registro de manera exitosa",
                        type: 'blue',
                        typeAnimated: true,
                        columnClass: 'medium',
                        buttons: {
                            tryAgain: {
                                text: 'Ingresar Otro Vehiculo',
                                btnClass: 'btn',
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

            }

            

            

            
        }
    }

    //mostrar empleados
    public function mostrarEmpleadosC(){
       
    }

    public function puC(){
        if(isset($_POST['aceptacion'])){

            $datosC = array(    'aceptacion'=>$_POST['aceptacion'],
                                
                            );
            $result = $this->empleadosM->puM(($datosC));

            
            
            ?>
                <style>
                        #loader-container {
                            position: absolute;
                            top: 0;
                            left: 0;
                            right: 0;
                            bottom: 0;
                            background-color: rgba(255, 255, 255, 0.5);
                            z-index: 9999;
                            display: none;
                        }

                        .preloader-wrapper {
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                        }

                        .reparacion-iniciada {
                            font-size: 24px;
                            text-align: center;
                            margin-top: 20px;
                        }
                        </style>

                        <div class="container">
                            <div id="loader-container">
                                <div class="preloader-wrapper big active">
                                    <div class="spinner-layer spinner-blue-only">
                                        <div class="circle-clipper left">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="gap-patch">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="circle-clipper right">
                                            <div class="circle"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <script>
                        
                                                $('#loader-container').show();
                                                setTimeout(function() {
                                                    $('#loader-container').hide();
                                                    $('.reparacion-iniciada').show();
                                                    $('.tuerca').addClass('animated rotateIn');
                                                   
                                                    M.toast({html: '  <i class="material-icons">done</i>La reparación ha sido iniciada.', classes: 'green'});
                                                    setTimeout(function() {
                                                        location.href = "index.php?ruta=Preparaciones";
                                                    }, 2000);
                                                }, 3000);
                                       

                            iniciarReparacion(); // Llamada a la función para que se ejecute automáticamente

                            // Opcional: Si quieres que se ejecute cada vez que se recarga la página, también puedes agregar un evento de recarga:
                            // $(window).on('load', function() {
                            //     iniciarReparacion();
                            // });
                       
                        </script>
            <?php

        }
    }


    public function mostrarProductosC(){
        $result = $this->empleadosM->mostrarProductosM();
        return $result;
    }

    public function ActualizarCotisacionC(){
        $result = $this->empleadosM->ActualizarCotisacionM();
        return $result;
    }

    

    public function VerCotisacionC(){
        $result = $this->empleadosM->VerCotisacionM();
        return $result;
    }

    public function mostrarEquiposC(){
        $result = $this->empleadosM->mostrarEquiposM();
        return $result;
    }

    public function ReparacionesC(){
        $result = $this->empleadosM->ReparacionesM();
        return $result;
    }

    public function mostrarRoll1C(){
        $result = $this->empleadosM->mostrarRoll1M();
        return $result;
    }

    public function detallevehiculoC(){
        if(isset($_GET['reparacion'])){

            $datosC =array();
            $datosC['reparacion'] = $_GET['reparacion'];
            $result = $this->empleadosM->detallevehiculoM($datosC);
            
            return $result;
        }
        
    }

    public function mostrarVehiculos1C(){
        $result = $this->empleadosM->mostrarVehiculos1M();
        return $result;
    }

    public function mostrarVehiculosasignadosC(){
        $result = $this->empleadosM->mostrarVehiculosasignadosM();
        return $result;
    }

    public function mostrarVehiculosestimacionC(){
        $result = $this->empleadosM->mostrarVehiculosestimacionM();
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

    public function AsignarGrupoC(){
        if(isset($_GET['reparacion'])&&isset($_GET['equipo'])){
            $datosC = array(
                'reparacion'=>$_GET['reparacion'],
                'equipo'=>$_GET['equipo']
            );
            $result = $this->empleadosM->AsignarGrupoM($datosC);
            ?>
                <script>
                    $.confirm({
                        theme:'Material',
                        title: 'Exito',
                        content: "El Vehiculo Se Asigno Correctamente a El Equipo de mecanicos",
                        type: 'green',
                        typeAnimated: true,
                        columnClass: 'medium',
                        buttons: {
                            tryAgain: {
                                text: 'Asignar Otro Vehiculo',
                                btnClass: 'btn-bue',
                                action: function(){
                                    location.href="index.php?ruta=asignacion";
                                }
                            },
                            tryAgain1: {
                                text: 'Volver Al Menu',
                                
                                action: function(){
                                    location.href="index.php?ruta=Vehiculo";
                                }
                            },
                            
            
                        }
                        });
                </script>
            <?php
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

    public function AutorizarCotizacionC(){
        if(isset($_POST['Aceptarcion'])){
            $datosC = array(    'aceptado'=>$_POST['Aceptarcion'],
                                'Cotizacion' =>$_POST['Cotizacion']
                            );
                           $aceptado =$_POST['Aceptarcion'];
                           $Cotizacion =$_POST['Cotizacion'];
                            echo "$aceptado, $Cotizacion ";
                            
            $result = $this->empleadosM->AutorizarCotizacionM($datosC);
            $result = $this->empleadosM->AutorizarCotizacion1M($datosC);
            $result = $this->empleadosM->AutorizarCotizacion2M($datosC);
            return $result;
        }
    }

    public function actualizarreparacionC(){
        if(isset($_POST['dato_secreto1'])){


            $busqueda = $_POST['producto']; // Obtener la cadena desde $_POST
            $primeros_ocho_digitos = substr($busqueda, 0, 1); // Extraer los primeros 8 dígitos
            echo $primeros_ocho_digitos; // Imprimir los primeros 8 dígitos

            $datosC = array(    'dato_secreto'=>$_POST['dato_secreto1'],
                                'nombre'=>$_POST['nombre'],
                                'descripcion'=>$_POST['descripcion'],
                                'producto' => $_POST['producto'],
                                'estado' => $_POST['estado'],
                                
                            );

            $result = $this->empleadosM->actualizarreparacionM($datosC);
            
            ?>
                <script>
                    $.confirm({
                        theme:'Material',
                        title: 'Exito',
                        content: "Se Guardaron Los Datos De La Inspeccion",
                        type: 'green',
                        typeAnimated: true,
                        columnClass: 'medium',
                        buttons: {
                            tryAgain: {
                                text: 'Actualizar estado de otro Vehiculo',
                                btnClass: 'btn-bue',
                                action: function(){
                                    location.href="index.php?ruta=Vehiculos";
                                }
                            },
                            tryAgain1: {
                                text: 'Volver Al Menu',
                                
                                action: function(){
                                    location.href="index.php?ruta=vehiculo";
                                }
                            },
                            
            
                        }
                        });
                </script>
            <?php
        }
    }

    public function pruebaC(){
        
        if(isset($_POST['Cotias'])){
           
            $datosC = array(    
                                 
                             'Cotias'=>$_POST['Cotias'],
             
                         );
        $prod=$_POST['Cotias'];             
         $result = $this->empleadosM->prueba1M($datosC);
 
         $costocot = $this->empleadosM->pruebaM($datosC);
         $preciototal=0;
 
 
 // Generar el código HTML de la boleta
            $html = "<!DOCTYPE html>
            <html>
            <head>
                <title>MECANICA QUISPE - Boleta de venta #0001</title>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css'>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'></script>
            </head>
            <body>
            ";
                        foreach($result as $key => $cliente): 
                            $nombre=$cliente['nombre'];
                            $apellido=$cliente['apellido'];
                            $id_usuario=$cliente['id_usuario'];
                            $correo=$cliente['correo'];
                            $direccion=$cliente['direccion'];
                            $id_Cotizacion=$cliente['id_Cotizacion'];
                           
                            $Placa_vehiculo=$cliente['Placa_vehiculo'];
                            $html .="
                <div class='container'>
                <h4 class='aling center'>MECANICA QUISPE S.A.C</h4>
                    <div class='row'>
                        <div class='col s6'>
                            <p></p>
                            <p> En Mecánica Quispe, nos enorgullece ofrecer un servicio personalizado y de confianza para satisfacer las necesidades de nuestros clientes, garantizando siempre su satisfacción y seguridad al momento de salir a la carretera.</p>
                            <p><b>Dirección:</b> AV. LOS CEDROS NRO. 760 (COSTAD D DEPOSITO AMPAY C2P CL BLANCO)</p>
                            <p><b>Correo Electronico:</b> mecanicaquispe@example.com</p>
                        </div>
                        <div class='col s6 right-align'>
                        <h5 class=''>Cotizacion de Reparacion</h5>
                            <p><b>N° de Cotizacion:</b> 000$id_Cotizacion</p>
                            <p><b>Fecha:</b> 19/02/2023</p>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col s6'>
                            <p><b>Nombre del cliente:</b>  $nombre  $apellido</p>
                            <p><b>DNI/RUC:</b>$id_usuario</p>
                            <p><b>Dirección:</b> $direccion</p>
                            <p><b>Correo Electronico:</b> $correo</p>
                        </div>
                        ";
                    endforeach;
                    $html .="   
                    </div>
                    <table >
                        <thead>
                            <tr>
                                
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio unitario</th>
                               
                            </tr>
                        </thead>
                        ";
                                    foreach($costocot as $key => $ttlcost):
                                        $producto=$ttlcost['producto'];
                                        $cantidad=$ttlcost['cantidad'];
                                        $precio=$ttlcost['precio'];
                                        $preciototal=$preciototal+$precio;
                                        $html .="
                        <tbody>
                            
                                <tr>
                                    <td>$producto</td>
                                    <td>$cantidad</td>
                                    <td>$precio</td>
                                    
                                </tr>
                            
                        </tbody>";
                                    endforeach;
                                    
                                    $html .="
                    </table>
                    <div class='row'>
                        <div class='col s12 right-align'>
                            <p><b>Subtotal:</b> S/ $preciototal</p>
                            
                            
                        </div>
                    </div>
                </div>
            </body>
            </html>
            ";

            

            
             $Nombrearcvi="$id_Cotizacion-$prod";
 
             // Guardar el código HTML en un archivo
             
             file_put_contents("Cotizaciones/$Nombrearcvi.html", $html);
             

             //Create an instance; passing `true` enables exceptions
             $mail = new PHPMailer(true);
 
             try {
                 //Server settings
                 $mail->SMTPDebug = 0;                      //Enable verbose debug output
                 $mail->isSMTP();                                            //Send using SMTP
                 $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                 $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                 $mail->Username   = 'atonya67@gmail.com';                     //SMTP username
                 $mail->Password   = 'twjnhkdjbpyujqls';                               //SMTP password
                 $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                 $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
 
                 //Recipients
                 $mail->setFrom('atonya67@gmail.com', 'prueba');
                 $mail->addAddress("$correo");     //Add a recipient
                     //Name is optional
             
                 
                             //Add attachments
                     $mail->addAttachment("Cotizaciones/$Nombrearcvi.html", 'Cotizacion.html');    //Optional name
                    
 
                 //Content
                 $mail->isHTML(true);                                  //Set email format to HTML
                 $mail->Subject = "Cotizacion De Su Vehiculo $Placa_vehiculo";
                 $mail->Body    = "El Equipo Asignado A Su Vehiculo con placa $Placa_vehiculo Estimo Una Cotizacion De Su Vehiculo Que Tiene Un Costo Total De :$preciototal Nuevos soles El Costo total de la reparacion esta incluida y si hay alguna actualizacion del costo estaremos enviandole otro correo electronico Porfavor llamar Al Numero 996057758 o acceder a nuestro sitio web para poder Autorizar la reparacion ";
                
 
                 $mail->send();

                 $result = $this->empleadosM->prueba2M($datosC);
                 ?>
                <script>
                     $.confirm({
                        theme:'Material',
                        title:  "La Cotizacion ha sido enviado correctamente",
                        content: '<div class="text-center"><i class="material-icons icon-check">mail</i>La Cotizacion se envio al correo electronico del cliente',
                        icon: 'fa fa-envelope',
                        animation: 'rotateX',
                        closeAnimation: 'rotateX',
                        type: 'green',
                        typeAnimated: true,
                        columnClass: 'medium',
                        buttons: {
                            tryAgain: {
                                text: 'Actualizar estado de otro Vehiculo',
                                btnClass: 'btn-bue',
                                action: function(){
                                    location.href="index.php?ruta=Vistacotizacion";
                                }
                            },
                        },
                            onContentReady: function () {
                            var jc = this;
                            this.$content.find('.icon-check').addClass('animated pulse infinite');
                            setTimeout(function () {
                            jc.close();
                            }, 2000);
                        }
                       
                        });
                    
                
      
                </script>
            <?php
             } catch (Exception $e) {
                $result = $this->empleadosM->prueba3M($datosC);
                ?>
                <script>
                     $.confirm({
                        theme:'Material',
                        title:  "Error No Enviado",
                        content: '<div class="text-center"><i class="material-icons icon-check">mail</i>La Cotizacion no se envio al correo electronico del cliente',
                        icon: 'fa fa-envelope',
                        animation: 'rotateX',
                        closeAnimation: 'rotateX',
                        type: 'red',
                        typeAnimated: true,
                        columnClass: 'medium',
                        buttons: {
                            tryAgain: {
                                text: 'volver a intentarlo',
                                btnClass: 'btn-bue',
                                action: function(){
                                    location.href="index.php?ruta=Vistacotizacion";
                                }
                            },
                        },
                            onContentReady: function () {
                            var jc = this;
                            this.$content.find('.icon-check').addClass('animated pulse infinite');
                            setTimeout(function () {
                            jc.close();
                            }, 2000);
                        }
                       
                        });
                    
                
      
                </script>
            <?php
             }
           
            
        }
    }

    public function CrearCotizacionC() {
        if(isset($_POST['Cotizacion'])) {
            
            $numCampos = 1;
            $x=0;
           
            while($x == 0) {
                if (isset($_POST["producto-$numCampos"])) {
                    $producto=$_POST["producto-$numCampos"];
                    
                    $numCampos++;
                }else{
                    
                    $x++;
                    $numCampos=$numCampos-1;
                }
                
               
              }


            for($i=1; $i <= $numCampos; $i++) {

                $datosC = array(    
                                    'reparacion' => $_POST['Cotizacion'],    
                                    'id_Cotizacion' => $_POST['id_Cotizacion'],
                                    'producto' => $_POST["producto-$i"],
                                    'cantidad' => $_POST["cantidad-$i"], 
                                    'precio' => $_POST["precio-$i"]);
        
               $this->empleadosM->CrearCotizacionM($datosC);
               
            }

            $result = $this->empleadosM->TerminarcotizacionM($datosC);
            if (!$result) {

                ?>
                <script>
                    $.confirm({
                        theme:'Material',
                        title: 'Error',
                        content: "La Cotizacion no se genero correctamente",
                        type: 'red',
                        typeAnimated: true,
                        columnClass: 'medium',
                        buttons: {
                            tryAgain: {
                                text: 'Intentar De Nuevo',
                                btnClass: 'btn-blue',
                                action: function(){
                                    location.href="index.php?ruta=Presupuesto";
                                }
                            },
                            
            
                        }
                        });
                </script>
            <?php

            }else {
                ?>
                <script>
                    $.confirm({
                        theme:'Material',
                        title: 'Exito',
                        content: "La Cotizacion Se genero exitosamente",
                        type: 'green',
                        typeAnimated: true,
                        columnClass: 'medium',
                        buttons: {
                            tryAgain: {
                                text: 'Menu Principal',
                                btnClass: 'btn-blue',
                                action: function(){
                                    location.href="index.php?ruta=Principal";
                                }
                            },
                            
            
                        }
                        });
                </script>
            <?php

            }
        }
    }

    public function CrearCotiazarC() {
        if(isset($_POST['cotizar'])) {
            
            date_default_timezone_set("America/Lima");
            $fechar= date('Y-m-d H:i:s');
            
            $datosC = array(    
                'cotizar' => $_POST['cotizar'],
                'fechar' =>  $fechar);

            $this->empleadosM->CrearCotiazarM($datosC);
            $result = $this->empleadosM->generarCotiazarM($datosC);


            if (!$result) {

                ?>
                <script>
                    $.confirm({
                        theme:'Material',
                        title: 'Error',
                        content: "La Cotizacion no se genero correctamente",
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

            }elseif ($result->num_rows)
            {
                $row = $result->fetch_array(MYSQLI_NUM);
                $id_cotizacion=$row[0];
                $reparacion=$row[1];
                $des=$row[8];
                
                header("location:index.php?ruta=Vehiculopresupuesto&reparacion=$reparacion&cotizacionllenada=$id_cotizacion&descrip=$des");
                
                    
            }


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