<!DOCTYPE html>  <!-- Vistas/plantilla.php-->
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>CRUD</title>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<link rel="stylesheet" type="text/css" href="Vistas/css/estilos.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
	
	
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	

	
	
	
	<!--<link rel="stylesheet" type="text/css" href="Vistas/css/estilos.css">-->

	<script type="text/javascript" >
	var slider = document.getElementById('test-slider');
  noUiSlider.create(slider, {
   start: [20, 80],
   connect: true,
   step: 1,
   orientation: 'horizontal', // 'horizontal' or 'vertical'
   range: {
     'min': 0,
     'max': 100
   },
   format: wNumb({
     decimals: 0
   })
  });
</script>
		


	<script type="text/javascript" >
		document.addEventListener('DOMContentLoaded', function() {
    	var elems = document.querySelectorAll('.dropdown-trigger');
    	var instances = M.Dropdown.init(elems,{
			coverTrigger: false,
			constrainWidth: false
		});
		
  });
	</script>

	
  <script >
	$(document).ready(function(){
    $('.datepicker').datepicker({

		format:'yyyy-m-dd'
	});
  });
  </script>

  
	<script >
		$(document).ready(function(){
    $('select').formSelect();
		});
	</script>
	<script >
		$(document).ready(function(){
			$('.collapsible').collapsible();
		});
	</script>
		

	<script >
		$(document).ready(function(){
		$('#btn-flotante').floatingActionButton();
		$('#btn-flotante').floatingActionButton({
    	toolbarEnabled: true
  		});
		});
	</script>

	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

	<script >
		$(document).ready(function(){
    	$('.sidenav').sidenav();
		
		$('.collapsible').collapsible(
			
		);
		$('.carousel').carousel();

		$('#textarea1').val('');
  		M.textareaAutoResize($('#textarea1'));
  		});

		$(document).ready(function(){
    		$('.tooltipped').tooltip();
  		});

		$(document).ready(function(){
			$('.materialboxed').materialbox();
		});

		$(document).ready(function() {
    		M.updateTextFields();
 		});

		 $(document).ready(function() {
    		$('input#input_text, textarea#textarea2').characterCounter();
 		 });
		 
		  $(document).ready(function(){
			$('.tabs').tabs();
		});
		
		$(document).ready(function() {
			M.updateTextFields();
		});  
	</script>

</head>
<body>
	<?php
		session_start();
		$rutasC = new RutasC();
		
	?>	<section>

		<?php
			$modulo = $rutasC->procesaRutasC();
			include $modulo;
		?>	</section>

</body>
</html>