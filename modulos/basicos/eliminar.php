<?php
	if (isset($_POST['id'])) {
		include '../../conexion.php';
		$id = $_POST['id'];

		$query = "DELETE FROM tipo_prenda WHERE id = '$id'";
		mysqli_query($conn,$query);
		if (mysqli_error($conn)) {
			print(0);
		}else{
			print(1);
		}

	 } 
?>