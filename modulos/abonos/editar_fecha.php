<?php 
	if (isset($_POST['id_orden'])) {
		$fecha = $_POST['fecha'];
		$orden_id = $_POST['id_orden'];
		include ('../../conexion.php');
		$s = "UPDATE orden SET fecha_entrega = '$fecha' WHERE id = '$orden_id'";
		mysqli_query($conn,$s); 
		if (mysqli_error($conn)) {
			print(0);
		}else{
			print(1);
		}
	}

?>