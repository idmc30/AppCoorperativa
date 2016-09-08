 $(function() {
        toastr.options.closeButton = true;
    });


$(document).ready(function(){
/*listarZonaUbicacionGeografica();*/
$("#nzug").prop("disabled",true);

});

$(document).on('click','#modalZug', function () {
        $("#btnguardarzug").prop("disabled",false);
})

function listarZonaUbicacionGeograficaxIdZona(codZona){
       $.post("index.php?page=zonaubicaciongeografica&accion=listarZonaUbicacionGeograficaxidZon",{codZon:codZona},function (response){
                    $("#prueba").html(response);                     
                   // $("#mostrarcargos").css("display", "block");  
          });
}

$("select[name=iddpto]").change(function(){
          var idDpto=$('select[name=iddpto]').val();      
          $("#codigoDepartamento").val(idDpto);      
          listarProvincia(idDpto);          
          limpiarCombosdos();
        });

$("select[name=idprovincia]").change(function(){
          var idProvincia=$('select[name=idprovincia]').val();
          $("#codigoProvincia").val(idProvincia);      
          listarDistrito(idProvincia);
        });

$("select[name=iddistrito]").change(function(){
          var idDistrito=$('select[name=iddistrito]').val();
          $("#codigoDistrito").val(idDistrito);                
        });


$("select[name=cmbZona]").change(function(){
          var idZona=$('select[name=cmbZona]').val();
          obtenerZonaxId(idZona);
          $("#nzug").prop("disabled",false);
          listarZonaUbicacionGeograficaxIdZona(idZona);
        });

  $(document).on('click','.activarZug', function () {
  var evento = $(this).is(':checked');
   var idZug = $(this).data('idzug');
   var activo="A";
   var inactivo="I";
          if (evento) {
              estadoZonaUbicacionGeografica(activo,idZug);             
          }else{
             estadoZonaUbicacionGeografica(inactivo,idZug);
          }
   })

function listarProvincia(idDpto){
      $.post("index.php?page=zonaubicaciongeografica&accion=listarProvincia",{codDpto:idDpto},function (response){
      $("#idprovincia").html(response);                     
                 
          });
     }

function listarDistrito(idProvincia){
      $.post("index.php?page=zonaubicaciongeografica&accion=listarDistrito",{codProvincia:idProvincia},function (response){       
      //console.log(response);
      $("#iddistrito").html(response);                     
      });
     }

function obtenerZonaxId(idZona){
       $.post("index.php?page=zona&accion=obtenerZona",{codigo:idZona},function (response){
        //console.log(response);
        $("#codigoZona").val(response.idZon);
        $("#nombreZona").val(response.nombreZon);
             });
     }

function getDniPersonal(dniPer){
       $.post("index.php?page=personal&accion=obtenerPersonalxDni",{dni:dniPer},function (response){
        if (response.dnipersonal!==null) {
            $("#datospersonal").val(response.apepapersonal+' '+response.apemapersonal+','+response.nompersonal); 
            $("#codigopersonal").val(response.idpersonal);
        } else{
           $("#datospersonal").val("No existe el personal");
        };
                     
          });
     }
$("#btnguardarzug").click(function(){
             var codigozona=$('#codigoZona').val();
             var codigodpto=$('#codigoDepartamento').val();
             var codigoprovincia=$('#codigoProvincia').val();
             var codigodistrito=$('#codigoDistrito').val();
             var codigozug=$('#codigoZug').val();             

             var mensaje="";
             if (codigozug=="") {
                  mensaje="Está ud. seguro de registrar esta zona ubicación geográfica?";                  
              } 
               else{
                 mensaje="Está ud. seguro de actualizar esta zona ubicación geográfica?";                  
              }

            if (codigodpto==""){
              toastr.success("Seleccione un Departamento");
              return false;
            }
            if (codigoprovincia==""){
              toastr.success("Seleccione una Provincia");
              return false;
            }
            if (codigodistrito==""){
              toastr.success("Seleccione un Distrito");
              return false;
            }            

            bootbox.confirm(mensaje, function(result) 
            {            
              if (result) {
                           $("#btnguardarzug").prop("disabled",true);
                           $.post("index.php?page=zonaubicaciongeografica&accion=insertarZonaUbicacion",{
                           codZon:codigozona,
                           codUge:codigodistrito,
                           codZug:codigozug
                           },function (response){
                           //alert(response);
                           toastr.success(response);
                           limpiar();
                           $("#modalZug").modal('hide');
                           listarZonaUbicacionGeograficaxIdZona(codigozona);
                           });  
                        } else{
                                      toastr.success("Se cancelo la operación.");
                                      $("#btnguardarzug").prop("disabled",false);  
                              };
                });    
}); 

$("#nzug").click(function(){

limpiarCombos();
  
}); 

function limpiarCombos(){
     
    
    $('#iddistrito').html('<option style="display:none;" value="0"  selected>Distrito</option>');
    $('#idprovincia').html('<option style="display:none;" value="0"  selected>Provincia</option>');
    $('#iddpto').prop('selectedIndex', 0);

}

function limpiarCombosdos(){

     $('#iddistrito').html('<option style="display:none;" value="0"  selected>Distrito</option>');
     $('#idprovincia').html('<option style="display:none;" value="0"  selected>Provincia</option>');

}


function limpiar(){
  $("#codigoDepartamento").val("");
  $("#codigoProvincia").val("");
  $("#codigoDistrito").val("");                               
  $('#iddistrito').prop('selectedIndex', 0);
  $('#idprovincia').prop('selectedIndex', 0);
  $('#iddpto').prop('selectedIndex', 0);
  $('#iddistrito').html('');
  $('#idprovincia').html('');
  $('#idDpto').html('');

}

function editarPCargo(id){
             $("#btnguardarzug").prop("disabled",false);
             $("#btnguardarzug").text("Actualizar")
             $.post("index.php?page=zonaubicaciongeografica&accion=obtenerPcargo",{cod:id},function (response){
             $("#idcargos").val(response.idcargo);
             $("#codigopersonal").val(response.idpersonal);
             $("#codigocargo").val(response.idcargo);                           
             $('#dnipersonal').val(response.dnipersonal)
             $('#codigocargopersonal').val(response.idpeca);
             getDniPersonal(response.dnipersonal)
             $("#myModal").modal('show'); 
             console.log(response);
             
                           
          }); 


}

function eliminarZonaUbicacionGeografica(idZug){
bootbox.confirm("Está ud. seguro de eliminar esta zona?", function(result) {  
      if (result) {

            $.post("index.php?page=zonaubicaciongeografica&accion=eliminarZonaubicaciongeografica",{codigoZug:idZug},function (response){
                  var codZona= $("#codigoZona").val();
                  toastr.success(response);
                  listarZonaUbicacionGeograficaxIdZona(codZona);                     
                                      });        
      } else{
                  toastr.success("Se cancelo la operación.");
      };
}); 
}

function estadoZonaUbicacionGeografica(estado,codZug){

 $.post("index.php?page=zonaubicaciongeografica&accion=estadoZonaUbicacionGeografica",{estadoZug:estado,idZug:codZug},function (response){              
                  //alert(response);
                  toastr.success(response);
                  var codZona= $("#codigoZona").val();
                  listarZonaUbicacionGeograficaxIdZona(codZona);
          });   

}

/*
$("#nzug").click(function(){
            
            $("#codigoProvincia").val("");
            $("#codigoDistrito").val("");           
           
          }); 

});
*/

function limpiarCombo(){
 $("#codigopersonal").val("");
 $("#codigocargo").val("");
 $("#dnipersonal").val("");
 $('#codigocargopersonal').val("");
 $('#datospersonal').val("");
}