$(document).ready(function(){
 $('#imprimirSocioxZona').hide()
});

$("select[name=cmbZona]").change(function(){
     var idZon=$('select[name=cmbZona]').val();  
     var tipoCon="TO";
      listaSociosxZona(idZon,tipoCon);
      $('#imprimirSocioxZona').show()
      $('#cmbtipoContrato').prop('selectedIndex', 0);
        });;

function listaSociosxZona(idZon,tipoCon){
   $("#listarSociosxZona").html('');
   $.post("index.php?page=reportes&accion=listarSociosxZona", {codZon:idZon,tipoCont:tipoCon}, function (response){
   $("#listarSociosxZona").html(response);
   })
}

$("select[name=cmbtipoContrato]").change(function(){
 	var idZon=$('select[name=cmbZona]').val(); 
    var tipoCon=$('select[name=cmbtipoContrato]').val();  
    listaSociosxZona(idZon,tipoCon);      
    $('#imprimirSocioxZona').show()
});;


$("#imprimirSocioxZona").click(function (){
 var idZon=$('select[name=cmbZona]').val();  
  var tipoCon=$('select[name=cmbtipoContrato]').val();  
window.open("index.php?page=reportes&accion=imprimirSociosxZona&idzon="+idZon+"&tipoCont="+tipoCon, '_blank');

})