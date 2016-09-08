 $(document).ready(function(){
/*listarZonaUbicacionGeografica();*/
$("#idcargos").prop("disabled",true);
$("#dnipersonal").prop("disabled",true);
$("#idperfil").prop("disabled",true);
$("#cmbpersocio").prop("disabled",true);
  listarUsuario();
});


 function getDniPersonal(dniPer){
       $.post("index.php?page=personal&accion=obtenerPersonalxDni",{dni:dniPer},function (response){
        console.log(response);
        if (response.dnipersonal!==null) {
            $("#datospersonal").val(response.apepapersonal+' '+response.apemapersonal+','+response.nompersonal); 
            $("#codigopersonal").val(response.idpersonal);
        } else{
           $("#datospersonal").val("No se encontraron coicidencias");
        };
                     
          });
     }

 function getDniSocio(dniSoc){
       $.post("index.php?page=socio&accion=obtenerSocioxDni",{dni:dniSoc},function (response){
        console.log(response);
        if (response.dniSoc!==null) {
            $("#datospersonal").val(response.apellidoPatSoc+' '+response.apellidoMatSoc+','+response.nombresSoc); 
            $("#codigosocio").val(response.idSoc);
        } else{
           $("#datospersonal").val("No se encontraron coicidencias");
        };
                     
          });
     }

 function listarUsuario(){
       $.post("index.php?page=usuario&accion=listaUsuario",function (response){
               $("#lusuario").html(response);       
          });
     }





  $('#dnipersonal').on('keyup', function(e){
    e.preventDefault();
    var dni = $('#dnipersonal').val();
    var tamano = $('#dnipersonal').val().length;
    var tipodeusuario= $("#tipodeusuarios").val();

    if (tamano == 8) {
      //  $("#dnipersonal").prop("disabled",true);
       // $("#tipousu").prop('checked',false);
      //  alert("limpiar radio");
      if (tipodeusuario=="P") {
        $("#lpersonalcargos" ).css("display", "block " ) ;
        
        getDniPersonal(dni);
        CargosPersonal(dni);

      } else{getDniSocio(dni);
     
       // $("#tipousu").prop('checked',false);
      };
    };
  });


   $("select[name=cmbpersocio]").change(function(){
           var idpersonalsocio=$('select[name=cmbpersocio]').val();
           var dnipersonlcargo=$('#cmbpersocio').val().split("-");
           var dnipersonal=dnipersonlcargo[1];
           var codPerCargo=dnipersonlcargo[0];
           var tipUsuario=$("#tipodeusuarios").val();          
            if (tipUsuario=="P") {
                 CargosPersonal(dnipersonal);
                 $("#codigopersonal").val(codPerCargo);

            } else{
              console.log("No es personal");
               $("#codigosocio").val(codPerCargo);
            };
        });

function CargosPersonal(dniPer){
       $.post("index.php?page=usuario&accion=listarPersonalCargo",{dni:dniPer},function (response){
                console.log(response);
             $("#lpersonalcargos").html(response);
             $("#lpersonalcargos" ).css("display", "block" ) ;

          });
     }


    $("input[name=tipousu]").click(function () {    
       var tipo=$(this).val();
       // alert("valor con this: "+tipo);
        if (tipo=="P") {
               CmbPersonalActivos();
          }else{
              CmbSocioActivos();
          };
        $("#tipodeusuarios").val(tipo);
        $('#dnipersonal').val("");
        $("#datospersonal").val("");
        $("#lpersonalcargos" ).css("display", "none" ) ; 
        $("#dnipersonal").prop("disabled",false);
        $("#idperfil").prop("disabled",false);
        $("#cmbpersocio").prop("disabled",false);
       

    });

   
function CmbSocioActivos(){

   $.post("index.php?page=usuario&accion=listarCmbSocioActivos", function (response){
     $("#cmbpersocio").html(response);
    // console.log(response);
   })

}

function CmbPersonalActivos(){
   $.post("index.php?page=usuario&accion=listarCmbPersonalActivos", function (response){
     $("#cmbpersocio").html(response);
     //console.log(response);
   })

}

$("#npecargo").click(function (){
   limpiar();

})


  $(document).on('click','#btnguardausuario', function () {
    var usua=$("#usu").val();
    var clave=$("#usu").val();
    var codrol=$("#codigoperfil").val();
    var tipousu=$("#tipodeusuarios").val();
    var idpcargo=$("#idpersonalconcargo").val();
    var idsocio=$("#codigosocio").val();

    if (codrol!=="") {
       
      if (tipousu=="P") {
          $.post("index.php?page=usuario&accion=insertarUsuario",{usuar:usua,Usutipo:tipousu,Rolid:codrol,Pcaid:idpcargo,Socid:idsocio},function (response){
               toastr.success(response);
               limpiar();
               $("#modalusuario").modal('hide'); 
               listarUsuario();});

          }else{

               
                  $.post("index.php?page=usuario&accion=insertarUsuarioSocio",{usuar:usua,Usutipo:tipousu,Rolid:codrol,Pcaid:idpcargo,Socid:idsocio},function (response){
               toastr.success(response);
               limpiar();
               $("#modalusuario").modal('hide'); 
               listarUsuario();});

          };
   
    } else{
       toastr.error("debe seleccionar un perfil");
    };
          
   })

    $("select[name=idperfil]").change(function(){
           var idperfil=$('select[name=idperfil]').val();
                  $("#codigoperfil").val(idperfil);      
        });



function limpiar(){
    $("#usu").val("");
    $("#clave").val("");
    $("#codigoperfil").val("");
    $("#tipodeusuarios").val("");
    $("#idpersonalconcargo").val("");
    $("#idperfil").val(0);
    $("#cmbpersocio").val(0);
    //$("#tipousu").val("");
    $("[name=tipousu]").removeAttr("checked");
    $("#lpersonalcargos").css("display","none"); 
    
}





function eliminarUsuario(idusu){

$.post("index.php?page=usuario&accion=eliminarUsuario",{cod:idusu},function (response){
     toastr.success(response);
      listarUsuario();  

   });

}


  $(document).on('click','.activarUsuario', function () {
  var evento = $(this).is(':checked');
  var idusuario = $(this).data('idusuario');
   var activo="A";
   var inactivo="I";
          if (evento) {
            
             estadosUsuario(activo,idusuario);
          }else{
             estadosUsuario(inactivo,idusuario);
          }

   });

     function estadosUsuario(tipo,codusuario){
      //alert(tipo+"-"+codusuario );
      $.post("index.php?page=usuario&accion=estadoUsuario",{estado:tipo,idusu:codusuario},function (response){              
                   toastr.success(response);
                 // toastr.success(response);
                  listarUsuario();
          });  

}


function restablecerPass(idsuario,usuario){

    $.post("index.php?page=usuario&accion=restablecerClave",{codusu:idsuario,passusu:usuario},function (response){              
                  toastr.success(response);
                 // toastr.success(response);
                  //listarUsuario();
          });  

}
