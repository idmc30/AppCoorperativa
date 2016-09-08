$(document).ready(function(){
 $("#nmovimiento").prop("disabled",true);
 $('#informacion').hide();
 $("#cmbMovimiento").val(0);
 $("#cmbMovimiento").prop("disabled",true);
});



$("select[name=cmbMovimiento]").change(function(){
	   var idMovimiento=$('select[name=cmbMovimiento]').val();  
	   var idusuario=$("#textcodusu").val();
	   //$("#nmovimiento").prop("disabled",false);
     listarMovimientos(idMovimiento);
     mostrarInformacion(idMovimiento);
     $('#informacion').show();
     var tipmovimiento=$("#txttipocontrato").val();;

          if (tipmovimiento=="F") {
                
              $("#nmovimiento").prop("disabled",false);
          } else{
          $("#nmovimiento").prop("disabled",false);
          };
        });


function listarMovimientos(idContAhorro){
 $.post("index.php?page=reportes&accion=listarMovimientoxID",{idcah:idContAhorro}, function (response){
      $("#lmovimiento").html(response);
     console.log(response);
 });
}


function mostrarInformacion(idContAhorro){
 $.post("index.php?page=reportes&accion=mostrarInfo",{idco:idContAhorro}, function (response){
                $("#informacion").html(response);
 })
}

$("select[name=cmbTipoMovimiento]").change(function(){
     var tipoMovimiento=$('select[name=cmbTipoMovimiento]').val();  
        $("#texttipomovimiento").val(tipoMovimiento);
        });



$("select[name=cmbtipoContrato]").change(function(){
     var tipoContrato=$('select[name=cmbtipoContrato]').val();  
        $("#cmbMovimiento").prop("disabled",false);
        
        $("#txttipocontrato").val(tipoContrato);

        listarCmbSocioCuenta(tipoContrato);

        });

function listarCmbSocioCuenta(tipoContrato){
   $.post("index.php?page=reportes&accion=listarSocioCuenta",{tipcont:tipoContrato}, function (response){
                $("#cmbMovimiento").html(response);
   })
}




$("#nmovimiento").click(function (){
   var idConCredito=$('select[name=cmbMovimiento]').val(); 
   window.open("index.php?page=reportes&accion=imprimirEstadoCuenta&idcah="+idConCredito, '_blank');
    
});