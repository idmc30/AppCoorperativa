<?php

session_start();
require_once 'model/clases/reportes.php';
require_once 'model/clases/socio.php';
require_once 'model/clases/zona.php';
require_once 'model/clases/zonaubicaciongeografica.php';
require_once 'model/clases/movimiento.php';
require_once 'model/clases/contratoahorro.php';
require_once 'class.inputfilter.php';

function _socioxFechaContActivoAction(){

   require_once 'view/reporteSociosContActivos/VreporteSocCont.php';
}



function _lsocioFechActivoAction(){

   $fechaInicioSoc=$_POST['fechini'];
   $fechInicioSocfin=$_POST['fechfin'];

   $reporte= new Reporte();
   $listaSoc=$reporte->listarSocioxFecha($fechaInicioSoc,$fechInicioSocfin);
    require_once 'view/reporteSociosContActivos/VlistsocCcrActivo.php';
}


function _imprimirlsocioFechActivoAction(){

       $filter = new InputFilter();
       $fechaInicioSoc = $filter->process($_GET['fechini']); 
       $fechInicioSocfin = $filter->process($_GET['fechfin']); 
       //$tipoCcr = $filter->process($_GET['tipo']); 
       //$fechaInicioSoc=$_POST['fechini'];
       //$fechInicioSocfin=$_POST['fechfin'];
       //$tipoCcr=$_POST['tipo'];
       $response = array();
       $response["fechIni"] =$fechaInicioSoc; 
       $response["fechFin"] =$fechInicioSocfin; 

       $reporte= new Reporte();
       $listaSoc=$reporte->listarSocioxFecha($fechaInicioSoc,$fechInicioSocfin);
  
     require_once 'view/reporteSociosContActivos/imprimirlistasoccr.php';
}


function _contratoxSocioAction(){
   $socio= new Socio();
   $lsocioa=$socio->listarSocioActivo();
   require_once 'view/reporteContSocio/VreporteContSoc.php';
}

function _lcontratoxSocioAction(){
   $idSoc=$_POST['codSoc'];
   $reporte= new Reporte();
   $lCtrxSoc=$reporte->listarContxSocio($idSoc);
   require_once 'view/reporteContSocio/VlistsocContSoc.php';
}

function _imprimirContratosSocioAction(){

       $filter = new InputFilter();
       $idSoc = $filter->process($_GET['idsoc']); 
        $socio=new Socio();
        $lsocio=$socio->getSocio($idSoc); 
        $response = array();
        //$response["SocId"] =$lsocio->id_Soc;
        $response["nombresSoc"] =$lsocio->nombres_Soc;  
        $response["apellidoPatSoc"] =$lsocio->apellidoPat_Soc;  
        $response["apellidoMatSoc"] =$lsocio->apellidoMat_Soc;  
        $response["dniSoc"] =$lsocio->dni_Soc;  
        $response["direccionSoc"] =$lsocio->direccion_Soc;  
        $response["telefonoSoc"] =$lsocio->telefono_Soc;  
        $response["celularSoc"] =$lsocio->celular_Soc;
        $response["emailSoc"] =$lsocio->email_Soc;  
        $reporte= new Reporte();
        $lCtrxSoc=$reporte->listarContxSocio($idSoc); 
        require_once 'view/reporteContSocio/imprimirlistasContSoc.php';
}


function _contratoActivoInactivoxFechaAction(){
    
  require_once 'view/reporteContratosFecha/VreporteContFechas.php';
}


function _lcontratoActivoInactivoxFechaAction(){

     $fechaInicioC=$_POST['fechini'];
     $fechaFinC=$_POST['fechfin'];
     $reporte= new Reporte();
     $lcontxFech=$reporte->listarContxFecha($fechaInicioC,$fechaFinC);
     require_once 'view/reporteContratosFecha/VlistaContFechas.php';
}





function _imprimirContratosxFechaAction(){
       $filter = new InputFilter();
       $fechaInicioC = $filter->process($_GET['fechini']); 
       $fechaFinC = $filter->process($_GET['fechfin']); 
       $response = array();
       $response["fechIni"] =$fechaInicioC;
       $response["fechFin"] =$fechaFinC;
       $reporte= new Reporte();
       $lcontxFech=$reporte->listarContxFecha($fechaInicioC,$fechaFinC); 
       require_once 'view/reporteContratosFecha/imprimirlistaContFechas.php';
}





function _estadoCuentaxSocAction(){
    
     require_once 'view/reporteEstadoCuentaSocio/VreporteEstCuentSoc.php';
}


function _listarSocioCuentaAction(){

     $tipoCah =$_POST['tipcont'];
     $movto = new Movimiento();
     $lmovimiento=$movto->listarxTipodeContratoAhorro($tipoCah);
     require_once 'view/reporteEstadoCuentaSocio/cmbpersonacuenta.php';    

}


function _listarMovimientoxIDAction(){
      $idCah=$_POST['idcah'];
      $mvto= new Movimiento();
      $lmovimiento=$mvto->listarMovimientoxId($idCah);
      require_once 'view/reporteEstadoCuentaSocio/Vlistamovimiento.php';
}


function _mostrarInfoAction(){

    $id=$_POST['idco'];
    $movto= new Movimiento();
    require_once 'view/reporteEstadoCuentaSocio/informacion.php';
}


function _imprimirEstadoCuentaAction(){
       $filter = new InputFilter();
       $codCah = $filter->process($_GET['idcah']); 
       $movimiento = new Movimiento(); 
       $contahorro=new ContratoAhorro();
       $lcontahorro=$contahorro->obtenerContAhorro($codCah); 
       $response = array();
       $response["montoDepositadoCah"] =$lcontahorro->montoDepositado_Cah; 
       $response["montoActualCah"] =$lcontahorro->montoActual_Cah; 
       $response["apellidoPatSoc"] =$lcontahorro->apellidoPat_Soc;
       $response["apellidoMatSoc"] =$lcontahorro->apellidoMat_Soc;
       $response["nombresSoc"] =$lcontahorro->nombres_Soc;
       $response["dniSoc"] =$lcontahorro->dni_Soc;
       $response["direccionSoc"] =$lcontahorro->direccion_Soc;
       $response["nroAhorroCah"] =$lcontahorro->nroAhorro_Cah;
       $response["tipoCah"] =$lcontahorro->tipo_Cah;
       $lmovimiento=$movimiento->listarMovimientoxId($codCah);
       require_once 'view/reporteEstadoCuentaSocio/imprimeReportemovimiento.php';
}



/****************************************
          REPORTE DE ZONA ACTIVAS
*****************************************/

function _reporteSocioxZonaAction(){
   $z= new Zona();
   $lzonas=$z->listarZonaActiva();
   require_once 'view/reporteSociosxZona/VreporteSocioxZona.php';
}

function _listarSociosxZonaAction(){
   $idZon=$_POST['codZon'];
   $tipoCon=$_POST['tipoCont'];
   $reporte= new Reporte();
   $lSocioxZona=$reporte->listarSociosxZona($idZon,$tipoCon);
   require_once 'view/reporteSociosxZona/VlistaSocioxZona.php';
}

function _imprimirSociosxZonaAction(){

    $filter = new InputFilter();
    $idzon = $filter->process($_GET['idzon']); 
    $tipoCon=$filter->process($_GET['tipoCont']);

    $zona= new ZonaUbicacionGeografica();
    $lzona=$zona->listarZonaUbicacionGeograficaxidZon($idzon);   
   /* $response = array();
    $response["idZug"] =$lzona->id_Zug;  
    $response["estadoZug"] =$lzona->estado_Zug;  
    $response["idZon"] =$lzona->id_Zon;  
    $response["nombreZon"] =$lzona->nombre_Zon;  
    $response["distrito"] =$lzona->distrito;  
    $response["provincia"] =$lzona->provincia;  
    $response["departamento"] =$lzona->departamento;       
    */
    $reporte= new Reporte();
    $lSocioxZona=$reporte->listarSociosxZona($idzon,$tipoCon); 
    require_once 'view/reporteSociosxZona/imprimirlistaSocioxZona.php';

}


/****************************************
          REPORTE DE APORTES
*****************************************/


function _reporteAporteAction(){
   //$z= new Zona();
   //$lzonas=$z->listarZonaActiva();
   require_once 'view/reporteAportes/VreporteAporte.php';
}

function _listarAporteAction(){

   $fechaInicio=$_POST['fechaini'];
   $fechaFin=$_POST['fechafin']; 

   $reporte= new Reporte();
   $lAportes=$reporte->listarAportes($fechaInicio,$fechaFin);
   require_once 'view/reporteAportes/VlistaAporte.php';
}

function _imprimirAporteAction(){

    $filter = new InputFilter();
    $fechaInicio = $filter->process($_GET['fechainix']); 
    $fechaFin=$filter->process($_GET['fechafinx']);


    $reporte= new Reporte();
    $lAportes=$reporte->listarAportes($fechaInicio,$fechaFin);    
    require_once 'view/reporteAportes/imprimirlistaAporte.php';
}
