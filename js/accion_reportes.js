$('select').material_select();
$(document).ready(function() {
	buscar_abonos();
	$('.datepicker').pickadate({
    // The title label to use for the month nav buttons
        labelMonthNext: 'Mes siguiente',
        labelMonthPrev: 'Mes anterior',

// The title label to use for the dropdown selectors
        labelMonthSelect: 'Selecciona un mes',
        labelYearSelect: 'Selecciona un año',

// Months and weekdays
        monthsFull: [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ],
        monthsShort: [ 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic' ],
        weekdaysFull: [ 'Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado' ],
        weekdaysShort: [ 'Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab' ],

// Materialize modified
        weekdaysLetter: [ 'D', 'L', 'M', 'X', 'J', 'V', 'S' ],
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Hoy',
    clear: 'Limpiar',
    close: 'Cerrar',
    closeOnSelect: false // Close upon selecting a date,
  });
	$('#ver').click(function(event) {
		var inicio = $('#inicio').val();
		var final = $('#final').val();
		if (inicio == "") {
			$('#inicio').attr("style","border-bottom: 1px solid red");
		}
		else if (final == "") {
			$('#inicio').attr("style","border-bottom: 1px solid gray");
			$('#final').attr("style","border-bottom: 1px solid red");
		}
		else{
		$('#inicio').attr("style","border-bottom: 1px solid gray");
		$('#final').attr("style","border-bottom: 1px solid gray");
		$.ajax({
			url: 'modulos/reportes/reportes.php',
			type: 'POST',
			dataType: 'HTML',
			data: {inicio:inicio, final:final},
			// beforeSend:function(){
			// 	$('#resultado').html('<div class="progress"><div class="indeterminate"></div></div>Estamos cargando su reporte..');
			// }
		})
		.done(function(data) {
			$('#resultado').html(data);
		})	
		}	
	});
});

function buscar_abonos(consulta){
	$.ajax({
		url:'modulos/reportes/buscar_abonos.php',
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
		buscar_abonos(valor);
	}else{
		buscar_abonos();
	}
})

function generar_pdf(id_abono){
	window.open("modulos/reportes/vista_abono.php?abono_id="+id_abono);
}