<?php  
include "../../conexion.php";
	$id_cliente = $_POST['id_cliente'];
	$id ="";
	$identificacion="";
	$nombre="";
	$modal="";
	$sql="SELECT * FROM cliente WHERE id = '$id_cliente'";
	$cs=mysqli_query($conn,$sql);
		while($resul=mysqli_fetch_array($cs)){
			$id=$resul[0];
			$identificacion=$resul[1];
			$nombre=$resul[2];
			$apellidos=$resul[3];
			$sexo=$resul[4];
			$direccion=$resul[5];
			$telefono_1=$resul[6];
			$telefono_2=$resul[7];
			}
		//$modal.="$id,$identificacion,$nombre <p class='red'>asdfasd</p>";

			$modal.="
		     <h4>Clientes</h4>
		     <div class='row'>
			     <form class='col s12' method='post' >
				     <div class='row'>

					      <div class='input-field col s4'>
					          <input  id='identificacion1' name='identificacion' placeholder='' type='text' class='validate' value='$identificacion'>
					          <label for='identificacion'>Identificación</label>
					      </div>
					      <div class='input-field col s4'>
					      <label for='nombre'>Nombre</label>
					          <input  id='nombre1' name='nombre' placeholder='' type='text' class=validate' value='$nombre'>
					      </div>
					        <div class='input-field col s4'>
					          <input id='apellidos1' name='apellidos' placeholder='' type='text' class='validate' value='$apellidos'>
					          <label for='apellidos'>Apellidos</label>
					      </div>
					      </div>
					      
					      <div class='row'>
					      <div class='input-field col s6'>
							   <select id='sexo1' name='sexo' >";
						$s="select id,descripcion from sexo ";
						$r= mysqli_query($conn,$s) or die('Error');
						if(mysqli_num_rows($r)>0){
							while($rw=mysqli_fetch_assoc($r)){
							$modal.="echo'<option value='$rw[id]'>$rw[descripcion]</option>'";	
								if ($rw["id"]==$sexo) {
							$modal.="ECHO '<option value='$rw[id]' selected='selected'> $rw[descripcion]</option>'";
								}	

							}	

						}

					$modal.="
							   </select>
							   <label>Sexo</label>
						  </div>
					      <div class='input-field col s6'>
					          <input id='direccion1' name='direccion' placeholder='' type='text' class='validate' value='$direccion'>
					          <label for='direccion'>Dirección</label>
					      </div>
					      </div>

					      <div class='row'>				      
						      <div class='input-field col s6'>
						          <input id='telefono_11' name='telefono_1' placeholder='' type='text' class='validate' value='$telefono_1'>
						          <label for='last_name'>Telefono 1</label>
						      </div>
						      <div class='input-field col s6'>
						          	<input id='telefono_21' name='telefono_2' placeholder='' type='text' class='validate' value='$telefono_2'>
						          	<label for='last_name'>Telefono 2</label>
					      	</div>
					      </div>
					      <div class='row'>

   								<div class='col s1 offset-s9'><button class='modal-action modal-close waves-effect amber darken-2 btn-flat' type='submit' onclick='editar($id);' >Actualizar</button></div>
     					
    						</div>
			      </form>
			      <script type='text/javascript' src='js/accion_cliente.js'></script>
			      <script type='text/javascript'>
	$(document).ready(function(){
    $('select').material_select();
	})
</script>
					";
					echo $modal;
?>
