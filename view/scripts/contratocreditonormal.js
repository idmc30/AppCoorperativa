$("select[name=cmbCliente]").change(function(){
          var idSoc=$('select[name=cmbCliente]').val();      
           listarContCredito(idSoc);
      });


function listarContCredito(idSocio){
 $.post("index.php?page=contratocredito&accion=listarContCreditos",{codSoc:idSocio}, function (response){
      $("#listaprestamosxsocio").html(response);
 });

}



function imprimirContCredito(idCcr){
     window.open("index.php?page=contratocredito&accion=imprimirContCreditos&idcontacredito="+idCcr, '_blank');
}

function imprCronograma(idContCredito){
     
     window.open("index.php?page=pagos&accion=imprimirCronograma&codContCredito="+idContCredito, '_blank'); 


}


