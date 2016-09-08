$("select[name=cmbCliente]").change(function(){
          var idSoc=$('select[name=cmbCliente]').val();      
           listarContCredito(idSoc);
      });



$(document).ready(function(){
  var socioId=$("#txtcodsoc").val();
  listarContCredito(socioId);
});



function listarContCredito(idSocio){
 $.post("index.php?page=contratocreditosocio&accion=listarContCreditos",{codSoc:idSocio}, function (response){
      $("#listaprestamosxsocio").html(response);
 });

}



function imprimirContCredito(idCcr){
     window.open("index.php?page=contratocreditosocio&accion=imprimirContCreditos&idcontacredito="+idCcr, '_blank');
}



