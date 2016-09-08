
$("#pass").click(function (){
    $("#u").prop("disabled",true); 
	var idUsuario=$("#textcodusu").val();
	    limpiar();
	$.post("index.php?page=usuario&accion=obtenerUsuario",{cod:idUsuario}, function (response){
         $("#u").val(response.usuar); 
	    // console.log(response);

	});

})


$("#updatepass").click(function (){
var contrauno=$("#c").val();
var contrados=$("#rc").val();
var idUsuario=$("#textcodusu").val();

	if (contrauno=="" && contrados=="")  {
         toastr.error("Los campos no pueden estar vacios");         
        
	} else{
        if (contrauno==contrados ) {
            $.post("index.php?page=usuario&accion=cambiarContrasena", {codusu:idUsuario, passusu:contrauno}, function (response){  
                 toastr.success(response);
               $("#modalcambiopass").modal('hide'); 

            });

	} else{

         toastr.error("no coiciden");         
	};

	};

});

function limpiar(){
 $("#c").val("");
 $("#rc").val("");

}


