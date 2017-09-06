<?php 
	if(!isset($_SESSION["usuario"])){
		header("Location:../.././index.php");
	}else{
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width,user-escalabel=no,initial-scale=1.0, maximum-scale=1.0, minimun-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
</head>
<body>
	<div class="row">
		<div class="input-field col s4">

			<label>Buscar</label>
			<input type="text" name="caja_busqueda" id="caja_busqueda">
		</div>
	</div>

	<div id="datos" style="height: 500px; overflow-y: auto;">
		<!-- en este div se cargan los datos-->
	</div>

     <script src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	 <script type="text/javascript" src="js/accion_reportes.js"></script>
</body>
</html>
<?php 
	}
 ?>
