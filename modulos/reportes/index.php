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
	<div class="input-field col s6 m6">
		<select class="icons" id="meses">
		  <option value="" disabled selected>Elije un mes</option>
		  <option value="Enero" data-icon="" class="circle">Enero</option>
		  <option value="Febrero" data-icon="" class="circle">Febrero</option>
		  <option value="Marzo" data-icon="" class="circle">Marzo</option>
		  <option value="Abril" data-icon="" class="circle">Abril</option>
		  <option value="Mayo" data-icon="" class="circle">Mayo</option>
		  <option value="Junio" data-icon="" class="circle">Junio</option>
		  <option value="Julio" data-icon="" class="circle">Julio</option>
		  <option value="Agosto" data-icon="" class="circle">Agosto</option>
		  <option value="Septiembre" data-icon="" class="circle">Septiembre</option>
		  <option value="Octubre" data-icon="" class="circle">Octubre</option>
		  <option value="Noviembre" data-icon="" class="circle">Noviembre</option>
		  <option value="Diciembre" data-icon="" class="circle">Diciembre</option>
		</select>
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