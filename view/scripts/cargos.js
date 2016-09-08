//alert("menu");

 $(function() {
        toastr.options.closeButton = true;
    });


$(document).ready(function(){

listarCargos();
});

   $(document).on('click','#modal', function () {
           $('#btnguardarcargo').text("Guardar"); 
           $("#btnguardarcargo").prop("disabled",false); 
           $("#observaciones").modal('show');
           $('#codigoCargo').val("");
           $('#nomcargo').val("");
   })

$(document).on('click','.activarCargo', function () {
   var evento = $(this).is(':checked');
   var idcargo = $(this).data('idcargo');
   var activo="A";
   var inactivo="I";
          if (evento) {
           //  alert("dado click: "+idcargo);

             estadosCargo(activo,idcargo);
          }else{
             estadosCargo(inactivo,idcargo);
          }
   })

function estadosCargo(tipo,codcargo){

 $.post("index.php?page=cargo&accion=estadoCargo",{estado:tipo,idcargo:codcargo},function (response){              
                  //alert(response);
                  toastr.success(response);
                  listarCargos();
          });   

}


$("#btnguardarcargo").click(function(){
              var nomcargo=$('#nomcargo').val().toUpperCase();
              var codigo=$('#codigoCargo').val();
              var mensaje="";
              if (codigo=="") {
                  mensaje="Está ud. seguro de registrar este cargo?";                  
              } 
               else{
                  mensaje="Está ud. seguro de actualizar este cargo?";                  
              }
              if (nomcargo=="") 
              {
                //alert("Ingrese nombre del cargo");
                toastr.success("Ingrese nombre del Cargo");
              }                
              else
              {
                  bootbox.confirm(mensaje, function(result) 
                  {
                        if (result) {
                                      $("#btnguardarcargo").prop("disabled",true);                            
                                      $.post("index.php?page=cargo&accion=insertarCargo",{nom:nomcargo,codcargo:codigo},function (response){
                                      //alert(response);
                                      toastr.success(response);
                                      $("#observaciones").modal('hide'); 
                                      listarCargos();
                                      } );  
                        } else{
                                      toastr.success("Se cancelo la operación.");
                                      $("#btnguardarcargo").prop("disabled",false);  
                              };
                  });    
              }  
   });

function editarcargo(id){
            $("#btnguardarcargo").prop("disabled",false);
            $('#btnguardarcargo').text("Actualizar");
            $.post("index.php?page=cargo&accion=obtenerCargo",{cod:id},function (response){                                
           //   $("#observaciones").modal('hide');                            
            $('#codigoCargo').val(response.idcargo);                          
            $('#nomcargo').val(response.nomcargo);  
            //$('#btnguardarcargo').text("Actualizar"); 
            $('#observaciones').modal('show') ;
            });
}

function eliminarcargo(id){
    bootbox.confirm("Está ud. seguro de eliminar este cargo?", function(result) {  
      if (result) {
            $.post("index.php?page=cargo&accion=eliminarCargo",{cod:id},function (response){
                           toastr.success(response);
                           listarCargos();
                          });        
      } else{
                      toastr.success("Se cancelo la operación.");
      };
}); 
}



   function listarCargos(){
       $.post("index.php?page=cargo&accion=listarCargo",function (response){
                     $("#listacargo").html(response); 
                     // $("#mostrarcargos").css("display", "block");  
          });
     }