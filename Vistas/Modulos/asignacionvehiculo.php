<?php
$empleados = new EmpleadosC();
$pagina = $empleados->detallevehiculoC();

$reparacio=$_GET['reparacion'];
$contt=0;
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

$juan = new EmpleadosC();
$pa= $juan->mostrarEquiposC();

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
						Registro de reparaciones
						<div class="clearfix"></div>
						*Asignacion y entrega de vehiculos a el equipo de mecanicos
					</blockquote>
				<?php foreach($pa as $key => $va): ?>
				<?php  if ($contt==2) {
					?>

						<div class="col s12 m12 l12">
						</div>
						
						<?php
						$contt=1;
					}else {
						$contt=$contt+1;
					}?>
					<div class="col s12 m6">
					
						
						<div class="card Large">
						<div class="card-image">
							<img src="Vistas/css/imagenes/<?=$va['Foto']?>">
							<span class="card-title"><?=$va['Nombregrupo']?></span>
						</div>
						<div class="card-content">
							<p><?=$va['Detallesgrupo']?></p>
							
						</div>
						<div class="card-action">
							<a href="index.php?ruta=asignacionlisto&reparacion=<?=$reparacio?>&equipo=<?=$va['id_grupo']?>">Asignar Equipo</a>
							<a href="index.php?ruta=registrarplaca">Ver Detalles De Equipo</a>
						</div>
						
					</div>
					</div>
				<?php endforeach; ?>	
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

									</table>
								</blockquote>
						</div>	
					</div>
				</div>
			</div>

			
            
	<?php endforeach; ?>


	</div>	

