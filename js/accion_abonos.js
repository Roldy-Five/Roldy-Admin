$(document).ready(function(){
	buscar_datos();
	$('select').material_select();
	$('.modal').modal();
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

function realizar_abono(orden_id, deuda){

	if (deuda==0){
		$('#'+orden_id).attr('href', '#nada');
		swal("Ya se ha cancelado la orden !!");
	}

	$('#principal form').submit(function(e){
		e.preventDefault();
		var responsable = $('#responsable');
		var abonos = $('#abonos');
		if (responsable.val() ==""){
			 responsable.attr("style","border-bottom: 1px solid red");
		}else if(abonos.val()==""){
			responsable.attr("style","border-bottom: 1px solid gray");
			abonos.attr("style","border-bottom: 1px solid red");
		}else if(deuda < $("#abonos").val()){
			//alert(abonos.val())
			swal("El abono no puede ser mayor a la deuda.");
			responsable.attr("style","border-bottom: 1px solid gray");
			abonos.attr("style","border-bottom: 1px solid red");
		}else {
			responsable.attr("style","border-bottom: 1px solid gray");
			abonos.attr("style","border-bottom: 1px solid gray");
			var res = $('#responsable').val();
			var abo = $('#abonos').val();
			$('#abonar').addClass('disabled');
			$.ajax({
				url: 'modulos/abonos/insertar_abono.php',
				type: 'POST',
				data: {orden_id:orden_id,res:res,abo:abo},
			})
			.done(function(respuesta){

				// alert(respuesta);
				if(respuesta=="no hubo conexion"){
	                swal("No se pudo realizar el abono");
					setTimeout(redireccionar, 2500);
	            }else{
	            	swal("Se ha realizado el abono");
					setTimeout(redireccionar, 2500);
	            }
	})	
		}


	})

}

function redireccionar(){
	window.location.replace("index.php?modulo=abonos&elemento=index.php");
}

function detalle(orden_id){
	$.ajax({
		url: 'modulos/abonos/detalle.php',
		type: 'POST',
		data: {orden_id:orden_id},
	})
	.done(function(respuesta) {
		$("#detallesorden").html(respuesta);
	})
}

function actualizar_detalle(detalle_id,orden){
	var estado = $('#'+detalle_id).val();
	//alert(estado);
	$.ajax({
		url: 'modulos/abonos/actualizar_detalle.php',
		type: 'POST',
		data: {estado:estado,detalle_id:detalle_id,orden:orden},
	})
	.done(function(respuesta){
		buscar_datos();
		//console.log(respuesta);
		if (respuesta==false) {
			swal("No se pudo actualizar el estado");
		}else if (respuesta==true) {
			swal("Estado actualizado correctamente");
		}
	})
	.fail(function() {
		console.log("error");
	})
}
function generar_pdf(id_orden){
	window.open("modulos/orden/vista.php?orden_id="+id_orden);
}

function actualizar_fecha(id_orden){
	$("#fecha").click(function(event) {
		event.preventDefault();
		var fecha = $("#fecha_entrega").val();

		if (fecha == "") {
			$("#fecha_entrega").attr('style', 'border-bottom: 1px solid red');
		}else{
			$("#fecha_entrega").attr('style', 'border-bottom: 1px solid gray');
			//$("#fecha_entrega").val("");
			$.ajax({
				url: 'modulos/abonos/editar_fecha.php',
				type: 'POST',
				data: {id_orden:id_orden,fecha:fecha},
			})
			.done(function(respuesta) {
				if (respuesta==false) {
					swal("No se pudo actualizar la fecha");
					setTimeout(redireccionar, 2500);
				}else{
					swal("Fecha actualizado correctamente");
					setTimeout(redireccionar, 2500);
				}
			})
			.fail(function() {
				console.log("error");
			})
			
		}
	});
}