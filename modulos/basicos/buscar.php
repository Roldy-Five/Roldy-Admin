<?php 
 include ('../../conexion.php');
	$salida = "";
	$query= "SELECT id,descripcion,precio from tipo_prenda  ORDER BY id desc";

		$resultado = $conn->query($query);
		if ($resultado->num_rows > 0) {
			$salida.="<table class='striped responsive-table centered'  >
						<thead>  
						    <tr>
						        <th>Nombre</th>
						        <th>Precio</th>
						        <th>Opciones</th>
						    </tr>
				   		</thead><tbody>";

			while($row=$resultado->fetch_assoc()){
		$salida.="
				<tr id='cuerpo'>
					
					<td id='identifica'>".$row['descripcion']."</td>
					<td>".$row['precio']."</td>
					<td>
						<a href='#modal2' id='llenar' class='btn-floating btn-large waves-effect waves-light amber darken-2 tooltipped' onclick='mostrar(".$row['id'].");' data-position='left' data-delay='50' data-tooltip='Editar'> <i class='material-icons'>create</i>
						</a>
						<a id='borrar' class='btn-floating btn-large waves-effect waves-light red tooltipped' onclick='eliminar(".$row['id'].");' data-position='right' data-delay='50' data-tooltip='Eliminar'> <i class='material-icons red tiny'>clear</i>
						</a>
					</td>
					
				</tr>";
			}
			$salida.="</tbody></table>";
		}
	echo $salida;


?>
