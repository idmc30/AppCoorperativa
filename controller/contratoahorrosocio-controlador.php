
<?php

session_start();

require_once 'model/clases/contratoahorro.php';
require_once 'model/clases/socio.php';
require_once 'model/clases/tasa.php';
require_once 'class.inputfilter.php';





function _formAction(){
     
     $socio = new Socio();
     $lsocio = $socio->listarSociodos();
    require_once 'view/contratoahorrosocio/Vcontraroahorro.php';
}




function _listaContAhorroAction(){
        $idSocio=$_POST['codSocio'];
        $contahorro = new ContratoAhorro();
        $lcontahorro = $contahorro->listarContAhorroxSocio($idSocio);
        require_once 'view/contratoahorrosocio/Vliscontratoahorro.php';
}


/*           $timeuni = strtotime($fechadocumento);
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
                    $ncontahorro=$contahorro->insertarContAhorro($nroAhorro,$fechaFirma,$fechaInicio,$fechaFin,$montoDepositado,$montoActual,$trem,$tem,$tipo,$idSoc,$idUsu);
                echo "se inserto correctamente"; 
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
        require_once 'view/contratoahorrosocio/imprimirContahorro.php';
}


