<?php 
	require_once('../../conexion.php');
	
	if (isset($_POST['orden_id'])) {
		$orden_id=$_POST['orden_id'];


		$sql = "SELECT orden_cliente.id, CONCAT(cliente.nombre,' ',cliente.apellidos) as cliente, orden.responsable,tipo_prenda.descripcion as Tipo_prenda, orden_cliente.precio,estado.id as Estado,orden_cliente.descripcion 
			FROM orden_cliente
			INNER JOIN cliente ON cliente.id = orden_cliente.cliente_id 
			INNER JOIN orden ON orden.id = orden_cliente.orden_id 
			INNER JOIN tipo_prenda ON tipo_prenda.id = orden_cliente.tipo_prenda_id 
			INNER JOIN estado ON estado.id = orden_cliente.estado_id 
			WHERE orden_cliente.orden_id = $orden_id";

			$data = $conn->query($sql);
			$html = "<table class='striped responsive-table centered' border='1'>
						<thead>  
						    <tr>
						    	
						        <th>Cliente</th>
						        <th>Responsable</th>
						        <th>Prenda</th>
						        <th>Precio</th>
						        <th>Descripción</th>
						        <th>Estado</th>
						        <th>Actualizar</th>
						    </tr>
				    	</thead>
				    <tbody>";
			while($row=$data->fetch_assoc()){
				$number=$row['precio'];
				$precio = number_format($number);
				
				$html .="<tr>
							<td>".$row['cliente']."</td>
							<td>".$row['responsable']."</td>
							<td>".$row['Tipo_prenda']."</td>
							<td>$".$precio."</td>
							<td>".$row['descripcion']."</td>
							<td>
								<select class='estado' id='".$row['id']."'>";
								$s="select id,descripcion from estado ";
								$r= mysqli_query($conn,$s) or die('Error');
								if(mysqli_num_rows($r)>0){
									while($rw=mysqli_fetch_assoc($r)){
										if ($rw["id"]==$row['Estado']){
											$html.="<option value='$rw[id]' selected='selected'> $rw[descripcion]</option>'";
											}else{
												$html.="<option value='$rw[id]'>$rw[descripcion]</option>'";
										}	

									}	

								}
							$html .= " </select></td>";
							$html .= "<td>
											<a class='btn-floating btn-large waves-effect waves-light amber darken-2 tooltipped' onclick='actualizar_detalle(".$row['id'].",".$orden_id.");' data-position='right' data-delay='50' data-tooltip='Actulizar estado de orden' ><i class='material-icons'>edit</i>
											</a>
										</td></tr>";
			}

			$html .="</tbody></table>
			<script type='text/javascript' src='js/accion_abonos.js'></script>";

		print($html);
	}

 ?>