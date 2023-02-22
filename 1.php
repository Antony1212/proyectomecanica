<!DOCTYPE html>
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
                  echo "
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
                            <p><b>N° de boleta:</b> 0001</p>
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
                        
                    </div>
                    <table >
                        <thead>
                            <tr>
                                
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio unitario</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        ";
                                    foreach($costocot as $key => $ttlcost): 
                                    echo "
                        <tbody>
                            
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            
                        </tbody>";
                                    endforeach;
                                    echo"
                    </table>
                    <div class='row'>
                        <div class='col s12 right-align'>
                            
                            <p><b>Total:</b> S/ 118.00</p>
                        </div>
                    </div>
                </div>
            </body>
            </html>