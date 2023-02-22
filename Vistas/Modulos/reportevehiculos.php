<?php
$empleados = new EmpleadosC();
$pagina = $empleados->mostrarEmpleadosC();
$datos = $pagina->fetch_assoc();
$total_reparaciones = $datos['total_reparaciones'];


?> <!-- Vistas/Modulos/empleados.php -->
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
<canvas id="grafico-reparaciones" width="400" height="200"></canvas>
</div>	
<script>
var ctx = document.getElementById('grafico-reparaciones').getContext('2d');
var grafico = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Febrero/2022'],
        datasets: [
            {
                label: 'Número de reparaciones',
                data: [<?php echo $total_reparaciones; ?>],
                backgroundColor: 'rgba(54, 162, 235, 1)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
			{
            label: 'Reparaciones culminadas',
            data: [4],
            backgroundColor: 'rgba(50, 240, 52, 0.8',
            borderColor: 'rgba(50, 240, 52, 0.8)',
            borderWidth: 1
        },
		{
            label: 'Reparaciones En Proceso',
            data: [2],
            backgroundColor: 'rgba(223, 168, 41, 0.8)',
            borderColor: 'rgba(223, 168, 41, 0.8)',
            borderWidth: 1
        }
            
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
<?php
