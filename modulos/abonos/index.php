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
		<!-- <div class="input-field col s3  offset-s4">
			<br>
			<a class="waves-effect waves-light btn green" href="#modal1" "> Nuevo cliente</a>	
		</div> -->
	</div>

	<div id="datos">	<!-- en este div se cargan los datos-->	
	</div>

	<div id="abono" class="modal">
	    <div class="modal-content">
		     <h4>Realizar abonos</h4>
		     <div class="row" id="principal">
			     <form class="col s12" action=""  name="formulario">
				     <div class="row">
					      <div class="input-field col s6">
					          
					          <input id="responsable" name="responsable" type="text" class="validate">
					          <label for="responsable">* Responsable</label>
					      </div>
					      <div class="input-field col s6">
					          <input id="abonos" name="abonos" type="text" class="validate">
					          <label for="abonos">* abono</label>
					      </div>
					      </div>
					      <div class="row ">
					      	<div class="input-field col s6">
					         	<input type="text" class="datepicker" id="fecha" name="fecha">
								<label for="" >*Fecha</label>
					        </div><br>
							<div class="col s1 ">
   								<button type="submit" class="modal-action  waves-effect green btn-flat">Abonar</button></div>
    						</div>
			      </form>
		      </div>
	    </div>
    </div>
    <div id="detalle" class="modal">

	    <div class="modal-content" id="r">
		     <h4>Detalle de la orden</h4>
		     
	    </div>
   	
  	</div>
     <script src="js/jquery-3.2.1.min.js"></script>
<!--<script type="text/javascript" src="js/materialize.js"></script>-->
	
	<script type="text/javascript" src="js/accion_abonos.js"></script>
</body>
</html>