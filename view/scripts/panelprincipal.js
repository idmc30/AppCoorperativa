function cambiarDatos(idSocio){
      $("#nomsocio").prop("disabled",true);
      $("#appatsocio").prop("disabled",true);
      $("#apmatsocio").prop("disabled",true);
      $("#dnisocio").prop("disabled",true);
      $("#resolsocio").prop("disabled",true);      
      $("#provincia").prop("disabled",true);
      $("#distrito").prop("disabled",true);
      $("#dpto").prop("disabled",true);


	$.post("index.php?page=socio&accion=obtenerSocio",{cod:idSocio},function (response){
            // console.log(response);
            $('#modalsocio').modal('show') ;
            $("#nomsocio").val(response.nombresSoc);
				  	$("#appatsocio").val(response.apellidoPatSoc);
				  	$("#apmatsocio").val(response.apellidoMatSoc);
				  	$("#dnisocio").val(response.dniSoc);
				  	$("#resolsocio").val(response.resolucionApo);
				  	$("#codigodistritosocio").val(response.idUge);
				    $("#dirsocio").val(response.direccionSoc);
				  	$("#telefsocio").val(response.telefonoSoc);
				  	$("#celusocio").val(response.celularSoc);
				  	$("#emailsocio").val(response.emailSoc);
				  	$("#soccodigo").val(response.idSoc);		  	      
            $("#dpto").val(response.idDpto);  
              provincia=response.idProv;
              distrito=response.idUge;
              listarProvincia(response.idDpto);
              listarDistrito(response.idProv);

           
})
}

function listarProvincia(idDpto){
      $.post("index.php?page=zonaubicaciongeografica&accion=listarProvincia",{codDpto:idDpto},function (response){
      $("#provincia").html(response);                        

      if (provincia==0) {
              $('select[name=provincia]').val(0);           
            }              
            else
            {      
              $('select[name=provincia]').val(provincia);      
            }       
                 
     });


     }

function listarDistrito(idProvincia){
      $.post("index.php?page=zonaubicaciongeografica&accion=listarDistrito",{codProvincia:idProvincia},function (response){       
      //console.log(response);
      $("#distrito").html(response);    
      //$("#distrito").val(response.idUge);  
        if (distrito==0) {
              $('select[name=distrito]').val(0);           
            }              
            else
            {      
              $('select[name=distrito]').val(distrito);    
            }    
            
      });
     }




$(document).on('click','#btnguardarsocio', function () {  
        
    var nombre=$("#nomsocio").val();
  	var apepat=$("#appatsocio").val();
  	var apemat=$("#apmatsocio").val();
  	var dni=$("#dnisocio").val();
  	var resolucion=$("#resolsocio").val();
  	var iddistrito=$("#codigodistritosocio").val();
    var direccion=$("#dirsocio").val();
  	var telefono=$("#telefsocio").val();
  	var celular=$("#celusocio").val();
  	var email=$("#emailsocio").val();
    var codigosocio=$("#soccodigo").val();
    var tamano=$('#dnisocio').val().length;
    if (dni=="") {
      toastr.success("Debe ingresar un DNI");
      //$("#modalsocio").modal('hide');        
    }else if(tamano<8){
           toastr.success("El dni debe tener 8 digitos");
    }else if(iddistrito==""){
          toastr.success("Debe ingresar el distrito donde reside");
    }else if(resolucion==""){
         toastr.success("Debe ingresar la resolucion donde reside");
    }else{

  $.post("index.php?page=socio&accion=insertarSocio",{nomsoc:nombre,patsoc:apepat,matsoc:apemat,dnisoc:dni,resolsoc:resolucion,coddistsoc:iddistrito ,dirsoc:direccion,telsoc:telefono,celsoc:celular,emsoc:email,idsocio:codigosocio},function (response){
       toastr.success("La actualizacion de sus datos estan siendo procesadas ");
      $("#modalsocio").modal('hide');
      limpiar();
    
    })

    }
   
});


function limpiar(){
    $("#nomsocio").val("");
    $("#appatsocio").val("");
    $("#apmatsocio").val("");
    $("#dnisocio").val("");
    $("#resolsocio").val("");
    $("#codigodistritosocio").val("");
    $("#dirsocio").val("");
    $("#telefsocio").val("");
    $("#celusocio").val("");
    $("#emailsocio").val("");
    $("#soccodigo").val("");
}