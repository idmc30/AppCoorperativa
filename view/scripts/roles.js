//alert("menu");

 $(function() {
        toastr.options.closeButton = true;
    });

$(document).ready(function(){

listarRoles();
});

   $(document).on('click','#modal', function () {
           $("#btnguardarrol").prop("disabled",false);  
           $('#btnguardarrol').text("Guardar");  
           $("#modalRol").modal('show');
           $('#codigoRol').val("");
           $('#nomRol').val("");
   })

$(document).on('click','.activarRol', function () {
   var evento = $(this).is(':checked');
   var idRol = $(this).data('idrol');
   var activo="A";
   var inactivo="I";
          if (evento) {
             //alert("dado click: "+idRol);
             estadoRol(activo,idRol);
          }else{
             estadoRol(inactivo,idRol);
          }
   })



function estadoRol(tipo,codRol){

 $.post("index.php?page=rol&accion=estadoRol",{estado:tipo,idRol:codRol},function (response){              
                  //alert(response);
                  toastr.success(response);
                  listarRoles();
          });   

}

$("#btnguardarrol").click(function(){ 
              var nomrol=$('#nomRol').val().toUpperCase();
              var codigo=$('#codigoRol').val();
              var mensaje="";
               if (codigo=="") {
                  mensaje="Está ud. seguro de registrar este perfil?";
               } else{
                  mensaje="Está ud. seguro de actualizar esta perfil?";
               }; 

              if (nomrol=="") 
              {
                //alert("Ingrese nombre del cargo");
                toastr.success("Ingrese nombre del Perfil");
              }                
              else
              {
                  bootbox.confirm(mensaje, function(result) 
                  {
                        if (result) {
                                      $("#btnguardarrol").prop("disabled",true); 
                                      $.post("index.php?page=rol&accion=insertarRol",{nom:nomrol,codRol:codigo},function (response){                   
                                      //alert(response);
                                      toastr.success(response);
                                      $("#modalRol").modal('hide'); 
                                      listarRoles();
                                     });  
                        } else{
                                      toastr.success("Se cancelo la operación.");
                                      $("#btnguardarrol").prop("disabled",false);  
                              };
                  });    
              }  
});

function editarRol(id){
              $("#btnguardarrol").prop("disabled",false);
              $('#btnguardarrol').text("Actualizar");  
              $.post("index.php?page=rol&accion=obtenerRol",{codRol:id},function (response){
              console.log(response)   ;
              $('#codigoRol').val(response.idRol);                          
              $('#nomRol').val(response.nomRol);  
              //$('#btnguardarrol').text("Actualizar"); 
              $('#modalRol').modal('show') ;
                            
            });
}

function eliminarRol(id){

  bootbox.confirm("Está ud. seguro de eliminar este perfil?", function(result) {
    if (result) {
                   $.post("index.php?page=rol&accion=eliminarRol",{codRol:id},function (response){
                   //   $("#observaciones").modal('hide');                            
                   //alert(response);
                   toastr.success(response);
                   listarRoles();
                });
          
    } else{
                        toastr.success("Se cancelo la operación.");
        };
    }); 
}

function listarRoles(){
       $.post("index.php?page=rol&accion=listarRol",function (response){
                     $("#listarol").html(response); 
                     // $("#mostrarcargos").css("display", "block");  
          });
     }