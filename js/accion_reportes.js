$('select').material_select();




$(document).ready(function() {
	$('#meses').change(function(){

		///Hacer una consulta con like, 
		//que nos devuelva unicamente los totales de las ordenes pagadas en el mes enviado por post
		

		var mes = $(this).val();

		$.ajax({
			url: 'modulos/reportes/reportes.php',
			type: 'POST',
			dataType: 'HTML',
			data: {mes: mes},
			beforeSend:function(){
				$('#resultado').html('<div class="progress"><div class="indeterminate"></div></div>');
			}
		})
		.done(function(data) {
			$('#resultado').html(data);
			console.log(data)
			// $('#mes').text(mes);
		})		
	});
});