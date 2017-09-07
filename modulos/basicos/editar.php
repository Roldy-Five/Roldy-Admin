<?php
	if (isset($_POST['id'])) {
		include '../../conexion.php';
		$id = $_POST['id'];

		$query = "UPDATE tipo_prenda SET descripcion = '$_POST[nombre1]', precio = '$_POST[precio1]' WHERE id = '$id'";
		mysqli_query($conn,$query) ;

		if (mysqli_error($conn)) {
			print(0);
		}else{
			print(1);
		}

	 } 
?>