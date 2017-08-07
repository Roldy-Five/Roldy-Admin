<?php 
///////Libreria https://mpdf.github.io/reference/mpdf-functions/output.html
  require_once ('../../mpdf60/mpdf.php');
if(isset($_GET["orden_id"])){
   require_once('../../conexion.php');
  $orden_id = $_GET["orden_id"];
  $html="";
  $responsable = "";
  $total = "";
  $fecha_entrega = "";
  $query="SELECT responsable,total,fecha_entrega FROM orden WHERE id='$orden_id'";
  $resultado = $conn->query($query);
  while($row=$resultado->fetch_assoc()){
    $responsable=$row['responsable'];
    $total=$row['total'];
    $fecha_entrega=$row['fecha_entrega'];
  }
  $html.='<link rel="stylesheet" type="text/css" href="../../css/materialize.min.css">
            <table class="">
            <thead >
              <tr>
                <th>Responsable</th>
                <th>Fecha de entrega</th>
              </tr>
              <tr>
                <td>'.$responsable.'</td>
                <td>'.$fecha_entrega.'</td>
              </tr><thead>
            ';
    $query = "SELECT CONCAT(cliente.nombre,' ', cliente.apellidos) as Cliente,tipo_prenda.descripcion as Tipo_prenda,estado.descripcion as Estado,orden_cliente.descripcion,orden_cliente.precio FROM orden_cliente INNER JOIN cliente ON cliente.id = orden_cliente.cliente_id INNER JOIN tipo_prenda ON tipo_prenda.id=orden_cliente.tipo_prenda_id INNER JOIN estado ON estado.id = orden_cliente.estado_id WHERE orden_cliente.orden_id = '$orden_id'";
      $resultado = $conn->query($query);
     if ($resultado->num_rows > 0) {
        $html.='<h5><p>Detalle de la orden</p></h5>
          <tr>
              <th>Cliente</th>
              <th>Tipo de prenda</th>
              <th>Estado de la prenda</th>
              <th>Descripción</th>
              <th>Precio</th>
          </tr>';
          while($row=$resultado->fetch_assoc()){
            $html.="
                <tbody>
                <tr>
                <td>".$row['Cliente']."</td>
                <td>".$row['Tipo_prenda']."</td>
                <td>".$row['Estado']."</td>
                <td>".$row['descripcion']."</td>
                <td>".$row['precio']."</td>
                </tr>";
          }$html.="</tbody>
              <tr>
                <th colspan='4' style='text-align: right;'>Total de la orden</th>
                <td>".$total."</td>
              </tr>
          </table>";
      }
  $mpdf = new mPDF();
  $mpdf->debug = false;
  $mpdf->writeHTML($html);
  $mpdf->Output("Ya.pdf","I");
}else{
  $mpdf = new mPDF();
  $mpdf->debug = false;
  $mpdf->writeHTML("No hay orden para mostrar..");
  $mpdf->Output("Ya.pdf","I");
}
 ?>
<!--  -->