<?php
$empleados = new EmpleadosC();
$pagina = $empleados->mostrarVehiculosestimacionC();

$datos = new EmpleadosC();
$datos->CrearCotiazarC();

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
							<div class="card-action">
        <table>
            <tr>
                <td>Estado:</td>
                <td><?=$value['estado']?></td>
            </tr>
            <tr>
                <td>Detalles:</td>
                <td><?=$value['Detalles']?></td>
            </tr>
        </table>
    </div>
								
										
											
										
									</table>
								</blockquote>
								<table class="responsive-table">
										<tbody>
										<td></td>
										<td>
										<form id="formulario"  method="post" enctype='multipart/form-data'>
											<input type="hidden" name="cotizar" value="<?=$value['id_reparacion']?>">
											
											<button class=" btn waves-effect waves-green green lighten-5 black-text" type="submit" name="action">Generar Presupuesto
												<i class="material-icons right">request_quote</i>
											</button>
										</form>	
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
