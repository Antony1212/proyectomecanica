<body class="fondo-body">
	<div class="row">
		
    <div class="col s12">

		
		<div class="row">
		
			<div class= "col s12 m12 l8 offset-12 loginDiv">
				<div class="row loginContainer">
					
					<div class="col s12 m5 l5 offset-l1 offset-m1">
						<div class="loginTitle">
							<h5>Inicio de Session sistema de ventas</h5>
							<div class="col s12">

								<form method="post" action="">
			
								<div class="row">
								<div class="input-field col s12">
									<input id="email" type="email" class="validate"  name="usuarioI" required>
									<label for="email">Introdusca Su Correo</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input id="password" type="password" class="validate"  name="claveI" required>
									<label for="password">Introdusca Su Contraseña</label>
								</div>
							</div>
									<button class="btn waves-effect waves-light findbtn" type="submit" value="Ingresar"  >Ingresar<i class="material-icons right">send</i></button>
									
								</form>
							
								
								
							</div>
						</div>
					</div>
	
				</div>
			</div>	
		</div>
	</div>	
		
	 
 </div>
    
</body>




<?php
$ingreso = new AdminC();
$ingreso->IngresoC();
?>