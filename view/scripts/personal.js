$(function() {
        toastr.options.closeButton = true;
    });


  $(document).on('click','#modal', function () {
           $("#modalpersonal").modal('show');
           limpiar();
          
   })


  $(document).on('click','.activarPersonal', function () {
  var evento = $(this).is(':checked');
  var idpersonal = $(this).data('idpersonal');
   var activo="A";
   var inactivo="I";
          if (evento) {
            // alert("dado click: "+idpersonal);
             estadosPersonal(activo,idpersonal);
          }else{
             estadosPersonal(inactivo,idpersonal);
          }

   })

  function estadosPersonal(tipo,codpersonal){

 $.post("index.php?page=personal&accion=estadoPersonal",{estado:tipo,idpersonal:codpersonal},function (response){              
                  //alert(response);
                  toastr.success(response);
                  listarPersonal();
          });   

}

$("#btnguardarpersonal").click(function(){
             var nombres=$('#nompersonal').val();
             var primerapellido=$('#apepat').val();
             var segundoapellido=$('#apemat').val();
             var dni=$('#dnipersonal').val();
             var telefono=$('#telefpersonal').val();
             var celular=$('#celupersonal').val();
             var correo=$('#exampleInputEmail1').val();
             var codigo=$('#codigopersonal').val();
             var tamano=$('#dnipersonal').val().length;
            // alert(correo);

            if (nombres=="") {
              toastr.success("Ingrese nombre del personal.");
              return false;
            };
            if (primerapellido=="") {
              toastr.success("Ingrese apellido paterno del personal.");
              return false;
            };
            if (segundoapellido=="") {
              toastr.success("Ingrese apellido materno del personal.");
              return false;
            };
            if (dni=="") {
              toastr.success("Ingrese D.N.I del personal.");
              return false;
            };
            if (tamano<8) {
              toastr.success("El D.N.I debe tener 8 digitos");
              return false;
            };
            if (correo!="") {
                if (validarEmail(correo)){
                  toastr.success("El Email ingresado es incorrecto");
                  return false;
                }
            }
            $.post("index.php?page=personal&accion=insertarPersonal",{
                          nompersona:nombres,
                          apppersona:primerapellido,
                          apemapersona:segundoapellido,
                          dnipersona:dni,
                          telefpersona:telefono,
                          celupersona:celular,
                          emailpesona:correo,
                          codpersona:codigo
                            },function (response){
                         //alert(response);
                         toastr.success(response);
                          $("#modalpersonal").modal('hide'); 
                         listarPersonal();
                  
          }); 

      
   });

$(document).ready(function(){
listarPersonal();
});

function listarPersonal(){
       $.post("index.php?page=personal&accion=listaprueba",function (response){
                     $("#prueba").html(response); 
                     // $("#mostrarcargos").css("display", "block");  
          });
     }


function editarPersonal(id){
         
       $.post("index.php?page=personal&accion=obtenerPersonal",{
                            cod:id
                          
                              },function (response){
                             // console.log(response);
                            $('#nompersonal').val(response.nompersonal);
                            $('#apepat').val(response.apepapersonal);
                            $('#apemat').val(response.apemapersonal);
                            $('#dnipersonal').val(response.dnipersonal);
                            $('#telefpersonal').val(response.telefpersonal);
                            $('#celupersonal').val(response.celupersonal);
                            $('#exampleInputEmail1').val(response.emailpersonal);
                            $('#codigopersonal').val(response.idpersonal);
                             $("#modalpersonal").modal('show');
                                          
                  
          }); 
}



function eliminarPersonal(id){

   $.post("index.php?page=personal&accion=eliminarPersonal",{
                            cod:id
                          
                              },function (response){
                         toastr.success(response);
                         listarPersonal();
                                          
                  
          }); 
}


function limpiar(){
                            $('#nompersonal').val("");
                            $('#apepat').val("");
                            $('#apemat').val("");
                            $('#dnipersonal').val("");
                            $('#telefpersonal').val("");
                            $('#celupersonal').val("");
                            $('#exampleInputEmail1').val("");
                            $('#codigopersonal').val("");
                            


}