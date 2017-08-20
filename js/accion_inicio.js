$(document).ready(function() {
	var formulario = $('#inicio_sesion');
	var usuario = $('#usuario');
	var contrasena = $('#contrasena');
	formulario.submit(function(event) {
		event.preventDefault();
		//Validación de datos antes de ser enviados por ajax
		if (usuario.val()==""){
			 Materialize.toast('Diligenciar capo usuario !!', 3000)

		}else if(contrasena.val()==""){
			 Materialize.toast('Diligenciar capo contraseña !!', 3000)
		}else{
			//JSON con los datos a enviar por ajax
			var datos = {
				usuario:usuario.val(),
				contrasena:contrasena.val()
			}
			$.ajax({
				url: 'valida_usuario.php',
				type: 'POST',
				dataType:'HTML',
				data:datos,
				beforeSend:""
			})
			.done(function(data) {
				//Código a ejecutar segú la respuesta positiva del servidor
			})
			.fail(function(data) {
				//Se ejecutará si haya algún error de conexión
			})			
		}
	});
});