<?php

	if (isset($_POST['id'])) {
		include '../../conexion.php';
		$id = $_POST['id'];
		$modal="";

		$query = "SELECT descripcion,precio FROM tipo_prenda WHERE id = '$id'";
		$resultado = mysqli_query($conn,$query);
		while ($rw = mysqli_fetch_array($resultado)) {
			
			$modal.='
			 <h4>Tipo de prenda</h4>
			<form id="form_editar">
			<div class="row">
				<div class="input-field col s12">
					<input  id="nombre1" name="nombre1" type="text" class="" value='.$rw['descripcion'].'>
		         	<label for="nombre1">Nombre</label>
				</div>
			</div>
			
			<div class="row">
				<div class="input-field col s12">
					<input  id="precio1" name="precio1" type="text" class="solo-numero" value='.$rw['precio'].'>
		         	<label for="precio1">Precio</label>
				</div>
			</div>

			<div class="row">
				<div class="col s2">
					<input type="hidden" name="id" id="id" value='.$id.'>
					<button type="submit" class="modal-action  waves-effect amber darken-2 btn-flat" onclick="editar();" id="btneditar" >Actualizar</button>
				</div>
			</div>	
		</form>
		<script src="js/accion_basicos.js"></script>
		';
		}
		print($modal);

	}
?>