<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	<!--<link rel="stylesheet" type="text/css" href="css/estilos.css">-->
	<!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
	<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />-->
	<link rel="stylesheet" type="text/css" href="css/select2.css">
</head>

<body>
<div id="l"></div>
	<div class="row">
		<div class="input-field col s4">

			<label>Buscar</label>
			<input type="text" name="vestido" id="vestido" value="">
			<input type="text" name="blusa" id="blusa" value="">
			<input type="text" name="pantalon" id="pantalon" value="">
			<input type="text" name="falda" id="falda" value="">
			<input type="text" name="short" id="short" value="">
		</div>
		<div class="input-field col s2 ">
			<select id="tipo_prenda">
				<option value="1">Vestido</option>
				<option value="2">Blusa</option>
				<option value="3">Pantalon</option>
				<option value="4">Falda</option>
				<option value="5">Short</option>
			</select>
			
		</div>
		<div class="input-field col s3 ">
			<br>
			<a class="waves-effect waves-light btn green" href="#modal1" ">Añadir medidas</a>	
		</div>
	</div>

	<div id="datos">	
	</div>

	<div id="modal1" class="modal ">
	    <div class="modal-content ">
		     <h4>Medidas</h4>
		     <div class="row" id="principal">
			     <form class="col s12" action="" method="post" name="formulario">
				     <div class="row">
				     <h6 class="" style="text-align: center;">Generales</h6>
					      <div class="input-field col s6">
					      <!-- <label>Cliente</label>--><br>
					         <select id="cliente" style="width: 100%; left: -20px;" name="cliente" >
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
					      <div class="input-field col s3">
					          <input id="cintura" name="cintura" type="text" class="validate">
					          <label for="cintura">Cintura</label>
					      </div>
					        <div class="input-field col s3">
					          <input id="cadera" name="cadera" type="text" class="validate">
					          <label for="cadera">Cadera</label>
					      </div>
					      </div>

					      <div class="row">
					      <div class="input-field col s4">
							  <input id="largo_blusa" name="largo_blusa" type="text" class="validate">
					          <label for="largo_blusa">Largo de blusa</label>
						  </div>
					      <div class="input-field col s4">
					          <input id="largo_falda" name="largo_falda" type="text" class="validate">
					          <label for="largo_falda">Largo de falda</label>
					      </div>
					      <div class="input-field col s4">
					          <input id="largo_mocho" name="largo_mocho" type="text" class="validate">
					          <label for="largo_mocho">Largo de short</label>
					      </div>
					      </div>

					      <div class="row">	
					       <h6 class="" style="text-align: center;">Vestido</h6>			      
						      <div class="input-field col s3">
						          <input id="largo_vestido" name="largo_vestido" type="text" class="validate">
						          <label for="largo_vestido">Largo de vestido</label>
						      </div>
						      <div class="input-field col s3">
						          	<input id="talle" name="talle" type="text" class="validate">
						          	<label for="talle">Talle</label>
					      	</div>
					      	<div class="input-field col s3">
						          	<input id="espalda" name="espalda" type="text" class="validate">
						          	<label for="espalda">Espalda</label>
					      	</div>
					      	<div class="input-field col s3">
						          	<input id="busto" name="busto" type="text" class="validate">
						          	<label for="busto">Busto</label>
					      	</div>
					      </div>

					      <div class="row">	
					       <h6 class="" style="text-align: center;">Pantalon</h6>			      
						      <div class="input-field col s6">
						          <input id="largo_pantalon" name="largo_pantalon" type="text" class="validate">
						          <label for="largo_pantalon">Largo de pantalon</label>
						      </div>
						      <div class="input-field col s6">
						          	<input id="ancho_muslo" name="ancho_muslo" type="text" class="validate">
						          	<label for="ancho_muslo">Ancho de muslo</label>
					      	</div>
					      </div>

					      <div class="row">	
					       <h6 class="" style="text-align: center;">Largo de manga</h6>			      
						      <div class="input-field col s4">
						          <input id="corto_l" name="corto_l" type="text" class="validate">
						          <label for="corto_l">Corto</label>
						      </div>
						      <div class="input-field col s4">
						          	<input id="tc_l" name="tc_l" type="text" class="validate">
						          	<label for="tc_l">3/4</label>
					      	</div>
					      	<div class="input-field col s4">
						          	<input id="largo_l" name="largo_l" type="text" class="validate">
						          	<label for="largo_l">Largo</label>
					      	</div>
					      </div>

					      <div class="row">	
					       <h6 class="" style="text-align: center;">Ancho de manga</h6>			      
						      <div class="input-field col s4">
						          <input id="corto_a" name="corto_a" type="text" class="validate">
						          <label for="corto_a">Corto</label>
						      </div>
						      <div class="input-field col s4">
						          	<input id="tc_a" name="tc_a" type="text" class="validate">
						          	<label for="tc_a">3/4</label>
					      	</div>
					      	<div class="input-field col s4">
						          	<input id="largo_a" name="largo_a" type="text" class="validate">
						          	<label for="largo_a">Largo</label>
					      	</div>
					      </div>
					       <div class="row ">

   								<div class="col s1 offset-s5"><button class="modal-action waves-effect green btn-flat " onclick="insertar();"  ">Agregar</button></div>
    						</div>
					     
			      </form>
			     
		      </div>
		      
	    </div>
	     <!--<div class="modal-footer">
      				<button class="modal-action modal-close waves-effect green btn-flat " id="agregar" onclick="insertar();">Agregar</button>
    		</div>-->
    </div>

    <div id="modal2" class="modal">

	    <div class="modal-content" id="r">
		     <h4>Medidas</h4>
		     
	    </div>
   	
  </div>

  	
	<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/select2.js"></script>
	<script type="text/javascript" src="js/accion_medidas.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
  $('#cliente').select2();	
})
</script>
	
</body>
</html>