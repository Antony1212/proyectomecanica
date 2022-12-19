<body class="fondo-body">

	<div class="row">
		<div class="col s5">

		</div>
    	<div class="col s7">
			<div class= "col s12 m12 l5 offset-12 loginDiv">
				<div class="row loginContainer">
					<div class="col s10 m10 10 offset-l1 offset-m1">
						<div class="loginTitle">
							<h5>Session usuario </h5>
							<div class="col s12">
								<form method="post" action="">
								<div class="row">
									<div class="input-field col s12">
										<i class="material-icons prefix">account_circle</i>
										<input id="icon_prefix" type="text" class="validate" name="usuario">
										<label for="icon_prefix">Username</label>
									</div>
									<div class="input-field col s12">
										<i class="material-icons prefix">key</i>
										<input id="icon_telephone" type="Password" class="validate" name="contraseña">
										<label for="icon_telephone">Password</label>
									</div>

									<div class="input-field col s12">
										<div class="g-recaptcha" data-sitekey="6Lc714sjAAAAAOlNU1Rr9ZAwmSOhpzfO-8OqQ35w"></div>
									</div>
									<div class="col s12">
									<p>
										<label>
											<input id="indeterminate-checkbox" type="checkbox" />
											<span>Aceptas Nuestros Términos y Condiciones y Política de Tratamiento de Datos.</span>
										</label>
									</p>
								
									</div>	
									<div class="col s12">
										
										<button class="btn waves-effect waves-light" type="submit" name="action">Ingresar
											<i class="material-icons right">login</i>
										</button>
									</div>
								</form>
									
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