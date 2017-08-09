<?php 
	$estado = $_POST['estado'];
	$detalle_id = $_POST['detalle_id'];
	$orden_id = $_POST['orden'];
	if (isset($_POST['detalle_id'])) {
		require_once('../../conexion.php');
		$s= "UPDATE orden_cliente SET estado_id = '$estado' WHERE id = '$detalle_id'";
		mysqli_query($conn,$s) or die(mysqli_error($conn));

		// $est= "";
		$arreglo= array();
		$query="SELECT estado_id FROM orden_cliente WHERE orden_id ='$orden_id'";
		$r = $conn->query($query);
		while ($rw=$r->fetch_assoc()) {
			// $est=$rw[estado_id];
			array_push($arreglo, $rw['estado_id']);
		}
		
		for ($i=0;$i<count($arreglo); $i++) { 
			if ($arreglo[$i] == '3') {
				$s="UPDATE orden SET estado_id = '3' WHERE id='$orden_id'";
				mysqli_query($conn,$s);
			}else{
				$s="UPDATE orden SET estado_id = '2' WHERE id='$orden_id'";
				mysqli_query($conn,$s);
			}
		}
		if (mysqli_error($conn)) {
			print(0);
		}else{
			print(1);
		}
	}

 ?>