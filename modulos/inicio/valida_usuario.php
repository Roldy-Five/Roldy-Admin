<?php 



if (isset($_POST["usuario"])) {
	$usuario = $_POST["usuario"];
	$contrasena = $_POST["contrasena"];
	$respuesta = true;
	$id_usuario = "Aquí se debe almacenar el id del uusario, el cual estará disponibla en todas las paginas del sistema.";
	if ($respuesta){
		print("tienes acceso");
		session_start();
		$_SESSION["token"]= $id_usuario;
	}else{
		print("Notienes acceso");
	}
}

 ?>