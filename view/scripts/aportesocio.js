$(function() {
        toastr.options.closeButton = true;
});

$(document).ready(function(){
var idSoc =$("#txtcodsoc").val();
var mesSoc =$("#txtmessoc").val();
var anioSoc =$("#txtaniosoc").val();


//listarAportexIdSoc(idSoc);
});

$("select[name=cboAnio]").change(function(){
          var arreglo=$('select[name=cboAnio]').val().split("|"); 
          var idMap=arreglo[0];
          var anioSele=arreglo[1];
          $('#idMap').val(idMap)
          $('#anioSel').val(anioSele)                   
          $("#listasocio").html('');           
          var idSoc =$("#txtcodsoc").val();
          var mesSoc =$("#txtmessoc").val();
          var anioSoc =$("#txtaniosoc").val();
          listarSociosxAnioxId(idSoc,idMap,anioSele,anioSoc,mesSoc);

});


function listarSociosxAnioxId(id,idMap,anioSele,anioSocio,mesSocio){

  $.post("index.php?page=aportesocio&accion=listarSociosxAnioxId",{idSoc:id,anioSel:anioSele,anioSoc:anioSocio,mesSoc:mesSocio},function (response){
          console.log(response);                 
          $("#listasocio").html(response);    


  });
}




