<?php  
include "../../conexion.php";
	$cliente_id = $_POST['cliente_id'];
	//$medida_id = $_POST['medida_id'];
	//$vestido_id = $_POST['vestido_id'];
	
	$modal="";
	$medidas_id="";
	$vestido_id="";
	$cintura ="";
	$cadera="";
	$largo_mocho="";
	$largo_falda="";
	$largo_blusa="";
	$largo_vestido="";
	$largo_pantalon="";
	$talle="";
	$espalda="";
	$busto="";
	$ancho_muslo="";
	$corto_l="";
	$tc_l="";
	$largo_l="";
	$corto_a="";
	$tc_a="";
	$largo_a="";
//selecciono datos de medidas	
	$sql="SELECT * FROM medidas WHERE cliente_id = '$cliente_id'";
	$cs=mysqli_query($conn,$sql);
		while($resul=mysqli_fetch_array($cs)){
			$medidas_id=$resul[0];
			$cintura=$resul[2];
			$cadera=$resul[3];
			$largo_mocho=$resul[4];
			$largo_falda=$resul[5];
			$largo_blusa=$resul[6];
			}
//selecciono datos de vestido
	$sql="SELECT * FROM vestido WHERE medidas_id = '$medidas_id'";
	$cs=mysqli_query($conn,$sql);
		while($resul=mysqli_fetch_array($cs)){
			$vestido_id=$resul[0];
			$largo_vestido=$resul[2];
			$talle=$resul[3];
			$espalda=$resul[4];
			$busto=$resul[5];
			}

//selecciono datos de pantalon
	$sql="SELECT * FROM pantalon WHERE medidas_id = '$medidas_id'";
	$cs=mysqli_query($conn,$sql);
		while($resul=mysqli_fetch_array($cs)){
			$largo_pantalon=$resul[2];
			$ancho_muslo=$resul[3];
			}

//selecciono datos de largo_manga
	$sql="SELECT * FROM largo_manga WHERE vestido_id = '$vestido_id'";
	$cs=mysqli_query($conn,$sql);
		while($resul=mysqli_fetch_array($cs)){
			$corto_l=$resul[2];
			$tc_l=$resul[3];
			$largo_l=$resul[4];
			}

//selecciono datos de largo_manga
	$sql="SELECT * FROM ancho_manga WHERE vestido_id = '$vestido_id'";
	$cs=mysqli_query($conn,$sql);
		while($resul=mysqli_fetch_array($cs)){
			$corto_a=$resul[2];
			$tc_a=$resul[3];
			$largo_a=$resul[4];
			}


			$modal.="
		     <h4>Medidas</h4>
		     <div class='row'>
			     <form class='col s12' method='post' >
				     <div class='row'>
				     <h6 style='text-align:center;'> Generales</h6>
					      <div class='input-field col s6'>
					         <select id='cliente1' name='cliente1' disabled selected>";
										$s="SELECT id,identificacion, CONCAT(nombre,' ',apellidos) AS nombre  FROM cliente order by id";
										$r= mysqli_query($conn,$s) or die("Error");
										if(mysqli_num_rows($r)>0){
											while($rw=mysqli_fetch_assoc($r)){
									$modal.=" echo'<option value='$rw[id]'>[$rw[identificacion] - $rw[nombre]]</option>'";				if ($rw["id"]==$cliente_id) {
													$modal.="echo'<option value='$rw[id]' selected='selected'>[$rw[identificacion] - $rw[nombre]]</option>'";
												}		
											}					
										}
									
						$modal.="</select>
							   <label>Cliente</label>
					      </div>
					      <div class='input-field col s3'>
					          <input id='cintura1' name='cintura1' type='text' class='validate solo-numero' value='$cintura'>
					          <label for='cintura'>Cintura</label>
					      </div>
					        <div class='input-field col s3'>
					          <input id='cadera1' name='cadera1' type='text' class='validate solo-numero' value='$cadera'>
					          <label for='cadera'>Cadera</label>
					      </div>
					      </div>

					       <div class='row'>
					      <div class='input-field col s4'>
							  <input id='largo_blusa1' name='largo_blusa1' type='text' class='validate solo-numero' value='$largo_blusa'>
					          <label for='largo_blusa'>Largo de blusa</label>
						  </div>
					      <div class='input-field col s4'>
					          <input id='largo_falda1' name='largo_falda1' type='text' class='validate solo-numero' value='$largo_falda'>
					          <label for='largo_falda'>Largo de falda</label>
					      </div>
					      <div class='input-field col s4'>
					          <input id='largo_mocho1' name='largo_mocho1' type='text' class='validate solo-numero' value='$largo_mocho'>
					          <label for=¡largo_mocho'>Largo de short</label>
					      </div>
					      </div>

					      <div class='row'>	
					       <h6  style='text-align: center;''>Vestido</h6>			      
						      <div class='input-field col s3'>
						          <input id='largo_vestido1' name='largo_vestido1' type='text' class='validate solo-numero' value='$largo_vestido'>
						          <label for='largo_vestido'>Largo de vestido</label>
						      </div>
						      <div class='input-field col s3'>
						          	<input id='talle1' name='talle1' type='text' class='validate solo-numero' value='$talle'>
						          	<label for='talle'>Talle</label>
					      	</div>
					      	<div class='input-field col s3'>
						          	<input id='espalda1' name='espalda1' type='text' class='validate solo-numero' value='$espalda' >
						          	<label for='espalda'>Espalda</label>
					      	</div>
					      	<div class='input-field col s3'>
						          	<input id='busto1' name='busto1' type='text' class='validate solo-numero' value='$busto'>
						          	<label for='busto'>Busto</label>
					      	</div>
					      </div>

					      <div class='row'>	
					       <h6  style='text-align: center;'>Pantalon</h6>			      
						      <div class='input-field col s6'>
						          <input id='largo_pantalon1' name='largo_pantalon1' type='text' class='validate solo-numero' value='$largo_pantalon'>
						          <label for='largo_pantalon'>Largo de pantalon</label>
						      </div>
						      <div class='input-field col s6'>
						          	<input id='ancho_muslo1' name='ancho_muslo1' type='text' class='validate solo-numero' value='$ancho_muslo'>
						          	<label for='ancho_muslo'>Ancho de muslo</label>
					      	</div>
					      </div>

					       <div class='row'>	
					       <h6  style='text-align: center;''>Largo de manga</h6>			      
						      <div class='input-field col s4'>
						          <input id='corto_l1' name='corto_l1' type='text' class='validate solo-numero' value='$corto_l'>
						          <label for='corto_l'>Corto</label>
						      </div>
						      <div class='input-field col s4'>
						          	<input id='tc_l1' name='tc_l1' type='text' class='validate solo-numero' value='$tc_l'>
						          	<label for='tc_l'>3/4</label>
					      	</div>
					      	<div class='input-field col s4'>
						          	<input id='largo_l1' name='largo_l1' type='text' class='validate solo-numero' value='$largo_l'>
						          	<label for='largo_l'>Largo</label>
					      	</div>
					      </div>

					      <div class='row'>	
					       <h6  style='text-align: center;''>Ancho de manga</h6>			      
						      <div class='input-field col s4'>
						          <input id='corto_a1' name='corto_a1' type='text' class='validate solo-numero' value='$corto_a'>
						          <label for='corto_a'>Corto</label>
						      </div>
						      <div class='input-field col s4'>
						          	<input id='tc_a1' name='tc_a1' type='text' class='validate solo-numero' value='$tc_a'>
						          	<label for='tc_a'>3/4</label>
					      	</div>
					      	<div class='input-field col s4'>
						          	<input id='largo_a1' name='largo_a1' type='text' class='validate solo-numero' value='$largo_a'>
						          	<label for='largo_a'>Largo</label>
					      	</div>
					      </div>

					      <div class='row'>

   								<div class='col s1 offset-s4'><button class='modal-action modal-close waves-effect amber darken-2 btn-flat' onclick='editar($cliente_id,$medidas_id,$vestido_id)'>Actualizar</button></div>
    						</div>
					      
					      
			      <script type='text/javascript' src='js/accion_medidas.js'></script>
					";
					echo $modal;
?>
