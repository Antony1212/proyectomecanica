<!DOCTYPE html>  <!-- Vistas/plantilla.php-->
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>CRUD</title>
	    <!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>		

		<link rel="stylesheet" type="text/css" href="Vistas/css/estilos.css">

</head>
<body>
	<?php
		session_start();
		$rutasC = new RutasC();
		include 'modulos/menu.php';
	?>	<section>

		<?php
			$modulo = $rutasC->procesaRutasC();
			include $modulo;
		?>	</section>
</body>
</html>