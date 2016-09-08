<?php

session_start();
require_once 'model/clases/reportes.php';
require_once 'model/clases/socio.php';
require_once 'model/clases/movimiento.php';
require_once 'model/clases/contratoahorro.php';
require_once 'class.inputfilter.php';



function _DeudoresFechasAction(){
    
     require_once 'view/reporteDeudoresxFecha/VreporteDeudasxFecha.php';
}


function _ldeudasxFechaAction(){

     $fechaInicioD=$_POST['fechini'];
     $fechaFinD=$_POST['fechfin'];
     $reporte= new Reporte();
     $ldeudaxFech=$reporte->listarDeudasxFecha($fechaInicioD,$fechaFinD);
     require_once 'view/reporteDeudoresxFecha/Vlistadeudaxfecha.php';
}


function _imprimirDeudaxFechaAction(){
       $filter = new InputFilter();
       $fechaInicioD = $filter->process($_GET['fechini']); 
       $fechaFinD = $filter->process($_GET['fechfin']); 
       
       $reporte= new Reporte();
       $totalDeuda=$reporte->montoTotalDeuda($fechaInicioD,$fechaFinD);
       $response = array();
       $response["montoDeuda"] =$totalDeuda->MontoTotal_Deuda; 
       $response["fechIni"] =$fechaInicioD;
       $response["fechFin"] =$fechaFinD;
       $ldeudaxFech=$reporte->listarDeudasxFecha($fechaInicioD,$fechaFinD); 
       require_once 'view/reporteDeudoresxFecha/imprimirDeudaxfecha.php';
}




//********************pagos
function _pagosxFechaAction(){
    
     require_once 'view/reportePagosxFecha/VreportePagoxFecha.php';
}



function _lpagoxFechaAction(){

     $fechaInicioP=$_POST['fechini'];
     $fechaFinP=$_POST['fechfin'];
     $reporte= new Reporte();
     $lpagoxFech=$reporte->listarPagosxFecha($fechaInicioP,$fechaFinP);
     require_once 'view/reportePagosxFecha/Vlistapagoxfecha.php';
}




function _imprimirPagosxFechaAction(){
       $filter = new InputFilter();
       $fechaInicioP = $filter->process($_GET['fechini']); 
       $fechaFinP = $filter->process($_GET['fechfin']); 
      
       $reporte= new Reporte();
       $toalpagos=$reporte->SumaTotalPagosxFecha($fechaInicioP,$fechaFinP);
       $response = array();
       $response["fechIni"] =$fechaInicioP;
       $response["fechFin"] =$fechaFinP;
       $response["sumpagos"] =$toalpagos->TotalPago;

       $lpagoxFech=$reporte->listarPagosxFecha($fechaInicioP,$fechaFinP); 
       require_once 'view/reportePagosxFecha/imprimirPagosxfecha.php';
}





function _DepositosRetirosAction(){

   require_once 'view/reporteDepositoRetiro/VreporteDepRetiro.php';
}


function _listaDepositosRetirosxFechaAction(){
       $fechaInicioM=$_POST['fechiniciom'];
       $fechaFinM=$_POST['fechfinm']; 
       $tipoMov=$_POST['tipomov']; 
       $reporte= new Reporte();
       $ldepretir=$reporte->listarRetiroDesposito($fechaInicioM,$fechaFinM,$tipoMov);
       require_once 'view/reporteDepositoRetiro/VlistDepRetiro.php';
}




function _imprimirDepositoRetiroAction(){

       $filter = new InputFilter();
       $fechaInicioM = $filter->process($_GET['fechiniciom']); 
       $fechaFinM = $filter->process($_GET['fechfinm']); 
       $tipoMov = $filter->process($_GET['tipomov']); 
       $reporte= new Reporte();
       $total= $reporte->montoTotalDepositoRetiro($fechaInicioM,$fechaFinM,$tipoMov);
       $response = array();
       $fechini = strtotime($fechaInicioM);
       $fechifin = strtotime($fechaFinM);
       $fechaInicio=date('d-m-Y',$fechini);
       $fechaFinal=date('d-m-Y',$fechifin);
       $response["fechIni"] =$fechaInicio; 
       $response["fechFin"] =$fechaFinal; 
       $response["sumTotal"] =$total->montoTotal; 
       $response["tipoMovimiento"] =$tipoMov; 

       $ldepretir=$reporte->listarRetiroDesposito($fechaInicioM,$fechaFinM,$tipoMov);
  
     require_once 'view/reporteDepositoRetiro/imprimirDepoRetiro.php';
}


?>