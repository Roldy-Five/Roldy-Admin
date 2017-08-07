<?php 
	include "../../conexion.php";
	$cliente_id = $_POST['cliente_id'];
	$medidas_id = $_POST['medidas_id'];
	$vestido_id = $_POST['vestido_id'];
//actualizo medidas generales
	$s=
	"UPDATE medidas SET 
	cintura='$_POST[cintura]',
	cadera='$_POST[cadera]',
	largo_mocho='$_POST[largo_mocho]',
	largo_falda='$_POST[largo_falda]',
	largo_blusa='$_POST[largo_blusa]'
	WHERE cliente_id = '$cliente_id'
	";
	mysqli_query($conn,$s) or die(mysqli_error($conn));

//actualizo vestido
	$s=
	"UPDATE vestido SET 
	largo='$_POST[largo_vestido]',
	talle='$_POST[talle]',
	espalda='$_POST[espalda]',
	busto='$_POST[busto]'
	WHERE medidas_id = '$medidas_id'
	";
	mysqli_query($conn,$s) or die(mysqli_error($conn));

//actualizo pantalon
	$s=
	"UPDATE pantalon SET 
	largo='$_POST[largo_pantalon]',
	ancho_muslo='$_POST[ancho_muslo]'
	WHERE medidas_id = '$medidas_id'
	";
	mysqli_query($conn,$s) or die(mysqli_error($conn));

//actualizo largo_manga
	$s=
	"UPDATE largo_manga SET 
	corto='$_POST[corto_l]',
	3_4='$_POST[tc_l]',
	largo='$_POST[largo_l]'
	WHERE vestido_id = '$vestido_id'
	";
	mysqli_query($conn,$s) or die(mysqli_error($conn));

//actualizo ancho_manga
	$s=
	"UPDATE ancho_manga SET 
	corto='$_POST[corto_a]',
	3_4='$_POST[tc_a]',
	largo='$_POST[largo_a]'
	WHERE vestido_id = '$vestido_id'
	";
	mysqli_query($conn,$s) or die(mysqli_error($conn));


	
	//mysqli_query($conn,$s) or die(mysqli_error($conn));
	echo $cliente_id;

?>