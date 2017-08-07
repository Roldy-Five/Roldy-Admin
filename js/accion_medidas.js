
$(document).ready(function(){

	$('.modal').modal();
   // $('#cliente').material_select();


    document.getElementById("vestido").style.display="block";
    document.getElementById("blusa").style.display="none";
    document.getElementById("pantalon").style.display="none";
    document.getElementById("falda").style.display="none";
    document.getElementById("short").style.display="none";
    buscar_vestido();
    $(document).on('keyup', '#vestido', function(){
				var valor = $(this).val();
				if (valor != "") {
					buscar_vestido(valor);
				}else{
					buscar_vestido();
				}
			})

    //activar todas las cajas de texto
	 
	 $("#cadera1").focus();
	 $("#largo_blusa1").focus();
	 $("#largo_falda1").focus();
	 $("#largo_mocho1").focus();
	 $("#largo_vestido1").focus();
	 $("#talle1").focus();
	 $("#espalda1").focus();
	 $("#busto1").focus();
	 $("#largo_pantalon1").focus();
	 $("#ancho_muslo1").focus();
	 $("#corto_l1").focus();
	 $("#corto_a1").focus();
	 $("#tc_l1").focus();
	 $("#tc_a1").focus();
	 $("#largo_l1").focus();
	 $("#largo_a1").focus();
	 $("#cintura1").focus();

$("#tipo_prenda").change(function(){
	if($('#tipo_prenda').val()==1){
           buscar_vestido();
           document.getElementById("vestido").style.display="block";
           document.getElementById("blusa").style.display="none";
           document.getElementById("pantalon").style.display="none";
           document.getElementById("falda").style.display="none";
           document.getElementById("short").style.display="none";
           $(document).on('keyup', '#vestido', function(){
				var valor = $(this).val();
				if (valor != "") {
					buscar_vestido(valor);
				}else{
					buscar_vestido();
				}
			})	
           }
           if($('#tipo_prenda').val()==2){
           buscar_blusa();
           document.getElementById("vestido").style.display="none";
           document.getElementById("blusa").style.display="block";
           document.getElementById("pantalon").style.display="none";
           document.getElementById("falda").style.display="none";
           document.getElementById("short").style.display="none";
            $(document).on('keyup', '#blusa', function(){
				var valor = $(this).val();
				if (valor != "") {
					buscar_blusa(valor);
				}else{
					buscar_blusa();
				}
			})	
           }
           if($('#tipo_prenda').val()==3){
           buscar_pantalon();
           document.getElementById("vestido").style.display="none";
           document.getElementById("blusa").style.display="none";
           document.getElementById("pantalon").style.display="block";
           document.getElementById("falda").style.display="none";
           document.getElementById("short").style.display="none";
           $(document).on('keyup', '#pantalon', function(){
				var valor = $(this).val();
				if (valor != "") {
					buscar_pantalon(valor);
				}else{
					buscar_pantalon();
				}
			})	
           }
           if($('#tipo_prenda').val()==4){
           buscar_falda();
           document.getElementById("vestido").style.display="none";
           document.getElementById("blusa").style.display="none";
           document.getElementById("pantalon").style.display="none";
           document.getElementById("falda").style.display="block";
           document.getElementById("short").style.display="none";
           $(document).on('keyup', '#falda', function(){
				var valor = $(this).val();
				if (valor != "") {
					buscar_falda(valor);
				}else{
					buscar_falda();
				}
			})	
           }
           if($('#tipo_prenda').val()==5){
           buscar_mocho();
           document.getElementById("vestido").style.display="none";
           document.getElementById("blusa").style.display="none";
           document.getElementById("pantalon").style.display="none";
           document.getElementById("falda").style.display="none";
           document.getElementById("short").style.display="block";
           $(document).on('keyup', '#short', function(){
				var valor = $(this).val();
				if (valor != "") {
					buscar_mocho(valor);
				}else{
					buscar_mocho();
				}
			})	
           }
    });
})
//buscar los vestidos
function buscar_vestido(consulta){
	$.ajax({
		url:'modulos/medidas/buscar_vestido.php',
		type: 'POST',
		//dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		//alert(respuesta);
		$('#datos').html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
	
}

//buscar las blusas
function buscar_blusa(consulta){
	$.ajax({
		url:'modulos/medidas/buscar_blusa.php',
		type: 'POST',
		//dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		//alert(respuesta);
		$('#datos').html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}

//buscar los pantalones
function buscar_pantalon(consulta){
	$.ajax({
		url:'modulos/medidas/buscar_pantalon.php',
		type: 'POST',
		//dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		//alert(respuesta);
		$('#datos').html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}

//buscar las faldas
function buscar_falda(consulta){
	$.ajax({
		url:'modulos/medidas/buscar_falda.php',
		type: 'POST',
		//dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		//alert(respuesta);
		$('#datos').html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}

//buscar los mochos
function buscar_mocho(consulta){
	$.ajax({
		url:'modulos/medidas/buscar_mocho.php',
		type: 'POST',
		//dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		//alert(respuesta);
		$('#datos').html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}

//insertar las medidas
function insertar(){
	setTimeout("document.location=document.location");
	$('#principal form').on('submit',function(e){

		e.preventDefault();
		$.ajax({
		url: 'modulos/medidas/insertar.php',
		type: 'POST',
		dataType:'json',
		data: $('#principal form').serialize(),
	})
		.done(function(respuesta){
		alert(respuesta);
	})	
	})

}

//mostrar medidas
function mostrar(cliente_id){
	var cliente_id = cliente_id;
	var medida_id = medida_id;
	var vestido_id = vestido_id;
		$.ajax({
		url: 'modulos/medidas/llenar_formulario.php',
		type: 'POST',
		data:{cliente_id:cliente_id,medida_id:medida_id,vestido_id:vestido_id},
		})
		.done(function(respuesta){
		$('#r').html(respuesta);
	})	
}

//editar las medidas
function editar(cliente_id,medidas_id,vestido_id){
	setTimeout("document.location=document.location");
	var cliente_id = cliente_id;
	var medidas_id = medidas_id;
	var vestido_id = vestido_id;

	//var cliente = document.getElementById("cliente1").value
	var cadera = document.getElementById("cadera1").value
	var cintura = document.getElementById("cintura1").value
	var largo_blusa = document.getElementById("largo_blusa1").value
	var largo_falda = document.getElementById("largo_falda1").value
	var largo_mocho = document.getElementById("largo_mocho1").value
	var largo_vestido = document.getElementById("largo_vestido1").value
	var talle = document.getElementById("talle1").value
	var espalda = document.getElementById("espalda1").value
	var busto = document.getElementById("busto1").value
	var largo_pantalon = document.getElementById("largo_pantalon1").value
	var ancho_muslo = document.getElementById("ancho_muslo1").value
	var corto_l = document.getElementById("corto_l1").value
	var tc_l = document.getElementById("tc_l1").value
	var largo_l = document.getElementById("largo_l1").value
	var corto_a = document.getElementById("corto_a1").value
	var tc_a = document.getElementById("tc_a1").value
	var largo_a = document.getElementById("largo_a1").value

	$('#r form').on('submit',function(e){
		e.preventDefault();
		$.ajax({
		url: 'modulos/medidas/editar.php',
		type: 'POST',
		data:{cliente_id:cliente_id,medidas_id:medidas_id,vestido_id:vestido_id,cadera:cadera,cintura:cintura,largo_blusa:largo_blusa,largo_falda:largo_falda,largo_mocho:largo_mocho,largo_vestido:largo_vestido,talle:talle,espalda:espalda,busto:busto,largo_pantalon:largo_pantalon,ancho_muslo:ancho_muslo,corto_l:corto_l,tc_l:tc_l,largo_l:largo_l,corto_a:corto_a,tc_a:tc_a,largo_a:largo_a},
		})
		.done(function(respuesta){
		alert(respuesta);	
	})
	})	

}