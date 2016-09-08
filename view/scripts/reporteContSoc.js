$(document).ready(function(){
 $('#impcontSoc').hide()
});



$("select[name=cmbCliente]").change(function(){
	   var idSoc=$('select[name=cmbCliente]').val();  
	    listaContratoxSocio(idSoc);
      $('#impcontSoc').show()
        });;



function listaContratoxSocio(idSoc){
   $.post("index.php?page=reportes&accion=lcontratoxSocio", {codSoc:idSoc}, function (response){
          $("#listarContratrosxSoc").html(response);
   })
}


$("#impcontSoc").click(function (){
 var idSoc=$('select[name=cmbCliente]').val();  
window.open("index.php?page=reportes&accion=imprimirContratosSocio&idsoc="+idSoc, '_blank');

})