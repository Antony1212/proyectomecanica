
	<?php if($rutasC->sesionIniciadaC()): ?>
		
	<?php else: ?>
    <?php 
  if (isset($_SESSION['username']))

  {
   
    $roll=$_SESSION['roll'];
    
   
  }

  if ($roll == "Cliente" || $roll == "Empresa")
   
   {
    if ($roll == "Cliente") {
      $A=$_SESSION['apellido'];
    $C=$_SESSION['username'];
   $N=$_SESSION['nombre'];


      
    }else{
      $A=" ";
      $C=$_SESSION['username'];
     $N=$_SESSION['nombre'];

    }
    
   
  ?>
  <ul id="sidenav-left" class="sidenav sidenav-fixed" style="transform: translateX(-105%);">
  <li>
				<div class="user-view">
					<div class="background">
					<img src="Vistas/css/imagenes/fondopequeño.jpg" alt="">
					</div>
					<a href="#" class="circle">
						<img src="Vistas/css/imagenes/logo.png" alt="" class="circle"></a>
                <a href="#name"><span class="black-text name"><b><?="$N $A"?></b></span></a>
                <a href="#email"><span class="black-text email"><b><?="$C"?></b></span></a>
      					<a href="#roll"><span class="black-text email"><b><?="$roll"?></b></span></a>
				</div>
			</li>   
  
      
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <div class="search-wrapper">
            
            <div class="search-results"></div>
          </div>
		  
            <li class="bold waves-effect col s12"><a class="collapsible-header" tabindex="0">Vehiculos<i class="material-icons chevron">chevron_left</i></a>
              <div class="collapsible-body" >
                <ul>
                  <li><a href="index.php?ruta=vehiculo1" class="waves-effect active">Seguimiento de Reparaciones<i class="material-icons">precision_manufacturing</i></a></li>
                  <li><a href="index.php?ruta=Confirmar" class="waves-effect">Confirmar Reparacion<i class="material-icons">check</i></a></li>
                    
                </ul>
              </div>
            </li>
			
			
           <!-- <li class="bold waves-effect  col s12"><a class="collapsible-header" tabindex="0">Charts<i class="material-icons chevron">chevron_left</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="/pages/admin-line-charts" class="waves-effect">Line Charts<i class="material-icons">show_chart</i></a></li>
                  <li><a href="/pages/admin-bar-charts" class="waves-effect">Bar Charts<i class="material-icons">equalizer</i></a></li>
                  <li><a href="/pages/admin-area-charts" class="waves-effect">Area Charts<i class="material-icons">multiline_chart</i></a></li>
                  <li><a href="/pages/admin-doughnut-charts" class="waves-effect">Doughnut Charts<i class="material-icons">pie_chart</i></a></li>
                  <li><a href="/pages/admin-financial-charts" class="waves-effect">Financial Charts<i class="material-icons">euro_symbol</i></a></li>
                  <li><a href="/pages/admin-interactive-charts" class="waves-effect">Interactive Charts<i class="material-icons">touch_app</i></a></li>
                </ul>
              </div>
            </li>
			
            <li class="bold waves-effect  col s12"><a class="collapsible-header" tabindex="0">Tables<i class="material-icons chevron">chevron_left</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="/pages/admin-fullscreen-table" class="waves-effect">Fullscreen with Chart<i class="material-icons">show_chart</i></a></li>
                  <li><a href="/pages/admin-table-custom-elements" class="waves-effect">Table with Custom Elements<i class="material-icons">settings</i></a></li>
                </ul>
              </div>
            </li>
            <li class="bold waves-effect  col s12"><a class="collapsible-header" tabindex="0">Calendar<i class="material-icons chevron">chevron_left</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="/pages/admin-calendar" class="waves-effect">Calendar<i class="material-icons">cloud</i></a></li>
                </ul>
              </div>
            </li>
            <li class="bold waves-effect  col s12"><a class="collapsible-header" tabindex="0">Headers<i class="material-icons chevron">chevron_left</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="/pages/admin-header-tabbed" class="waves-effect">Tabbed<i class="material-icons">tab</i></a></li>
                  <li><a href="/pages/admin-header-metrics" class="waves-effect">Metrics<i class="material-icons">web</i></a></li>
                  <li><a href="/pages/admin-header-search" class="waves-effect">Search<i class="material-icons">search</i></a></li>
                </ul>
              </div>
            </li>-->
            <li class="bold waves-effect  col s12"><a class="collapsible-header" tabindex="0">Account<i class="material-icons chevron">settings</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="/pages/admin-settings" class="waves-effect">Ver Pefil<i class="material-icons">account_circle</i></a></li>
                  <li><a href="index.php?ruta=salir" class="waves-effect">Salir<i class="material-icons">logout</i></a></li>
                  
                </ul>
              </div>
            </li>
          </ul>
        </li>
      </ul>

  <?php
   }if ($roll == "vehiculo")
   {
    $C=$_SESSION['username'];
    $N=$_SESSION['nombre'];
    $A=$_SESSION['apellido'];
    
  ?>
  <ul id="sidenav-left" class="sidenav sidenav-fixed" style="transform: translateX(-105%);">
  <li>
				<div class="user-view">
					<div class="background">
					<img src="Vistas/css/imagenes/fondopequeño.jpg" alt="">
					</div>
					<a href="#" class="circle">
						<img src="Vistas/css/imagenes/<?="$A"?>" alt="" class="circle"></a>
                <a href="#name"><span class="black-text name"><b><?="$C"?></b></span></a>
                <a href="#email"><span class="black-text email"><b><?="$N"?></b></span></a>
      					<a href="#roll"><span class="black-text email"><b><?="$roll"?></b></span></a>
				</div>
			</li>   
  
      
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <div class="search-wrapper">
            
            <div class="search-results"></div>
          </div>
		  
            <!--<li class="bold waves-effect col s12"><a class="collapsible-header" tabindex="0">Pages<i class="material-icons chevron">chevron_left</i></a>
              <div class="collapsible-body" >
                <ul>
                  <li><a href="/pages/admin-dashboard" class="waves-effect active">Dashboard<i class="material-icons">web</i></a></li>
                  <li><a href="/pages/admin-fixed-chart" class="waves-effect">Fixed Chart<i class="material-icons">list</i></a></li>
                  <li><a href="/pages/admin-grid" class="waves-effect">Grid<i class="material-icons">dashboard</i></a></li>
                  <li><a href="/pages/admin-chat" class="waves-effect">Chat<i class="material-icons">chat</i></a></li>
                </ul>
              </div>
            </li>
			
			
            <li class="bold waves-effect  col s12"><a class="collapsible-header" tabindex="0">Charts<i class="material-icons chevron">chevron_left</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="/pages/admin-line-charts" class="waves-effect">Line Charts<i class="material-icons">show_chart</i></a></li>
                  <li><a href="/pages/admin-bar-charts" class="waves-effect">Bar Charts<i class="material-icons">equalizer</i></a></li>
                  <li><a href="/pages/admin-area-charts" class="waves-effect">Area Charts<i class="material-icons">multiline_chart</i></a></li>
                  <li><a href="/pages/admin-doughnut-charts" class="waves-effect">Doughnut Charts<i class="material-icons">pie_chart</i></a></li>
                  <li><a href="/pages/admin-financial-charts" class="waves-effect">Financial Charts<i class="material-icons">euro_symbol</i></a></li>
                  <li><a href="/pages/admin-interactive-charts" class="waves-effect">Interactive Charts<i class="material-icons">touch_app</i></a></li>
                </ul>
              </div>
            </li>
			
            <li class="bold waves-effect  col s12"><a class="collapsible-header" tabindex="0">Tables<i class="material-icons chevron">chevron_left</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="/pages/admin-fullscreen-table" class="waves-effect">Fullscreen with Chart<i class="material-icons">show_chart</i></a></li>
                  <li><a href="/pages/admin-table-custom-elements" class="waves-effect">Table with Custom Elements<i class="material-icons">settings</i></a></li>
                </ul>
              </div>
            </li>
            <li class="bold waves-effect  col s12"><a class="collapsible-header" tabindex="0">Calendar<i class="material-icons chevron">chevron_left</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="/pages/admin-calendar" class="waves-effect">Calendar<i class="material-icons">cloud</i></a></li>
                </ul>
              </div>
            </li>
            <li class="bold waves-effect  col s12"><a class="collapsible-header" tabindex="0">Headers<i class="material-icons chevron">chevron_left</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="/pages/admin-header-tabbed" class="waves-effect">Tabbed<i class="material-icons">tab</i></a></li>
                  <li><a href="/pages/admin-header-metrics" class="waves-effect">Metrics<i class="material-icons">web</i></a></li>
                  <li><a href="/pages/admin-header-search" class="waves-effect">Search<i class="material-icons">search</i></a></li>
                </ul>
              </div>
            </li>-->
            <li class="bold waves-effect  col s12"><a class="collapsible-header" tabindex="0">Account<i class="material-icons chevron">settings</i></a>
              <div class="collapsible-body">
                <ul>
                  
                  <li><a href="index.php?ruta=salir" class="waves-effect">Salir<i class="material-icons">logout</i></a></li>
                  
                </ul>
              </div>
            </li>
          </ul>
        </li>
      </ul>

  <?php
   }if ($roll == "administrador")
   {
    $C=$_SESSION['username'];
   $N=$_SESSION['nombre'];
   $A=$_SESSION['apellido'];
  ?>
  <ul id="sidenav-left" class="sidenav sidenav-fixed" style="transform: translateX(-105%);">
  <li>
				<div class="user-view">
					<div class="background">
					<img src="Vistas/css/imagenes/fondopequeño.jpg" alt="">
					</div>
					<a href="#" class="circle">
						<img src="Vistas/css/imagenes/logo.png" alt="" class="circle"></a>
                <a href="#name"><span class="black-text name"><b><?="$N $A"?></b></span></a>
                <a href="#email"><span class="black-text email"><b><?="$C"?></b></span></a>
      					<a href="#roll"><span class="black-text email"><b>administrador</b></span></a>
				</div>
			</li>   
  
      
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <div class="search-wrapper">
            
            <div class="search-results"></div>
          </div>
		  
            <li class="bold waves-effect col s12"><a class="collapsible-header" tabindex="0">Registro<i class="material-icons chevron">app_registration</i></a>
              <div class="collapsible-body" >
                <ul>
                  <li><a href="index.php?ruta=registrarempresa" class="waves-effect active">Registrar Emplesa<i class="material-icons">domain_add</i></a></li>
                  <li><a href="index.php?ruta=registrar" class="waves-effect active">Registro de cliente<i class="material-icons">person_add</i></a></li>
                  <li><a href="index.php?ruta=registrarplaca" class="waves-effect">Registro De Vehiculo<i class="material-icons">directions_car</i></a></li>
                  <li><a href="index.php?ruta=registrarmecanico" class="waves-effect">Registro De Mecanico<i class="material-icons">engineering</i></a></li>
                  
                </ul>
              </div>
            </li>
            
            <li class="bold waves-effect  col s12"><a class="collapsible-header" tabindex="0">Administracion y Asignacion<i class="material-icons chevron">build</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="index.php?ruta=asignacion" class="waves-effect">Asignacion De Vehiculos<i class="material-icons">car_rental</i></a></li>
                  <li><a href="/pages/admin-chat" class="waves-effect">Administracion de Mecanicos<i class="material-icons">chat</i></a></li>
                  <li><a href="index.php?ruta=Vistacotizacion" class="waves-effect">Enviar Cotizacion<i class="material-icons">price_check</i></a></li>
                </ul>
              </div>
            </li>
			 
            <li class="bold waves-effect  col s12"><a class="collapsible-header" tabindex="0">Reportes<i class="material-icons chevron">chevron_left</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="index.php?ruta=reportevehiculos" class="waves-effect">Reparaciones del mess<i class="material-icons">show_chart</i></a></li>
                 
                </ul>
              </div>
            </li>
			
          <!-- 
            <li class="bold waves-effect  col s12"><a class="collapsible-header" tabindex="0">Calendar<i class="material-icons chevron">chevron_left</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="/pages/admin-calendar" class="waves-effect">Calendar<i class="material-icons">cloud</i></a></li>
                </ul>
              </div>
            </li>
            <li class="bold waves-effect  col s12"><a class="collapsible-header" tabindex="0">Headers<i class="material-icons chevron">chevron_left</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="/pages/admin-header-tabbed" class="waves-effect">Tabbed<i class="material-icons">tab</i></a></li>
                  <li><a href="/pages/admin-header-metrics" class="waves-effect">Metrics<i class="material-icons">web</i></a></li>
                  <li><a href="/pages/admin-header-search" class="waves-effect">Search<i class="material-icons">search</i></a></li>
                </ul>
              </div>
            </li>-->
            <li class="bold waves-effect  col s12"><a class="collapsible-header" tabindex="0">Account<i class="material-icons chevron">settings</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="/pages/admin-settings" class="waves-effect">Ver Pefil<i class="material-icons">account_circle</i></a></li>
                  <li><a href="index.php?ruta=salir" class="waves-effect">Salir<i class="material-icons">logout</i></a></li>
                  
                </ul>
              </div>
            </li>
          </ul>
        </li>
      </ul>

  <?php
   }if ($roll == "Mecanico")
   {
    $empleados = new EmpleadosC();
    $o22 = $empleados->mostrarRoll1C();



    $C=$_SESSION['username'];
    $N=$_SESSION['nombre'];
    $A=$_SESSION['apellido'];
    $F=$_SESSION['foto'];
    $Rango1=$_SESSION['rango'];
    
    switch ($Rango1) {
      case '1':
        $R="Jefe De Mecanicos";
        break;
      case '2':
        $R="Mecanico";
        break;
      case '3':
        $R="Practicante de mecanico";
        break;
     
    }
    
    
  ?>
  <ul id="sidenav-left" class="sidenav sidenav-fixed" style="transform: translateX(-105%);">
  <li>
				<div class="user-view">
					<div class="background">
					<img src="Vistas/css/imagenes/fondopequeño.jpg" alt="">
					</div>
					<a href="#" class="circle">
						<img src="Vistas/css/imagenes/<?="$F"?>" alt="" class="circle"></a>
                <a href="#name"><span class="black-text name"><b><?="$N $A"?></b></span></a>
                <a href="#email"><span class="black-text email"><b><?="$C"?></b></span></a>
      					<a href="#roll"><span class="black-text name"><b><?="$R"?></b></span></a>
              <?php foreach($o22 as $key => $l123): ?>
                <a href="#roll"><span class="black-text email"><b><?=$l123['Nombregrupo']?></b></span></a>
              <?php endforeach; ?> 
              </div>
			</li>   
  
      
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <div class="search-wrapper">
            
            <div class="search-results"></div>
          </div>
		  
           <li class="bold waves-effect col s12"><a class="collapsible-header" tabindex="0">Vehiculos<i class="material-icons chevron">directions_car</i></a>
              <div class="collapsible-body" >
                <ul>
                  <li><a href="index.php?ruta=Vehiculos" class="waves-effect active">Vehiculos Asignados<i class="material-icons">commute</i></a></li>
                  <li><a href="index.php?ruta=Presupuesto" class="waves-effect">Estimacion De Presupuesto<i class="material-icons">attach_money</i></a></li>
                  <li><a href="index.php?ruta=Preparaciones" class="waves-effect">Presupuestos Aceptados<i class="material-icons">price_check</i></a></li>
                  <li><a href="index.php?ruta=Reparacionesiniciadas" class="waves-effect">Act. Est. Vehi. en Reparacion<i class="material-icons">car_repair</i></a></li>
                  
                </ul>
              </div>
            </li>
			
			
             <!--<li class="bold waves-effect  col s12"><a class="collapsible-header" tabindex="0">Charts<i class="material-icons chevron">chevron_left</i></a>
              <div class="collapsible-body">0
                <ul>
                  <li><a href="/pages/admin-line-charts" class="waves-effect">Line Charts<i class="material-icons">show_chart</i></a></li>
                  <li><a href="/pages/admin-bar-charts" class="waves-effect">Bar Charts<i class="material-icons">equalizer</i></a></li>
                  <li><a href="/pages/admin-area-charts" class="waves-effect">Area Charts<i class="material-icons">multiline_chart</i></a></li>
                  <li><a href="/pages/admin-doughnut-charts" class="waves-effect">Doughnut Charts<i class="material-icons">pie_chart</i></a></li>
                  <li><a href="/pages/admin-financial-charts" class="waves-effect">Financial Charts<i class="material-icons">euro_symbol</i></a></li>
                  <li><a href="/pages/admin-interactive-charts" class="waves-effect">Interactive Charts<i class="material-icons">touch_app</i></a></li>
                </ul>
              </div>
            </li>
			
            <li class="bold waves-effect  col s12"><a class="collapsible-header" tabindex="0">Tables<i class="material-icons chevron">chevron_left</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="/pages/admin-fullscreen-table" class="waves-effect">Fullscreen with Chart<i class="material-icons">show_chart</i></a></li>
                  <li><a href="/pages/admin-table-custom-elements" class="waves-effect">Table with Custom Elements<i class="material-icons">settings</i></a></li>
                </ul>
              </div>
            </li>
            <li class="bold waves-effect  col s12"><a class="collapsible-header" tabindex="0">Calendar<i class="material-icons chevron">chevron_left</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="/pages/admin-calendar" class="waves-effect">Calendar<i class="material-icons">cloud</i></a></li>
                </ul>
              </div>
            </li>
            <li class="bold waves-effect  col s12"><a class="collapsible-header" tabindex="0">Headers<i class="material-icons chevron">chevron_left</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="/pages/admin-header-tabbed" class="waves-effect">Tabbed<i class="material-icons">tab</i></a></li>
                  <li><a href="/pages/admin-header-metrics" class="waves-effect">Metrics<i class="material-icons">web</i></a></li>
                  <li><a href="/pages/admin-header-search" class="waves-effect">Search<i class="material-icons">search</i></a></li>
                </ul>
              </div>
            </li>-->
            <li class="bold waves-effect  col s12"><a class="collapsible-header" tabindex="0">Account<i class="material-icons chevron">settings</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="/pages/admin-settings" class="waves-effect">Ver Pefil<i class="material-icons">account_circle</i></a></li>
                  <li><a href="index.php?ruta=salir" class="waves-effect">Salir<i class="material-icons">logout</i></a></li>
                  
                </ul>
              </div>
            </li>
          </ul>
        </li>
      </ul>

  <?php
   }
   ?>	
  
		
 <?php endif; ?>
