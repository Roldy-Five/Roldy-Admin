<?php 

function formatearFecha(){
	$meses = ['Diciembre','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio',
	'Agosto','Septiembre','Octubre','Noviembre'];
	date_default_timezone_set('America/Bogota');
	$mes = date('n');
	$dia = date('j');
	$ano = date('Y');
	$hora = date('h');
	$minutos = date('i');
	$segundos = date('s');
	$miliSegundos = date('v');
	$zonaHoraria = date('e');

	$resultadoFecha = $dia .' de '. $meses[$mes] .' de '.$ano .', '.$hora.' horas '.$minutos.' minutos '.$segundos.' segundos';
	return $resultadoFecha;
}

print(formatearFecha());


 ?>