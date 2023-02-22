<?php
$empleados = new EmpleadosC();
$pagina = $empleados->detallevehiculoC();

$registrar = new EmpleadosC();
$registrar->actualizarreparacionC();

$reparacio=$_GET['reparacion'];

?>

<div class="row">

<div class="col s12"> 
	<?php
		include 'barra.php';
	?>
</div>

<div class="col s12 m12 l3"> 
	<?php
		include 'menu.php';
	?>
</div>

<?php foreach($pagina as $key => $value): ?>
<?php  

$pro = new EmpleadosC();
$prod = $pro->mostrarProductosC();

	switch ($value['Tipo']) {
		case 1:
			$tipo="Autobús";
			break;
		case 2:
			$tipo="Camión";
			break;
		case 3:
			$tipo="Camioneta";
			break;
		case 4:
			$tipo="Auto";
			break;
		case 5:
			$tipo="Motosicleta";
			break;
	}
	
	?>

			<div class="col s12 m12 l9">
			
				
				<div class="col s12 m8">
					<blockquote>
						Registro de Clientes
						<div class="clearfix"></div>
						*Todos los campos son obligatorios
    				</blockquote>
					
					<div class="card horizontal">
						
						<div class="card-stacked">
							<form method="post" id="registro" enctype='multipart/form-data'>
							<div class="row">
								<input type="hidden" name="dato_secreto1" value="<?=$reparacio?>">
								<div class="input-field col s6">
									<i class="material-icons prefix">title</i>
									<input id="icon_prefix" type="text" class="validate" name="nombre"  required>
									<label for="icon_prefix">Nombre De Reparacion</label>
								</div>
								<div class="input-field col s12">
									<div class="input-field col s12">
										<i class="material-icons prefix">description</i>
										<textarea id="textarea1" class="materialize-textarea" name="descripcion" required></textarea>
										<label for="textarea1">Descripcion y detalles de la reparacion</label>
									</div>
								</div>	
								
								<div class="input-field col s12">
									<i class="material-icons prefix">home_repair_service</i>
									<input type="text" name="producto" id="producto-input" autocomplete="off" required>
									<label for="producto-input">Producto</label>
								</div>
							
								
								<div class="input-field col s6">
									<i class="material-icons prefix">health_and_safety</i>
									<input id="icon_prefix" type="text" class="validate"  value="Estimación del presupuesto" disabled required>
									<label for="icon_prefix">Actualizar estado del Vehiculo a:</label>
								</div>
								<input type="hidden" name="estado" value="Estimación del presupuesto">

								<div class="input-field col s12">
									<button class="btn waves-effect waves-light indigo lighten-2" type="submit" name="action">Enviar
										<i class="material-icons right">send</i>
									</button>
								</div>
							</div>
						</div>	
					</div>

				</div>
				

				<div class="col s12 m4">
					<div class="card horizontal">
						
						<div class="card-stacked">
							<div >
								<img src="Vistas/css/imagenes/<?=$value['Imagen']?>" width="400" height="300">
							</div>
							
								<blockquote >
								
									<table class="responsive-table">
										<tbody>
											<th>Datos del Cliente</th>
											<td class="lime lighten-4"><?=$value['nombre']?> <?=$value['apellido']?> </td>
										</tbody>
										<tbody>
											<th>Direccion</th>
											<td class="lime lighten-4"><?=$value['direccion']?></td>
										</tbody>
										<tbody>
											<td></td>	
											<th>Detalles Del Vehiculo</th>
										</tbody>

										<tbody>
											<th>Placa</th>
											<td><?=$value['Placa_vehiculo']?></td>
										</tbody>
										<tbody>
											<th>Modelo</th>
											<td><?=$value['Modelo']?></td>
										</tbody>
										<tbody>
											<th></th>
											<td><?=$value['Detalles']?></td>
										</tbody>
										<tbody>
											<th>Tipo De Vehiculo</th>
											<td><?=$tipo?></td>
										</tbody>
										<tbody>
											<th>Estado De Vehiculo</th>
											<td><?=$value['estado']?></td>
										</tbody>

									</table>
								</blockquote>
						</div>	
					</div>
				</div>
			</div>

			
            
	<?php endforeach; ?>


	</div>
	<script>
		
			$(document).ready(function() {

			$.get("Vistas/Modulos/datos/obtener_productos.php", function(data) {
				console.log(data); // Imprimir la respuesta del servidor en la consola del navegador
				var datos = JSON.parse(data);

				// Crear un objeto para almacenar los datos de usuario en el formato esperado por autocomplete
				var datos_autocomplete = {"0 No Se Uso Productos": null};
				for (var i = 0; i < datos.length; i++) {
				var e=i+1;
				datos_autocomplete[datos[i].id_usuario + " " + datos[i].nombre + " " + datos[i].roll] = null;
				}
				console.log(datos_autocomplete);
				// Inicializa el método autocomplete para el campo de productos
				const productos = ['Producto 1', 'Producto 2', 'Producto 3'];
				$('#producto-input').autocomplete({ data:  datos_autocomplete  });
				});
			});
	</script>

	
	

