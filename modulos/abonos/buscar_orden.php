<?php
    include ('../../conexion.php');
	$salida = "";
	$query= "SELECT orden.id, orden.responsable,orden.total,estado.descripcion as Estado_orden,estado_pago.descripcion as Estado_pago,orden.fecha_inicio,orden.fecha_entrega, orden.deuda FROM orden
		INNER JOIN estado ON estado.id = orden.estado_id
		INNER JOIN estado_pago ON estado_pago.id = orden.estado_pago_id ORDER BY orden.id desc";

	if (isset($_POST['consulta'])) {
		$q=$conn->real_escape_string($_POST['consulta']);
		$query = "SELECT orden.id, orden.responsable,orden.total,estado.descripcion as Estado_orden,estado_pago.descripcion as Estado_pago,orden.fecha_inicio,orden.fecha_entrega,orden.deuda FROM orden
				INNER JOIN estado ON estado.id = orden.estado_id
				INNER JOIN estado_pago ON estado_pago.id = orden.estado_pago_id
				WHERE  UPPER(estado.descripcion) LIKE UPPER('%$q%') OR UPPER(orden.responsable) like UPPER('%$q%') OR  UPPER(orden.fecha_entrega)  like UPPER('%$q%') OR  UPPER(estado_pago.descripcion)  like UPPER('%$q%')";
	}
		$resultado = $conn->query($query);
		if ($resultado->num_rows > 0) {
			$salida.="<table class='striped responsive-table centered' border='1'>
		<thead>  
    <tr>
    	
        <th>Responsable</th>
        <th>Estado de orden</th>
        <th>Estado de pago</th>
        <th>Fecha de inicio</th>
        <th>Fecha de entrega</th>
        <th>Total</th>
        <th>Deuda</th>
        <th style='width:250px;'>Opciones</th>
    </tr>
    </thead><tbody>";

			while($row=$resultado->fetch_assoc()){
				$number=$row['total'];
				$total = number_format($number);

				$number1=$row['deuda'];
				$deuda = number_format($number1);
				$salida.="
				<tr id='cuerpo'>
					
					<td id='identifica'>".$row['responsable']."</td>
					<td>".$row['Estado_orden']."</td>
					<td>".$row['Estado_pago']."</td>
					<td>".$row['fecha_inicio']."</td>
					<td>".$row['fecha_entrega']."</td>
					<td>$".$total."</td>
					<td>$".$deuda."</td>
					<td>
						<a href='#fecha_modal' class='btn-floating btn-large waves-effect waves-light brown lighten-2 tooltipped' onclick='actualizar_fecha(".$row['id'].");' data-position='left' data-delay='50' data-tooltip='Realizar abono' ><i class='material-icons'>device_hub</i>
						</a>

						<a href='#abono' id='".$row['id']."' class='btn-floating btn-large waves-effect waves-light blue darken-1 tooltipped' onclick='realizar_abono(".$row['id'].",".$row['deuda'].");' data-position='left' data-delay='50' data-tooltip='Realizar abono' ><i class='material-icons'>attach_money</i>
						</a>

						<a href='#detalle' class='btn-floating btn-large waves-effect waves-light teal tooltipped' onclick='detalle(".$row['id'].");' data-position='top' data-delay='50' data-tooltip='Detalle de la orden' ><i class='material-icons'>add_to_photos</i></a>

						<a class='btn-floating btn-large waves-effect waves-light grey darken-1 tooltipped' onclick='generar_pdf(".$row['id'].");' data-position='right' data-delay='50' data-tooltip='Generar PDF' ><i class='material-icons'>picture_as_pdf</i>
						</a>	
					</td>
					
				</tr>";
			}
			$salida.="</tbody></table>";
		}else{
			$salida.="<p class='pink-text lighten-5'>No se encontraron datos....</p>";
		}
	echo $salida;
?>

