
<?php
$empleados = new EmpleadosC();
$pagina = $empleados->VerReparacionesC();

$registrar = new EmpleadosC();
$registrar->FinReparacionC();


?>  <!-- Vistas/Modulos/empleados.php -->
<div class="row">

<div class="col s12"> 
	<?php
		include 'barra.php';
	?>
</div>

<div class="col s12 m12 l3"> 
	<?php
		include 'menu.php';
	?>
</div>
<div class="col s12 m12 l6">
<?php foreach($pagina as $key => $value): ?>
    
        <div class="col s12  m10">
            <div class="card horizontal">
                <div class="card-image">
                    <img src="Vistas/css/imagenes/<?=$value['Imagen']?>" width="300" height="300">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <h6><?=$value['Modelo']?> <?=$value['Placa_vehiculo']?></h6>
                    </div>
                    <div class="card-action">
                        <table>
                            <tr>
                                <td>Estado:</td>
                                <td><?=$value['estado']?></td>
                            </tr>
                            <tr>
                                <td>Detalles:</td>
                                <td><?=$value['Detalles']?></td>
                            </tr>
                        </table>
                    </div>
                    <table class="responsive-table">
                        <tbody>
                            <td>
							<form method="post"  enctype='multipart/form-data' >
								<input type="hidden" name="Fin" value="<?=$value['id_reparacion']?>">	
                                    <button class="btn waves-effect waves-light blue lighten-2 black-text" id="btn">Finalizar Reparacion<i class="material-icons left">construction</i></button>
                            
                                    
                                </form>
                                <a href="#"><button class="btn waves-effect waves-light blue lighten-2 black-text mostrar-card" id="btn-mostrar-card">Agregar Detalles<i class="material-icons left">construction</i></button>
                            </a>
                                
                        </tbody>
                    </table>
                </div>	
            </div>
        </div>
        
    
<?php endforeach; ?>
</div>
<div class="col s12 m12 l3"> 
<div id="contenedor-card" style="display: none;">
  <div class="card">
    <div class="card-content">
      <span class="card-title">Agregar Detalles</span>
      <p>Este Boton nos redirige a una pagina donde podemos indicar los detalles que se realizo al vehiculo Durante la reparacion Este paso Es Antes De Culminar el estado de la reparacion</p>
    </div>
  </div>
</div>  
</div>
	
	


<script>
	$(document).ready(function() {
  // Configurar el toast
  $('.tooltipped').tooltip();
  
  // Mostrar el toast en el evento mouseenter
  $('#btn').on('mouseenter', function() {
    M.toast({html: 'El Estado de la reparacion se actualizara a Reparacion terminada Y se Notificara al usuario', classes: 'black-text blue lighten-2'});
  });
  
  // Ocultar el toast en el evento mouseleave
  $('#btn1').on('mouseleave', function() {
    var toastElement = $('.toast');
    var toastInstance = toastElement[0].M_Toast;
    toastInstance.dismiss();
  });
});

</script>

<script>
$(document).ready(function() {
  // Al pasar el mouse sobre el botón, mostrar el card
  $('#btn-mostrar-card').mouseover(function() {
    $('#contenedor-card').show();
  });
  
  // Al quitar el mouse del botón, ocultar el card
  $('#btn-mostrar-card').mouseout(function() {
    $('#contenedor-card').hide();
  });
});

	
</script>