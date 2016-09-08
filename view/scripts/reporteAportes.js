$(document).ready(function(){
/* 
$("#nmovimiento").prop("disabled",false);
$('#informacion').hide();
$("#cmbMovimiento").val(0);
$("#cmbMovimiento").prop("disabled",true);
*/
  $('#imprimir').hide()

});

$("#consultar").click(function (){
    var fechainicio=$("#textfechainicio").val();
    var fechafinal=$("#textfechafinal").val();
    var inicio=$("#textfechainicio").val().split("-");
    var fin=$("#textfechafinal").val().split("-");
    //var tipoContrato=$('select[name=cmbtipoContrato]').val(); 
    var suminicio=inicio[2]+inicio[1]+inicio[0];
    var sumfinal=fin[2]+fin[1]+fin[0];
    var fechainiciosoc=inicio[2]+"-"+inicio[1]+"-"+inicio[0];
    var fechafinsoc=fin[2]+"-"+fin[1]+"-"+fin[0];

    if (fechainicio=="" && fechafinal=="") {
        toastr.error("Debe ingresar un rango de fechas");
    } else{
        if (suminicio>sumfinal) {
                  toastr.error("La fecha final no debe ser menor a la fecha inicial");  
                  //listarSocContrActivo(fechiniciosoc,fechfiniciosocfin,tipoContrato);
                  listarAportes(fechainiciosoc,fechafinsoc);
        } else{
           $('#imprimir').show();
                  //listarSocContrActivo(fechiniciosoc,fechfiniciosocfin,tipoContrato);
                  listarAportes(fechainiciosoc,fechafinsoc);                   
        };
    };
});

function listarAportes(fechainiciosoc,fechafinsoc){ 
$.post("index.php?page=reportes&accion=listarAporte", {fechaini:fechainiciosoc,fechafin:fechafinsoc}, function (response){
                console.log(response);
                $("#lreportes").html(response);
                
             });
}


$("#imprimir").click(function (){
  var inicio=$("#textfechainicio").val().split("-");
  var fin=$("#textfechafinal").val().split("-");
  var fechainiciosoc=inicio[2]+"-"+inicio[1]+"-"+inicio[0];
  var fechafinsoc=fin[2]+"-"+fin[1]+"-"+fin[0];  
  window.open("index.php?page=reportes&accion=imprimirAporte&fechainix="+fechainiciosoc+"&fechafinx="+fechafinsoc, '_blank');
  //window.open("index.php?page=reportes&accion=imprimirContratosSocio&idsoc="+idSoc, '_blank');

})


$('#textfechainicio').datepicker({
  format: "dd-mm-yyyy",
  language: "es",
  autoclose: true,
  todayBtn: true
}).on(
  'show', function() {      
  // Obtener valores actuales z-index de cadaelemento 
  var zIndexModal = $('#modalcontAhorro').css('z-index');
  var zIndexFecha = $('.datepicker').css('z-index');
        // Reasignamos el valor z-index para mostrar sobre la ventana modal
  $('.datepicker').css('z-index',zIndexModal+1);
}).on('changeDate',function(){
$('#textfechainicio').datepicker('hide');
});


$('#textfechafinal').datepicker({
  format: "dd-mm-yyyy",
  language: "es",
  autoclose: true,
  todayBtn: true
}).on(
  'show', function() {      
  var zIndexModal = $('#modalcontAhorro').css('z-index');
  var zIndexFecha = $('.datepicker').css('z-index');
        $('.datepicker').css('z-index',zIndexModal+1);
}).on('changeDate',function(){
$('#textfechafinal').datepicker('hide');


});


/*



$("select[name=cmbMovimiento]").change(function(){
     var idMovimiento=$('select[name=cmbMovimiento]').val();  
     var idusuario=$("#textcodusu").val();
     //$("#nmovimiento").prop("disabled",false);
     listarMovimientos(idMovimiento);
     mostrarInformacion(idMovimiento);
     $('#informacion').show();
     var tipmovimiento=$("#txttipocontrato").val();;

          if (tipmovimiento=="F") {
                
              $("#nmovimiento").prop("disabled",true);
          } else{
          $("#nmovimiento").prop("disabled",false);
          };



        });


function listarMovimientos(idContAhorro){
 $.post("index.php?page=movimiento&accion=listarMovimientoxID",{idcah:idContAhorro}, function (response){
      $("#lmovimiento").html(response);
     console.log(response);
 });
}


function mostrarInformacion(idContAhorro){
 $.post("index.php?page=movimiento&accion=mostrarInfo",{idco:idContAhorro}, function (response){
                $("#informacion").html(response);
 })
}

$("select[name=cmbTipoMovimiento]").change(function(){
     var tipoMovimiento=$('select[name=cmbTipoMovimiento]').val();  
        $("#texttipomovimiento").val(tipoMovimiento);
        });



$(document).on('click','#btnguardarMovimiento', function () {   
        var txttipomov=$("#texttipomovimiento").val();
        var txtmonto=$("#textmonto").val();
        var tipoMovimiento=$('select[name=cmbTipoMovimiento]').val(); 
        var codigoCont=$('select[name=cmbMovimiento]').val();
        var idusuario=$("#textcodusu").val();
        if (txttipomov=="" ) {
          alert("Debe seleccionar un tipo movimiento");
        } else if(txtmonto==""){
           alert("Debe ingresar un monto");
        }else{
        $.post("index.php?page=movimiento&accion=insertarMovimiento",{tipoMov:tipoMovimiento,montoMov:txtmonto,codcont:codigoCont,codusuario:idusuario}, function (response){
           // alert(response);
             toastr.success(response);
            mostrarInformacion(codigoCont);
            listarMovimientos(codigoCont);
            $("#modamovimiento").modal('hide'); 
          }); 
        };

   })




function estornarMovimiento(codMivimiento){
 $.post("index.php?page=movimiento&accion=obtenerMovimiento",{idcontahorro:codMivimiento},function (response){
  console.log(response)
    bootbox.confirm("Esta usted seguro que desea estornar?", function(result){
                        if (result) {
                                var montomovimiento= response.montoMov;
                                var tipomovimiento=response.tipoMov;   
                                var idcontahorro=response.idCah;
                                var idmovimiento=response.idMov;
                                $.post("index.php?page=movimiento&accion=estornoMovimiento",{montmovi:montomovimiento ,tipmovi:tipomovimiento,codcontahorro:idcontahorro,codmovimiento:idmovimiento},function (response){
                                   toastr.success(response);
                                   listarMovimientos(idcontahorro);
                                   mostrarInformacion(idcontahorro);
                                })
                        } else{
                                   toastr.success("Se cancelo la operación.");
                              };
                  }); 
 })       
}



$("select[name=cmbtipoContrato]").change(function(){
     var tipoContrato=$('select[name=cmbtipoContrato]').val();  
     $("#nmovimiento").prop("disabled",false);
       // $("#cmbMovimiento").prop("disabled",false);
        //$("#txttipocontrato").val(tipoContrato);
        //listarCmbSocioCuenta(tipoContrato);


        });

function listarCmbSocioCuenta(tipoContrato){
   $.post("index.php?page=movimiento&accion=listarSocioCuenta",{tipcont:tipoContrato}, function (response){
                $("#cmbMovimiento").html(response);
   })
}

function limpiar(){
  $("#textmonto").val("");
  $("#cmbTipoMovimiento").val(0);
  $("#texttipomovimiento").val("");
}


*/