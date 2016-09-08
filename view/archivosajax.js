
  function insertarajax(){

  	          //creo variables para recibir los parametros
  	          var nom=$("#nom").val();
              var apepa=$("#apepa").val();
              var apema=$("#apema").val();
              var idper=$("#idper").val();
           $.post("index.php?page=personal&accion=regis",{nombre:nom,apellidopa:apepa,apellidoma:apema,id:idper},function (datosObtenidos){
                   // alert(datosObtenidos);
                   alert("Datos Registrados Correctamente")
                    limpiar()
                    mostrar();
                });
  }

        	function limpiar() {
                $("#nom").val("");
                $("#apepa").val("");
                $("#apema").val("");
                $("#idper").val("");
            }

               var x;
               x=$(document);  
               x.ready(mostrar);

    function mostrar() {
                $.post("index.php?page=personal&accion=listar",function(datoObtenido) {
                    $("#tblclientes").html(datoObtenido);
                });
            }


               function eliminarajax(id){
                $.post("index.php?page=personal&accion=eliminar",{id:id}, function (datosObtenidos){
                    alert(datosObtenidos);
                    mostrar()
                });
            }    

           function editarajax(id,nom,primerapellido,segunapellido){
                $.post("index.php?page=personal&accion=editar",{
                  id:id,
                  nom:nom,
                  apepa:primerapellido,
                  apema:segunapellido

                }, function (datosObtenidos){
                  $("#formulario").html(datoObtenido);
                   
                });
            }

 function editarasimple(id){
                $.post("index.php?page=personal&accion=obtener",{id:id}, function (response){
                   
                $('#nom').val(response.nom);
                $('#apepa').val(response.apepa);
                $('#apema').val(response.apema);
                $('#idper').val(id);   

                $("#btnregistrar").attr("value", "Actualizar");                
                });
            }

function editarsegundo(id){

$.ajax({
                type: "POST",
                url:"index.php?page=personal&accion=obtener",
                data:{
                  id:id,
                },
                
                success: function(response){ 
                dataType: 'json',
                $('#nom').val(response.nom);
                $('#apepa').val(response.apepa);
                $('#apema').val(response.apema);
                 alert(response);
              // $("#formulario").html(response);
              }});


}
  




   




              function validar(mensaje, idcampo) {
                var exp_reg = /^[a-z\u00C0-\u00ff]+$/i; // expresión regular para letras(máy o minus), acentuadas o no,
                if (exp_reg.test(mensaje) == true) {
                } else {
                    alert("No ingresar numeros: " + idcampo);
                    $("#" + idcampo).val("");
                }
            }




                 function validarLetras(e) { // 1
						                 
						    tecla = (document.all) ? e.keyCode : e.which; 
						    // alert(tecla);  me envia  el numero de letra que ingreso por teclado
						    if (tecla==8) return true; // backspace
								if (tecla==32) return true; // espacio
								if (e.ctrlKey && tecla==86) { return true;} //Ctrl v
								if (e.ctrlKey && tecla==67) { return true;} //Ctrl c
								if (e.ctrlKey && tecla==88) { return true;} //Ctrl x
								if (tecla==192) { return true;} // aqui agrego la letra para que se ingresado por vista
								patron = /[a-zA-Z]/; //patron
								te = String.fromCharCode(tecla); 
								return patron.test(te); // prueba de patron
							}	


				function validarNumeros(e) { // 1
                tecla = (document.all) ? e.keyCode : e.which; // 2
                if (tecla == 8)
                    return true; // backspace
                if (tecla == 109)
                    return true; // menos
                if (tecla == 110)
                    return true; // punto
                if (tecla == 189)
                    return true; // guion
                if (e.ctrlKey && tecla == 86) {
                    return true
                }
                ; //Ctrl v
                if (e.ctrlKey && tecla == 67) {
                    return true
                }
                ; //Ctrl c
                if (e.ctrlKey && tecla == 88) {
                    return true
                }
                ; //Ctrl x
                if (tecla >= 96 && tecla <= 105) {
                    return true;
                } //numpad

                patron = /[0-9]/; // patron

                te = String.fromCharCode(tecla);
                return patron.test(te); // prueba
            }



 function editarajax() {
               

                $.post("index.php?page=personal&accion=edita",{id:id},function(datoObtenido) {
                
                 alert(datoObtenido);         
                    $("#formulario").html(datoObtenido);
                });
            }
