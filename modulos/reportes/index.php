<?php 

	if (!isset($_SESSION["usuario"])) {
		header("Location:../.././index.php");
		
	}else{
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Roldy Five - Confecciones</title>
	<link rel="stylesheet" type="text/css" href="css/select2.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">	
</head>
<body>
<style type="text/css">
	.hoveraved:hover{
		box-shadow: 0 16px 24px 2px rgba(0,0,0,0.14);
	}
</style>


<h3 class="text-center">Reportes del mes</h3>

 <div class="row">
  	<div class="input-field col m4">
	    <select id="year">
	      <option value="2017" selected>2017</option>
	      <option value="2018">2018</option>
	      <option value="2019">2019</option>
	      <option value="2020">2020</option>
	    </select>
	    <label>Seleccionar año</label>
  	</div>
 	<div class="input-field col m4">
	    <select id="mesreport">
	      <option value="enero">Enero</option>
	      <option value="febrero">Febrero</option>
	      <option value="abril">Abril</option>
	      <option value="mayo">Mayo</option>
	      <option value="Junio">Junio</option>
	      <option value="Julio">Julio</option>
	      <option value="Agosto">Agosto</option>
	      <option value="Septiembre">Septiembre</option>
	      <option value="Octubre">Octubre</option>
	      <option value="Noviembre">Noviembre</option>
	      <option value="Diciembre">Diciembre</option>
	    </select>
	    <label>Seleccionar mes</label>
  	</div>
 	<div class="col s3">
 		<button class="btn green" id="ver">Ver</button>
 	</div>
 </div>

<div class="row" id="resultado">


</div>
	 <script src="js/jquery-3.2.1.min.js"></script>
	 <script type="text/javascript" src="js/select2.js"></script>
	 <script type="text/javascript" src="js/materialize.min.js"></script>
	 <script type="text/javascript" src="js/accion_reportes.js"></script>
</body>
</html>

<?php 


}
 ?>