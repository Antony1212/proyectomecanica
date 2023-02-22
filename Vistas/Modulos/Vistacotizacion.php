
<?php
$empleados = new EmpleadosC();
$pagina = $empleados->VerCotisacionC();

$registrar = new EmpleadosC();
$registrar->pruebaC();


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
				<div class="col s12  m6">
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
							
								
								<table class="responsive-table">
										<tbody>
										<td>
										<form method="post"  enctype='multipart/form-data' >
											<input type="hidden" name="Cotias" value="<?=$value['id_reparacion']?>">
										<button class="btn tooltipped waves-effect waves-light blue lighten-2 black-text" data-position="bottom" data-tooltip="Enviar Cotizacion Al Cliente">Enviar<i class="material-icons left">mark_email_read</i></button>
										
        
										
										</form>
										
													
											
												
										</td>
										
										<td><a href='index.php?ruta=vehiculoasignadoequipo&reparacion=<?=$value['id_reparacion']?>'>
										<button class="btn waves-effect waves-light blue lighten-2 black-text">Detalles<i class="material-icons left">visibility</i></button></td>
										<i class="fas fa-check"></i>
										</tbody>
									
									</table>
						</div>	
					</div>
				</div>
			</div>

			<div class="col s12 m12 l3"> 
				
			</div>
            
	<?php endforeach; ?>


		