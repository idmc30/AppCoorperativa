
 /*$(function(){
           $('.datepicker').datepicker()
          // $('#timepicker').datepicker('show'); 
         // $('#datepicker').datepicker('update');
          // $("#timepicker").val("");
          
        });
         
 $('#fechainicio').datepicker().on('changeDate', function(){
			         $('#fechainicio').datepicker('hide');
       });*/

$('#textfechainicio').datepicker({
  format: "dd-mm-yyyy",
  language: "es",
  autoclose: true,
  todayBtn: true
}).on(
  'show', function() {      
  // Obtener valores actuales z-index de cadaelemento 
  var zIndexModal = $('#modalcontAhorro').css('z-index');
  var zIndexFecha = $('.datepicker').css('z-index');
        // Reasignamos el valor z-index para mostrar sobre la ventana modal
  $('.datepicker').css('z-index',zIndexModal+1);
}).on('changeDate',function(){
$('#textfechainicio').datepicker('hide');
});

$('#textfechfinal').datepicker({
  format: "dd-mm-yyyy",
  language: "es",
  autoclose: true,
  todayBtn: true
}).on(
  'show', function() {      
  var zIndexModal = $('#modalcontAhorro').css('z-index');
  var zIndexFecha = $('.datepicker').css('z-index');
        $('.datepicker').css('z-index',zIndexModal+1);
}).on('changeDate',function(){
$('#textfechfinal').datepicker('hide');
});


$(document).ready(function(){
listarContAhorro();
});

function listarContAhorro(){
  $.post("index.php?page=contratoahorro&accion=listaContAhorro",function (response){
             $("#listarcontratoahorro").html(response);

  });
}


function editarContAhorro(idContAhorro){
    alert(idContAhorro);
}


function eliminarContAhorro(idContAhorro){
    alert(idContAhorro);
}



$("#btnguardarcontratoahorro").click(function(){
             var fechinicio=$('#textfechainicio').val();
             var fechfinal=$('#textfechfinal').val();
             var montdespositado=$('#txtmontodespositado').val();
            // var trem=$('#texttrem').val("");
             var tem=$('#texttem').val();
             var idsoc=$('#textidsocio').val();
             var tipocont=$('#texttipo').val();
             var idusuario=$("#textcodusu").val();
             var idcontrahorro=$("#textidcontrahorro").val();
             if ($("#textidsocio").val().length < 1) {
               toastr.error("Debe Seleccionar un socio");
             } else if($("#texttipo").val().length < 1){
                toastr.error("Debe Seleccionar un tipo de contrato");
             }else{
               $.post("index.php?page=contratoahorro&accion=insertarContAhorro",{fechainicio:fechinicio,fechafin:fechfinal,montodepositado:montdespositado,Tem:tem,idsocio:idsoc,Tipo:tipocont,idUsuario:idusuario,codcontahorro:idcontrahorro}, function (response){
                  limpiarMenu();
                  toastr.success(response);
                  $("#modalcontAhorro").modal('hide'); 
                  listarContAhorro();               
                });
             }
              
   });


  $("select[name=cmbsocio]").change(function(){
           var id=$('select[name=cmbsocio]').val();
                  $("#textidsocio").val(id);      
        });


    $("select[name=cmbtipocontrato]").change(function(){
           var tasaTipo=$('select[name=cmbtipocontrato]').val();
                  $("#texttipo").val(tasaTipo);  
             obtenerTasaxTipo(tasaTipo);    
        });


function obtenerTasaxTipo(tipTasa){        
   $.post("index.php?page=tasa&accion=obtenerTasaxTipo",{Tipotasa:tipTasa},function (response){         
         //console.log(response);
         $("#texttem").val(response.valortas);
   } )

}


  function limpiarMenu(){
             $('#textfechainicio').val("");
             $('#textfechfinal').val("");
             $('#txtmontodespositado').val("");
             $('#texttrem').val("");
             $('#texttem').val("");
             $('#textidsocio').val("");
             $('#texttipo').val("");
             $("#cmbsocio").val(0);
             $("#cmbtipocontrato").val(0);
  }  



$("#nuevocontahorro").click(function(){
            limpiarMenu()
           $("#textidcontrahorro").val("");
              
   });


function editarContAhorro(codContAhorro){

  $.post("index.php?page=contratoahorro&accion=obtenerContratoAhorro",{cod:codContAhorro}, function (response){
                   //console.log(response);
                   var valordefechainicio=response.fechaInicioCah;
                   var valordefechafin=response.fechaFinCah;
                   var fechinicio = valordefechainicio.split(' ');
                   var formateadof1=fechinicio[0].split("-");
                   var fechfinal=valordefechafin.split(' ');
                   var formateadof2=fechfinal[0].split("-");
                   $('#textfechainicio').val(formateadof1[2]+"-"+formateadof1[1]+"-"+formateadof1[0]);
                   $('#textfechfinal').val(formateadof2[2]+"-"+formateadof2[1]+"-"+formateadof2[0]);
                   $('#txtmontodespositado').val(response.montoDepositadoCah);
                   $('#texttrem').val(response.tremCah);
                   $('#texttem').val(response.temCah);
                   $('#cmbsocio').val(response.idSoc);
                   $('#textidsocio').val(response.idSoc);
                   $('#cmbtipocontrato').val(response.tipoCah);
                   $('#texttipo').val(response.tipoCah);
                   $("#textidcontrahorro").val(response.idCah);
                   $('#modalcontAhorro').modal('show') ;
  });
}



function eliminarContAhorro(codContAhorro){

   $.post("index.php?page=contratoahorro&accion=eliminarContratoAhorro",{cod:codContAhorro}, function (response){

         toastr.success(response);
          listarContAhorro();
   });
}

$(document).on('click','.activarContAhorro', function () {
   var evento = $(this).is(':checked');
   var idcontahorro = $(this).data('idcontahorro');
   var activo="A";
   var inactivo="I";
          if (evento) {
             estadoContratodeAhorro(activo,idcontahorro);
          }else{
             estadoContratodeAhorro(inactivo,idcontahorro);
          }
   })

function estadoContratodeAhorro(estado,id){
     $.post("index.php?page=contratoahorro&accion=estadoContratoAhorro",{estados:estado,contahorroid:id},function (response){
                    toastr.success(response);
                    listarContAhorro(); 
          });

}

