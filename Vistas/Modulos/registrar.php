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

      <div class="col s12 m4 l4"> 

	  <?php

		include 'menu.php';

	  ?>
	   

      </div>

	  

      <div class="col s12 m8 l8">

	  
		<form method="post" action="">
			<input type="text" placeholder="Nombre" name="nombreR" required>
			<input type="text" placeholder="Apellido" name="apellidoR" required>
			<input type="email" placeholder="Email" name="emailR" required>
			<input type="text" placeholder="Puesto" name="puestoR" required>
			<input type="text" placeholder="Salario" name="salarioR" required>
			<input type="submit" value="Registrar">
		</form>

      </div>

	  
	  
    </div>








