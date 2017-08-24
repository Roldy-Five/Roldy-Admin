<?php
    include ('../../conexion.php');
	$salida = "";
	$query= "SELECT * from abonos ORDER BY orden_id DESC";

	if (isset($_POST['consulta'])) {
		$q=$conn->real_escape_string($_POST['consulta']);
		$query = "SELECT * from abonos WHERE  orden_id LIKE UPPER('%$q%') OR UPPER(responsable) like UPPER('%$q%') OR  UPPER(fecha) like UPPER('%$q%') ORDER BY orden_id DESC";
	}

		$resultado = $conn->query($query);
		if ($resultado->num_rows > 0) {
			$salida.="<center><table class='striped responsive-table centered' style='width: 800px'>
						<thead>  
						    <tr>
						        <th>Orden</th>
						        <th>Abono</th>
						        <th>Fecha</th>
						        <th>Responsable</th>
						    </tr>
				   		</thead><tbody>";

			while($row=$resultado->fetch_assoc()){
		$salida.="
				<tr id='cuerpo'>
					
					<td id='identifica'>".$row['orden_id']."</td>
					<td>".$row['abono']."</td>
					<td>".$row['fecha']."</td>
					<td>".$row['responsable']."</td>
					<td>
						<a class='btn-floating btn-large waves-effect waves-light grey darken-1 tooltipped' onclick='generar_pdf(".$row['id'].");' data-position='right' data-delay='50' data-tooltip='Generar PDF' ><i class='material-icons'>picture_as_pdf</i>
						</a>	
					</td>
					
				</tr>";
			}
			$salida.="</tbody></table></center>";
		}else{
			$salida.="<p class='pink-text lighten-5'>No se encontraron datos....</p>";
		}
	echo $salida;


?>
