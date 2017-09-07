<?php
	if (isset($_POST['precio'])) {
	 	include '../../conexion.php';
	 	$query = "INSERT INTO tipo_prenda (id,descripcion,precio) VALUES(NULL,'$_POST[nombre]','$_POST[precio]')";
	 	mysqli_query($conn,$query);
	 	if (mysqli_error($conn)) {
	 		print(0);
	 	}else{
	 		print(1);
	 	}
	 } 
?>