$("select[name=cmbCliente]").change(function(){
          var idSoc=$('select[name=cmbCliente]').val();      
           listarContCredito(idSoc);
      });


function listarContCredito(idSocio){

 $.post("index.php?page=pagos&accion=listarContCreditos",{codSoc:idSocio}, function (response){
      $("#listaprestamosxsocio").html(response);
 });

}


function listarCuotas(idContCredito){
    $.post("index.php?page=pagos&accion=listaCuotaxContCredito",{codContCredito:idContCredito}, function (response){
          $("#listadocuostas").html(response);
          $("#largo").modal('show'); 
    });
    
}



function pagarCuota(codCuota){
  //alert(codCuota);
  $("#pagodetalle").modal('show'); 
  $.post("index.php?page=pagos&accion=obtenerDetalleCuota",{idCuota:codCuota}, function (response){
       console.log(response)
       $("#txtnrocredito").val(response.nrocreditoCcr);
       $("#txtsocio").val(response.apellidoPatSoc+" "+response.apellidoMatSoc+","+response.nombresSoc);
       $("#txtmontocuota").val(response.montoCuo);
       $("#txtvuelto").val("0");
       $("#txtidcuota").val(response.idCuota);
       $("#txtidcontcredito").val(response.idContCredito);
 });
  
}
  

$("#btncalcular").click(function (){
var efectivo=$("#txtefectivo").val();
  if (efectivo!="") {
    var numuno=parseInt($("#txtefectivo").val());
    var numdos=parseInt($("#txtmontocuota").val());
    if (numuno>numdos) {
       var resultado=numuno-numdos;
       $("#txtvuelto").val(resultado.toFixed(2));

    } else{
       var resultado=numdos-numuno;
       $("#txtvuelto").val(resultado.toFixed(2));
    };

  } else{
      toastr.error("Debe Ingresar el monto del efectivo");
      $("#txtvuelto").val("0");
  };

  
})


$("#btnguardarpago").click(function (){
  var efectivo=$("#txtefectivo").val();
  var monto=$("#txtmontocuota").val();
  var cuota=$("#txtidcuota").val();
  var idusuario=$("#textcodusu").val();
  var idccredito=$("#txtidcontcredito").val();
  var estado="C";
      bootbox.confirm("Esta seguro que desea guardar el pago?", function(result) {
                                  if (result) {
                                      if (efectivo!="") {                                           
                                           $.post("index.php?page=pagos&accion=guardarPago",{Pagmonto:monto,Cuoid:cuota,Usuid:idusuario}, function (response){
                                                 //toastr.success(response);
                                                 $.post("index.php?page=pagos&accion=estadoPagoCuota",{idCuota:cuota},function (respuesta){
                                                     listarCuotas(idccredito); 
                                                     $("#pagodetalle").modal('hide');
                                                       toastr.success(respuesta);     
                                                 })
                                           });
                                      }else{
                                        toastr.error("Debe Ingresar el monto del efectivo");
                                      }
                                            
                                  }    else{
                                           toastr.error("Se canceló la operación.");
                                              
                                        };
              });                
})




function imprimirCuota(idCuota){
     var cuota=$("#txtidcuota").val();
     window.open("index.php?page=pagos&accion=imprimirTicketPago&cod="+idCuota, '_blank'); 


}


function imprCronograma(idContCredito){
     var cuota=$("#txtidcuota").val();
     window.open("index.php?page=pagos&accion=imprimirCronograma&codContCredito="+idContCredito, '_blank'); 


}