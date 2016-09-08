$(document).ready(function(){
var codsocio =$("#txtcodsoc").val();
     //alert(codsocio);   
     //var prueba="33"      ;
listarContAhorro(codsocio);

});

function listarContAhorro(idSocio){
  $.post("index.php?page=contratoahorrosocio&accion=listaContAhorro",{codSocio:idSocio}, function (response){
             $("#listarcontratoahorro").html(response);

  });
}
