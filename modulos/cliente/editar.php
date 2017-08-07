<?php 

	if(isset($_POST['id_cliente'])){
		include "../../conexion.php";
		$id_cliente = $_POST['id_cliente'];
		$s=
			"UPDATE cliente SET 
			identificacion='$_POST[identificacion]',
			nombre='$_POST[nombre]',
			apellidos='$_POST[apellidos]',
			sexo_id='$_POST[sexo]',
			direccion='$_POST[direccion]',
			telefono_1='$_POST[telefono_1]',
			telefono_2='$_POST[telefono_2]'
			WHERE id = '$id_cliente'
			";
		mysqli_query($conn,$s);
		if(mysqli_error($conn)){
			print(0);
		}else{
			print(1);
		}
	}
	
	//mysqli_query($conn,$s) or die(mysqli_error($conn));
	//echo "Datos actualizados de manera correcta";

?>