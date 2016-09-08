$(document).ready(function(){
     listarItf();
});


function listarItf(){

   $.post("index.php?page=tasa&accion=listarItf",function (response){
      
       $("#listaitf") .html(response);
   })

}



$("#btnItf").click(function(){         
	  $("#modalItf").modal('show'); 
	  limpiarTea();
})


$("#btnguardarItf").click(function (){
         
    var valoritf=$("#valorItf").val();
    var idItf=$("#codigoItf").val();
    
    $.post("index.php?page=tasa&accion=insertarItf",{itfvalor:valoritf,itfid:idItf}, function (response){
           
           toastr.success(response);           
           listarItf();
           limpiarTea();
           $("#modalItf").modal('hide'); 
    });
})


function limpiarTea(){
    $("#valorItf").val("");
    $("#codigoItf").val("");
}


function editarItf(codTasa){
  
  $.post("index.php?page=tasa&accion=obtenerTasa",{cod:codTasa}, function (response){
      $("#valorItf").val(response.valortas);
      $("#codigoItf").val(response.idtas);
      $("#modalItf").modal('show');       
  })
}
/*
$(document).on('click','.activarTasa', function () {
  var evento = $(this).is(':checked');
  var idtasa = $(this).data('idtasa');
   var activo="A";
   var inactivo="I";
          if (evento) {
             estadosItf(activo,idtasa);
          }else{
             estadosItf(inactivo,idtasa);
          }
   })*/


$(document).on('change','#estadoItf', function () {    
        var idTasa =$(this).val();
        var activo="A";
        var inactivo="I";
        var tipo="I";
  $.post("index.php?page=tasa&accion=obtenerTasaxTipo",{Tipotasa:tipo}, function (response){
           var idTassecundario=response.idtas;
           inactivoItf(inactivo,idTassecundario);
           activoItf(activo,idTasa);  
            
  });

})


  function activoItf(estadoTipo,codtasa){
   
                    $.post("index.php?page=tasa&accion=estadoTasa",{estado:estadoTipo,idtasa:codtasa},function (response){              
                            toastr.success(response);
                            listarItf();
                           
                     }); 

}


function inactivoItf(estadoTipo,codtasa){

    $.post("index.php?page=tasa&accion=estadoTasa",{estado:estadoTipo,idtasa:codtasa},function (response){              
                            toastr.success(response);
                           
                     }); 

}
