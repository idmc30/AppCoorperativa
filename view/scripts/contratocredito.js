var jscuotas = function (vp,credito ,cliente, cuotas, desgravamen, itf, tea, fechainicio,fechafinal,idUsuario) {
		if (vp == 1) {

			//url ='index.php?page=contratocredito&accion=VistapreviaPrestamo', dataType='html'; 
			 $.post("index.php?page=contratocredito&accion=VistapreviaPrestamo",
			 	{'credito': credito,
				'cliente': cliente,
				'cuotas': cuotas,
				'Desgravamen': desgravamen,
				'Itf': itf,
				'Tea': tea,
				'fechinicio': fechainicio,
                'fechifinal': fechafinal, 
                'codUsua':idUsuario
              }, function (response){
                	$('#muestracuotas').html(response);

			 });

		}else{
              $.post("index.php?page=contratocredito&accion=insertarContCredito",{
                'credito': credito,
				'cliente': cliente,
				'cuotas': cuotas,
				'Desgravamen': desgravamen,
				'Itf': itf,
				'Tea': tea,
				'fechinicio': fechainicio,
                'fechifinal': fechafinal, 
                'codUsua':idUsuario
              }, function (response){
                  //toastr.success(response);
                 // window.location = "index.php?page=contratocredito&accion=form";
                 // window.setInterval(Mensajerespuesta(response),tiempo);
                 toastr.success(response);
                 $('#muestracuotas').hide();
                 limpiar();
                 window.location.reload(true);
                  
              });
}}




$(document).on('click','#btnguardarPrestamo', function () {
			bootbox.confirm("Desea registrar este prestamo?", function(result) {
			var cliente= $('#cmbpersonal').val();
			var cuotas= $('#ncuotas').val();
			var credito = $ ('#credito').val();	
				if (result == true) {
                    if (cliente=="") {
					             toastr.error("Seleccione un cliente");

					      } else if(credito==""){
					              toastr.error("Ingrese el Credito");

					      }else if(cuotas==""){
					      	   	  toastr.error("Seleccione el numero de cuotas");
					      }else{  
						
							var desgravamen = $ ('#desgravamen').val();
							var itf = $ ('#itf').val();
							var tea = $ ('#tea').val();
							var fechainicio = $ ('#fechainicio').val();
							var fechafinal = $ ('#fechfinal').val();	
							var codUsuario=$('#idgUsu').val();
						    var vp=0;
					     	//alert(cuotas);
					        jscuotas(vp,credito ,cliente, cuotas, desgravamen, itf, tea, fechainicio,fechafinal,codUsuario);
				}
				}else{

					toastr.success("Se canceló la operación");
				}
			});
		});





$(document).ready(function (){
	  $.post("index.php?page=contratocredito&accion=VistapreviaPrestamo",function (response){
                //$("#muestracuotas").html(response);
	  })
})






$(document).on('click','#visualizarsprestamo', function () {
	var cliente= $('#cmbpersonal').val();
	var cuotas= $('#ncuotas').val();
	var credito = $ ('#credito').val();
	var desgravamen = $ ('#desgravamen').val();
	var itf = $ ('#itf').val();
	var tea = $ ('#tea').val();
	var fechainicio = $ ('#fechainicio').val();
	var vp = 1;
      if (credito=="") {
             toastr.error("Ingrese el Credito");

      } else if(cuotas==""){
                        toastr.error("Seleccione el numero de cuotas");

      }else { 
            jscuotas(vp,credito ,cliente, cuotas, desgravamen, itf, tea, fechainicio);
            //console.log(cliente,cuotas, credito, desgravamen, itf, tea, fechainicio);
               
      };

})

function limpiar(){
     $('#cmbpersonal').val("");
	 $('#ncuotas').val("");
	 $('#credito').val("");
	 $('#ncuotas').val("");
}