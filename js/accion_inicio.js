$(document).ready(function() {
	var formulario = $('#inicio_sesion');
	var usuario = $('#usuario');
	var contrasena = $('#contrasena');
	formulario.submit(function(event) {
		event.preventDefault();
		//Validación de datos antes de ser enviados por ajax
		//alert(usuario);
		if (usuario.val()==""){
			 Materialize.toast('Diligenciar capo usuario !!', 3000);

		}else if(contrasena.val()==""){
			 Materialize.toast('Diligenciar capo contraseña !!', 3000);
		}else{
			//JSON con los datos a enviar por ajax
			var datos = {
				usuario:usuario.val(),
				contrasena:contrasena.val()
			}
			$.ajax({
				url: 'modulos/inicio/valida_usuario.php',
				type: 'POST',
				//dataType:'HTML',
				data:datos,
				beforeSend:""
			})
			.done(function(data) {
				if (data == true) {
					window.location.replace("index2.php");
				}else if (data == false)  {
					Materialize.toast('Usuario o contraeña invalidos !!', 3000);
				}
			})
			.fail(function(data) {
				//Se ejecutará si haya algún error de conexión
				console.log(data)
			})			
		}
	});
});