 $(function() {
        toastr.options.closeButton = true;
    });


$(document).ready(function(){
$("#npzo").prop("disabled",true);
//listarPersonalZona();
});

function listarPersonalZona(){
       $.post("index.php?page=personalzona&accion=listarPersonalZona",function (response){
                    $("#prueba").html(response);                     
        //alert(response);
        // $("#mostrarcargos").css("display", "block");  
          });
     }

function listarPersonalZonaIdZona(codZona){
       $.post("index.php?page=personalzona&accion=listarPersonalZonaxidZon",{codZon:codZona},function (response){
                    $("#prueba").html(response);                     

                   // $("#mostrarcargos").css("display", "block");  
          });
     }

$("select[name=cmbZona]").change(function(){
          var idZona=$('select[name=cmbZona]').val();
          $("#codigoZona").val(idZona);
          obtenerZonaxId(idZona);
          $("#npzo").prop("disabled",false);
          listarPersonalZonaIdZona(idZona);
        });

$("select[name=cmbpersonal]").change(function(){
          var idPersonal=$('select[name=cmbpersonal]').val();
          $("#codigoPersonal").val(idPersonal);                
        });

$(document).on('click','.activarPzo', function () {
   var evento = $(this).is(':checked');
   var idPzo = $(this).data('idpzo');
   var activo="A";
   var inactivo="I";
          if (evento) {
              estadoPersonalZona(activo,idPzo);             
          }else{
             estadoPersonalZona(inactivo,idPzo);
          }
   })

function obtenerZonaxId(idZona){
       $.post("index.php?page=zona&accion=obtenerZona",{codigo:idZona},function (response){
        //console.log(response);
        $("#codigoZona").val(response.idZon);
        $("#nombreZona").val(response.nombreZon);
             });
     }


$("#btnguardarpzo").click(function(){
             var codigozona=$('#codigoZona').val();
             var codigopersonal=$('#codigoPersonal').val();
             var codigopzo=$('#codigoPzo').val();
                     
             $.post("index.php?page=personalzona&accion=insertarPersonalZona",{
                            codZon:codigozona,
                            codPer:codigopersonal,
                            codPzo:codigopzo
                            },function (response){
                            //alert(response);
                            toastr.success(response);
                            $("#modalPzo").modal('hide');
                           listarPersonalZonaIdZona(codigozona);
          }); 

      
   });




$("#npzo").click(function(){
       limpiar();
      
   });

function obtenerPersonalZonaxIdPzo(idPzo){

$.post("index.php?page=personalzona&accion=obtenerPersonalZonaxIdPzo",{codPzo:idPzo},function (response){                         
                           $("#codigoPersonal").val(response.idpersonal);
                           $("#codigoZona").val(response.idzona);                                                                                                           
                           $("#codigoPzo").val(response.idpzo); 
                           $("#cmbpersonal").val(response.idpersonal); 
                                                                                    
                           $('#btnguardarpzo').text("Actualizar"); 
                           $("#modalPzo").modal('show'); 
                           console.log(response);
                          
                           
          }); 
}

function eliminarPersonalZona(idPzo){

$.post("index.php?page=personalzona&accion=eliminarPersonalZona",{
                            codigoPzo:idPzo
                            },function (response){
    var codZona= $("#codigoZona").val();
    listarPersonalZonaIdZona(codZona);                     
                          //alert(response);
                          toastr.success(response);
          }); 
}

function estadoPersonalZona(estado,codPzo){

 $.post("index.php?page=personalzona&accion=estadoPersonalZona",{estadoPzo:estado,idPzo:codPzo},function (response){              
                  //alert(response);
                  toastr.success(response);
                  var codZona= $("#codigoZona").val();
                  listarPersonalZonaIdZona(codZona);
          });   

}

function limpiar(){
 $("#codigoPzo").val("");
 /*$("#codigoPersonal").val("");
 $("#codigoZona").val("");
 $("#codigoPzo").val("");*/
}
