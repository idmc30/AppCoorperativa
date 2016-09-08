<?php 


require_once 'model/clases/cargo.php';
require_once 'class.inputfilter.php';



function _formAction(){
   require_once 'view/cargo/Vcargo.php';
}


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

?>