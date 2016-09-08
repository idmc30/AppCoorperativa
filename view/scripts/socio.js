var departamento;
var provincia;
var distrito;

function obtenerIdDptoxIdProvincia(idProvincia){

      //alert("prov:"+idProvincia);

      $.post("index.php?page=zonaubicaciongeografica&accion=obtenerIdDptoxIdProvincia",{id:idProvincia},function (response){
      $("#idprovincia").html(response);                    
                //console.log(response);
                //alert(response.idSubUge)
                departamento=response.idSubUge;        
        return departamento;
    //alert("dsd"+departamento);
          });
}

$(document).ready(function(){
     listarSocio();
});
function listarSocio(){
  $.post("index.php?page=socio&accion=listarSocio",function (response){
           $("#listasocio").html(response);
  })
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
       toastr.success(response);
      $("#modalsocio").modal('hide');
      limpiar();
     listarSocio();
    })

    }

     
 })

$("select[name=dpto]").change(function(){
          provincia=0;
          var idDpto=$('select[name=dpto]').val();                
          listarProvincia(idDpto);  
          limpiarCombosdos();        
          //$('#provincia').html('<option style="display:none;" value="0"  selected>Provincia</option>');
         // $('#distrito').html('<option style="display:none;" value="0"  selected>Distrito</option>');
        });

$("select[name=provincia]").change(function(){
          var idProvincia=$('select[name=provincia]').val();
          distrito=0;
          //$("#codigoProvincia").val(idProvincia);      
          listarDistrito(idProvincia);
         
          //$('#distrito').html('<option style="display:none;" value="0"  selected>Distrito</option>');
        });

$("select[name=distrito]").change(function(){
          var idDistrito=$('select[name=distrito]').val();
          $("#codigodistritosocio").val(idDistrito);                
        });

/*function listarDepartamento(){
      $.post("index.php?page=zonaubicaciongeografica&accion=listarDepartamento",function (response){       
      //console.log(response);
      $("#dpto").html(response);                     
      });
}*/

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

function limpiarCombos(){    
    $('#distrito').html('<option style="display:none;" value="0"  selected>Distrito</option>');
    $('#provincia').html('<option style="display:none;" value="0"  selected>Provincia</option>');
    $('#dpto').prop('selectedIndex', 0);
}
function limpiarCombosdos(){
     $('#provincia').html('<option style="display:none;" value="0"  selected>Provincia</option>');
     $('#distrito').html('<option style="display:none;" value="0"  selected>Distrito</option>');
   

}

$(document).on('click','#nsocio', function () {
    limpiarCombos();   
    limpiar();
       	
})
function editarSocio(id){

   $.post("index.php?page=socio&accion=obtenerSocio",{cod:id},function (response){
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

/*function obtenerProvinciaSocio(idProvincia){
      $.post("index.php?page=zonaubicaciongeografica&accion=obtenerProvincia",{id:idProvincia},function (response){
     // $("#idprovincia").html(response);  
                 listarProvincia(response.idSubUge);    
                 $("#codprovincia").val(response.idUge);  
                 //$("#iddpto").val(response.idSubUge);  
                 console.log(response);
          });
}]*/
function eliminarSocio(idSocio){

 $.post("index.php?page=socio&accion=eliminarSocio",{cod:idSocio}, function (response){
             toastr.success(response)
            listarSocio();
 })}


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

  $(document).on('click','.activarSocio', function () {
  var evento = $(this).is(':checked');
  var idsocio = $(this).data('idsocio');
   var activo="A";
   var inactivo="I";
          if (evento) {
             estadosSocio(activo,idsocio);
          }else{
             estadosSocio(inactivo,idsocio);
             fechFinalSocio(idsocio);

          }
        

   })

  function estadosSocio(tipo,codsocio){
   $.post("index.php?page=socio&accion=estadoSocio",{estado:tipo,idsocio:codsocio},function (response){              
                  //alert(response);
                  toastr.success(response);
                  listarSocio();
          });   

}



function fechFinalSocio(codSocio){
   $.post("index.php?page=socio&accion=fechaFinalSocio", {idSocio:codSocio}, function (response){
      //alert(response);

   });

}



