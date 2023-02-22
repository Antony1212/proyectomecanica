<?php
$registrar = new adminC();
$registrar->registroC();
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
      		Registro de Clientes
			<div class="clearfix"></div>
			*Todos los campos son obligatorios
    	</blockquote>
				
			<form method="post" id="registro">

				<div class="input-field col l6 col-m6">
					<i class="material-icons prefix">account_circle</i>
					<input type="text" name="nombres" id="nombres">
					<label for="nombres">Nombres</label>
				</div>

				<div class="input-field col l6 col-m6">
					<i class="material-icons prefix">account_circle</i>
					<input type="text" name="apellidos" id="apellidos">
					<label for="apellidos">Apellidos</label>
				</div>

				<div class="clearfix"></div>

				<div class="input-field col l4 col-m4">
					<i class="material-icons prefix">date_range</i>
					<input class="datepicker" type="text" name="fecha_nacimiento" id="fecha_nacimiento">
					<label for="fecha_nacimiento">Fecha de Registro</label>
				</div>

				<div class="input-field col l4 m4">
					<i class="material-icons prefix">directions</i>
					<input type="text" name="dirreccion" id="lugar_nacimiento">
					<label for="lugar_nacimiento">Direccion</label>
				</div>

				<div class="input-field col l4 m4">
					<i class="material-icons prefix">map</i>
					<select name="departamento">
						<option selected disabled>Departamento</option>
						<option value="1">Amazonas</option>
						<option value="2">Áncash</option>
						<option value="3">Apurímac</option>
						<option value="3">Arequipa</option>
						<option value="3">Ayacucho</option>
						<option value="3">Cajamarca</option>
						<option value="3">Prov. const. del Callao</option>
						<option value="3">Cuzco</option>
						<option value="3">Huancavelica</option>
						<option value="3">Huánuco</option>
						<option value="3">Ica</option>
						<option value="3">Junín</option>
						<option value="3">La Libertad</option>
						<option value="3">Departamento de Lima</option>
						<option value="3">Provincia de Lima</option>
						<option value="3">Madre de Dios</option>
						<option value="3">Pasco</option>
						<option value="3">Piura</option>
						<option value="3">Puno</option>
						<option value="3">San Martín</option>
						<option value="3">Tacna</option>
						<option value="3">Ucayali</option>
						

					</select>
				</div>
				<div class="clearfix"></div>
				<div class="input-field col l6 m6">
					<i class="material-icons prefix">email</i>
					<input type="email" name="correo" id="correo" class="validate">
					<label for="correo">Correo</label>
					<span class="helper-text" data-error="Escriba un correo válido." data-success="Correo válido">Su correo es muy importante para contactarlo</span>
				</div>
				

				<div class="input-field col l6 m6">
					<i class="material-icons prefix">payment</i>
					<input type="text" name="dni" id="dni">
					<label for="dni">Documento de Identidad</label>
				</div>
				<div class="clearfix"></div>
				
				
				<br>
				<div class="input-field col l12 m12">
					<i class="material-icons prefix">local_offer</i>
					<label>¿Desea recibir ofertas por correo?</label>
				</div>
				
				<div class="input-field col l6 m12">
					<div class="switch">
						<label>
							No
							<input type="checkbox" name="ofertas" value="1">
							<span class="lever"></span>
							Si
						</label>
					</div>
				</div>
				<br>
				<div class="clearfix "></div>
				<button type="submit" class="btn-flat waves-effect waves-green ">
					<i class="material-icons right ">check_circle</i>
					Registrar Usuario
				</button>
  			</form>
		
		
      </div>

	  </div> 
	  
    </div>








