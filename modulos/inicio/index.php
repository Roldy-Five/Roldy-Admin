<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Roldy Five</title>
	<link rel="stylesheet" type="text/css" href="../../css/materialize.css">
	<link rel="stylesheet" type="text/css" href="../../css/iconos.css">
</head>
<body>
	<div class="row" style="margin-top:100px;opacity:.7">
	    <form class="col s8 m4 card offset-s2 offset-m4" id="inicio_sesion">
		<h4 class="center-align">Inicio de sesión</h4>
		    <div class="row">
		        <div class="input-field col s12 m12">
		          <i class="material-icons prefix">person</i>
		          <input id="usuario" type="text" class="validate">
		          <label for="usuario">Usuario</label>
		        </div>
		    </div>
			<div class="row">
		        <div class="input-field col s12 m12">
		          <i class="material-icons prefix"><i class="material-icons">visibility_off</i></i>
		          <input id="contrasena" type="password" class="validate">
		          <label for="contrasena">Contraseña</label>
		        </div>
	        </div>
	        <div class="row">
		        <div class="col s2 m2 offset-m4 offset-s2">
		          <button class="waves-effect waves-light btn">Iniciar</button>
		        </div>
	        </div>
	    </form>
	</div>
	<a href=""><p class="center-align">Terminos y condiciones.</p></a>


	<?php
		session_start(); 
		print( '<p class="center-align">'.$_SESSION["token"].'</p>'); ?>
</body>
<script type="text/javascript" src="../../js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="../../js/materialize.js"></script>
<script type="text/javascript" src="../../js/accion_inicio.js"></script>




</html>
