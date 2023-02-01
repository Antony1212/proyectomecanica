<?php
$registrar = new EmpleadosC();
//$pagina = $empleados->mostrarEmpleadosC();
$registrar->registrarEmpleadosC();
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
	  <br>
	  	<div class="card-panel grey lighten-5 ">
		  <blockquote>
      		Registro de Mecanicos
			<div class="clearfix"></div>
			*Todos los campos son obligatorios
    	</blockquote>
				
			<form method="post" id="registro">
				<div class="input-field col l6 col-m6 s12">
					<i class="material-icons prefix">credit_card</i>
					<input type="text" name="dni" id="dni" required>
					<label for="dni">Documento De Identidad</label>
				</div>
				<div class="input-field col l6 col-m6 s12">
					<i class="material-icons prefix">engineering</i>
					<input type="text" name="nombres" id="nombres" required>
					<label for="nombres">Nombres</label>
				</div>
				<div class="input-field col l6 col-m6 s12">
					<i class="material-icons prefix">account_circle</i>
					<input type="text" name="apellidos" id="apellidos">
					<label for="apellidos">Apellidos</label>
				</div>
				<div class="clearfix"></div>
				<div class="input-field col l4 col-m4 s12">
					<i class="material-icons prefix">date_range</i>
					<input class="datepicker" type="text" name="fecha_nacimiento" id="fecha_nacimiento">
					<label for="fecha_nacimiento">Fecha de Registro</label>
				</div>
				<div class="input-field col l4 m4 s12">
					<i class="material-icons prefix">directions</i>
					<input type="text" name="lugar_nacimiento" id="lugar_nacimiento">
					<label for="lugar_nacimiento">Direccion</label>
				</div>
				<div class="input-field col l4 m4 s12">
					<i class="material-icons prefix">groups_2</i>
					<select name="Equipo">
						<option selected disabled>Asignar a un equipo</option>
						<option value="1">grupo 1</option>
						<option value="2">grupo 2</option>
						<option value="3">grupo 3</option>
						<option value="3">crear nuevo grupo</option>
					</select>
				</div>
				
				

				<div class="input-field col l6 m6 s12">
				<i class="material-icons prefix">engineering</i>
					<select name="pais">
						<option selected disabled>Rango De Mecanico</option>
						<option value="1" >Jefe De Mecanicos</option>
						<option value="2">Mecanico</option>
						<option value="3">Practicante de mecanico</option>
					</select>
				</div>
				
				
				<div class="file-field input-field col l6 m6 s12">
					<div class="btn waves-effect waves-yellow">
						<span>Foto</span>
						<input type="file" multiple>
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text" placeholder="Añadir foto  De Mecanico">
					</div>
					</div>
				
				<br>
				
				
				<br>
				<div class="clearfix "></div>
				<button type="submit" class="btn-flat waves-effect waves-green ">
					<i class="material-icons right ">check_circle</i>
					Registrar Mecanico
				</button>
  			</form>
		
		
      </div>

	  </div> 
	  
    </div>





