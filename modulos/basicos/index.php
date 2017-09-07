<?php 
	if(!isset($_SESSION["usuario"])){
		header("Location:../.././index.php");
	}else{
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		
	</style>
</head>

<body>
	<div class="row">
		
	<div class="input-field col s6"> 
		<h4>Tipo de prenda</h4>
		<br><br>
		<form style="padding-top: 10px;" id="form_insertar">
			<div class="row">
				<div class="input-field col s10">
					<input  id="nombre" name="nombre" type="text" class="">
		         	<label for="nombre">Nombre</label>
				</div>
			</div>
			
			<div class="row">
				<div class="input-field col s10">
					<input  id="precio" name="precio" type="text" class="solo-numero">
		         	<label for="precio">Precio</label>
				</div>
			</div>

			<div class="row">
				<div class="col s2">
					<button type="submit" class="modal-action  waves-effect green btn-flat" id="btnañadir" >Añadir</button>
				</div>
			</div>	
		</form>
	</div>
	<div class="input-field col s6">
		<div id="datos">
		
		</div>
	</div>
	</div>

	<div id="llanar_form" ></div>
    <div id="modal2" class="modal" style="width: 400px">

	    <div class="modal-content" id="r">
		    
		     
	    </div>
   	
  </div>
	
</body>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/accion_basicos.js"></script>
</html>
<?php 
	}
 ?>