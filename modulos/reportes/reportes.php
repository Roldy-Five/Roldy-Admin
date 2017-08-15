<?php 
sleep(2);

// if (isset($_['mes'])) {
	require_once ("../../conexion.php");
	$mes = $_POST['mes'];

	




$totalMes = '$ 1.000.000';
	print('<div class="col s6 m6 animated slideInUp">
			<h2 class="header"></h2>
		<div class="card horizontal hoveraved">
		  <div class="card-image">
		  </div>
		  <div class="card-stacked">
		    <div class="card-content">
		      <p>En el mes de <span id="mes" align="justify"><b>'.$mes.'</b></span> se han recibido hasta el momento <b>'.$totalMes.'</b> de pesos corespondientes a los trabajos realizados.</p>
		    </div>
		    <div class="card-action">
		      <a href="#">Reporte mensual</a>
		    </div>
		  </div>
		</div>
	</div>');
	print('<div class="col s6 m6 animated slideInUp">
			<h2 class="header"></h2>
		<div class="card horizontal hoveraved">
		  <div class="card-image">
		  </div>
		  <div class="card-stacked">
		    <div class="card-content">
		      <p>Se realizaron <b>4</b> pantalones, <b>4</b> blusas y <b>13</b> shores a <b>7</b> clientes.</p>
		    </div>
		    <div class="card-action">
		      <a href="#">Reporte mensual</a>
		    </div>
		  </div>
		</div>
	</div>');
// }

 ?>