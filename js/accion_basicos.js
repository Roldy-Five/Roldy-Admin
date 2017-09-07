$(document).ready(function() {
	$('.solo-numero').keyup(function (){
		this.value = (this.value + '').replace(/[^0-9]/g, '');
	});
	$('.modal').modal();
	buscar_datos();

	$("#nombre1").focus();
	 $("#precio1").focus();
});

$("#form_insertar").click(function(event) {
	event.preventDefault();
	if ($("#nombre").val() =="") {
		$('#nombre').attr('style', 'border-bottom: 1px solid red');
	}else if ($('#precio').val()=="") {
		$('#nombre').attr('style', 'border-bottom: 1px solid gray');
		$('#precio').attr('style', 'border-bottom: 1px solid red');
	}else {
		$('#nombre').attr('style', 'border-bottom: 1px solid gray');
		$('#precio').attr('style', 'border-bottom: 1px solid gray');
		$("#btnañadir").attr('disabled', 'disabled');
		$.ajax({
			url: 'modulos/basicos/insertar.php',
			type: 'POST',
			data: $("#form_insertar").serialize(),
		})
		.done(function(data) {
			if (data==true) {
				Materialize.toast('Datos insertados', 3000);
				setTimeout(redireccionar, 1500);
			}else if (data==false) {
				Materialize.toast('No se pudieron insertar los datos', 3000);
			}
		})
		.fail(function() {
			console.log("error");
		})
		
	}
});

function buscar_datos(){
	$.ajax({
		url:'modulos/basicos/buscar.php',
		type: 'POST',
	})
	.done(function(respuesta){
		$('#datos').html(respuesta);
	})
	.fail(function(){
		console.log("error");
	})
}

function mostrar(id){
		$.ajax({
		url: 'modulos/basicos/llenar_modal.php',
		type: 'POST',
		data:{id:id},
		})
		.done(function(respuesta){
		$('#r').html(respuesta);
	})	
}
function editar(){
	$("#form_editar").submit(function(event) {
		$("#btneditar").attr('disabled', 'disabled');
		event.preventDefault();
		$.ajax({
			url: 'modulos/basicos/editar.php',
			type: 'POST',
			data: $("#form_editar").serialize(),
		})
		.done(function(data) {
			if (data == true) {
				Materialize.toast('Datos actualizados correctamente', 3000);
				setTimeout(redireccionar, 1500);
			}else if (data == false ) {
				Materialize.toast('No se pudieron actualizar los datos', 3000);
			}
		})
		.fail(function() {
			console.log("error");
		})
		
	});
	
}

function redireccionar(){
	window.location.replace("index2.php?modulo=basicos&elemento=index.php");
}

function eliminar(id){
	swal({
	  title: "",
	  text: "¿Está seguro que desea eliminar el registro ?",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Si",
	  cancelButtonText: "No",
	  closeOnConfirm: false,
	  closeOnCancel: false
	},
	function(isConfirm){
	  if (isConfirm) {
	$.ajax({
		url: 'modulos/basicos/eliminar.php',
		type: 'POST',
		data: {id:id},
	})
	.done(function(data) {
		if(data==true){
				swal({
				  title: "",
				  text: "Se ha eliminado el registro correctamente !!",
				  timer: 1000,
				  showConfirmButton: false,
				  // type:"Cancelled"
				});
				setTimeout(redireccionar);
			}else if(data==false){
				swal({
				  title: "",
				  text: "El registro no puede ser eliminado !!",
				  timer: 1000,
				  showConfirmButton: false,
				});
			}
		})
	} else {
	  	swal({
		  title: "",
		  text: "No se ha eliminado el registro !!",
		  timer: 1000,
		  showConfirmButton: false,
		  // type:"Cancelled"
		});
	  }
	});

}