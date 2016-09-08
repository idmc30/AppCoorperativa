 $(function() {
        toastr.options.closeButton = true;
    });



function listarZonaMenuSub(codPerfil){
       $.post("index.php?page=perfilmenu&accion=listaMenu",{id:codPerfil},function (response){
                    $("#listamenusubmenu").html(response);                     
          });
     }

$("select[name=cmbPerfil]").change(function(){
          var idperfil=$('select[name=cmbPerfil]').val();    
          listarZonaMenuSub(idperfil);
          $("#codperfil").val(idperfil);
        });



$(document).on('click','.agregarMenu', function () {
   var evento = $(this).is(':checked');
   var idmeusubmenu = $(this).data('idmenysubmen');
   var idPerfil=$("#codperfil").val();
          if (evento) {
             var accion="insertar"
             insertarPerfilMenu(idPerfil,idmeusubmenu,accion);
          }else{
          	 var accion="eliminar"
            insertarPerfilMenu(idPerfil,idmeusubmenu,accion);
          }
   })


function insertarPerfilMenu(idperfil,idMenu,accion){
     var idperf=$("#codperfil").val();
   $.post("index.php?page=perfilmenu&accion=manejomenuPerfil",{idperfi:idperfil,idmen:idMenu,estado:accion},function (response){
          toastr.success(response);
          listarZonaMenuSub(idperf);
   });
}
