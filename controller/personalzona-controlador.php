<?php 
require_once 'model/clases/personalzona.php';
require_once 'model/clases/zona.php';
require_once 'model/clases/personal.php';
require_once 'class.inputfilter.php';

function _formAction(){

    $perzon = new PersonalZona();
    $lperzon = $perzon->listarPersonalZona();
  	
    $per = new Personal();
    $lpersonal = $per->listarPersonal();
    $zona = new Zona();
    $lzona = $zona->listarZonaActiva();

    require_once 'view/personalzona/Vpersonalzona.php';
}

function _listarPersonalZonaAction(){
      $pz = new PersonalZona();
      $lperzon=$pz->listarPersonalZona();
      require 'view/personalzona/Vlistapersonalzona.php';
     }


function _listarPersonalZonaxidZonAction(){
      $codigozon=$_POST['codZon']; 
      $pz = new PersonalZona();
      $lperzon=$pz->listarPersonalZonaxidZon($codigozon);
      require 'view/personalzona/Vlistapersonalzona.php';
     }

function _insertarPersonalZonaAction(){      
       $codigozon=$_POST['codZon']; 
       $codigoper=$_POST['codPer']; 
       if (!empty($_POST['codPzo'])) {
             $codpzo=$_POST['codPzo']; 
             $pz= new PersonalZona();
             $mpz=$pz->modificarPersonalZona($codigoper, $codigozon,$codpzo);  
             echo "Personal Zona modificado correctamente";
        }else{
            $zug= new PersonalZona();
            $nzug=$zug->insertarPersonalZona($codigozon,$codigoper);  
            echo "Personal Zona insertado correctamente";
        }         

}

function _eliminarPersonalZonaAction(){
         $codigoPzo= $_POST["codigoPzo"];         
        try {
         $pzo=new PersonalZona();
         $epzo=$pzo->eliminarPersonalZona($codigoPzo); 
         echo "Eliminación de Personal Zona realizado correctamente.";
        } catch (Exception $e) {
           echo "No se puede eliminar este personal zona porque se encuentra relacionado.";
        }
    }

function _estadoPersonalZonaAction(){
             $codPzo=$_POST['idPzo']; 
             $estadoPzo=$_POST['estadoPzo']; 
             $epzo= new PersonalZona();
             $lpzo=$epzo->estadoPersonalZona($codPzo,$estadoPzo);  
             echo "Cambia de estado de Personal Zona realizado correctamente";
}
 
function _obtenerPersonalZonaxIdPzoAction(){

    $idPzo = $_POST['codPzo']; 
    $pz=new PersonalZona();
    $lpz=$pz->obtenerPersonalZonaxIdPzo($idPzo); 
    $response = array();
    $response["idpersonal"] =$lpz->id_Per;
    $response["idzona"] =$lpz->id_Zon;
    $response["idpzo"] =$lpz->id_Pzo;
    header('Content-Type: application/json');
    echo json_encode($response);
}



?>