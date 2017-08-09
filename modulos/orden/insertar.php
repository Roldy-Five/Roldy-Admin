<?php
	if(isset($_POST['orden'])){
		require_once ("../../conexion.php");
		$orden = $_POST['orden'];
		$responsable= $_POST["responsable"];
		$total=$_POST["total"];
		$fecha_entrega=$_POST["fecha_entrega"];
		$orden_id="";
		$query="INSERT INTO `orden` (`id`, `responsable`, `total`, `estado_id`, `estado_pago_id`, `fecha_inicio`, `fecha_entrega`,`deuda`) VALUES (NULL, '$responsable', '$total', '2', '1', CURRENT_TIMESTAMP, '$fecha_entrega','$total')";
		mysqli_query($conn,$query);

		if(mysqli_error($conn)){
			print(0);
		}else{
			$s="SELECT id FROM orden WHERE id = (SELECT MAX(id) FROM orden)";
				$cs=mysqli_query($conn,$s);
				while($resul=mysqli_fetch_array($cs)){
					$orden_id=$resul[0];
					print($orden_id);
				}
			for ($i=0; $i<count($orden[0]); $i++) { 
				$cliente = $orden[0][$i];
				$tipo_prenda = $orden[1][$i];
				$precio = $orden[2][$i];
				$descripcion = $orden[3][$i];
				$query="INSERT INTO `orden_cliente` (`id`, `cliente_id`, `orden_id`, `tipo_prenda_id`, `precio`, `estado_id`,`descripcion`) VALUES (NULL, '$cliente', '$orden_id', '$tipo_prenda', '$precio','2','$descripcion')";
				mysqli_query($conn,$query);			
		}

		}


		
	}else{
		header("location:../../index.php");
	}




 ?>