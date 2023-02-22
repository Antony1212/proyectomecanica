
<?php



// Generar el código HTML de la boleta
$html = "<!DOCTYPE html>
<html>
<head>
	<title>Boleta de venta</title>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css'>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'></script>
</head>
<body>
	<div class='container'>
		<h2 class='center-align'>Boleta de venta</h2>
		<div class='row'>
			<div class='col s6'>
				<p><b>Nombre del cliente:</b> Antony Edgar Rodas Zuñiga</p>
				<p><b>DNI/RUC:</b>70419828</p>
				<p><b>Dirección:</b> Av Resurreccion s/n</p>
			</div>
			<div class='col s6 right-align'>
				<p><b>N° de boleta:</b> 00031</p>
				<p><b>Fecha:</b> 30/06/2023</p>
			</div>
		</div>
		<table>
			<thead>
				<tr>
					<th>Producto</th>
					<th>Cantidad</th>
					<th>Precio unitario</th>
					<th>Subtotal</th>
				</tr>
			</thead>

			";
			 foreach ($detalle_venta as $detalle): 
			echo "
			<tbody>
				
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				
			</tbody>";
			endforeach;
			echo"
		</table>
		<div class='row'>
			<div class='col s6 right-align'>
				<p><b>Subtotal:</b> </p>
				<p><b>IGV:</b> </p>
				<p><b>Total:</b> </p>
			</div>
		</div>
	</div>
</body>
</html>";

echo '$html';

// Guardar el código HTML en un archivo
file_put_contents('boleta.html', $html);
