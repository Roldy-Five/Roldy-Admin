$(document).ready(function(){

    $('.cmb').material_select();
    $('#cliente').select2();
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
});
var cont=0;
var orden = [];
var client = [];
var tipo_prend = [];
var preci = [];
var decripcio = [];
// items.pop()

$('#llenar').click(function(){
    var cliente_id = document.getElementById("cliente").value
    var cliente = document.getElementById("cliente").options[document.getElementById("cliente").selectedIndex].text
    var tipo_prenda_id = document.getElementById("tipo_prenda").value
    var tipo_prenda = document.getElementById("tipo_prenda").options[document.getElementById("tipo_prenda").selectedIndex].text
    var precio = $('#precio').val();
    //var estado_detalle = document.getElementById("estado_detalle").options[document.getElementById("estado_detalle").selectedIndex].text
    var descripcion = document.getElementById("descripcion").value
/////Falta validar el responsable ojo 
    var resp = $("#responsable").val();
    var fecha = $("#fecha_entrega").val();
    
    if(resp==""){
         $("#responsable").attr("style","border-bottom: 1px solid red")
    }else if(fecha==""){
         $("#responsable").attr("style","border-bottom: 1px solid gray")
        $("#fecha_entrega").attr("style","border-bottom: 1px solid red")
    }else if(precio==""){
        $("#precio").attr("style","border-bottom: 1px solid red");
        $("#fecha_entrega").attr("style","border-bottom: 1px solid gray")
        $("#responsable").attr("style","border-bottom: 1px solid gray")
    }else if(descripcion==""){
        $("#descripcion").attr("style","border-bottom: 1px solid red")
        $("#precio").attr("style","border-bottom: 1px solid gray")
        $("#fecha_entrega").attr("style","border-bottom: 1px solid gray")
        $("#responsable").attr("style","border-bottom: 1px solid gray")
    }else{
        $("#descripcion").attr("style","border-bottom: 1px solid gray")
        $("#precio").attr("style","border-bottom: 1px solid gray")
        $("#fecha_entrega").attr("style","border-bottom: 1px solid gray")
        $("#responsable").attr("style","border-bottom: 1px solid gray")
        client.push(cliente_id);
        tipo_prend.push(tipo_prenda_id);
        preci.push(precio);
        decripcio.push(descripcion);
        cont++;
        var fila='<tr id-mayor="'+cont+'"><td class="este">'+cont+'</td><td><div class="col s2"><a id="'+cont+'"  class="red btn" onclick="remover(this.id)" > <i class="material-icons red tiny">remove</i></a></div></td><td>'+cliente+'</td><td>'+tipo_prenda+'</td><td>Por realizar</td><td>'+descripcion+'</td><td class="precio">$'+numberFormat(precio)+'</td></tr>';
        $("#body").append(fila);
           reordenar();
          $('#envio').html('<br><div class="col s4 offset-s5" id="n"><button class="modal-action modal-close waves-effect green btn-flat" onclick="insertar();">Realizar orden</button></div>');
        $(".limpiar").val("")

        }
}); 
//Añadir los items al arreglo que será utilizado en la función insertar
        orden.push(client);
        orden.push(tipo_prend); 
        orden.push(preci);
        orden.push(decripcio);
////Función para remover alementos del array
    function remover(fila_id){
        $("tr[id-mayor="+fila_id+"]").remove();
         reordenar();
         if(orden.length < 1) {
            orden.length=0;


         }else {
            //Se eliminan los elementos del array según la posición determinada
           orden[0].splice(fila_id-1,1);
           orden[1].splice(fila_id-1,1);
           orden[2].splice(fila_id-1,1);
           orden[3].splice(fila_id-1,1);

           if(orden[0].length==0){
            $("#n").remove();
           }
         }
       console.log(orden);       
    }



        ///Función para formatear números 
    function numberFormat(numero){
        // Variable que contendra el resultado final
        var resultado = "";
 
        // Si el numero empieza por el valor "-" (numero negativo)
        if(numero[0]=="-")
        {
            // Cogemos el numero eliminando los posibles puntos que tenga, y sin
            // el signo negativo
            nuevoNumero=numero.replace(/\./g,'').substring(1);
        }else{
            // Cogemos el numero eliminando los posibles puntos que tenga
            nuevoNumero=numero.replace(/\./g,'');
        }
 
        // Si tiene decimales, se los quitamos al numero
        if(numero.indexOf(",")>=0)
            nuevoNumero=nuevoNumero.substring(0,nuevoNumero.indexOf(","));
 
        // Ponemos un punto cada 3 caracteres
        for (var j, i = nuevoNumero.length - 1, j = 0; i >= 0; i--, j++)
            resultado = nuevoNumero.charAt(i) + ((j > 0) && (j % 3 == 0)? ".": "") + resultado;
 
        // Si tiene decimales, se lo añadimos al numero una vez forateado con 
        // los separadores de miles
        if(numero.indexOf(",")>=0)
            resultado+=numero.substring(numero.indexOf(","));
 
        if(numero[0]=="-")
        {
            // Devolvemos el valor añadiendo al inicio el signo negativo
            return "-"+resultado;
        }else{
            return resultado;
        }
    }
    // Función para reordenar los items
    function reordenar(){
        var num=1;
        $("#body tr").map(function(){
            $(this).find('td').eq(0).text(num);
            $(this).find('td div a').eq(0).attr('id', num);
            $(this).attr('id-mayor', num);
            num++;
        })
    }
//Función para insertar la orden en la base de datos
    function insertar(){
        var responsable = $("#responsable").val()
        var fecha_entrega = $("#fecha_entrega").val();
        var total=0;
        for (var i =0; i<preci.length;i++){
                 total +=  parseInt(preci[i]);
            }

            var ordenFinal = {
                orden:orden,
                responsable:responsable,
                fecha_entrega:fecha_entrega,
                total:total
            }
        $.ajax({
            url: 'modulos/orden/insertar.php',
            type:'POST',
            data:ordenFinal,
        })
        .done(function(data) {
            if(data==false){
                toastr["error"]("No se pudo generar su orden !")
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
            }else{

                var orden_id = data;

               toastr["success"]("Se ha generado su orden!");
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
                    var url ="modulos/orden/vista.php?orden_id="+orden_id; 
                     
                    // location.href="modulos/orden/vista.php?orden_id="+orden_id;
                    window.open("modulos/orden/vista.php?orden_id="+orden_id);
                   // $("<a>").attr("href", url).attr("target", "_blank")[0].click();
                }
            setTimeout("document.location=document.location", 1200);
            $("tbody").remove();
            $("#n").remove();
           
            // console.log(data);
        })
        .fail(function(error) {
            toastr["error"]("No se pudo generar su orden !")
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
                setTimeout("document.location=document.location", 1200);

        })







    }
