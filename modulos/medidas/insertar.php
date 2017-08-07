<?php
if(isset($_POST['cliente'])){
	//inserto los  datos generales de medidas
	include "../../conexion.php";
	$s=
	"INSERT INTO medidas (cliente_id,cintura,cadera,largo_mocho,largo_falda,largo_blusa) VALUES 
	('$_POST[cliente]','$_POST[cintura]','$_POST[cadera]','$_POST[largo_mocho]','$_POST[largo_falda]','$_POST[largo_blusa]')";
	mysqli_query($conn,$s) ;

	//selecciono el ultimo registro de la tabla medidas
	$medidas_id="";
	$s=
	"SELECT id FROM medidas WHERE id = (SELECT MAX(id) FROM medidas)";
	$cs=mysqli_query($conn,$s);
		while($resul=mysqli_fetch_array($cs)){
			$medidas_id=$resul[0];
			}

	//inserto los datos de vestido
	$s=
	"INSERT INTO vestido (medidas_id,largo,talle,espalda,busto) VALUES 
	('$medidas_id','$_POST[largo_vestido]','$_POST[talle]','$_POST[espalda]','$_POST[busto]')";
	mysqli_query($conn,$s) ;

	//inserto los datos de pantalon
	$s=
	"INSERT INTO pantalon (medidas_id,largo,ancho_muslo) VALUES 
	('$medidas_id','$_POST[largo_pantalon]','$_POST[ancho_muslo]')";
	mysqli_query($conn,$s) ;

	//selecciono el ultimo registro de la tabla vestido
	$vestido_id="";
	$s=
	"SELECT id FROM vestido WHERE id = (SELECT MAX(id) FROM vestido)";
	$cs=mysqli_query($conn,$s);
		while($resul=mysqli_fetch_array($cs)){
			$vestido_id=$resul[0];
			}

	//inserto los datos de largo de manga
	$s=
	"INSERT INTO largo_manga (vestido_id,corto,3_4,largo) VALUES 
	('$vestido_id','$_POST[corto_l]','$_POST[tc_l]','$_POST[largo_l]')";
	mysqli_query($conn,$s) ;

	//inserto los datos de ancho de manga
	$s=
	"INSERT INTO ancho_manga (vestido_id,corto,3_4,largo) VALUES 
	('$vestido_id','$_POST[corto_a]','$_POST[tc_a]','$_POST[largo_a]')";
	mysqli_query($conn,$s) ;
	if(mysqli_error($conn)){
				print(0);
			}
			else{
				print(1);
			}
	
}
 ?>