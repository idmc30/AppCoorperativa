$(document).ready(function(){
 
 $('#impcontrFechas').hide()
});





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

$("#nconsulta").click(function (){
    var fechinicio=$("#textfechainicio").val();
    var fechfinal=$("#textfechfinal").val();
    var inicio=$("#textfechainicio").val().split("-");
    var fin=$("#textfechfinal").val().split("-");
    var suminicio=inicio[2]+inicio[1]+inicio[0];
    var sumfinal=fin[2]+fin[1]+fin[0];
    var fechiniciocont=inicio[2]+"-"+inicio[1]+"-"+inicio[0];
    var fechfiniciocontfin=fin[2]+"-"+fin[1]+"-"+fin[0];
    if (fechinicio=="" && fechfinal=="") {
        toastr.error("Debe ingresar un rago de fechas");
    } else{
        if (suminicio>sumfinal) {
                  toastr.error("La fecha final no debe ser menor a la fecha inicial");  

        } else{
           //$('#impsocccr').show();
             //alert("todo ok");
              $('#impcontrFechas').show()
             listarContxFechas(fechiniciocont,fechfiniciocontfin)
        };
    };
});




function listarContxFechas(fechiniciocont,fechfiniciocontfin){
  
  $.post("index.php?page=reportes&accion=lcontratoActivoInactivoxFecha",{fechini:fechiniciocont,fechfin:fechfiniciocontfin}, function (response){
           $("#lcontratosxfechas").html(response);
  })

}




$("#impcontrFechas").click(function (){
    var inicio=$("#textfechainicio").val().split("-");
    var fin=$("#textfechfinal").val().split("-");
    var fechiniciocont=inicio[2]+"-"+inicio[1]+"-"+inicio[0];
    var fechfiniciocontfin=fin[2]+"-"+fin[1]+"-"+fin[0];
	window.open("index.php?page=reportes&accion=imprimirContratosxFecha&fechini="+fechiniciocont+"&fechfin="+fechfiniciocontfin, '_blank');

});