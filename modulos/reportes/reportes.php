<?php 


if (isset($_POST['inicio']) & isset($_POST['final'])) {
	$inicio = $_POST['inicio'];
	$final = $_POST['final'];
	$totalMes = "";
	require_once ("../../conexion.php");
	$query = "SELECT sum(abono) as total FROM abonos WHERE fecha_reporte >= '$inicio' AND fecha_reporte < '$final'";
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
		      <p>Entre el <span id="mes" align="justify"><b>'.$inicio.'</b></span> y el  <span align="justify"><b>'.$final.'</b></span> se han recibido <b>$'.number_format($totalMes).'</b> corespondientes a los trabajos realizados.</p>
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