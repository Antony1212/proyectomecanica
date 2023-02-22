<?php
$empleados = new EmpleadosC();
$pagina = $empleados->detallevehiculoC();

$registrocotizacion = new EmpleadosC();
$registrocotizacion->CrearCotizacionC();

$cotizacionllenada=$_GET['cotizacionllenada'];
$descrip=$_GET['descrip'];
$reparacio=$_GET['reparacion'];
date_default_timezone_set("America/Lima");
$fechacotizacion= date('Y-m-d H:i:s');

?>


<div class="row">

	<div class="col s12"> 
		<?php
		include 'barra.php';
		?>
	</div>

    <div class="col s12 m12 l4"> 

	  <?php

		include 'menu.php';

	  ?>
	   

    </div>
	<div class="col s12 m12 l6">
		<h2 class="center-align">Cotizacion De Reparacion</h2>
		<?php foreach($pagina as $key => $value): ?>
		<div class="row">
			<div class="col s6">
				<p><b>Nombre del cliente:</b> <?=$value['nombre']?> <?=$value['apellido']?></p>
				<p><b>Placa De Vehiculo: </b> <?=$value['Placa_vehiculo']?></p>
				<p><b>Dirección:</b> <?=$value['direccion']?></p>
                <p><b>Ingreso:</b><?=$descrip?></p>
			</div>
			<div class="col s6 right-align">
				
				<p><b>Fecha:</b><?=$fechacotizacion?></p>
			</div>
		</div>
		<?php endforeach; ?>
        
        <p><b></b> </p>
		<p><b>Ingresar los productos y servicios estimados y el costo por La reparacion del vehiculo:</b> </p>
		<div class="row">
		
		<form id="formulario"  method="post" enctype='multipart/form-data'>
		    
		    <input type="hidden" name="Cotizacion" value="<?=$reparacio?>">
			<div id="campos">
				
			</div>
			<div class="input-field col s12">
				<input type="text" name="precio_total" id="precio-total" readonly>
				Precio total
			</div>
            <input type="hidden" name="id_Cotizacion" value="<?=$cotizacionllenada?>">
			<div class="col s12 m12 l12">
				
			<button class=" btn waves-effect waves-green green lighten-5 black-text" id="agregar-campo"><i class="material-icons left">add_shopping_cart</i>Insertar Datos A la Cotizacion</button>
			<button class="btn waves-effect waves-green green lighten-5 black-text" type="button" id="btn-generar-cotizacion" name="CrearPresupuesto"><i class="material-icons left">request_quote</i>Generar Cotizacion</button>
			
		</form>
		</div>
		</div>
		
	</div>
	</div>

	<div id="modal-confirmacion" class="modal">
    <div class="modal-content">
        <h4>Confirmar generación de cotización</h4>
        <p>¿Estás seguro de que deseas generar la cotización?</p>
		<p>Recuerda que la generacion tambien es enviada al cliente para que pueda Autorizar la reparacion De Su Vehiculo</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
        <a href="#!" class="waves-effect waves-green btn-flat" id="btn-confirmar-generacion">Confirmar</a>
    </div>
</div>
	<script>
    $(document).ready(function() {
        var contadorCampos = 0;

        $('#agregar-campo').click(function() {
            contadorCampos++;

            var nuevoCampo = '<div class="col s12" id="campo-' + contadorCampos + '">' +
            '<div class="input-field col l6 col-m6">' +
            '<input id="producto-' + contadorCampos + '" type="text" name="producto-' + contadorCampos + '" required>' +
            '<label for="producto-' + contadorCampos + '">Producto  o servicio ' + contadorCampos + '</label>' +
            '</div>' +
            '<div class="input-field col l3 col-m3">' +
            '<input id="cantidad-' + contadorCampos + '" type="number" name="cantidad-' + contadorCampos + '" required>' +
            '<label for="cantidad-' + contadorCampos + '">Cantidad ' + contadorCampos + '</label>' +
            '</div>' +
            '<div class="input-field col l3 col-m3">' +
            '<input id="precio-' + contadorCampos + '" type="number" name="precio-' + contadorCampos + '" required>' +
            '<label for="precio-' + contadorCampos + '">Precio ' + contadorCampos + '</label>' +
            '</div>' +
            '</div>';

            $('#campos').append(nuevoCampo);

            // Agregar eventos blur a los campos de cantidad y precio
            $('#cantidad-' + contadorCampos).blur(function() {
                actualizarPrecioTotal();
            });
            $('#precio-' + contadorCampos).blur(function() {
                actualizarPrecioTotal();
            });
        });
    });

    function actualizarPrecioTotal() {
        var total = 0;

        $('input[name^="precio-"]').each(function() {
            var precio = parseFloat($(this).val()) || 0;
            var cantidad = parseInt($(this).closest('div[id^="campo-"]').find('input[name^="cantidad-"]').val()) || 0;

            total += precio * cantidad;
        });

        $('#precio-total').val(total.toFixed(2));
    }
</script>


<script>
    $(document).ready(function() {
    // ...

    // Mostrar modal al hacer clic en botón de generar cotización
    $('#btn-generar-cotizacion').click(function() {
        $('#modal-confirmacion').modal('open');
    });

    // Confirmar generación de cotización al hacer clic en botón de confirmar del modal
    $('#btn-confirmar-generacion').click(function() {
        $('#formulario').submit();
    });
});

$(document).ready(function() {
    // ...

    // Inicializar modal
    $('#modal-confirmacion').modal();
});
</script>