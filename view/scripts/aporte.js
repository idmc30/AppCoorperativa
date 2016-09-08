$(function() {
        toastr.options.closeButton = true;
});

$(document).ready(function(){

});

$('#textfecha').datepicker({
  format: "dd-mm-yyyy",
  language: "es",
  autoclose: true,
  todayBtn: true
}).on(
  'show', function() {      
  // Obtener valores actuales z-index de cadaelemento 
  var zIndexModal = $('#modalAporte').css('z-index');
  var zIndexFecha = $('.datepicker').css('z-index');
        // Reasignamos el valor z-index para mostrar sobre la ventana modal
  $('.datepicker').css('z-index',zIndexModal+1);
}).on('changeDate',function(){
$('#textfecha').datepicker('hide');
});

$("select[name=cboAnio]").change(function(){
          var arreglo=$('select[name=cboAnio]').val().split("|"); 
          var idMap=arreglo[0];
          var anio=arreglo[1];
          $('#idMap').val(idMap)
          $('#anioSel').val(anio)          
          listarSociosxAnio(anio)
          $("#listasocio").html(''); 
        });

$("select[name=cboSocio]").change(function(){          
    listarAporte();
});

function  listarAporte()
{
          var anioSel=$('#anioSel').val();
          $("#listasocio").html(''); 
          var arreglo=$('select[name=cboSocio]').val().split("|");                 
          var idSocio=arreglo[0];
          var mes=arreglo[1];
          var anio=arreglo[2];          
          $('#codigoSocio').val(idSocio)  
          listarAporteIdSocioxAnio(idSocio,mes,anio,anioSel);
}

function listarAporteIdSocioxAnio(id,mes,anio,anioSel){
   $.post("index.php?page=aporte&accion=listarAporteIdSocioxAnio",{idSoc:id,mesSoc:mes,anioSoc:anio,anioSele:anioSel},function (response){
                 console.log(response);                 
                 $("#listasocio").html(response);                    
      });
}

function registramontoaporte(idMes,montoAporte,mes){  
  $('#btnguardarAporte').text("Guardar"); 
  var anio   =$('#anioSel').val();
  var idsocio=$('#codigoSocio').val();
  var idMap=$('#idMap').val();

  var nombreSocio = $('#cboSocio option:selected').text()  
  $('#txtanio').val(anio);
  $('#txtmonto').val(montoAporte);
  $('#txtmes').val(mes);
  $('#txtsocio').val(nombreSocio);
  $('#idMes').val(idMes);
  
}

function editarmontoaporte(idApo,idMes,montoAporte,mes,fecha){  
  $('#btnguardarAporte').text("Actualizar"); 
  var anio=$('#anioSel').val();
  var idsocio=$('#codigoSocio').val();
  var idMap=$('#idMap').val();
  var nombreSocio = $('#cboSocio option:selected').text();

  $('#txtanio').val(anio);
  $('#txtmonto').val(montoAporte);
  $('#txtmes').val(mes);
  $('#txtsocio').val(nombreSocio);
  $('#idMes').val(idMes);
  $('#textfecha').val(fecha);
  $('#idApo').val(idApo);


}


function listarSociosxAnio(anio){
   $.post("index.php?page=aporte&accion=listarSociosxAnio",{anioa:anio},function (response){
                 console.log(response);

                 $("#cboSocio").html(response);                  
      });
}

$("#btnguardarAporte").click(function(){
            
            //var idAporte='';
            var idsocio=$('#codigoSocio').val();
            var idAnio=$('#idMap').val();
            var cuota=$('#txtmonto').val();
            var mes=$('#idMes').val();
            var tipo='U';
            var fecha=$('#textfecha').val();
            var estado='P';
            var idAporte=$('#idApo').val();
            var mensaje;
              if (idAporte=="") {
                  mensaje="Está ud. seguro de registrar este aporte?";                  

              } 
               else{
                  mensaje="Está ud. seguro de actualizar este aporte?"; 

              }

            if (fecha=="") {
              toastr.success("Seleccione fecha de Pago.");
              return false;
            }

            bootbox.confirm(mensaje, function(result) {  
              if (result) {
                  $.post("index.php?page=aporte&accion=insertarAporte",{idApo:idAporte,idSoc:idsocio,idMap:idAnio,cuotaA:cuota,
                         mesA:mes,tipoA:tipo,fechaA:fecha,estadoA:estado},function (response){                         
                         toastr.success(response);
                         $('#idApo').val('');
                         $('#textfecha').val('');
                         $("#modalAporte").modal('hide');                                                   
                         listarAporte();   
                           }); 

                    } else{
                              toastr.success("Se cancelo la operación.");
                          }
            }); 
          
})



function eliminaraporte(id){
        if(id != ''){
            bootbox.confirm("Está ud. seguro de eliminar este aporte?", function(result) {  
              if (result) {
                    $.post("index.php?page=aporte&accion=eliminarAporte",{idApo:id},function (response){
                                   toastr.success(response);
                                   listarAporte();
                                  });        
              } else{
                              toastr.success("Se cancelo la operación.");
              };
        }); 
        }
        else
        {
                             toastr.success("No existe aporte por eliminar.");
        }
}

$(document).on('click','.activarAporte', function () {
 var evento = $(this).is(':checked');
 var idaporte = $(this).data('idaporte');
 var activo="P";
 var inactivo="D";
        if (evento) {         
           estadoAporte(activo,idaporte);
        }else{
           estadoAporte(inactivo,idaporte);
        }
 })

function estadoAporte(estado,idApo){
    if(idApo != ''){
            bootbox.confirm("Está ud. seguro de cambiar estado de aporte?", function(result) {  
              if (result) {

                $.post("index.php?page=aporte&accion=estadoAporte",{e:estado,id:idApo},function (response){              
                        //alert(response);
                        toastr.success(response);
                        listarAporte();
                                        });   
                }
               else{
                              toastr.success("Se cancelo la operación.");
                  };
    }); 
        }

    else{
         toastr.success("No existe aporte.");
        }
}