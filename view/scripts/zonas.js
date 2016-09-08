 $(function() {
        toastr.options.closeButton = true;
    });

$(document).ready(function(){

listarZonas();
});

$(document).on('click','#modal', function () {
           $("#modalZona").modal('show');
           $('#codigoZona').val("");
           $('#nombreZona').val("");
           $('#descripcionZona').val("");
           $("#btnguardarzona").prop("disabled",false);
           $('#btnguardarzona').text("Guardar"); 
})

$(document).on('click','.activarZona', function () {
   var evento = $(this).is(':checked');
   var idZona = $(this).data('idzona');  // data-idzona
   var activo="A";
   var inactivo="I";
          if (evento) {
             //alert("dado click: "+idRol);
             estadoZona(activo,idZona);
          }else{
             estadoZona(inactivo,idZona);
          }
})

function estadoZona(_estado,codZona){

$.post("index.php?page=zona&accion=estadoZona",{estado:_estado,codigo:codZona},function (response){              
                //alert(response);
                toastr.success(response);
                listarZonas();
          });   
}

$("#btnguardarzona").click(function(){
              //$('#btnguardarzona').text("Guardar"); 
              var nomZon=$('#nombreZona').val().toUpperCase();
              var descripcionZon=$('#descripcionZona').val().toUpperCase();
              var codigoZon=$('#codigoZona').val();
              var mensaje="";
               if (codigoZon=="") {
                  mensaje="Está ud. seguro de registrar esta zona?";
               } else{
                  mensaje="Está ud. seguro de actualizar esta zona?";
               }; 

              if (nomZon=="") {
                alert("Ingrese nombre de la zona");
                } 
               
              else{

                   if (descripcionZon=="") {
                      alert("Ingrese descripción de la zona") ;               
                    }
                    else{                      
                            $("#btnguardarzona").prop("disabled",true);                                                          
                              bootbox.confirm(mensaje, function(result) {            
                                if (result) {
                                      $.post("index.php?page=zona&accion=insertarZona",{nombre:nomZon,descripcion:descripcionZon,codigo:codigoZon},function (response){                   
                                      //alert(response);
                                      $("#modalZona").modal('hide'); 
                                      toastr.success(response);                  
                                      listarZonas();
                                     } );          
                                } else{
                                          toastr.success("Se cancelo la operación.");
                                          $("#btnguardarzona").prop("disabled",false);  
                                      };
                                });
                              }
                        }             
});

function editarZona(id){
                            $("#btnguardarzona").prop("disabled",false);
                            $('#btnguardarzona').text("Actualizar");                             
                            $.post("index.php?page=zona&accion=obtenerZona",{codigo:id},function (response){
                            console.log(response);
                            $('#codigoZona').val(response.idZon);                          
                            $('#nombreZona').val(response.nombreZon);  
                            $('#descripcionZona').val(response.descripcionZon);                              
                            $('#modalZona').modal('show') ;
                            
          });
}

function eliminarZona(id){

bootbox.confirm("Está ud. seguro de eliminar esta zona?", function(result) {
  
      if (result) {
           $.post("index.php?page=zona&accion=eliminarZona",{codigo:id},function (response){
                                         
                                     //   $("#observaciones").modal('hide');                            
                             //alert(response);
                              toastr.success(response);
                             listarZonas();                             
      });
        //Example.show("Confirm result: "+result);
      } else{
                      toastr.success("Se cancelo la operación.");
      };
}); 
}

function listarZonas(){
       $.post("index.php?page=zona&accion=listarZona",function (response){
                     $("#listarzona").html(response); 
                     // $("#mostrarcargos").css("display", "block");  
          });
}