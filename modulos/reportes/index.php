<?php 

	if (!isset($_SESSION["usuario"])) {
		
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
 	<div class="col s3">
 		<label for="" >Fecha de inicio</label>
 		<input type="text" class="datepicker" id="inicio" name="inicio">
 	</div>
 	<div class="col s3">
 		<label for="" >Fecha final</label>
 		<input type="text" class="datepicker" id="final" name="final">
 	</div><br><br>
 	<div class="col s3">
 		<button class="btn green" id="ver">Ver</button>
 	</div>
 </div>
<center>
<div class="row" id="resultado">


</div></center>
	 <script src="js/jquery-3.2.1.min.js"></script>
	 <script type="text/javascript" src="js/select2.js"></script>
	 <script type="text/javascript" src="js/materialize.min.js"></script>
	 <script type="text/javascript" src="js/accion_reportes.js"></script>
</body>
</html>

<?php 


}
 ?>