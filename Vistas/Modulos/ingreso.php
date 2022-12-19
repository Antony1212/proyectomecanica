<body class="fondo-body">
	<div class="row">
	
	<div class="col s1">
			
			</div>

    <div class="col s12">

		
		<div class="row">

		
			<div class= "col s12 m12 l4 offset-12 loginDiv">
				<div class="row loginContainer">
					
					<div class="col s10 m10 10 offset-l1 offset-m1">
						<div class="loginTitle">
							<h5>Introdusca la placa del vehiculo</h5>
							<div class="col s12">
							<form method="post" action="">
								<div class="input-field col s12">
									<div class="col s10">
										<input id="email" type="email" class="validate"  name="usuarioI" required>
										<label for="email">Introdusca Su Placa</label>
									</div>
									<div class="col s2">
										<button class="btn waves-effect waves-light findbtn" type="submit" value="Ingresar"  ><i class="material-icons right center-align">send</i></button>
									</div>
								</div>	
							</form>
									
								</div>
								
							
								
								
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