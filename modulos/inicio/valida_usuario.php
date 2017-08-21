<?php 

if (isset($_POST["usuario"])) {
	require_once ("../../conexion.php");
	$usuario = $_POST["usuario"];
	$contrasena = $_POST["contrasena"];
	$respuesta = "";
	$s = "SELECT * FROM login WHERE usuario = '$usuario' AND clave = '$contrasena'";
	$resultado = $conn->query($s);
	if ($resultado->num_rows > 0) {
		session_start();
		while($row=$resultado->fetch_assoc()){
			$_SESSION["usuario"]= $row['id'];
		}
		
		print(1);
	}else{
		print(0);
	}

	
	// $id_usuario = "Aquí se debe almacenar el id del uusario, el cual estará disponibla en todas las paginas del sistema.";
	// if ($respuesta){
	// 	print("tienes acceso");
	// 	session_start();
	// 	$_SESSION["usuario"]= $id_usuario;
	// }else{
	// 	print("Notienes acceso");
	// }
}

 ?>