<?php
$empleados = new EmpleadosC();

$empleados->prueba();


?>  <!-- Vistas/Modulos/empleados.php -->
 <div class="row">
 <form method="post" id="registro">
    <div class="col s12">
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">textsms</i>
          <input type="text" id="autocomplete-input" class="autocomplete" name="busqueda">
          <label for="autocomplete-input">Busqueda de usuario</label>
          <div class="clearfix "></div>
				<button type="submit" class="btn-flat waves-effect waves-green ">
					<i class="material-icons right ">check_circle</i>
					
				</button>
        </div>
      </div>
    </div>
  </div>
        