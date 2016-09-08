$(document).ready(function(){
 $("#nmovimiento").prop("disabled",true);
 $('#informacion').hide();
 $("#cmbMovimiento").val(0);
 $("#cmbMovimiento").prop("disabled",true);
});





$("select[name=cmbMovimiento]").change(function(){
	   var idMovimiento=$('select[name=cmbMovimiento]').val();  
	   var idusuario=$("#textcodusu").val();
	   $("#nmovimiento").prop("disabled",false);
     listarMovimientos(idMovimiento);
     mostrarInformacion(idMovimiento);
	   //alert(idMovimiento);
     $('#informacion').show();
        });


function listarMovimientos(idContAhorro){
	 $.post("index.php?page=movimientosocio&accion=listarMovimientoxID",{idcah:idContAhorro}, function (response){
	      $("#lmovimiento").html(response);
	 });
}


function mostrarInformacion(idContAhorro){
 $.post("index.php?page=movimientosocio&accion=mostrarInfo",{idco:idContAhorro}, function (response){
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
        $.post("index.php?page=movimientosocio&accion=insertarMovimiento",{tipoMov:tipoMovimiento,montoMov:txtmonto,codcont:codigoCont,codusuario:idusuario}, function (response){
           // alert(response);
            mostrarInformacion(codigoCont);
            listarMovimientos(codigoCont);
          }); 
        };



   })




function estornarMovimiento(codMivimiento){
 $.post("index.php?page=movimientosocio&accion=obtenerMovimiento",{idcontahorro:codMivimiento},function (response){
  console.log(response)
    bootbox.confirm("Esta usted seguro que desea estornar?", function(result) 
                  {
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
     var idSocio=$("#txtcodsoc") .val();
        $("#cmbMovimiento").prop("disabled",false);
        listarCmbSocioCuenta(tipoContrato,idSocio);

        });

function listarCmbSocioCuenta(tipoContrato,idSoc){

   $.post("index.php?page=movimientosocio&accion=listarSocioCuenta",{tipcont:tipoContrato,codSoc:idSoc}, function (response){
                $("#cmbMovimiento").html(response);
   })

}