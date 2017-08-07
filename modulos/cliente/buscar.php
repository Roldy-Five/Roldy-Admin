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
			$salida.="<table class='striped responsive-table' border='1'>
		<thead>  
    <tr>
    	<th style='width:200px;'>Opciones</th>
        <th>Identificación</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Sexo</th>
        <th>Dirección</th>
        <th>Teléfono</th>
    </tr>
    </thead><tbody>";

			while($row=$resultado->fetch_assoc()){
		$salida.="
				<tr id='cuerpo'>
					<td>
						<input type='hidden' value=".$row['id']." id='id' name='id'>
						<div class='row'>
							<div class='col s5 '><a id='borrar' class='red btn' onclick='eliminar(".$row['id'].",".$row['identificacion'].");' > <i class='material-icons red tiny'>clear</i></a></div>
							<div class='col s5 '><a href='#modal2' id='llenar' class='amber darken-2 btn' onclick='mostrar(".$row['id'].");'> <i class='material-icons amber darken-2 tiny'>create</i></a></div>
						</div>
					</td>
					<td id='identifica'>".$row['identificacion']."</td>
					<td>".$row['nombre']."</td>
					<td>".$row['apellidos']."</td>
					<td>".$row['descripcion']."</td>
					<td>".$row['direccion']."</td>
					<td>".$row['telefono']."</td>
					
				</tr>";
			}
			$salida.="</tbody></table>";
		}else{
			$salida.="<h5 class='red '>No se encontraron datos</h5>";
		}
	echo $salida;
?>

