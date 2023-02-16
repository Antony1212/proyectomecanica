<?php
$empleados = new EmpleadosC();
$pagina = $empleados->mostrarVehiculos1C();
$empleados->borrarEmpleadoC();


?>  <!-- Vistas/Modulos/empleados.php -->
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

			<div class="col s12 m12 l9">
				<div class="col s12 m6">
					<div class="card horizontal">
						<div class="card-image">
							<img src="Vistas/css/imagenes/<?=$value['Imagen']?>" width="300" height="300">
						</div>
						<div class="card-stacked">
							<div class="card-content">
								<h6><?=$value['Modelo']?> <?=$value['Placa_vehiculo']?></h6>
							</div>
							
								<blockquote >
								
									<table class="responsive-table">
										<tbody>
											<th>Estado</th>
											<td class="lime lighten-4"><?=$value['estado']?></td>
										</tbody>
										<tbody>
										<th>Detalles</th>
										<td><?=$value['Detalles']?></td>
										</tbody>
									</table>
								</blockquote>
								<table class="responsive-table">
										<tbody>
										<td></td>
										<td><a href='index.php?ruta=asignacionvehiculo&reparacion=<?=$value['id_reparacion']?>'>
										<button class="btn waves-effect waves-light blue lighten-2 black-text">Seleccionar Vehiculo<i class="material-icons left">dashboard</i></button></td>
										
										</tbody>
									
									</table>
						</div>	
					</div>
				</div>
			</div>

			<div class="col s12 m12 l3"> 
				
			</div>
            
	<?php endforeach; ?>


	</div>	
