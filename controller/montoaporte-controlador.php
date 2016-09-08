<?php 
require_once 'model/clases/montoaporte.php';
require_once 'class.inputfilter.php';

function _formAction(){
   require_once 'view/montoaporte/Vmontoaporte.php';
}

/*Monto Aporte */
function _listarMontoAporteAction(){
      $montoaporte = new MontoAporte();
      $lmontoaporte=$montoaporte->listarMontoAporte();
      require 'view/montoaporte/Vlistamontoaporte.php';
}

function _insertarMontoAporteAction(){           
       $monto=floatval($_POST['montoa']); 
       $anio=$_POST['anioa'];        
        if (!empty($_POST["codigoa"])) {            
            try {
               $idMap=$_POST['codigoa'];
               $montoa= new MontoAporte();
               $maporte=$montoa->modificarMontoAporte($idMap,$monto,$anio);  
               echo "Actualización de Monto de Aporte completado correctamente.";
            }
            catch (Exception $e) {
              echo "Ya se encuentra registrado este aporte para este año ";
              }
              
        }else{          
            try {
              $montoa= new MontoAporte();
              $nmonto=$montoa->insertarMontoAporte($monto,$anio);  
              echo "Registro de Monto de Aporte completado correctamente.";
            } 
            catch (Exception $e) {
               echo "Ya se encuentra registrado este aporte para este año ";
              /*
               echo "Mensaje: ".$e->getMessage()."\n";
               echo "Codigo: ".$e->getCode()."\n";
               echo "Archivo: ".$e->getFile()."\n";
               echo "Linea: ".$e->getLine()."\n";
               echo "Trazo: ".$e->getTrace()."\n";
               echo "Cadena de Trazo: ".$e->getTraceAsString()."\n";
               */
            }         
        }
}         

function _obtenerMontoAporteAction(){
    $id = $_POST['codigo'];
    $montoa=new MontoAporte();
    $lmonto=$montoa->obtenerMontoAporte($id); 
    $response = array();
    $response["idMap"] =$lmonto->id_Map;
    $response["monto"] =$lmonto->monto_Map;  
    $response["anio"] =$lmonto->anio_Map;  
    header('Content-Type: application/json');
    echo json_encode($response);
}


function _estadoMontoAporteAction(){    
try {
             $estado=$_POST['estado'];
             $codigo=$_POST['idmap'];
             $montoaporte= new MontoAporte();
             $estadomap=$montoaporte->estadoMontoAporte($codigo,$estado);  
             echo "Cambio de estado de Monto de pago completado correctamente.";

    } 
            catch (Exception $e) {
               echo "Ya se encuentra registrado este aporte para este año ";
              /*
               echo "Mensaje: ".$e->getMessage()."\n";
               echo "Codigo: ".$e->getCode()."\n";
               echo "Archivo: ".$e->getFile()."\n";
               echo "Linea: ".$e->getLine()."\n";
               echo "Trazo: ".$e->getTrace()."\n";
               echo "Cadena de Trazo: ".$e->getTraceAsString()."\n";
               */
            }      
}

function _eliminarMontoAporteAction(){
         try {
         $codigo= $_POST["codigo"];
         $montoAporte=new MontoAporte();
         $emap=$montoAporte->eliminarMontoAporte($codigo); 
         echo "Eliminación de Cargo completado correctamente.";         
          } catch (Exception $e) {
           echo "Este monto de aporte no se puede eliminar porque se encuentra relacionado a otros datos.";
        }
}

/*Cargo 
function _insertarCargoAction(){
      
       $nombre=strtoupper($_POST['nom']); 
        if (!empty($_POST["codcargo"])) {
             $idcargo=$_POST['codcargo'];
             $cargo= new Cargo();
             $mcargo=$cargo->modificarCargo($idcargo,$nombre);  
             echo "Actualización de Cargo completado correctamente.";
        }else{
            $cargo= new Cargo();
            $ncargo=$cargo->insertarCargo($nombre);  
            echo "Registro de Cargo completado correctamente.";
        }         

}
 


function _estadoCargoAction(){
      
             $estado=$_POST['estado'];
             $codigoCargo=$_POST['idcargo'];
             $cargo= new Cargo();
             $estadocargo=$cargo->estadoCargo($codigoCargo,$estado);  
             echo "Cambio de estado de Cargo completado correctamente.";
}

function _listarCargoAction(){
      $cargo = new Cargo();
       $lcargo=$cargo->listarCargo();
      require 'view/cargo/VlistaCargo.php';
     }

function _eliminarCargoAction(){
         try {
         $codigo= $_POST["cod"];
         $cargo=new Cargo();
         $ecargo=$cargo->eliminarCargo($codigo); 
         echo "Eliminación de Cargo completado correctamente.";         
          } catch (Exception $e) {
           echo "Este cargo no se puede eliminar porque se encuentra relacionado a otros datos.";
        }
    }

function _obtenerCargoAction(){

    $id = $_POST['cod'];
    $cargo=new Cargo();
    $lcargo=$cargo->getCargo($id); 
    $response = array();
    $response["idcargo"] =$lcargo->id_Cargo;
    $response["nomcargo"] =$lcargo->nombre_Car;  
    header('Content-Type: application/json');
    echo json_encode($response);

}
*/

?>