<?php
$registrar = new EmpleadosC();
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
      		Registro de Vehiculos
			<div class="clearfix"></div>
			*Todos los campos son obligatorios
    	</blockquote>
				
			<form method="post" id="registro" enctype='multipart/form-data'>
				<div class="input-field col l6 col-m6 s12">
					<i class="material-icons prefix">person_outline</i>
					<input type="text" name="dni" id="dni">
					<label for="dni">Documento de identidad de dueño</label>
				</div>
				<div class="input-field col l6 col-m6 s12">
					<i class="material-icons prefix">king_bed</i>
					<input type="text" name="placa" id="placa">
					<label for="placa">Placa Del Vehiculo</label>
				</div>
				<div class="input-field col l6 col-m6 s12">
					<i class="material-icons prefix">king_bed</i>
					<input type="text" name="modelo" id="modelo">
					<label for="modelo">Modelo</label>
				</div>

				<div class="input-field col l6 col-m6 s12">
				<i class="material-icons prefix">pending_actions</i>
          			<textarea id="Detalles" class="materialize-textarea" name="Detalles"></textarea>
          			<label for="Detalles">Detalles</label>
        		</div>

				<div class="clearfix"></div>

				<div class="input-field col l6 m6 s12">
				<i class="material-icons prefix">engineering</i>
					<select name="tipo">
						<option selected disabled>Tipo De Vehiculo</option>
						<option value="1">	Autobús</option>
						<option value="2">Camión</option>
						<option value="3">Camioneta/Furgoneta</option>
						<option value="3">Auto</option>
						<option value="3">Motosicleta</option>
					</select>
				</div>
				<div class="clearfix"></div>
				
				<div class="file-field input-field col l6 m6 s12">
					<div class="btn waves-effect waves-yellow">
						<span>Foto</span>
						<input type="file" name="foto" size='10'>
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text" placeholder="Añadir foto  De Vehiculo o Imagen de referencia">
					</div>
					</div>
				
				<br>
				
				
				<br>
				<div class="clearfix "></div>
				<button type="submit" class="btn-flat waves-effect waves-green ">
					<i class="material-icons right ">check_circle</i>
					Registrar Vehiculo
				</button>
  			</form>
		
		
      </div>

	  </div> 
	  
    </div>














