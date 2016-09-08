<?php 
require_once 'model/clases/contratodecredito.php';
require_once 'model/clases/personal.php';
require_once 'model/clases/socio.php';
require_once 'model/clases/tasa.php';
require_once 'class.inputfilter.php';

function _lContCreditosAction(){
       $socio= new Socio();
       $lsocioa=$socio->listarSocioActivo();
      require 'view/contratocreditosocio/Vlistadodecontratodecredito.php';
}



function _listarContCreditosAction(){
       $idSoc=$_POST['codSoc'];
       $contCredito = new contratoCredito();
       $lcontratocredito=$contCredito->listarContCreditoxSocio($idSoc);
      require 'view/contratocreditosocio/vlcontcredito.php';
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
         require 'view/contratocreditosocio/imprimirContCredito.php';

}





?>