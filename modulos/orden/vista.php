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
  $estado_pago = "";

  $query="SELECT orden.responsable,orden.total,orden.fecha_entrega,estado_pago.descripcion as Estado_pago FROM orden
    INNER JOIN estado_pago ON estado_pago.id = orden.estado_pago_id
   WHERE orden.id='$orden_id'";
  $resultado = $conn->query($query);
  while($row=$resultado->fetch_assoc()){
    $responsable=$row['responsable'];
    $total=$row['total'];
    $fecha_entrega=$row['fecha_entrega'];
    $estado_pago=$row['Estado_pago'];
    $clase="";
    if ($estado_pago =="En deuda") {
        $clase = "red";
      }else{
        $clase = "blue";
      }

  }
   $query = "SELECT CONCAT(cliente.nombre,' ', cliente.apellidos) as Cliente,tipo_prenda.descripcion as Tipo_prenda,estado.descripcion as Estado,orden_cliente.descripcion,orden_cliente.precio FROM orden_cliente
      INNER JOIN cliente ON cliente.id = orden_cliente.cliente_id 
      INNER JOIN tipo_prenda ON tipo_prenda.id=orden_cliente.tipo_prenda_id 
      INNER JOIN estado ON estado.id = orden_cliente.estado_id WHERE orden_cliente.orden_id = '$orden_id'";
      $resultado = $conn->query($query);

     if ($resultado->num_rows > 0) {

        $html.='
        <style>
          .border{
            border:1px solid black;
          }
          .fondo-tr{
            border: .5px solid black;
          }
          .red{
            background:#ef5350;
          }
          .blue{
            background:#2196f3;
          }
          .paddig{
            padding:5px;
          }
          .tijera{
            padding-top: 15px;
          }
        </style>
        <table style="border-collapse:collapse;" border="1">
          <thead>
            <tr>
              <th rowspan="6" colspan="2"  class="border"><img src="../../img/logo-roldyfive.png" width="200px" height="90px" alt=""></th>
              
            </tr>
            <tr>
              <td colspan="4" align="center" height="80px">Ubicados en el barrio las margaritas</td>
            </tr>
            <tr>
              <td colspan="4" align="center" height="40px">Teléfonos de contacto: 3127068685 / 6718133</td>
            </tr>
            <tr>
              <th class="border"  colspan="2">Responsable:</th>
              <td colspan="2">'.ucwords($responsable).'</td>
            </tr>
            <tr>
              <th class="border" colspan="2">Número de orden: </th>
              <td colspan="2">'.$orden_id.'</td>
            </tr>
            <tr>
              <th class="border" colspan="2">Estado de la orden: </th>
              <td class="'.$clase.'" colspan="2">'.$estado_pago.'</td>
            </tr>
            <tr>
              <th class="border">Nº</th>
              <th class="border" >Nombre</th>
              <th class="border" >Tipo de prenda</th>
              <th class="border" >Estado de prenda</th>
              <th class="border">Descripción</th>
              <th class="border">Precio</th>
            </tr> 
          </thead>
          <tbody>';
          $contador = 0;
          while($row=$resultado->fetch_assoc()){
            $contador++;
            $html.='
                <tr class="fondo-tr">
                  <td align="center">'.$contador.'</td>
                  <td align="center">'.ucwords($row['Cliente']).'</td>
                  <td align="center">'.$row['Tipo_prenda'].'</td>
                  <td align="center">'.$row['Estado'].'</td>
                  <td style="max-width:300px;text-align: justify;" class="paddig">'.$row['descripcion'].'</td>
                  <td align="center">$ '.number_format($row['precio']).'</td>
                </tr>
                ';
          }
          $html.='
          <tr>
                  <td colspan="4"></td>
                  <td class="border" align="center"><b>Total factura</b></td>
                  <td align="center">$ '.number_format($total).'</td>

                </tr>

          <tr>
            <td class="border paddig" colspan="6"><b style="text-align:justify;">Recuerde realizar el pago de su orden en los tiempos establecidos.</b></td>
          </tr>
          </tbody></table>
          <img src="../../img/tijeras.png" class="tijera" width="30px" height="30px" alt="">
          <a>-----------------------------------------------------------------------------------------------------------------------------------</a>';
      }
  $mpdf = new mPDF();
  $mpdf->debug = false;
  // print($html);
  $mpdf->writeHTML($html);
  $mpdf->Output($orden_cliente."pdf","I");
}else{
  $mpdf = new mPDF();
  $mpdf->debug = false;
  $mpdf->writeHTML("No hay orden para mostrar..");
  $mpdf->Output($orden_cliente.".pdf","I");
}
 ?>
<!--  -->
