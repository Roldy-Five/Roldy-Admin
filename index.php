<!DOCTYPE html>
<html>
<head>
	<title>Roldy Five</title>
	<meta name="viewport" content="width=device-width,user-escalabel=no,initial-scale=1.0, maximum-scale=1.0, minimun-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/toastr.min.css">
</head>
<body>

	<header>
		<ul id="dropdown1" class="dropdown-content">
			<li><a href="#!">Ordenes por realizar</a></li>
			<li><a href="#!">Total por mes</a></li>
			<!--<li class="divider"></li>-->
			</ul>
			<ul id="dropdown2" class="dropdown-content">
			<li><a href="#!">Ordenes por realizar</a></li>
			<li><a href="#!">Total por mes</a></li>
			<!--<li class="divider"></li>-->
			</ul>

		<nav>
		    <div class="nav-wrapper teal darken-2">

		    
		      <span><i class="material-icons left large">person</i>David Raga Renteria</span>
		      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
		      <ul class="right hide-on-med-and-down">
		        <li><a href="index.php?modulo=cliente&elemento=index.php"><i class="material-icons left large">supervisor_account</i>Cliente</a></li>
		        <li><a href="index.php?modulo=medidas&elemento=index.php"><i class="material-icons left large">assignment</i>Medidas</a></li> 
		        <li><a href="index.php?modulo=orden&elemento=index.php"><i class="material-icons left large">shopping_cart</i>Orden</a></li>
		       	<li><a class="dropdown-button" href="#!" data-activates="dropdown2"><i class="material-icons left">trending_down</i>Reportes<i class="material-icons right">arrow_drop_down</i></a></li>
		      </ul>
		      <ul class="side-nav" id="mobile-demo">
		        <li><a href="index.php?modulo=cliente&elemento=index.php">Cliente</a></li>
		        <li><a href="index.php?modulo=medidas&elemento=index.php">Medidas</a></li>
		        <li><a href="index.php?modulo=orden&elemento=index.php">Orden</a></li>
		        	<li><a class="dropdown-button" href="#!" data-activates="dropdown1">Reportes<i class="material-icons right">arrow_drop_down</i></a></li>
		      </ul>
		    </div>
 		 </nav>
	</header>
	<main>
		
	<div class="container" style="margin-bottom:2%;">
		<?php
			$mod = @$_GET['modulo'];
			$m=@$_GET['elemento'];
			$archivo = 'modulos/'.$mod.'/'.$m;
			if (file_exists($archivo) and !empty($_GET['modulo']) and !empty($_GET['elemento'])) {
				include_once($archivo);
			}else{
				include_once("");
			}
		?>
	</div>

		
	</main>

	<footer class="page-footer teal darken-2">
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
		$(".button-collapse").sideNav();
	</script>
</html>