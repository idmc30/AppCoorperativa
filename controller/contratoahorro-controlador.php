
<?php

session_start();

require_once 'model/clases/contratoahorro.php';
require_once 'model/clases/socio.php';
require_once 'model/clases/tasa.php';
require_once 'model/clases/movimiento.php';
require_once 'class.inputfilter.php';





function _formAction(){
     
     $socio = new Socio();
     $lsocio = $socio->listarSociodos();
    require_once 'view/contratoahorro/Vcontraroahorro.php';
}




function _listaContAhorroAction(){
        $contahorro = new ContratoAhorro();
        $lcontahorro = $contahorro->listarContAhorro();
        require_once 'view/contratoahorro/Vliscontratoahorro.php';
}


/* $timeuni = strtotime($fechadocumento);
   $formatuno = date('Y-m-d',$timeuni);*/

function _insertarContAhorroAction(){
         $anio=date('Y');
         $mes=date('m');
         $dia=date('d');
         //$fechIniSoc=
         $fechaFirma=$anio."-".$mes."-".$dia;
         $fechini = strtotime($_POST['fechainicio']);
         $fechaInicio=date('Y-m-d',$fechini);
         $fechfin = strtotime($_POST['fechafin']);
         $fechaFin=date('Y-m-d',$fechfin);
         $montoDepositado=floatval($_POST['montodepositado']);
         $montoActual=$montoDepositado;
         $trem="";
         $tem=floatval($_POST['Tem']);
         $tipo=$_POST['Tipo'];
         $idSoc=$_POST['idsocio'];
         $idUsu=$_POST['idUsuario'];          
         $contahorro= new ContratoAhorro();
         $numero_actual = $contahorro->getnumContAhorro();
         $num = $numero_actual->nroAhorro_Cah ;
         $len=strlen($num+1);
         $ceros=11-$len;
         $valor='';
           if (!empty($_POST["codcontahorro"])) {
                 $idCah=$_POST["codcontahorro"];
                 $mcontahorro=$contahorro->modificarContAhorro($fechaFirma,$fechaInicio,$fechaFin,$montoDepositado,$montoActual,$trem,$tem,$tipo,$idSoc,$idUsu,$idCah);
                echo "Se modifico correctamente el contrato de ahorro";
           }else{
                for ($j=0; $j<$ceros; $j++){
                    $valor=$valor.'0';  
                }
         $nroAhorro=$valor.($num+1);
         $contahorro= new ContratoAhorro();
         $movimiento = new Movimiento();
         $tasa= new Tasa();
             if ($_POST['Tipo']=="F") {
                    $getTasa=$tasa->tasaActivaPlazoFijo();
                    $tasFija=$getTasa->valor_tas;
                    $montoapertura=$montoDepositado;
                    $montoSaldo=$montoapertura;
                    // $TEA_Trad=$tasFija;
                    $P1 = (1+($tasFija/100));
                    $P2 = pow($P1, 0.0027777778); 
                            
                    $TEA_Diaria_T= ($P2)-1;
                        //echo $TEA_Diaria_T;
                        //A continuación reemplacemos en la fórmula de interés compuesto:
                        //$mes=date('m',$fechini);
                    $dias=strtotime($_POST['fechafin'])-strtotime($_POST['fechainicio']) ;
                    $n = $dias/86400;
                    $P3 = pow(1+$TEA_Diaria_T, $n)-1;
                    $InteresTradicionalMensual = $montoSaldo * $P3;
                    $InteresMensual = $montoSaldo + $InteresTradicionalMensual;
                     //echo "Ndias=".$n."   P1= ".$P1."   P2= ".$P2."   TEA-DIARIA= ".$TEA_Diaria_T."  P3= ". $P3. "   INTERES TRADICIONAL MENSUAL=".$InteresTradicionalMensual."   MONTO SALDO=  ".$montoSaldo;

                     
              }else{
                    $InteresTradicionalMensual=null;
                    $InteresMensual = $montoDepositado;


                    }
                    

                    $ncontahorro=$contahorro->insertarContAhorro($nroAhorro,$fechaFirma,$fechaInicio,$fechaFin,$montoDepositado,$InteresTradicionalMensual,$InteresMensual,$trem,$tem,$tipo,$idSoc,$idUsu);
                    $numContAhorr=$contahorro->getnIdContAhorro();
                    $CctaId=$numContAhorr->id_Cah;//obtengo el id del contrato de credito para insertarlo como primer valor en movimiento
                    $numero_actual = $movimiento->getnumTicketMovimiento();
                    $num = $numero_actual->nroTicket_Mov ;
                    $len=strlen($num+1);
                    $ceros=11-$len;
                    $valor='';
                      for ($j=0; $j<$ceros; $j++){
                        $valor=$valor.'0';  
                         }
                    $nroTicket=$valor.($num+1);
                    $fechaMov=date("Y-m-d H:i:s");
                    $primermovimiento =$movimiento->insertarMovimiento($nroTicket,"I", $montoActual,$fechaMov,$CctaId,$idUsu);
                    echo "se inserto correctamente "; 
            }
    }




function _obtenerContratoAhorroAction(){

    $id = $_POST['cod'];
    $contahorro=new ContratoAhorro();
    $lcontahorro=$contahorro->obtenerContAhorro($id); 
    $response = array();
    $response["idCah"] =$lcontahorro->id_Cah;
    $response["fechaFirmaCah"] =$lcontahorro->fechaFirma_Cah;  
    $response["fechaInicioCah"] =$lcontahorro->fechaInicio_Cah;  
    $response["fechaFinCah"] =$lcontahorro->fechaFin_Cah;  
    $response["montoDepositadoCah"] =$lcontahorro->montoDepositado_Cah;
    $response["montoActualCah"] =$lcontahorro->montoActual_Cah;  
    $response["tremCah"] =$lcontahorro->trem_Cah;  
    $response["temCah"] =$lcontahorro->tem_Cah;  
    $response["tipoCah"] =$lcontahorro->tipo_Cah;  
    $response["idSoc"] =$lcontahorro->id_Soc;  
    $response["idUsu"] =$lcontahorro->id_Usu;  
    header('Content-Type: application/json');
    echo json_encode($response);
}



function _eliminarContratoAhorroAction(){
     
     $codigo=$_POST['cod'];
     try {
     $contahorro= new ContratoAhorro();
     $econtahorro=$contahorro->eliminarContAhorro($codigo);
     echo "Se eliminó correctamente";
     } catch (Exception $e) {
      echo "No se pudo eliminar";
     }
}


function _estadoContratoAhorroAction(){
      
             $estado=$_POST['estados'];
             $codigoContAhorro=$_POST['contahorroid'];
             $contahorro= new ContratoAhorro();
             $estadocontahorro=$contahorro->estadoContAhorro($codigoContAhorro,$estado);  
             echo "Se cambio correctamente el estado";
}

function _imprimircontahorroAction(){
 
    $filter = new InputFilter();
    $id = $filter->process($_GET['cod']); 
    $contahorro=new ContratoAhorro();
    $lcontahorro=$contahorro->obtenerContAhorro($id); 
    $response = array();
    $response["idCah"] =$lcontahorro->id_Cah;
    $response["fechaFirmaCah"] =$lcontahorro->fechaFirma_Cah;  
    $response["fechaInicioCah"] =$lcontahorro->fechaInicio_Cah;  
    $response["fechaFinCah"] =$lcontahorro->fechaFin_Cah;  
    $response["montoDepositadoCah"] =$lcontahorro->montoDepositado_Cah;    
    $response["idSoc"] =$lcontahorro->id_Soc;  
    $response["idUsu"] =$lcontahorro->id_Usu; 
    $response["nroAhorroCah"] =$lcontahorro->nroAhorro_Cah; 
    $response["fechaInicioCah"] =$lcontahorro->fechaInicio_Cah; 
    $response["montoDepositadoCah"] =$lcontahorro->montoDepositado_Cah ; 

        require_once 'view/contratoahorro/imprimirContahorro.php';
}



/*

function _obtenerUsuarioAction(){

    $id = $_POST['cod'];
    $usuarios=new Usuarios();
    $lusuario=$usuarios->obtenerUsuario($id); 
    $response = array();
    $response["idUsu"] =$lusuario->id_Usu;
    $response["usuar"] =$lusuario->usuario;  
    $response["claveUsu"] =$lusuario->clave_Usu;  
    $response["tipo_Usu"] =$lusuario->tipo_Usu;  
    $response["estadoUsu"] =$lusuario->estado_Usu;  
    $response["idRol"] =$lusuario->id_Rol;  
    $response["id_Pca"] =$lusuario->id_Pca;  
    header('Content-Type: application/json');
    echo json_encode($response);

}

function _eliminarUsuarioAction(){
     
     $codigo=$_POST['cod'];
     try {
     $usuario= new Usuarios();
     $eusuario=$usuario->eliminarUsuario($codigo);
     echo "Se eliminó correctamente";
     } catch (Exception $e) {
      echo "No se pudo eliminar";
     }
}

function _estadoUsuarioAction(){
      
             $estado=$_POST['estado'];
             $codigoUsuario=$_POST['idusu'];
             $usuario= new Usuarios();
             $estadousuario=$usuario->estadoUsuario($codigoUsuario,$estado);  
             echo "Se cambio correctamente el estado";
}


function _restablecerClaveAction(){
          $codigousuario=$_POST['codusu'];
          $clave=md5($_POST['passusu']);
          $usuario= new Usuarios();
          $rusuarii=$usuario->restablecerUsuario($codigousuario,$clave);
          echo "Se restablecion la cuenta de usuario";
}




*/
?>