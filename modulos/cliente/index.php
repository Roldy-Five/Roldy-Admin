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

</head>
<body>
	<div class="row">
		<div class="input-field col s4">

			<label>Buscar</label>
			<input type="text" name="caja_busqueda" id="caja_busqueda">
		</div>
		<div class="input-field col s3  offset-s2">
			<br>
			<a class="waves-effect waves-light btn green" href="#modal1" "> Nuevo cliente</a>	
		</div>
	</div>

	<div id="datos" style="height: 500px; overflow-y: auto;">
		<!-- en este div se cargan los datos-->	
	</div>

	<div id="modal1" class="modal">
	    <div class="modal-content">
		     <h4>Clientes</h4>
		     <div class="row" id="principal">
			     <form class="col s12" action=""  name="formulario">
				     <div class="row">
					      <div class="input-field col s4">
					          <input  id="identificacion" name="identificacion" type="text" class="validate solo-numero">
					          <label for="identificacion">* Identificación</label>
					      </div>
					      <div class="input-field col s4">
					          <input id="nombres" name="nombres" type="text" class="validate">
					          <label for="nombres">* Nombres</label>
					      </div>
					        <div class="input-field col s4">
					          <input id="apellidos" name="apellidos" type="text" class="validate">
					          <label for="apellidos">* Apellidos</label>
					      </div>
					      </div>

					      <div class="row">
					      <div class="input-field col s6">
							   <select id="sexo" name="sexo" >
							      	<?php
							      		require_once('conexion.php');
										$s="select id,descripcion from sexo order by id";
										$r= mysqli_query($conn,$s) or die("Error");
										if(mysqli_num_rows($r)>0){
											while($rw=mysqli_fetch_assoc($r)){
											echo"<option value='$rw[id]'>$rw[descripcion]</option>";					
											}					
										}
									?>
							   </select>
							   <label>* Sexo</label>
						  </div>
					      <div class="input-field col s6">
					          <input id="direccion" name="direccion" type="text" class="validate">
					          <label for="direccion">* Dirección</label>
					      </div>
					      </div>

					      <div class="row">				      
						      <div class="input-field col s6">
						          <input id="telefono_1" name="telefono_1" type="text" class="validate solo-numero">
						          <label for="last_name">* Telefono 1</label>
						      </div>
						      <div class="input-field col s6">
						          	<input id="telefono_2" name="telefono_2" type="text" class="validate solo-numero">
						          	<label for="last_name">Telefono 2</label>
					      	</div>
					      </div>
					      <div class="row ">
   								<div class="col s1 offset-s5">
   								<button type="submit" class="modal-action  waves-effect green btn-flat" >Agregar</button></div>
    						</div>
			      </form>
		      </div>
	    </div>
    </div>
<div id="llanar_form"></div>
    <div id="modal2" class="modal">

	    <div class="modal-content" id="r">
		     <h4>Clientes</h4>
		     
	    </div>
   	
  </div>


     <script src="js/jquery-3.2.1.min.js"></script>
<!--<script type="text/javascript" src="js/materialize.js"></script>-->
	<script type="text/javascript" src="js/accion_cliente.js"></script>
</body>
</html>
<?php 
	}
 ?>
