<?php

	include "../../conexion.php";
	$id_cliente = $_POST['id_cliente'];
	$s=
	"DELETE FROM cliente WHERE id = '$id_cliente' ";
	mysqli_query($conn,$s) or die(mysqli_error($conn));
 ?>