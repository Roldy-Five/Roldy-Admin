<?php

    include ('../../conexion.php');
	$salida = "";
	$query= "SELECT cliente.id, CONCAT (cliente.nombre,' ', cliente.apellidos) as nombre, medidas.cintura, medidas.cadera,medidas.largo_blusa,vestido.talle, vestido.espalda, vestido.busto,largo_manga.corto as corto_l, largo_manga.3_4 as 3_4_l, largo_manga.largo as largo_l, ancho_manga.corto as corto_a, ancho_manga.3_4 as 3_4_a, ancho_manga.largo as largo_a FROM medidas 
		INNER JOIN vestido On vestido.medidas_id=medidas.id 
		INNER JOIN cliente ON medidas.cliente_id = cliente.id
		INNER JOIN largo_manga ON largo_manga.vestido_id =vestido.id
		INNER JOIN ancho_manga ON ancho_manga.vestido_id =vestido.id ORDER BY cliente.id desc";

	if (isset($_POST['consulta'])) {
		$q=$conn->real_escape_string($_POST['consulta']);
		$query = "SELECT cliente.id, CONCAT (cliente.nombre,' ', cliente.apellidos) as nombre, medidas.cintura, medidas.cadera,medidas.largo_blusa,vestido.talle, vestido.espalda, vestido.busto,largo_manga.corto as corto_l, largo_manga.3_4 as 3_4_l, largo_manga.largo as largo_l, ancho_manga.corto as corto_a, ancho_manga.3_4 as 3_4_a, ancho_manga.largo as largo_a FROM medidas 
		INNER JOIN vestido On vestido.medidas_id=medidas.id 
		INNER JOIN cliente ON medidas.cliente_id = cliente.id
		INNER JOIN largo_manga ON largo_manga.vestido_id =vestido.id
		INNER JOIN ancho_manga ON ancho_manga.vestido_id =vestido.id 
			WHERE UPPER(cliente.nombre)  LIKE UPPER('%$q%') OR  UPPER(cliente.apellidos)  like UPPER('%$q%') ";
	}
		$resultado = $conn->query($query);
		if ($resultado->num_rows > 0) {

			$salida.="<h5><p>Medidas para blusa</p></h5><table class='striped responsive-table centered animated slideInUp'>
		<thead>  
    <tr>
        <th>Nombre Completo</th>
        <th>Cadera</th>
        <th>Cintura</th>
        <th>largo</th>
        <th>Talle</th>
        <th>Espalda</th>
        <th>Busto</th>
        <th colspan='3'>Largo de manga</th>
        <th colspan='3'>Ancho de manga</th>
    	<th>Opciones</th>
    </tr>
    </thead><tbody>";

			while($row=$resultado->fetch_assoc()){
		$salida.="
				<tr id='cuerpo'>
					<td id='identifica'>".$row['nombre']."</td>
					<td>".$row['cadera']."</td>
					<td>".$row['cintura']."</td>
					<td>".$row['largo_blusa']."</td>
					<td>".$row['talle']."</td>
					<td>".$row['espalda']."</td>
					<td>".$row['busto']."</td>

					<td>Corto: ".$row['corto_l']."</td>
					<td>3/4: ".$row['3_4_l']."</td>
					<td>Largo: ".$row['largo_l']."</td>	

					<td>Corto: ".$row['corto_a']."</td>
					<td>3/4: ".$row['3_4_a']."</td>
					<td>Largo: ".$row['largo_a']."</td>		
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