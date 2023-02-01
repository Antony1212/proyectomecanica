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
					<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtpQu4xBOTydKEN4gmA5i4iSohWzT_TKGBFj5_XOaKEGvvj2wvB6WMLZjjRbrjvjgOh4E&usqp=CAU">
				</div>
				<div class="card-stacked">
					<div class="card-content">
					<p>Toyota Yaris 2009  A1A-000</p>
					<blockquote>
					El Vehiculo Se Encuentra En La Etapa De Revisión
					</blockquote>
					</div>
					<div class="card-action">
					<a href="#">Mostrar detalles</a>
					</div>
				</div>
			</div>
		</div>
	</div>

