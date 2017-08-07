<?php

    include ('../../conexion.php');
	$salida = "";
	$query= "SELECT cliente.id, CONCAT (cliente.nombre,' ', cliente.apellidos) as nombre, medidas.cintura, medidas.cadera,pantalon.largo, pantalon.ancho_muslo from medidas INNER JOIN pantalon ON pantalon.medidas_id=medidas.id INNER JOIN cliente ON medidas.cliente_id = cliente.id ORDER BY cliente.id desc";

	if (isset($_POST['consulta'])) {
		$q=$conn->real_escape_string($_POST['consulta']);
		$query = "SELECT cliente.id, CONCAT (cliente.nombre,' ', cliente.apellidos) as nombre, medidas.cintura, medidas.cadera,pantalon.largo, pantalon.ancho_muslo from medidas INNER JOIN pantalon ON pantalon.medidas_id=medidas.id INNER JOIN cliente ON medidas.cliente_id = cliente.id
			WHERE UPPER(cliente.nombre)  LIKE UPPER('%$q%') OR  UPPER(cliente.apellidos)  like UPPER('%$q%') ";
	}
		$resultado = $conn->query($query);
		if ($resultado->num_rows > 0) {
			$salida.="<h5 class=''><p>Medidas para pantalon</p></h5><table class='striped responsive-table' border='1'>
		<thead>  
    <tr>
    	<th style='width:200px;'>Opciones</th>
        <th>Nombre Completo</th>
        <th>Cadera</th>
        <th>Cintura</th>
        <th>largo</th>
        <th>Ancho de muslo</th>
    </tr>
    </thead><tbody>";

			while($row=$resultado->fetch_assoc()){
		$salida.="
				<tr id='cuerpo'>
					<td>
						<a href='#modal2' id='llenar' class='amber darken-2 btn' onclick='mostrar(".$row['id'].");'> <i class='material-icons amber darken-2 tiny'>create</i></a></div>
					</td>
					<td id='identifica'>".$row['nombre']."</td>
					<td>".$row['cadera']."</td>
					<td>".$row['cintura']."</td>
					<td>".$row['largo']."</td>
					<td>".$row['ancho_muslo']."</td>
					
				</tr>";
			}
			$salida.="</tbody></table>";
		}else{
			$salida.="<h5 class='red '>No se encontraron datos</h5>";
		}
	echo $salida;
?>