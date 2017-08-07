<!DOCTYPE html>
<html lang="es">
<head>
	<title>Roldy Five - Confecciones</title>
	<link rel="stylesheet" type="text/css" href="css/select2.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">	
</head>
<body>
<div>
	<form>
		<div class="row">
		<h5 class="" style="text-align: center;">Datos generales de la orden</h5>
			<div class="input-field col s6">
				<input id="responsable" name="responsable" type="text">
				<label for="responsable" >Nombre del responsable</label>
			</div>
			<div class="input-field col s6">
				<input type="text" class="datepicker" id="fecha_entrega" name="fecha_entrega">
				<label for="" >Fecha de entrega</label>
			</div>
		</div>

		<div class="row">
			<h5 class="" style="text-align: center;">Detalle de la orden</h5>
			<div class="input-field col s6"><br>
				<select id="cliente" style="width: 100%; left: -20px;" name="cliente" >
				<!--	<option>Seleccione un cliente</option>-->
					<?php
						include ('conexion.php');
						$s="SELECT id,identificacion,CONCAT(nombre,' ',apellidos) AS nombre  FROM cliente order by id";
						$r= mysqli_query($conn,$s) or die("Error");
						if(mysqli_num_rows($r)>0){
							while($rw=mysqli_fetch_assoc($r)){
								echo"<option value='$rw[id]'>[$rw[identificacion] - $rw[nombre]]</option>";					
							}					
						}
					?>
				</select>
			</div>
			<div class="input-field col s6">
			 	<select id="tipo_prenda"  name="tipo_prenda" class="cmb">
					<?php
						include ('conexion.php');
						$s="SELECT id,descripcion  FROM tipo_prenda order by id";
						$r= mysqli_query($conn,$s) or die("Error");
						if(mysqli_num_rows($r)>0){
							while($rw=mysqli_fetch_assoc($r)){
								echo"<option value='$rw[id]'>$rw[descripcion]</option>";					
							}					
						}
					?>
				</select>
				<label>Tipo de prenda</label>			 
			</div>
		</div>
		
		<div class="row">
		<div class="input-field col s3">
				<input type="number" id="precio" name="precio" class="limpiar">
				<label for="">Precio</label>
			</div>
			<div class="input-field col s7">
				<!--<textarea id="descripcion" class="materialize-textarea"></textarea>-->
				<input type="text" id="descripcion" name="descripcion" class="limpiar">
         		<label for="descripcion">Descripcion</label>
			</div>
			<div class="input-field col s2 ">
				<a class="btn-floating btn-large waves-effect waves-light red" id="llenar"><i class="material-icons">add</i></a>
			</div>
		</div>
		<table class='striped responsive-table centered' id="tabla">
			<thead>  
			    <tr>
			    	<th>Nº</th>
			    	<th>Remover</th>
			        <th>Nombre</th>
			        <th>Tipo de prenda</th>
			        <th>Estado de prenda</th>
			        <th>Descripción</th>
			        <th>Precio</th>
			        
			        
			    </tr>
		    </thead>
		    <tbody id="body">
		    	


		    </tbody>
</table>
		
		
	</form>

	<div class="row" id="envio">
		

	</div>
</div>

 
	 <script src="js/jquery-3.2.1.min.js"></script>
	 
	 <script type="text/javascript" src="js/select2.js"></script>
	 <script type="text/javascript" src="js/accion_orden.js"></script>
</body>
</html>