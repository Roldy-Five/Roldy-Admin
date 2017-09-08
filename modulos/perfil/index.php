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
				<div class="row">
					<div class="input-field col m12 s12">
						<i class="material-icons prefix">account_circle</i>
						<input id="nombre" type="text" class="validate" name="nombre">
						<label for="nombre">Nombre</label>
					</div>
					<div class="input-field col m6 s12">
						<i class="material-icons prefix">email</i>
						<input id="correo" type="email" class="validate" name="correo">
						<label for="correo">Correo</label>
					</div>
					<div class="input-field col m6 s12">
						<i class="material-icons prefix">phone</i>
						<input id="telefono" type="text" class="validate">
						<label for="telefono">Correo</label>
					</div>
					<div class="input-field col m6 s12">
						<i class="material-icons prefix">face</i>
						<input id="usuario" type="text" class="validate" name="usuario">
						<label for="usuario">Usuario</label>
					</div>
					<div class="input-field col m6 s12">
						<i class="material-icons prefix">work</i>
						<input id="cargo" type="text" class="validate" disabled name="cargo">
						<label for="cargo">Cargo</label>
					</div>
					<div class="input-field col m12 s12">
						<i class="material-icons prefix">record_voice_over</i>
						<textarea id="biografia" class="materialize-textarea" name="biografia"></textarea>
						<label for="biografia">Biografia (Cuentanos un poco de ti)</label>
			        </div>
			        <div class="col m12 offset-s2 offset-m4">
				        <button class="btn waves-effect waves-light" type="submit" name="action">Actualizar
						    <i class="material-icons right">send</i>
						</button>
			        </div>
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