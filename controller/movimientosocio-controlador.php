<?php

session_start();

require_once 'model/clases/movimiento.php';
require_once 'model/clases/zonaubicaciongeografica.php';
require_once 'class.inputfilter.php';

function _formAction(){
    //$movto = new Movimiento();
    //$lmovimiento = $movto->listarMovimiento();
    require_once 'view/movientosocio/Vmovimiento.php';
}


function _listarSocioCuentaAction(){

     $tipoCah =$_POST['tipcont'];
     $idSoc =$_POST['codSoc'];

     $movto = new Movimiento();
     $lmovimiento=$movto->listarxTipodeContratoAhorroSocio($tipoCah,$idSoc);
     require_once 'view/movientosocio/cmbpersonacuenta.php';    
}


/*   */

function _listarMovimientoxIDAction(){
      $idCah=$_POST['idcah'];
      $mvto= new Movimiento();
      $lmovimiento=$mvto->listarMovimientoxId($idCah);
      require_once 'view/movientosocio/Vlistamovimiento.php';
}


function _mostrarInfoAction(){

    $id=$_POST['idco'];
    $movto= new Movimiento();
    require_once 'view/movientosocio/informacion.php';
}



function _estornoMovimientoAction(){
     $monto=$_POST['montmovi'];
     $tipomovimiento=$_POST['tipmovi'];
     $contahorroid=$_POST['codcontahorro'];
     $idMov=$_POST['codmovimiento'];
        //si es retiro suma
      //si es deposito disminuye  
     if ($tipomovimiento=="D") {
          try {
            $movto= new Movimiento();
            $restamonto=$movto->retirarmontoMovimiento($contahorroid, $monto);
            $estadmovi=$movto->estornoMovimiento($idMov);
            echo "El estorno se realizo con exito";

          } catch (Exception $e) {
             echo "Error no se puedo realizar el estorno: ".$e;
          }
          
      }else {        
         try {
         $movto= new Movimiento();
         $sumamonto=$movto->insertarmontoMovimiento($contahorroid, $monto);
         $estadmovi=$movto->estornoMovimiento($idMov);
         echo "El estorno se realizo con exito";
         } catch (Exception $e) {
           echo "Error no se puedo realizar el estorno: ".$e;           
         }
      }
     
}


function _insertarMovimientoAction(){
       $tipomovimiento=$_POST['tipoMov']; 
       $monto=floatval($_POST['montoMov']);
       $fechademovimiento=date("Y-m-d H:i:s");
       $idCah=$_POST['codcont'];
       $idusuario=$_POST['codusuario'];
       if ($tipomovimiento=="D") {
        try {
                $movto= new Movimiento();
                $numero_actual = $movto->getnumTicketMovimiento();
                 $num = $numero_actual->nroTicket_Mov ;
                 $len=strlen($num+1);
                 $ceros=11-$len;
                 $valor='';
                  for ($j=0; $j<$ceros; $j++){
                    $valor=$valor.'0';  
                }
             $nroTicket=$valor.($num+1);
           $nmovto=$movto->insertarMovimiento($nroTicket,$tipomovimiento, $monto,$fechademovimiento,$idCah,$idusuario);
           $sumamonto=$movto->insertarmontoMovimiento($idCah, $monto);
           echo "Se inserto el desposito correctamente";
        } catch (Exception $e) {
          echo "error: ".$e;
        }
       } else {
        try {
         $movto= new Movimiento();
          $numero_actual = $movto->getnumTicketMovimiento();
                 $num = $numero_actual->nroTicket_Mov ;
                 $len=strlen($num+1);
                 $ceros=11-$len;
                 $valor='';
                  for ($j=0; $j<$ceros; $j++){
                    $valor=$valor.'0';  
                }
             $nroTicket=$valor.($num+1);
         $nmovto=$movto->insertarMovimiento($nroTicket,$tipomovimiento, $monto,$fechademovimiento,$idCah,$idusuario);
         $restamonto=$movto->retirarmontoMovimiento($idCah, $monto);
         echo "Se inserto el desposito correctamente";
        } catch (Exception $e) {
          echo "error en retiro: ".$e;
        }
    
       }
}


function _imprimirmovimientoAction(){
//$id=$_GET['idcontahorro'];
         $filter = new InputFilter();
         $id = $filter->process($_GET['idcontahorro']); 
         $movto= new Movimiento();
         $lmovimiento=$movto->getMovimientoBoucher($id);
         $response = array();
         $response["idSoc"] =$lmovimiento->id_Soc;  
         $response["nombresSoc"] =$lmovimiento->nombres_Soc ;
         $response["apellidoPatSoc"] =$lmovimiento->apellidoPat_Soc;  
         $response["apellidoMatSoc"] =$lmovimiento->apellidoMat_Soc;
         $response["dniSoc"] =$lmovimiento->dni_Soc;
         $response["direccionSoc"] =$lmovimiento->direccion_Soc;
         $response["telefonoSoc"] =$lmovimiento->telefono_Soc;
         $response["celularSoc"] =$lmovimiento->celular_Soc ;
         $response["nroAhorroCah"] =$lmovimiento->nroAhorro_Cah;
         $response["montoActualCah"] =$lmovimiento->montoActual_Cah ;
         $response["nroTicketMov"] =$lmovimiento->nroTicket_Mov ;
         $response["montoMov"] =$lmovimiento->monto_Mov  ;
         $response["tipoMov"] =$lmovimiento->tipo_Mov;
         $response["fechaMov"] =$lmovimiento->fecha_Mov;
         $response["condicionMov "] =$lmovimiento->condicion_Mov;
         $response["usuarioUsu  "] =$lmovimiento->usuario ;
         $response["nombreRol "] =$lmovimiento->nombre_Rol; 
         require_once 'view/movientosocio/imprimemovimiento.php';
}


function _obtenerMovimientoAction(){
//$id=$_GET['idcontahorro'];
         
         $id =$_POST['idcontahorro']; 
         $movto= new Movimiento();
         $lmovimiento=$movto->getMovimientoBoucher($id);
         $response = array();
         $response["idSoc"] =$lmovimiento->id_Soc;  
         $response["idMov"] =$lmovimiento->id_Mov; 
         $response["idCah"] =$lmovimiento->id_Cah; 
         $response["nombresSoc"] =$lmovimiento->nombres_Soc ;
         $response["apellidoPatSoc"] =$lmovimiento->apellidoPat_Soc;  
         $response["apellidoMatSoc"] =$lmovimiento->apellidoMat_Soc;
         $response["dniSoc"] =$lmovimiento->dni_Soc;
         $response["direccionSoc"] =$lmovimiento->direccion_Soc;
         $response["telefonoSoc"] =$lmovimiento->telefono_Soc;
         $response["celularSoc"] =$lmovimiento->celular_Soc ;
         $response["nroAhorroCah"] =$lmovimiento->nroAhorro_Cah;
         $response["montoActualCah"] =$lmovimiento->montoActual_Cah ;
         $response["nroTicketMov"] =$lmovimiento->nroTicket_Mov ;
         $response["montoMov"] =$lmovimiento->monto_Mov  ;
         $response["tipoMov"] =$lmovimiento->tipo_Mov;
         $response["fechaMov"] =$lmovimiento->fecha_Mov;
         $response["condicionMov "] =$lmovimiento->condicion_Mov;
         $response["usuarioUsu"] =$lmovimiento->usuario ;
         $response["nombreRol"] =$lmovimiento->nombre_Rol; 
         header('Content-Type: application/json');
         echo json_encode($response);
}

?>
