$(document).ready(function(){
	$('.solo-numero').keyup(function (){
		this.value = (this.value + '').replace(/[^0-9]/g, '');
	});
	$('.modal').modal();
    $('select').material_select();
	buscar_datos();
	 $("#identificacion1").focus();
	 $("#nombre1").focus();
	 $("#apellidos1").focus();
	 $("#direccion1").focus();
	 $("#telefono_11").focus();
	 $("#telefono_21").focus();
		
})

function buscar_datos(consulta){
	$.ajax({
		url:'modulos/cliente/buscar.php',
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

	$('#principal form').submit(function(e){
		e.preventDefault();
		var iden = $("#identificacion");
		var nomb = $("#nombres");
		var apell = $("#apellidos");
		var direc = $("#direccion");
		var tele = $("#telefono_1");
		if (iden.val() ==""){
			 iden.attr("style","border-bottom: 1px solid red");
		}else if(nomb.val()==""){
			iden.attr("style","border-bottom: 1px solid gray");
			nomb.attr("style","border-bottom: 1px solid red");
		}
		else if(apell.val()==""){
			iden.attr("style","border-bottom: 1px solid gray");
			nomb.attr("style","border-bottom: 1px solid gray");
			apell.attr("style","border-bottom: 1px solid red");
		}
		else if(direc.val()==""){
			iden.attr("style","border-bottom: 1px solid gray");
			nomb.attr("style","border-bottom: 1px solid gray");
			apell.attr("style","border-bottom: 1px solid gray");
			direc.attr("style","border-bottom: 1px solid red");
		}
		else if(tele.val()==""){
			iden.attr("style","border-bottom: 1px solid gray");
			nomb.attr("style","border-bottom: 1px solid gray");
			apell.attr("style","border-bottom: 1px solid gray");
			direc.attr("style","border-bottom: 1px solid gray");
			tele.attr("style","border-bottom: 1px solid red");
		}else{
			iden.attr("style","border-bottom: 1px solid gray");
			nomb.attr("style","border-bottom: 1px solid gray");
			apell.attr("style","border-bottom: 1px solid gray");
			direc.attr("style","border-bottom: 1px solid gray");
			tele.attr("style","border-bottom: 1px solid gray");
		
			$.ajax({
			url: 'modulos/cliente/insertar.php',
			type: 'POST',
			dataType:'html',
			data: $('#principal form').serialize(),
		}).done(function(respuesta){
			if(respuesta==false){
			    toastr["error"]("No se pudo insertar los datos!")
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
				toastr["success"]("Datos insertados correctamente!");
			       $("#toast-container").addClass('container');
			        toastr.options = {
			          "closeButton": false,
			          "debug": false,
			          "newestOnTop": false,
			          "progressBar": true,
			          "positionClass": "toast-top-center",
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
		    }
		})	













		}



})


function mostrar(id){
	var i = id;
		$.ajax({
		url: 'modulos/cliente/llenar_formulario.php',
		type: 'POST',
		data:{id_cliente:i},
		})
		.done(function(respuesta){
		$('#r').html(respuesta);
	})	
}

function editar(id){
	
	var i = id;
	var ide = document.getElementById("identificacion1").value
	var nom = document.getElementById("nombre1").value
	var ape = document.getElementById("apellidos1").value
	var sex = document.getElementById("sexo1").value
	var dire = document.getElementById("direccion1").value
	var tel1 = document.getElementById("telefono_11").value
	var tel2 = document.getElementById("telefono_21").value
	$('#r form').on('submit',function(e){
		e.preventDefault();
		$.ajax({
		url: 'modulos/cliente/editar.php',
		type: 'POST',
		data:{id_cliente:i,identificacion:ide,nombre:nom,apellidos:ape,sexo:sex,direccion:dire,telefono_1:tel1,telefono_2:tel2},
		})
		.done(function(respuesta){
			if(respuesta==false){
                toastr["error"]("No se pudo actualizar los datos!")
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
            	toastr["success"]("Datos actualizados correctamente!");
                   $("#toast-container").addClass('container');
                    // toastr["success"]("Se ha generado su orden!", "Notificaciones")
                    toastr.options = {
                      "closeButton": false,
                      "debug": false,
                      "newestOnTop": false,
                      "progressBar": true,
                      "positionClass": "toast-top-center",
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
            }
	})
	})	
}

function eliminar(id,identificacion){	
	swal({
	  title: "",
	  text: "¿Está seguro que desea eliminar el registro con identificación " + identificacion +" ?",
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
	  	var i = id;
		//$.post("modulos/cliente/eliminar.php",{id_cliente:i});
		// buscar_datos();
		$.ajax({
			url: 'modulos/cliente/eliminar.php',
			type: 'POST',
			//dataType: 'html',
			data:{id_cliente:i},
		})
		.done(function(respuesta){
			if(respuesta==true){
				swal({
				  title: "",
				  text: "Se ha eliminado el registro correctamente !!",
				  timer: 1000,
				  showConfirmButton: false,
				  // type:"Cancelled"
				});
				setTimeout("document.location=document.location", 1500);
			}else if(respuesta==false){
				swal({
				  title: "",
				  text: "El registro no puede ser eliminado !!",
				  timer: 1000,
				  showConfirmButton: false,
				});
				
			}
		})	
	    // swal("Deleted!", "Your imaginary file has been deleted.", "success");
	  } else {
	  	swal({
		  title: "",
		  text: "No se ha eliminado el registro !!",
		  timer: 1000,
		  showConfirmButton: false,
		  // type:"Cancelled"
		});



	    // swal("Cancelled", "Your imaginary file is safe :)", "error");
	  }
	});




	// if(confirm('¿Está seguro que desea eliminar el registro con identificación ' + identificacion +' ?')){
	// //setTimeout("document.location=document.location");
	
	// 	}
}

