<?php
$empleados = new EmpleadosC();
$pagina = $empleados->mostrarEmpleadosC();
$empleados->borrarEmpleadoC();

?> <!-- Vistas/Modulos/empleados.php -->
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

  

	<div class="col s12 m12 l8">
	<br>
		<div class="col s12 m6">
			<div class="card horizontal">
				<div class="card-image">
					
				</div>
				<div class="card-stacked">
					<div class="card-content">
					<div class="card-content">
					<p>Bienvenido</p>
					
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
