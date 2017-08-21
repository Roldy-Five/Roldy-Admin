<?php 
	session_start();
	if(isset($_SESSION["usuario"])){
		// header("Location:./index.php?Error=Acceso");
	}else{
		header("Location:./index.php?Error=Acceso denegado");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Roldy Five</title>
	<meta name="viewport" content="width=device-width,user-escalabel=no,initial-scale=1.0, maximum-scale=1.0, minimun-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/iconos.css">		
	<link rel="stylesheet" type="text/css" href="css/toastr.min.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	
	<script src="node_modules/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="node_modules/sweetalert/dist/sweetalert.css">
</head>
<body>

	<header id="header">
		<ul id="dropdown1" class="dropdown-content">
			<li><a href="#!">Ordenes por realizar</a></li>
			<li><a href="index2.php?modulo=reportes&elemento=index.php">Total por mes</a></li>
			<!--<li class="divider"></li>-->
			</ul>
			<ul id="dropdown2" class="dropdown-content">
			<li><a href="#!">Ordenes por realizar</a></li>
			<li><a href="index2.php?modulo=reportes&elemento=index.php">Total por mes</a></li>
			<!--<li class="divider"></li>-->
			</ul>

			<ul id="dropdown3" class="dropdown-content">
			<li><a href="index2.php?modulo=orden&elemento=index.php">Nueva orden</a></li>
			<li><a href="index2.php?modulo=abonos&elemento=index.php">Realizar pagos</a></li>
			<!--<li class="divider"></li>-->
			</ul>
			<ul id="dropdown4" class="dropdown-content">
			<li><a href="index2.php?modulo=orden&elemento=index.php">Nueva orden</a></li>
			<li><a href="index2.php?modulo=abonos&elemento=index.php">Realizar pagos</a></li>
			<!--<li class="divider"></li>-->
			</ul>

		<nav>
		    <div class="nav-wrapper teal darken-2">

		    
		      <span><i class="material-icons left large">person</i>David Raga Renteria</span>
		      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
		      <ul class="right hide-on-med-and-down">
		        <li><a href="index2.php?modulo=cliente&elemento=index.php"><i class="material-icons left large">supervisor_account</i>Cliente</a></li>
		        <li><a href="index2.php?modulo=medidas&elemento=index.php"><i class="material-icons left large">assignment</i>Medidas</a></li> 
		        <li><a class="dropdown-button" href="#!" data-activates="dropdown3"><i class="material-icons left large">shopping_cart</i>Orden<i class="material-icons right">arrow_drop_down</i></a></li>
		       	<li><a class="dropdown-button" href="#!" data-activates="dropdown2"><i class="material-icons left">trending_down</i>Reportes<i class="material-icons right">arrow_drop_down</i></a></li>
		       	<li><a href="index2.php?modulo=inicio&elemento=cerrar_sesion.php"><i class="material-icons left large">power_settings_new</i>Cerrar sesion</a></li>
		      </ul>
		      <ul class="side-nav" id="mobile-demo">
		        <li><a href="index2.php?modulo=cliente&elemento=index.php"><i class="material-icons left large">supervisor_account</i>Cliente</a></li>
		        <li><a href="index2.php?modulo=medidas&elemento=index.php"><i class="material-icons left large">assignment</i>Medidas</a></li> 
		        <li><a class="dropdown-button" href="#!" data-activates="dropdown4"><i class="material-icons left large">shopping_cart</i>Orden<i class="material-icons right">arrow_drop_down</i></a></li>
		       	<li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons left">trending_down</i>Reportes<i class="material-icons right">arrow_drop_down</i></a></li>
		       	<li><a href="index2.php?modulo=inicio&elemento=cerrar_sesion.php"><i class="material-icons left large">power_settings_new</i>Cerrar sesion</a></li>
		    </div>
 		 </nav>
	</header>
	<main>
		
	<div class="container" style="margin-bottom:2%;" id="prin">
		<?php
			$mod = @$_GET['modulo'];
			$m=@$_GET['elemento'];
			$archivo = 'modulos/'.$mod.'/'.$m;
			if (file_exists($archivo) and !empty($_GET['modulo']) and !empty($_GET['elemento'])) {
				include_once($archivo);
			}else{
				include_once("modulos/orden/index.php");
			}
		?>
	</div>

	</main>

	<footer class="page-footer teal darken-2" id="footer">
      <div class="">
        <div class="row">
          <div class="col l6 s12 offset-l3">
            <h5 class="white-text" align="center">Modisteria Roldy Five</h5>
            <p class="white-text text-lighten-4" align="center">Desarrollado por David Raga Renteria y Luis Fernando Raga Renteria</p>
          </div>
         <!--  <div class="col l4 offset-l2 s12">
            <h5 class="white-text">Links</h5>
          </div> -->
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
        Todos los derechos reservados © 2017 Copyright
        <a class="grey-text text-lighten-4 right" href="#!">Ayuda</a>
        </div>
      </div>
    </footer>
    
</body>

	<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> -->
	<script src="js/materialize.min.js"></script>
	<script type="text/javascript" src="js/toastr.min.js"></script>
	<script >
	// document.getElementById("header").style.display="none";
	// document.getElementById("footer").style.display="none";
	// document.getElementById("prin").style.display="none";
		$(".button-collapse").sideNav();
		$('.solo-numero').keyup(function (){
			this.value = (this.value + '').replace(/[^0-9]/g, '');
		});
	</script>
</html>