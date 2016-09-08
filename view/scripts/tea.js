$(document).ready(function(){
     listarTea();
});


function listarTea(){

   $.post("index.php?page=tasa&accion=listarTea",function (response){
       $("#listea") .html(response);
   })
}

$("#btntea").click(function(){         
	  $("#modalTea").modal('show');   
});


$("#btnguardarTea").click(function (){
    var valortea=$("#valorTea").val();
    var idTea=$("#codigoTea").val();
    var tipoTea="T"
    $.post("index.php?page=tasa&accion=insertarTea",{teavalor:valortea,teaid:idTea,tipotea:tipoTea}, function (response){
           toastr.success(response);           
           listarTea();
           limpiarTea();
           $("#modalTea").modal('hide'); 
    });
});


function editarTea(codTea){
      $.post("index.php?page=tasa&accion=obtenerTasa",{cod:codTea}, function (response){
                    $("#valorTea").val(response.valortas);
                    $("#codigoTea").val(response.idtas);
                    $("#modalTea").modal('show'); 

    });	
}



function limpiarTea(){
    $("#valorTea").val("");
    $("#codigoTea").val("");
}

$(document).on('change','#estadoTea', function () {    
        var idTasa =$(this).val();
        var activo="A";
        var inactivo="I";
        var tipo="T";
  $.post("index.php?page=tasa&accion=obtenerTasaxTipo",{Tipotasa:tipo}, function (response){
           var idTassecundario=response.idtas;
           inactivoTea(inactivo,idTassecundario);
           activoTea(activo,idTasa);  
           
  });

})

  function activoTea(estadoTipo,codtasa){
                    $.post("index.php?page=tasa&accion=estadoTasa",{estado:estadoTipo,idtasa:codtasa},function (response){              
                            //toastr.success(response);
                            listarTea();
                     }); 
}

function inactivoTea(estadoTipo,codtasa){
    $.post("index.php?page=tasa&accion=estadoTasa",{estado:estadoTipo,idtasa:codtasa},function (response){              
                            toastr.success(response);
                     }); 
}


/*
 $(document).on('click','.activarTasa', function () {
  var evento = $(this).is(':checked');
  var idtasa = $(this).data('idtasa');
   var activo="A";
   var inactivo="I";
          if (evento) {
             estadosTea(activo,idtasa);
          }else{
             estadosTea(inactivo,idtasa);
          }
   })

  function estadosTea(tipo,codtasa){
   $.post("index.php?page=tasa&accion=estadoTasa",{estado:tipo,idtasa:codtasa},function (response){              
                  toastr.success(response);
                  listarTea();
          });   

}*/

