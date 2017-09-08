<?php 
	if(!isset($_SESSION["usuario"])){
		header("Location:../.././index.php");
	}else{
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Perfil del usuario</title>
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
</head>
<body>

	<div class="container" style="padding: 10px;"></div>
	<div class="row">
		<!-- Page Content goes here -->
		<div class="col m4 offset-s1">
			<img class="responsive-img circle" src="img/luis.jpg" height="200px" width="250px">
		</div>

		<div class="col m8">
			<form class="col m12 s12">
			<h5>Cambiar contraseña</h5>
					<div class="row">
					<div class="input-field col m6 s12">
						<i class="material-icons prefix">fingerprint</i>
						<input id="correo" type="password" class="validate" name="correo">
						<label for="correo">Contraseña actual</label>
					</div>
					</div>
					<div class="row">
					<div class="input-field col m6 s12">
						<i class="material-icons prefix">fingerprint</i>
						<input id="correo" type="password" class="validate" name="correo">
						<label for="correo">Nueva contraseña</label>
					</div>
					</div>
					<div class="row">
					<div class="input-field col m6 s12">
						<i class="material-icons prefix">fingerprint</i>
						<input id="correo" type="password" class="validate" name="correo">
						<label for="correo">Confirmar contraseña</label>
					</div>
					</div>
			        <div class="col m12">
				        <button class="btn waves-effect waves-light" type="submit" name="action">Actualizar
						    <i class="material-icons right">send</i>
						</button>
			        </div>
			</form>
		</div>
	</div>
	</div>

 
    <script src="js/jquery-3.2.1.min.js"></script>
</body>
</html>

<?php 
	}
 ?>