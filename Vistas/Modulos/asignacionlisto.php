<?php
$empleados = new EmpleadosC();
$pagina = $empleados->AsignarGrupoC();
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
</div>