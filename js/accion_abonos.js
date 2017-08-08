$(document).ready(function(){
	buscar_datos();
})
function buscar_datos(consulta){
	$.ajax({
		url:'modulos/abonos/buscar_orden.php',
		type: 'POST',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$('#datos').html(respuesta);
	})
	.fail(function(){
		console.log("error");
	})
}
$(document).on('keyup', '#caja_busqueda', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_datos(valor);
	}else{
		buscar_datos();
	}
})