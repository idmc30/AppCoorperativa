//alert("menu");

 $(function() {
        toastr.options.closeButton = true;
    });


$(document).ready(function(){

listarMenu();
});

$(document).on('click','.activarMenus', function () {
   var evento = $(this).is(':checked');
   var idmenuysubmenu = $(this).data('idmenysubmen');
   var activo="A";
   var inactivo="I";
          if (evento) {
            // alert("dado click: "+idcargo);
             estadoMenus(activo,idmenuysubmenu);
          }else{
             estadoMenus(inactivo,idmenuysubmenu);
          }
   })

function estadoMenus(estado,id){
     $.post("index.php?page=menu&accion=estadoMenuySubMenu",{estados:estado,idmen:id},function (response){
                    //alert(response);
                    toastr.success(response);
                    listarMenu(); 
          });

}


function espaciosenblanco(campo_validar){
      var espacio_blanco= /[a-z]/i;  //Expresión regular  
      if(!espacio_blanco.test(campo_validar ))
      {
       return alert("Error")
      }
}



  function listarMenu(){
       $.post("index.php?page=menu&accion=listaMenu",function (response){
       	             //console.log(response);
                     $("#listarmenu").html(response); 
                     // $("#mostrarcargos").css("display", "block");  
          });
     }


$("#btnguardarmenu").click(function(){
             var nombremenu=$('#nommenu').val();
             var descripmenu=$('#desmenu').val();
             var linkmenu=$('#linkmenu').val();
             var codmenu=$('#codupdatemenu').val();
             
             if ($("#nommenu").val().length < 1) {
               alert("Debe ingresar un nombre");
             } else if($("#desmenu").val().length < 1){
                alert("Debe ingresar una descripcion")
             }else{
               $.post("index.php?page=menu&accion=insertarMenu",{menunom:nombremenu,menudeta:descripmenu,menulink:linkmenu,idmenu:codmenu},      function (response){
                  limpiarMenu();
                // alert(response);
                  toastr.success(response);
                  $("#modalmenu").modal('hide'); 
                  listarMenu();                  
                });
             }
              
   });


$("#btnguardarsubmenu").click(function(){
             var nombresubmenu=$('#nomsubmenu').val();
             var descripsubmenu=$('#submenudescrip').val();
             var linksubmenu=$('#submenulink').val();
             var idpadremenu=$('#codimenupadre').val();
             var idsubmenu=$('#codupdatesubmenu').val();
              $.post("index.php?page=menu&accion=insertarSubMenu",{submenunom:nombresubmenu,submenudeta:descripsubmenu,submenulink:linksubmenu,idmenupadre:idpadremenu,codsubmenu:idsubmenu},function (response){
                  limpiarSubMenu();
                  //alert(response);
                  toastr.success(response);
                  $("#modalsubmenu").modal('hide'); 
                  listarMenu();                  
                });
              
   });




  function eliminarMenuySubMenu(Codigo){
     
      $.post("index.php?page=menu&accion=eliminarMenuySubMenu",{cod:Codigo},function (response){                    
                  //  alert(response);
                  toastr.success(response);
                  listarMenu();  
                    
              });     


  }



function editarMenuySubMenu(codMenu){

   $.post("index.php?page=menu&accion=obtenerMenuSub",{cod:codMenu},function (response){
          console.log(response);
          if (response.nivelmen==1) {
              $('#nommenu').val(response.nombremen);
              $('#desmenu').val(response.detallemen);
              $('#linkmenu').val(response.linkmen);
              $('#codupdatemenu').val(response.idmen);
              $('#modalmenu').modal('show') ;
          } else{
              
             var elemento = document.getElementById("ocultar");
                 elemento.style.display = 'none'; 
              $('#nomsubmenu').val(response.nombremen);
              $('#submenudescrip').val(response.detallemen);
              $('#submenulink').val(response.linkmen);
              $('#codimenupadre').val(response.idsubmen);
              $('#codupdatesubmenu').val(response.idmen);
              $('#modalsubmenu').modal('show');

          };
   });

}


  function asignarMenu(codMenu){
    limpiarSubMenu();
		$.post("index.php?page=menu&accion=obtenerMenuSub",{cod:codMenu},function (response){		                 
		                  $("#nommenu2").val(response.nombremen);
		                  $("#codimenupadre").val(response.idmen);
                        var elemento = document.getElementById("ocultar");
                        elemento.style.display = 'block'; 
                      $('#codupdatesubmenu').val("");
		                 //console.log(response);
		                
		          });      

    }



function limpiarMenu(){
             $('#nommenu').val("");
             $('#desmenu').val("");
             $('#linkmenu').val("");
}


function limpiarSubMenu(){
              $('#nomsubmenu').val("");
              $('#submenudescrip').val("");
              $('#submenulink').val("");
              $('#codimenupadre').val("");

}

