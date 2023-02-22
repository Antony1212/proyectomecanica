<?php
$empleados = new EmpleadosC();
$pagina = $empleados->mostrarVehiculosClienteC();

$empleados = new EmpleadosC();
$pag = $empleados->mostrarDetallesVehiculosClienteC();



?>  <!-- Vistas/Modulos/empleados.php -->


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
							<div class="card-action">
        <table>
		<?php foreach($pag as $key => $value): ?>
	
				<div class="col s12  m8">
				<div class="card horizontal">
				<div class="card-stacked">
							<div class="card-content">
				<span class="card-title"> <?php echo $value['Titulo']; ?></span>
					<p>Fecha: <?php echo $value['Fecha']; ?></p>
					<p>Descripción: <?php echo $value['descripcion']; ?></p>
				
					</div>
					</div>
				</div>
				</div>

			<?php endforeach; ?>
        </table>
    </div>
								
										
											
										
									</table>
								</blockquote>
								<table class="responsive-table">
										<tbody>
										<td></td>
										<td>
										<a href="index.php?ruta=vehiculo1"><button class=" btn waves-effect waves-green green lighten-5 black-text" type="submit" name="action">Volver
												<i class="material-icons right">arrow_back</i>
											</button></a>
											
										
										</td>
										
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