$(function() {
        toastr.options.closeButton = true;
});

$(document).ready(function(){
  listarMontoAporte();
});

function listarMontoAporte(){
   $.post("index.php?page=montoaporte&accion=listarMontoAporte",function (response){
                 $("#listamontoaporte").html(response); 
                 // $("#mostrarcargos").css("display", "block");  
      });
}

$(document).on('click','#modal', function () {
           $('#btnguardarmontoaporte').text("Guardar"); 
           $("#btnguardarmontoaporte").prop("disabled",false); 
           $("#montoApor").modal('show');
           $('#anio').val("");
           $('#montoaporte').val("");
           $('#codigoMontoAporte').val("");
})

$("#btnguardarmontoaporte").click(function(){
              var monto=$('#montoaporte').val();
              var anio=$('#anio').val();
              var codigo=$('#codigomontoaporte').val();

              var mensaje="";
              if (codigo=="") {
                  mensaje="Está ud. seguro de registrar este monto de aporte?";                  
              } 
               else{
                  mensaje="Está ud. seguro de actualizar este monto de aporte?";                  
              }
              
              if (anio=="") {
                toastr.success("Ingrese un año");
                return false;
              };  
              if (monto=="") {
                toastr.success("Ingrese un monto de aporte");
                return false;
              };  
          
              bootbox.confirm(mensaje, function(result) 
              {
                    if (result) {

                                  $("#btnguardarmontoaporte").prop("disabled",true);      
                                  //alert(codigo);
                                  $.post("index.php?page=montoaporte&accion=insertarMontoAporte",{montoa:monto,anioa:anio,codigoa:codigo},function (response){
                                  //console.log()
                                  //alert(response);
                                  toastr.success(response);
                                  $("#montoApor").modal('hide'); 
                                  listarMontoAporte();
                                  } );  
                    } else{
                                  toastr.success("Se canceló la operación.");
                                  $("#btnguardarmontoaporte").prop("disabled",false);  
                          };
              });                
   });


function editarmontoaporte(id){
            $("#btnguardarmontoaporte").prop("disabled",false);
            $('#btnguardarmontoaporte').text("Actualizar");
            $.post("index.php?page=montoaporte&accion=obtenerMontoAporte",{codigo:id},function (response){                                           
            $('#codigomontoaporte').val(response.idMap);                          
            $('#montoaporte').val(response.monto);  
            $('#anio').val(response.anio);              
            $('#montoApor').modal('show') ;
            });
}

$(document).on('click','.activarMontoAporte', function () {
   var evento = $(this).is(':checked');
   var idmap = $(this).data('idmaporte');
   var activo="A";
   var inactivo="I";

          if (evento) {   
             activarmontoAporte(activo,idmap);
          }else{
             activarmontoAporte(inactivo,idmap);
          }
})

function activarmontoAporte(tipo,codigo){
$.post("index.php?page=montoaporte&accion=estadoMontoAporte",{estado:tipo,idmap:codigo},function (response){             
                  toastr.success(response);
                  listarMontoAporte();
          });   
}


function eliminarmontoaporte(id){
    bootbox.confirm("Está ud. seguro de eliminar este monto de aporte?", function(result) {  
      if (result) {
            $.post("index.php?page=montoaporte&accion=eliminarMontoAporte",{codigo:id},function (response){
                           toastr.success(response);
                           listarMontoAporte();
                          });        
      } else{
                      toastr.success("Se cancelo la operación.");

      };
}); 
}

/*

   function listarCargos(){
       $.post("index.php?page=cargo&accion=listarCargo",function (response){
                     $("#listacargo").html(response); 
                     // $("#mostrarcargos").css("display", "block");  
          });
     }

     */