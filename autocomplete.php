<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Autocomplete con Materialize</title>
  <!-- Incluye los archivos CSS de Materialize -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
  <div class="container">
    <h2>Autocomplete con Materialize</h2>
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
  <!-- Incluye los archivos JS de Materialize -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    // Inicializa el método autocomplete para el campo de productos
   
   
    var datos = ([{"id_usuario":"12345","nombre":"a","roll":"Cliente","apellido":"a"},{"id_usuario":"12121213","nombre":"hola","roll":"Mecanico","apellido":"prueba"},{"id_usuario":"12343211","nombre":"pruebaimagen","roll":"Mecanico","apellido":"Zu\u00f1iga"},{"id_usuario":"40097514","nombre":"Julia Zu\u00f1iga","roll":"Cliente","apellido":"Martinez"},{"id_usuario":"70419828","nombre":"Antony Edgar","roll":"administrador","apellido":"Zu\u00f1iga"},{"id_usuario":"73582751","nombre":"Esthefanny ","roll":"Mecanico","apellido":"Ayma Delgado"},{"id_usuario":"2147483647","nombre":"ARIOS PERU SAC","roll":"Empresa","apellido":""}]);
    var datos_autocomplete = {};
    for (var i = 0; i < datos.length; i++) {
					datos_autocomplete[datos[i].id_usuario + " " + datos[i].nombre + " " + datos[i].apellido+ " " + datos[i].roll] = null;
				}
    
    console.log(datos_autocomplete);
    const productoInput = document.getElementById('producto-input');
    M.Autocomplete.init(productoInput, { data:  datos_autocomplete  });

    // Inicializa el método autocomplete para el campo de usuarios
    var usuarios = ['Usuario 1', 'Usuario 2', 'Usuario 3'];
    const usuarioInput = document.getElementById('usuario-input');
    M.Autocomplete.init(usuarioInput, { data:  usuarios  });
  </script>
</body>
</html>