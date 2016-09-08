<?php 

require_once 'model/clases/pago.php';
require_once 'model/clases/socio.php';
require_once 'model/clases/contratodecredito.php';
require_once 'class.inputfilter.php';

function _formAction(){
    $socio= new Socio();
    $lsocioa=$socio->listarSocioActivo();
   require_once 'view/pagos/Vpago.php';
}



function _listarContCreditosAction(){
       $idSoc=$_POST['codSoc'];
       $contratoCredito = new Pagos();
       $lcontratocredito=$contratoCredito->listarPagoxSocio($idSoc);
      require 'view/pagos/Vlistapago.php';
}


function _listaCuotaxContCreditoAction(){
       $idContCredito=$_POST['codContCredito'];
       $contratoCredito = new Pagos();
       $lcuotas=$contratoCredito->listarCuotaxContCredito($idContCredito);
       require 'view/pagos/vlcuotas.php';
}


function _imprimirCronogramaAction(){

       $filter = new InputFilter();
       //$fechaInicioSoc = $filter->process($_GET['fechini']); 
       $idContCredito=$filter->process($_GET['codContCredito']);
       $contratoCredito = new Pagos();
       $ContCredito= new contratoCredito();
       $lcontcredito=$ContCredito->getContCredito($idContCredito);
        $response = array();
         $response["idSoc"] =$lcontcredito->id_Soc;  
         $response["nombresSoc"] =$lcontcredito->nombres_Soc ;
         $response["apellidoPatSoc"] =$lcontcredito->apellidoPat_Soc;  
         $response["apellidoMatSoc"] =$lcontcredito->apellidoMat_Soc;
         $response["fechaInicioCcr"] =$lcontcredito->fechaInicio_Ccr;
         $response["fechaFinCcr"] =$lcontcredito->fechaFin_Ccr;
         $response["nrocreditoCcr"] =$lcontcredito->nrocredito_Ccr;
         $response["montoCuotaCcr"] =$lcontcredito->montoCredito_Ccr;

       $lcuotas=$contratoCredito->listarCuotaxContCredito($idContCredito);
       require 'view/pagos/imprimircronograma.php';
}




function _obtenerDetalleCuotaAction(){
    $idCuo = $_POST['idCuota'];
    $pago=new Pagos();
    $lcuota=$pago->getCuota($idCuo); 
    $response = array();
    $response["nrocreditoCcr"] =$lcuota->nrocredito_Ccr;
    $response["nroCuotaCcr"] =$lcuota->nroCuota_Ccr;  
    $response["numeroCuo"] =$lcuota->numero_Cuo; 
    $response["nombresSoc"] =$lcuota->nombres_Soc;  
    $response["apellidoPatSoc"] =$lcuota->apellidoPat_Soc;  
    $response["apellidoMatSoc"] =$lcuota->apellidoMat_Soc;
    $response["montoCuo"] =$lcuota->monto_Cuo;  
    $response["idCuota"] =$lcuota->id_Cuo;  
    $response["idContCredito"] =$lcuota->id_Ccr;
    $response["montoCuotaCcr"] =$lcuota->montoCuota_Ccr;  
    header('Content-Type: application/json');
    echo json_encode($response);
}



function _guardarPagoAction(){
       $montoPag=$_POST['Pagmonto'];
       $fechaPag=date('Y-m-d H:i:s');
       $estadoPag="C";
       $interesPag="";
       $idCuo=$_POST['Cuoid'];
       //nero de ticket es automatico $_POST['PagnroTicket'] 00000000001
       $idUsu=$_POST['Usuid'];
       $pago = new Pagos();
       $numero_actual = $pago->getnumTicketPago();
          if ($numero_actual!="") {
               $num = $numero_actual->nroTicket_Pag;
               $len=strlen($num+1);
               $ceros=11-$len;
               $valor='';
               for ($j=0; $j<$ceros; $j++){
                        $valor=$valor.'0';  
                    }
               $nroTicketPag=$valor.($num+1);
               $npago=$pago->insertarPago($montoPag,$fechaPag,$estadoPag,$interesPag,$idCuo,$nroTicketPag,$idUsu);
               echo "Se registro el pago."; 
          } else {
               $nroTicketPag="00000000001";
               $npago=$pago->insertarPago($montoPag,$fechaPag,$estadoPag,$interesPag,$idCuo,$nroTicketPag,$idUsu);
               echo "Se registro el pago."; 
          }           
}


function _estadoPagoCuotaAction(){
    $idCuo = $_POST['idCuota'];
    $estadoCuo="C";
    $pago=new Pagos();
    $estadopago=$pago->modificarPcuota($idCuo,$estadoCuo); 
    echo "Se registro el pago con exito";
}


function _imprimirTicketPagoAction(){
    $filter = new InputFilter();
    $idCuo = $filter->process($_GET['cod']); 
    $pago=new Pagos();
    $lpago=$pago->getCuotaPago($idCuo); 
    $response = array();
    $response["nrocreditoCcr"] =$lpago->nrocredito_Ccr;
    $response["nroCuotaCcr"] =$lpago->nroCuota_Ccr;  
    $response["numeroCuo"] =$lpago->numero_Cuo; 
    $response["nombresSoc"] =$lpago->nombres_Soc;  
    $response["apellidoPatSoc"] =$lpago->apellidoPat_Soc;  
    $response["apellidoMatSoc"] =$lpago->apellidoMat_Soc;
    $response["dniSoc"]=$lpago->dni_Soc;
    $response["montoCuo"] =$lpago->monto_Cuo; 
    $response["montoPag"] =$lpago->monto_Pag;
    $response["fechaPag"] =$lpago->fecha_Pag; 
    $response["nroTicketPag"] =$lpago->nroTicket_Pag;
    $response["montoCreditoCcr"] =$lpago->montoCredito_Ccr;

    require_once 'view/pagos/imprimirPago.php';
}


?>