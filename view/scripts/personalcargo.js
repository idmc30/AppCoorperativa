$(document).ready(function(){

listarCargoPersonal();
});

  function listarCargoPersonal(){
       $.post("index.php?page=personalcargo&accion=listarPersonalCargo",function (response){
                     $("#prueba").html(response); 
                     // $("#mostrarcargos").css("display", "block");  
          });
     }


  $("select[name=idcargos]").change(function(){
           var id=$('select[name=idcargos]').val();
                  $("#codigocargo").val(id);      
        });


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


  $('#dnipersonal').on('keyup', function(e){
    e.preventDefault();
    var dni = $('#dnipersonal').val();
    var tamano = $('#dnipersonal').val().length;
    if (tamano == 8) {
    getDniPersonal(dni);
    };
  });


$("#btnguardarpca").click(function(){
             var codigopersonal=$('#codigopersonal').val();
             var codigocargo=$('#codigocargo').val();
             var codpercargo=$('#codigocargopersonal').val();
             $.post("index.php?page=personalcargo&accion=insertarPersonalCargo",{
                            idpersonal:codigopersonal,
                            idcargo:codigocargo,
                            idpersonalcargo:codpercargo
                            },function (response){
                              toastr.success(response);
                            $("#myModal").modal('hide');

                           listarCargoPersonal();
          }); 
   });

$("#npecargo").click(function(){
       limpiar();
      // ("#btnguardarpca").text("Guardar")
      $('#idcargos').prop('selectedIndex', 0);
       $("#dnipersonal").prop("disabled",false);
      
   });



function editarPCargo(id){
$.post("index.php?page=personalcargo&accion=obtenerPcargo",{
                            cod:id
                            },function (response){
                           $("#dnipersonal").prop("disabled",true);                           
                           $("#idcargos").val(response.idcargo);
                           $("#codigopersonal").val(response.idpersonal);
                           $("#codigocargo").val(response.idcargo);                           
                           $('#dnipersonal').val(response.dnipersonal)
                           $('#codigocargopersonal').val(response.idpeca);
                           getDniPersonal(response.dnipersonal)
                           $("#myModal").modal('show'); 
                           console.log(response);
                           $("#btnguardarpca").text("Actualizar")
                          
          }); 


}


function eliminarPCargo(id){
$.post("index.php?page=personalcargo&accion=eliminarPersonalCargo",{
                            cod:id
                            },function (response){
                          
                          toastr.error(response);
                          listarCargoPersonal();
          }); 
}


  $(document).on('click','.activarPcargo', function () {
  var evento = $(this).is(':checked');
   var idpercar = $(this).data('idpcar');
   var activo="A";
   var inactivo="I";
          if (evento) {
            
             estadosPca(activo,idpercar);
          }else{
             estadosPca(inactivo,idpercar);
          }

   })



  function estadosPca(tipo,codpercar){

 $.post("index.php?page=personalcargo&accion=estadoPersonalCargo",{estado:tipo,idpercargo:codpercar},function (response){              
                  alert(response);
                  listarCargoPersonal();
          });   

}




function limpiar(){
 $("#codigopersonal").val("");
 $("#codigocargo").val("");
 $("#dnipersonal").val("");
 $('#codigocargopersonal').val("");
 $('#datospersonal').val("");
}
