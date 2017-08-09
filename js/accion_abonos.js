$(document).ready(function(){
	buscar_datos();
	$('select').material_select();
	$('.modal').modal();
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
	                //window.location.replace("index.php?modulo=abonos&elemento=index.php");
	                setTimeout(redireccionar, 1500);
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
	.done(function(respuesta) {
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