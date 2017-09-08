<?php 
///////Libreria https://mpdf.github.io/reference/mpdf-functions/output.html
  require_once ('../../mpdf60/mpdf.php');
if(isset($_GET["abono_id"])){
   require_once('../../conexion.php');
  $abono_id = $_GET["abono_id"];
  $html="";
  $orden = "";
  $abono = "";
  $fecha = "";
  $responsable = "";

  $query="SELECT * FROM abonos
   WHERE id='$abono_id'";
  $resultado = $conn->query($query);
  while($row=$resultado->fetch_assoc()){
    $responsable=$row['responsable'];
    $orden=$row['orden_id'];
    $fecha=$row['fecha'];
    $abono=$row['abono'];
}
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
              <th  class="border"  colspan="2">Responsable:</th>
              <td colspan="2">'.ucwords($responsable).'</td>
            </tr>
            <tr>
              <th rowspan="2" class="border" colspan="2">Número de orden: </th>
              <td rowspan="2" colspan="2">'.$orden.'</td>
            </tr>
            <tr style="border:1px solid white;">
              <td></td>
            </tr>
            
            <tr>
            <th class="border" >Nº</th>
              <th class="border"  colspan="2">Responsable</th>
              <th class="border" colspan="2" >Abono</th>
              <th class="border" >Fecha</th>
            </tr> 
          </thead>
          <tbody>';
            $html.='
                <tr class="fondo-tr">
                	<td align="center">1</td>
                  <td align="center" colspan="2">'.ucwords($responsable).'</td>
                  <td align="center" colspan="2">'.$abono.'</td>
                  <td align="center">'.$fecha.'</td>
                </tr>
                ';
          $html.='
            
          </tr>
          </tbody></table>
          <img src="../../img/tijeras.png" class="tijera" width="30px" height="30px" alt="">
          <a>------------------------------------------------------------------------------------------------------------------------</a>';
  $mpdf = new mPDF();
  $mpdf->debug = false;
  //$mpdf->SetProtection(array("copy","print","modify","annot-forms","fill-forms","extract","assemble","print-highres"), 'UserPassword', '1077444356');  //Establecer una contraseña para el documento y permisos para el usuario dentro del array
  // print($html);
  $mpdf->SetTitle($responsable);
  $mpdf->writeHTML($html);
  $mpdf->Output($abono_id."pdf","I");
}else{
  $mpdf = new mPDF();
  $mpdf->debug = false;
  $mpdf->writeHTML("No hay orden para mostrar..");
  $mpdf->Output($orden_cliente.".pdf","I");
}
 ?>