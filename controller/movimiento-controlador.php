<?php

session_start();

require_once 'model/clases/movimiento.php';
require_once 'model/clases/zonaubicaciongeografica.php';
require_once 'model/clases/contratoahorro.php';
require_once 'model/clases/tasa.php';
require_once 'class.inputfilter.php';

function _formAction(){
    //$movto = new Movimiento();
    //$lmovimiento = $movto->listarMovimiento();
    require_once 'view/movimiento/Vmovimiento.php';
}


function _listarSocioCuentaAction(){

     $tipoCah =$_POST['tipcont'];
     $movto = new Movimiento();
     $lmovimiento=$movto->listarxTipodeContratoAhorro($tipoCah);
     require_once 'view/movimiento/cmbpersonacuenta.php';    

}




function _listarMovimientoxIDAction(){
      $idCah=$_POST['idcah'];
      $mvto= new Movimiento();
      $lmovimiento=$mvto->listarMovimientoxId($idCah);
      require_once 'view/movimiento/Vlistamovimiento.php';
}


function _mostrarInfoAction(){

    $id=$_POST['idco'];
    $movto= new Movimiento();
    require_once 'view/movimiento/informacion.php';
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
             echo "Error no se puedo realizar el extorno: ".$e;
          }
          
      }else {        
         try {
         $movto= new Movimiento();
         $sumamonto=$movto->insertarmontoMovimiento($contahorroid, $monto);
         $estadmovi=$movto->estornoMovimiento($idMov);
         echo "El estorno se realizo con exito";
         } catch (Exception $e) {
           echo "Error no se puedo realizar el extorno: ".$e;           
         }
      }
     
}


function _insertarMovimientoAction(){
       $tipomovimiento=$_POST['tipoMov']; 
       $monto=floatval($_POST['montoMov']);
       $fechademovimiento=date("Y-m-d H:i:s");
       $idCah=$_POST['codcont'];
       $idusuario=$_POST['codusuario'];
       $movto= new Movimiento();
       $datosMov = $movto->maximoMovimiento($idCah);
       $fechultimoMovimiento = $datosMov->fecha_Mov ;
       $totalMovimientos=$datosMov->Total_Mov;
       $contahorro = new ContratoAhorro();
       $lcontahorro=$contahorro->obtenerContAhorro($idCah);         
       $response = array();
       $response["tipoCah"] =$lcontahorro->tipo_Cah;  
       if ($tipomovimiento=="D" ) {
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
          echo "error en deposito: ".$e;
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
             echo "Se inserto el retiro correctamente";
            } catch (Exception $e) {
              echo "error en retiro: ".$e;
            }
       }
        
        if ($response["tipoCah"]!="F") {
            
       $maximoMovimiento="1";
       $tasa= new Tasa();
       $getTasa=$tasa->tasaActivaLibreDispobibilidad();
       $tasLibre=$getTasa->valor_tas;
       $response["idCah"] =$lcontahorro->id_Cah; 
       $response["montoActualCah"] =$lcontahorro->montoActual_Cah;
       $response["montoDespositado"] =$lcontahorro->montoDepositado_Cah;  
                        if ($totalMovimientos==$maximoMovimiento) {
                          $montoapertura=$response["montoDespositado"];
                        $montoSaldo=$montoapertura;
                        } else {
                        $montoapertura=$response["montoActualCah"];
                        $montoSaldo=$montoapertura;
                        }

         $P1 = (1+($tasLibre/100));
         $P2 = pow($P1, 0.0027777778); 
         $TEA_Diaria_T= ($P2)-1;

         $dias=strtotime($fechademovimiento)-strtotime($fechultimoMovimiento) ;
         $n=round($dias/86400, 0, PHP_ROUND_HALF_DOWN);
         $P3 = pow(1+$TEA_Diaria_T, $n)-1;
                        $InteresTradicionalMensual = $montoSaldo * $P3;
         
                           if ($tipomovimiento=="D") {
                             $InteresMensual = $montoSaldo + $InteresTradicionalMensual+$monto;
                           } else {
                             $InteresMensual = $montoSaldo + $InteresTradicionalMensual-$monto;
                           }                  

                        $nInteres=$contahorro->interesGanadoConAhorroLibre($InteresTradicionalMensual,$idCah);
                        $montoAct=$movto->modificarMontoActual($InteresMensual, $idCah);

       //echo $respuesta."::: Monto apertura : ".$montoapertura."   montoSaldo= ".$montoSaldo."   TEA-DIARIA= ".$TEA_Diaria_T."  P3= ". $P3. "   INTERES de los ".$n. "dias ".$Interes."   Interes y capital =  ".$InteresyCap;
 echo $montoapertura." -- Ndias=".$n."DIAS=".$dias."   FECHMOV".$fechademovimiento."FECHAULTIMA=".$fechultimoMovimiento." P1=".$P1." P2=".$P2."TEA-DIARIA=".$TEA_Diaria_T."P3=". $P3. "INTERES TRADICIONAL MENSUAL=".$InteresTradicionalMensual."MONTO SALDO=".$montoSaldo;

        } else {
       


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
         $response["usuarioUsu"] =$lmovimiento->usuario ;
         $response["nombreRol "] =$lmovimiento->nombre_Rol; 
         require_once 'view/movimiento/imprimemovimiento.php';
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




function _habilitarBtnMovimientoAction(){

    $id = $_POST['cod'];
    $fechaactual=date('Y-m-d');
    $totaldiastranscurridos="0";
    $contahorro=new ContratoAhorro();
    $lcontahorro=$contahorro->obtenerContAhorro($id); 
    $response = array();
    $response["idCah"] =$lcontahorro->id_Cah;
    $response["fechaFirmaCah"] =$lcontahorro->fechaFirma_Cah;  
    $response["fechaInicioCah"] =$lcontahorro->fechaInicio_Cah;  
    $response["fechaFinCah"] =$lcontahorro->fechaFin_Cah;  
    $tiempo=strtotime($response["fechaFinCah"])-strtotime($fechaactual);
      if ($tiempo<=$totaldiastranscurridos) {
           $response["valor"]="habilitar";
      } else {
         $response["valor"]="deshabilitar";
      }
      $response["hoy"]=$fechaactual;
      $response["resta"]=$tiempo;
      header('Content-Type: application/json');
      echo json_encode($response);

}
?>
