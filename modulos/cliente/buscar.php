<?php
    include ('../../conexion.php');
	$salida = "";
	$query= "SELECT cliente.id, cliente.identificacion, cliente.nombre,  cliente.apellidos, sexo.descripcion, cliente.direccion, CONCAT(cliente.telefono_1,' - ',cliente.telefono_2) as telefono  from cliente 
			INNER JOIN sexo ON sexo.id = cliente.sexo_id ORDER BY cliente.id desc";

	if (isset($_POST['consulta'])) {
		$q=$conn->real_escape_string($_POST['consulta']);
		$query = "SELECT cliente.id, cliente.identificacion, cliente.nombre,  cliente.apellidos, sexo.descripcion, cliente.direccion, CONCAT(cliente.telefono_1,' - ',cliente.telefono_2) as telefono
			from cliente 
			INNER JOIN sexo ON sexo.id = cliente.sexo_id 
			WHERE  cliente.identificacion LIKE UPPER('%$q%') OR UPPER(cliente.nombre ) like UPPER('%$q%') OR  UPPER(cliente.apellidos)  like UPPER('%$q%')";
	}

	
		$resultado = $conn->query($query);
		if ($resultado->num_rows > 0) {
			$salida.="<table class='striped responsive-table centered' border='1'>
		<thead>  
    <tr>
        <th>Identificación</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Sexo</th>
        <th>Dirección</th>
        <th>Teléfono</th>
    	<th >Opciones</th>
    </tr>
    </thead><tbody>";

			while($row=$resultado->fetch_assoc()){
		$salida.="
				<tr id='cuerpo'>
					
					<td id='identifica'>".$row['identificacion']."</td>
					<td>".$row['nombre']."</td>
					<td>".$row['apellidos']."</td>
					<td>".$row['descripcion']."</td>
					<td>".$row['direccion']."</td>
					<td>".$row['telefono']."</td>
					<td>
						<a href='#modal2' id='llenar' class='btn-floating btn-large waves-effect waves-light amber darken-2 tooltipped' onclick='mostrar(".$row['id'].");' data-position='left' data-delay='50' data-tooltip='Editar'> <i class='material-icons'>create</i>
						</a>
						<a id='borrar' class='btn-floating btn-large waves-effect waves-light red tooltipped' onclick='eliminar(".$row['id'].",".$row['identificacion'].");' data-position='right' data-delay='50' data-tooltip='Eliminar'> <i class='material-icons red tiny'>clear</i>
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

