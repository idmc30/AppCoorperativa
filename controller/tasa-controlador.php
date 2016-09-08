
<?php

session_start();

require_once 'model/clases/tasa.php';
require_once 'class.inputfilter.php';


function _formAction(){
    require_once 'view/tasa/Vtea.php';
}

function _listarTeaAction(){
    $tasa = new Tasa();
    $ltea = $tasa->listarTea();
    require_once 'view/tasa/Vltea.php';
}

function _insertarTeaAction(){
      $aniotas=date('Y-m-d'); 
      $valortas=$_POST['teavalor']; 
      $tipotas=$_POST['tipotea'];
      if (!empty($_POST["teaid"])) {
             $codtas=$_POST['teaid']; 
             $tasa= new Tasa();
             $mtasa=$tasa->modificarTasa($codtas,$valortas);  
             echo "Se modifico correctamente la tasa";
        }else{
         $tasa= new Tasa();
         $ntasa=$tasa->insertarTasa($aniotas,$valortas,$tipotas);
         echo "se inserto correctamente la tasa";
        }    
}
 
/*VISTA PARA TEA LIBRE DISPONIBILIDAD */
function _tldiponibilidadAction(){
    require_once 'view/tasa/vtemlibredisponibilidad.php';
}

function _listartemldisponibilidadAction(){
    $tasa = new Tasa();
    $ltea = $tasa->listarTeaLibreDisponibilidad();
    require_once 'view/tasa/vltemlibredisponibilidad.php';
}
/*========================================================*/

/*****VISTA PARA TEA PLAZO FIJO*****/
function _tplazofijoAction(){
    require_once 'view/tasa/vtemplazofijo.php';
}

function _listarTasaPlazoFijoAction(){
    $tasa = new Tasa();
    $ltea = $tasa->listarTemPlazoFijo();
    require_once 'view/tasa/vltemplazofijo.php';
}
/*========================================================*/





function _obtenerTasaAction(){   
    $id = $_POST['cod'];
    $tasa=new Tasa();
    $ltea=$tasa->getTasa($id); 
    $response = array();
    $response["idtas"] =$ltea->id_tas;
    $response["aniotas"] =$ltea->anio_tas;  
    $response["valortas"] =$ltea->valor_tas;  
    $response["tipotas"] =$ltea->tipo_tas;  
    $response["estadotas"] =$ltea->estado_tas;  
    header('Content-Type: application/json');
    echo json_encode($response);
}

function _obtenerTasaxTipoAction(){   
    $tipo = $_POST['Tipotasa'];
    $tasa=new Tasa();
    $ltea=$tasa->getTasaxTipo($tipo); 
    $response = array();
    $response["idtas"] =$ltea->id_tas;
    $response["aniotas"] =$ltea->anio_tas;  
    $response["valortas"] =$ltea->valor_tas;  
    $response["tipotas"] =$ltea->tipo_tas;  
    $response["estadotas"] =$ltea->estado_tas;  
    header('Content-Type: application/json');
    echo json_encode($response);

}

function _ValidarTotalTasaAction(){
   //id_tas,year(anio_tas)as anio_tas,valor_tas,tipo_tas,estado_tas
    $tipotas = $_POST['tipo'];
    $tasa=new Tasa();
    $ltasa=$tasa->validar($tipotas); 
    $response = array();
    $response["totalActivo"] =$ltasa->total;
    header('Content-Type: application/json');
    echo json_encode($response);
}


function _estadoTasaAction(){
             $estado=$_POST['estado'];
             $codigoTasa=$_POST['idtasa'];
             $tasa= new Tasa();
             $estadotasa=$tasa->estadoTasa($codigoTasa,$estado);  
             echo "Se cambio correctament el estado.";
}
//=================================

function _vistaItfAction(){
    require_once 'view/tasa/Vitf.php';
}

function _listarItfAction(){
    $tasa = new Tasa();
    $ltea = $tasa->listarItf();
    require_once 'view/tasa/Vlitf.php';
}

function _insertarItfAction(){
      $anioitf=date('Y-m-d'); 
      $valoritf=$_POST['itfvalor']; 
      $tipotas="I"; 
      if (!empty($_POST["itfid"])) {
             $coditf=$_POST['itfid']; 
             $tasa= new Tasa();
             $mtasa=$tasa->modificarTasa($coditf,$valoritf);  
             echo "Se modifico correctamente la tasa";
        }else{
         $tasa= new Tasa();
         $ntasa=$tasa->insertarTasa($anioitf,$valoritf,$tipotas);
         echo "se inserto correctamente el tasa";
        }    
}


?>
