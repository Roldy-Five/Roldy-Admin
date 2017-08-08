<?php

    include ('../../conexion.php');
	$salida = "";
	$query= "SELECT cliente.id, CONCAT (cliente.nombre,' ', cliente.apellidos) as nombre, medidas.cintura, medidas.cadera,medidas.largo_mocho FROM medidas 
		INNER JOIN cliente ON medidas.cliente_id = cliente.id
		ORDER BY cliente.id desc";

	if (isset($_POST['consulta'])) {
		$q=$conn->real_escape_string($_POST['consulta']);
		$query = "SELECT cliente.id, CONCAT (cliente.nombre,' ', cliente.apellidos) as nombre, medidas.cintura, medidas.cadera,medidas.largo_mocho FROM medidas 
			INNER JOIN cliente ON medidas.cliente_id = cliente.id
			WHERE UPPER(cliente.nombre)  LIKE UPPER('%$q%') OR  UPPER(cliente.apellidos)  like UPPER('%$q%') ";
	}
		$resultado = $conn->query($query);
		if ($resultado->num_rows > 0) {
			$salida.="<h5 class=''><p>Medidas para short</p></h5><table class='striped responsive-table centered'>
		<thead>  
    <tr>
        <th>Nombre Completo</th>
        <th>Cadera</th>
        <th>Cintura</th>
        <th>largo</th>
    	<th>Opciones</th>
    </tr>
    </thead><tbody>";
			while($row=$resultado->fetch_assoc()){
		$salida.="
				<tr id='cuerpo'>
					<td id='identifica'>".$row['nombre']."</td>
					<td>".$row['cadera']."</td>
					<td>".$row['cintura']."</td>
					<td>".$row['largo_mocho']."</td>
					<td>
						<a href='#modal2' id='llenar' class='btn-floating btn-large waves-effect waves-light amber darken-2 tooltipped' data-position='top' data-delay='50' data-tooltip='Editar' onclick='mostrar(".$row['id'].");'> <i class='material-icons'>create</i>
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