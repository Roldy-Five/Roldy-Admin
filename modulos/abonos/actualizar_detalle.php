<?php 
	
	if (isset($_POST['detalle_id'])) {
		$estado = $_POST['estado'];
		$detalle_id = $_POST['detalle_id'];
		$orden_id = $_POST['orden'];
		require_once('../../conexion.php');
		$s= "UPDATE orden_cliente SET estado_id = '$estado' WHERE id = '$detalle_id'";
		mysqli_query($conn,$s) or die(mysqli_error($conn));

		// $est= "";
		$arreglo= array();
		$query="SELECT estado_id FROM orden_cliente WHERE orden_id ='$orden_id'";
		$r = $conn->query($query);
		$s="";
		$i =0;
		while ($rw=$r->fetch_assoc()) {
			array_push($arreglo, $rw['estado_id']);
			if ($arreglo[$i] == '3') {
				$s = "UPDATE orden SET estado_id = '3' WHERE id='$orden_id'";
			}else{
				$s = "UPDATE orden SET estado_id = '2' WHERE id='$orden_id'";
				break;
			}
			$i++;
		}
		mysqli_query($conn,$s);
		if (mysqli_error($conn)) {
			print(0);
		}else{
			print(1);
		}
	}

 ?>