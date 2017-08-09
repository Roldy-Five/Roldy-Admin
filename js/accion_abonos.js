$(document).ready(function(){
	buscar_datos();
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
		var fecha = $('#fecha');
		if (responsable.val() ==""){
			 responsable.attr("style","border-bottom: 1px solid red");
		}else if(abonos.val()==""){
			responsable.attr("style","border-bottom: 1px solid gray");
			abonos.attr("style","border-bottom: 1px solid red");
		}else if(deuda<abonos.val()){
			swal("El abono no puede ser mayor a la deuda.");
			responsable.attr("style","border-bottom: 1px solid gray");
			abonos.attr("style","border-bottom: 1px solid red");
		}else if(fecha.val()==""){
			responsable.attr("style","border-bottom: 1px solid gray");
			abonos.attr("style","border-bottom: 1px solid gray");
			fecha.attr("style","border-bottom: 1px solid red");
		}else {
			responsable.attr("style","border-bottom: 1px solid gray");
			abonos.attr("style","border-bottom: 1px solid gray");
			fecha.attr("style","border-bottom: 1px solid gray");
			var res = $('#responsable').val();
			var abo = $('#abonos').val();
			var fec = $('#fecha').val();
			$('#abonar').addClass('disabled');
			$.ajax({
				url: 'modulos/abonos/insertar_abono.php',
				type: 'POST',
				data: {orden_id:orden_id,res:res,abo:abo,fec:fec},
			})
			.done(function(respuesta){

				// alert(respuesta);
				if(respuesta=="no hubo conexion"){
	                toastr["error"]("No se pudo realizar el abono !")
	                toastr.options = {
	                  "closeButton": false,
	                  "debug": false,
	                  "newestOnTop": false,
	                  "progressBar": true,
	                  "positionClass": "toast-bottom-center",
	                  "preventDuplicates": false,
	                  "onclick": null,
	                  "showDuration": "300",
	                  "hideDuration": "1000",
	                  "timeOut": "5000",
	                  "extendedTimeOut": "1000",
	                  "showEasing": "swing",
	                  "hideEasing": "linear",
	                  "showMethod": "fadeIn",
	                  "hideMethod": "fadeOut"
	                }
	                setTimeout("document.location=document.location",1500);
	            }else{
	            	toastr["success"]("Se ha realizado el abono !!")
	                toastr.options = {
	                  "closeButton": false,
	                  "debug": false,
	                  "newestOnTop": false,
	                  "progressBar": true,
	                  "positionClass": "toast-bottom-center",
	                  "preventDuplicates": false,
	                  "onclick": null,
	                  "showDuration": "300",
	                  "hideDuration": "1000",
	                  "timeOut": "5000",
	                  "extendedTimeOut": "1000",
	                  "showEasing": "swing",
	                  "hideEasing": "linear",
	                  "showMethod": "fadeIn",
	                  "hideMethod": "fadeOut"
	                }
	                // window.location.replace("index.php?modulo=abonos&elemento=index.php");
	                setTimeout("document.location=document.location", 1500);
	            }
	})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		}


	})

}

// function redireccionar(){
	
// }