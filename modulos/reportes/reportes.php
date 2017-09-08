<?php 


if (isset($_POST['mes'])) {
	$year = $_POST['year'];
	$mes = $_POST['mes'];
	$totalMes = "";
	require_once ("../../conexion.php");
	$query = "SELECT sum(abono) as total FROM abonos WHERE fecha_reporte LIKE '%$year%' AND fecha_reporte LIKE '%$mes%'";
	$resultado = $conn->query($query);
	while($row=$resultado->fetch_assoc()){
		if ($row['total'] == "") {
			$totalMes= "0";
		}else{
			$totalMes = $row['total'];
		}
	}

	print('<div class=" m6 animated slideInUp">
			<h2 class="header"></h2>
		<div class="card horizontal hoveraved">
		  <div class="card-image">
		  </div>
		  <div class="card-stacked">
		    <div class="card-content">
		      <p>En el mes de <span id="mes" align="justify"><b> '.$mes.'</b></span> del año <span align="justify"><b> '.$year.'</b></span> se han recibido <b>$'.number_format($totalMes).'</b> corespondientes a los trabajos realizados.</p>
		    </div>
		    <div class="card-action">
		      <a href="#">Reporte mensual</a>
		    </div>
		  </div>
		</div>
	</div>');
	
}else{
	print("No hay consulta para realizar...");
}

 ?>