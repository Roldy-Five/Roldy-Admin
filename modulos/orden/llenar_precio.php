<?php
	
	if (isset($_POST['id'])) {
		require_once ("../../conexion.php");
	 	$id = $_POST['id'];
	 	$precio ="";
	 	$s = "SELECT precio FROM tipo_prenda WHERE id = '$id'";
	 	$cs=mysqli_query($conn,$s);
		while($resul=mysqli_fetch_array($cs)){
			$precio=$resul[0];
			print($precio);
		}
	 } 


?>