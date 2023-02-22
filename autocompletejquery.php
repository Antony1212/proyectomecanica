<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Autocomplete con Materialize y jQuery</title>
  <!-- Incluye los archivos CSS de Materialize -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
  <div class="container">
    <h2>Autocomplete con Materialize y jQuery</h2>
    <form method="post" action="procesar_formulario.php">
      <div class="row">
        <div class="input-field col s12">
          <input type="text" name="producto" id="producto-input" autocomplete="off">
          <label for="producto-input">Producto</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="text" name="usuario" id="usuario-input" autocomplete="off">
          <label for="usuario-input">Usuario</label>
        </div>
      </div>
      <button type="submit" class="btn">Enviar</button>
    </form>
  </div>
  <!-- Incluye los archivos JS de Materialize y jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>

    
    $(document).ready(function() {

      $.get("Vistas/Modulos/datos/obtener_datos.php", function(data) {
				console.log(data); // Imprimir la respuesta del servidor en la consola del navegador
				var datos = JSON.parse(data);

				// Crear un objeto para almacenar los datos de usuario en el formato esperado por autocomplete
				var datos_autocomplete = {"0 No Se Uso Productos": null};
				for (var i = 0; i < datos.length; i++) {
          var e=i+1;
					datos_autocomplete[datos[i].id_usuario + " " + datos[i].nombre + " " + datos[i].apellido+ " " + datos[i].roll] = null;
				}
        console.log(datos_autocomplete);
          // Inicializa el método autocomplete para el campo de productos
          const productos = ['Producto 1', 'Producto 2', 'Producto 3'];
          $('#producto-input').autocomplete({ data:  datos_autocomplete  });
        });    
          // Inicializa el método autocomplete para el campo de usuarios
          const usuarios = ['Usuario 1', 'Usuario 2', 'Usuario 3'];
          $('#usuario-input').autocomplete({ data:  usuarios  });
    });
  </script>
</body>

</html>


<script>

    
$(document).ready(function() {

  $.get("Vistas/Modulos/datos/obtener_datos.php", function(data) {
    console.log(data); // Imprimir la respuesta del servidor en la consola del navegador
    var datos = JSON.parse(data);

    // Crear un objeto para almacenar los datos de usuario en el formato esperado por autocomplete
    var datos_autocomplete = {"0 No Se Uso Productos": null};
    for (var i = 0; i < datos.length; i++) {
      var e=i+1;
      datos_autocomplete[datos[i].id_usuario + " " + datos[i].nombre + " " + datos[i].apellido+ " " + datos[i].roll] = null;
    }
    console.log(datos_autocomplete);
      // Inicializa el método autocomplete para el campo de productos
      const productos = ['Producto 1', 'Producto 2', 'Producto 3'];
      $('#producto-input').autocomplete({ data:  datos_autocomplete  });
    });
  });
 </script>

<script>
		$(document).ready(function() {

			// Hacer una solicitud AJAX para obtener los datos de usuario
			$.get("Vistas/Modulos/datos/obtener_datos.php", function(data) {
				console.log(data); // Imprimir la respuesta del servidor en la consola del navegador
				var datos = JSON.parse(data);

				// Crear un objeto para almacenar los datos de usuario en el formato esperado por autocomplete
				var datos_autocomplete = {};
				for (var i = 0; i < datos.length; i++) {
					datos_autocomplete[datos[i].id_usuario + " " + datos[i].nombre + " " + datos[i].apellido+ " " + datos[i].roll] = null;
				}
				console.log(datos_autocomplete);
				// Inicializar autocomplete con los datos obtenidos
				$('input.autocomplete').autocomplete({
					data: datos_autocomplete,
				});
			});
		});
	</script>