<?php 
	if(isset($_POST['orden_id'])){
		$deuda ="";
		$total ="";
		$abono=$_POST['abo'];
		$nueva_deuda="";
		include "../../conexion.php";
		
		$s= "SELECT total,deuda FROM orden WHERE id = '$_POST[orden_id]'";
		$r= mysqli_query($conn,$s);
		while($rw=mysqli_fetch_assoc($r)){
			$deuda=$rw[deuda];
			$total=$rw[total];
		}
		$nueva_deuda = $deuda - $abono;



				$s="INSERT INTO abonos (orden_id,abono,fecha,responsable) VALUES 
				('$_POST[orden_id]','$_POST[abo]',CURRENT_TIMESTAMP,'$_POST[res]')";
				mysqli_query($conn,$s);

				$s="UPDATE orden SET deuda='$nueva_deuda' WHERE id ='$_POST[orden_id]'";
				mysqli_query($conn,$s);
			if($nueva_deuda==0){
				$s="UPDATE orden SET estado_pago_id='2' WHERE id ='$_POST[orden_id]'";
				mysqli_query($conn,$s);
				// print("pagado");
			}else{
				$s="UPDATE orden SET estado_pago_id='1' WHERE id ='$_POST[orden_id]'";
				mysqli_query($conn,$s);

			}
		
			if(mysqli_error($conn)){
				print("no hubo conexion");
			}else{
				print("si hubo conexion");
			}
		}
 ?>