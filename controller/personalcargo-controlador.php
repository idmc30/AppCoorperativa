<?php 
require_once 'model/clases/cargo.php';
require_once 'model/clases/personalcargo.php';
require_once 'class.inputfilter.php';



function _formAction(){

  	$cargo = new Cargo();
    $lcargo = $cargo->listarCargoActivos();

   require_once 'view/personalcargo/Vpersonalcargo.php';
}

function _listarPersonalCargoAction(){
      $pcargo = new Pcargo();
       $lpercargo=$pcargo->listarCargoPersonal();
      require 'view/personalcargo/Vlistapersonalcargo.php';
     }


function _insertarPersonalCargoAction(){
      
       $codpersonal=$_POST['idpersonal']; 
       $codcargo=$_POST['idcargo']; 
        if (!empty($_POST["idpersonalcargo"])) {
              $codpercargo=$_POST['idpersonalcargo']; 
             $pcargo= new Pcargo();
             $mpcargo=$pcargo->modificarCargoPersonal($codpersonal, $codcargo,$codpercargo);  
             echo "Se modico correctamente el personal";
        }else{
            $pcargo= new Pcargo();
            $npercargo=$pcargo->insertarCargoPersonal($codpersonal,$codcargo);  
            echo "Se inserto correctamente el personal";
        }         

}

function _eliminarPersonalCargoAction(){
         $codigo= $_POST["cod"];         
        try {
           $pcargo=new Pcargo();
         $ecargo=$pcargo->eliminarCargoPersonal($codigo); 
         echo "Se elimino correctamente";
        } catch (Exception $e) {
           echo "No se puede eliminar";
        }
    }


function _estadoPersonalCargoAction(){
             $estado=$_POST['estado']; 
             $codpeca=$_POST['idpercargo']; 
             $pcargo= new Pcargo();
             $estadopecargo=$pcargo->estadoCargoPersonal($codpeca,$estado);  
             echo "El estado se cambio correctamente";
}
 
 

function _obtenerPcargoAction(){

    $id = $_POST['cod'];


   $pcargo=new Pcargo();
   $lpeca=$pcargo->getCargoPersonal($id); 
   $response = array();
    $response["idpeca"] =$lpeca->id_Pca; 
    $response["idpersonal"] =$lpeca->id_Per;
    $response["idcargo"] =$lpeca->id_Cargo;
    $response["nompersonal"] =$lpeca->nombres_Per;  
    $response["apepapersonal"] =$lpeca->apellidoPat_Per;  
    $response["apemapersonal"] =$lpeca->apellidoMat_Per;  
    $response["dnipersonal"] =$lpeca->dni_Per;  
    $response["nomcargo"] =$lpeca->nombre_Car;
    header('Content-Type: application/json');
    echo json_encode($response);
}





?>