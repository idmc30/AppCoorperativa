$(document).ready(function(){
 $("#nmovimiento").prop("disabled",true);
 $('#informacion').hide();
 $("#cmbMovimiento").val(0);
 $("#cmbMovimiento").prop("disabled",true);
});






//para habilitar el movimiento de acuerdo a la fecha
$("select[name=cmbMovimiento]").change(function(){
     var idMovimiento=$('select[name=cmbMovimiento]').val();  
     var idusuario=$("#textcodusu").val();

     listarMovimientos(idMovimiento);
     mostrarInformacion(idMovimiento);
     
     $('#informacion').show();
     var tipmovimiento=$("#txttipocontrato").val();
          if (tipmovimiento=="F") {                
              //$("#nmovimiento").prop("disabled",true);
             estadoBoton(idMovimiento);
          } else{
           $("#nmovimiento").prop("disabled",false);
          };
        });



function estadoBoton(codCah){
   $.post("index.php?page=movimiento&accion=habilitarBtnMovimiento",{cod:codCah}, function (response){
       // console.log(response);
      // response.valor
        if (response.valor=="habilitar") {
                $("#nmovimiento").prop("disabled",false);
        } else{
             $("#nmovimiento").prop("disabled",true);
        };
   }); 
}


function listarMovimientos(idContAhorro){
 $.post("index.php?page=movimiento&accion=listarMovimientoxID",{idcah:idContAhorro}, function (response){
      $("#lmovimiento").html(response);
     //console.log(response);
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
          toastr.error("Debe seleccionar un tipo movimiento");
        } else if(txtmonto==""){
           toastr.error("Debe ingresar un monto");
        }else{

             $.post("index.php?page=contratoahorro&accion=obtenerContratoAhorro",{cod:codigoCont}, function (response){
                 
                 if (tipoMovimiento=="R" && response.montoActualCah >= txtmonto) {
                          $.post("index.php?page=movimiento&accion=insertarMovimiento",{tipoMov:tipoMovimiento,montoMov:txtmonto,codcont:codigoCont,codusuario:idusuario}, function (response){
                             // alert(response);
                              toastr.success(response);
                              mostrarInformacion(codigoCont);
                              listarMovimientos(codigoCont);
                              $("#modamovimiento").modal('hide'); 
                            }); 
                                          
                                     

                 } else{
                       if (tipoMovimiento=="D" & response.tipoCah=="L") {
                               $.post("index.php?page=movimiento&accion=insertarMovimiento",{tipoMov:tipoMovimiento,montoMov:txtmonto,codcont:codigoCont,codusuario:idusuario}, function (response){
                              toastr.success(response);
                              mostrarInformacion(codigoCont);
                              listarMovimientos(codigoCont);
                              $("#modamovimiento").modal('hide'); 
                            }); 
                       } else{
                          toastr.error("Usted no puede realizar este movimiento");
                           $("#modamovimiento").modal('hide');
                       };
                       
                 };
          
          }); 
        };

   });




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
        $("#cmbMovimiento").prop("disabled",false);
        
        $("#txttipocontrato").val(tipoContrato);

        listarCmbSocioCuenta(tipoContrato);

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


$("#nmovimiento").click(function (){
    limpiar();

})
