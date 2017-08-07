<?php
	if(isset($_POST['identificacion'])){
		include "../../conexion.php";
		$s=
		"INSERT INTO cliente (identificacion,nombre,apellidos,sexo_id,direccion,telefono_1,telefono_2) VALUES 
		('$_POST[identificacion]','$_POST[nombres]','$_POST[apellidos]','$_POST[sexo]','$_POST[direccion]','$_POST[telefono_1]',
		'$_POST[telefono_2]')";
		mysqli_query($conn,$s);
		if(mysqli_error($conn)){
				print(0);
			}
			else{
				print(1);
			}
		}
	
	
 ?>