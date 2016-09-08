<?php 


require_once 'model/clases/contratodecredito.php';
require_once 'model/clases/personal.php';
require_once 'model/clases/socio.php';
require_once 'model/clases/tasa.php';
require_once 'class.inputfilter.php';


	function _formAction(){
       $socio = new Socio();
       $lsocio = $socio->listarSocioActivo();
       $tasa= new Tasa();
       $ltea=$tasa->listarTeaActivo();
       $litf=$tasa->listarItfActivo();
	   require_once 'view/contratocredito/Vcontratocredito.php';
	}


	/*function _muestraCuotaAction(){         
         require_once 'view/contratocredito/Vlistacuota.php';
	}*/
	
function _VistapreviaPrestamoAction(){
    $credito = $_POST["credito"];
    $cliente = $_POST["cliente"];
    $xcuota = $_POST["cuotas"];
    $desgravamen = $_POST["Desgravamen"];    
    $itf = $_POST["Itf"];
    $tea = $_POST["Tea"];
    $fechainicio = $_POST["fechinicio"];
    require_once 'view/contratocredito/Vlistacuota.php';
}






function _insertarContCreditoAction(){

    try {
    $credito = $_POST["credito"];
    $idSoc = $_POST["cliente"];
    $nroCuotaCcr = $_POST["cuotas"];
    $segruoCcr = $_POST["Desgravamen"];    
    $itfCcr = $_POST["Itf"];
    $teaCcr = $_POST["Tea"];
    $fechaInicioCcr = $_POST["fechinicio"];
    $fechaFinCcr = $_POST["fechifinal"];   
    $idUsu=$_POST['codUsua'];
    $Ccr = new contratoCredito();
    $numero_actual = $Ccr->getnumContCredito();
           $num = $numero_actual->nrocredito_Ccr;
           $len=strlen($num+1);
           $ceros=11-$len;
           $valor='';
    $temCcr= ((pow((1+($teaCcr/100)),30/360))-1)*100;
    $montoCuotaCcr= ((pow((1 + ($temCcr/100)),$nroCuotaCcr) * ($temCcr/100)) / (pow((1 + ($temCcr/100)),$nroCuotaCcr)-1)) * $credito ;
    $saldo_Capital=$credito;   
     for ($j=0; $j<$ceros; $j++){
            $valor=$valor.'0';  
                }
    $nrocreditoCcr=$valor.($num+1);    
    $nCcr = $Ccr->insertarContratodeCredito($nrocreditoCcr,$teaCcr,$credito,$nroCuotaCcr,$segruoCcr,$itfCcr,$fechaInicioCcr,$fechaFinCcr,$temCcr,$montoCuotaCcr,$idSoc,$idUsu);
    //echo "EL Prestamo se realiso con éxito";
                    $response = array();
                    $cod = $Ccr->getCodcredito($idSoc);
                    $codcredito=$cod->id_Ccr; 
                     if ($cod) {
                        $response["respuesta"] = $cod->id_Ccr;  
                     for ($i=1; $i <= $nroCuotaCcr; $i++) { 
                          $nuevafecha = strtotime ( '+'.$i.' month' , strtotime($fechaInicioCcr)) ;
                          $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
                          $Intereses=$temCcr;
                          $txtseguro2=$segruoCcr;
                          $Interes_Cuota= round(($saldo_Capital * $Intereses)/100,8);                    
                          $Interes_Ajustado = round($Interes_Cuota  - 0.02,2);                    
                          $txtcliente=$idSoc;
                          $txtcuota2=round($montoCuotaCcr,2);
                          $segurocuota = round(($saldo_Capital*$txtseguro2)/100,2);
                          /*********************** interes ******************************/
                          $Amortiz_capital= round($txtcuota2 - $Interes_Ajustado,2);
                          $total_cuota= $txtcuota2 + $segurocuota;    
                          $saldo_Capital = round($saldo_Capital - (round($montoCuotaCcr,2) - $Interes_Ajustado),2);    
                          $saldo_Capital2= abs(round($saldo_Capital));                                           
                     if ($i == 1) {
                       
                         $nsg=$Ccr->insertarSeguroGravamen($i,$saldo_Capital2,$txtseguro2,$segurocuota,$codcredito);

                    } else {
                         $nsg=$Ccr->insertarSeguroGravamen($i,$saldo_Capital2,$txtseguro2,$segurocuota,$codcredito);                         
                    }
                       //$getcronogramapago = $Ccr->insertarCronograma($codcredito, $i, $nuevafecha, $Amortiz_capital ,$Interes_Ajustado, $txtcuota2, $segurocuota, $total_cuota, $saldo_Capital2 );
                       $ncuota=$Ccr->insertarCuota($i,$txtcuota2,$nuevafecha,$Amortiz_capital,$teaCcr,$codcredito);
                      
                        
                }

                 }else {
                     

                 }
       echo "Todo salio correctamente"; 
    } catch (Exception $e) {
      echo "No se pudo realizar el registro:".$e;
    }
}



function _lContCreditosAction(){
       $socio= new Socio();
       $lsocioa=$socio->listarSocioActivo();
      require 'view/contratocredito/Vlistadodecontratodecredito.php';
}



function _listarContCreditosAction(){
       $idSoc=$_POST['codSoc'];
       $contCredito = new contratoCredito();
       $lcontratocredito=$contCredito->listarContCreditoxSocio($idSoc);
      require 'view/contratocredito/vlcontcredito.php';
}


function _imprimirContCreditosAction(){
         $filter = new InputFilter();
         $id = $filter->process($_GET['idcontacredito']); 
         $ContCredito= new contratoCredito();
         $lcontcredito=$ContCredito->getContCredito($id);
         $response = array();
         $response["idSoc"] =$lcontcredito->id_Soc;  
         $response["nombresSoc"] =$lcontcredito->nombres_Soc ;
         $response["apellidoPatSoc"] =$lcontcredito->apellidoPat_Soc;  
         $response["apellidoMatSoc"] =$lcontcredito->apellidoMat_Soc;
         $response["dniSoc"] =$lcontcredito->dni_Soc;
         $response["direccionSoc"] =$lcontcredito->direccion_Soc;
         $response["nombreUge"] =$lcontcredito->id_Uge;
         $response["telefonoSoc"] =$lcontcredito->telefono_Soc;
         $response["celularSoc"] =$lcontcredito->celular_Soc ;
         $response["idCcr"] =$lcontcredito->id_Ccr ;
         $response["nrocreditoCcr"] =$lcontcredito->nrocredito_Ccr;
         $response["teaCcr"] =$lcontcredito->tea_Ccr;
         $response["nroCuotaCcr"] =$lcontcredito->nroCuota_Ccr;
         $response["fechaInicioCcr"] =$lcontcredito->fechaInicio_Ccr;
         $response["fechaFinCcr"] =$lcontcredito->fechaFin_Ccr;
         $response["temCcr"] =$lcontcredito->tem_Ccr;
         $response["montoCuotaCcr"] =$lcontcredito->montoCuota_Ccr;
         require 'view/contratocredito/imprimirContCredito.php';
         
} 

?>