<?php 
require_once 'model/clases/zonaubicaciongeografica.php';
require_once 'model/clases/zona.php';
require_once 'class.inputfilter.php';

function _formAction(){

  	$zug = new ZonaUbicacionGeografica();
    $ldepartamento = $zug->listarDepartamento();

    $zona = new Zona();
    $lzona = $zona->listarZonaActiva();
    //$idDpto=$_POST['iddpto']; 
    //$lprovincia = $zug->listarProvincia($idDpto);
    require_once 'view/zonaubicaciongeografica/Vzonaubicaciongeografica.php';
}

function _listarProvinciaAction(){
    $zug = new ZonaUbicacionGeografica();
    $idDpto=$_POST['codDpto']; 
    $lprovincia = $zug->listarProvincia($idDpto);
    require_once 'view/zonaubicaciongeografica/Vprovincia.php';
}

function _listarDistritoAction(){
    $zug = new ZonaUbicacionGeografica();
    $idProvincia=$_POST['codProvincia']; 
    $ldistrito = $zug->listarDistrito($idProvincia);
    require_once 'view/zonaubicaciongeografica/Vdistrito.php';
}
//funcion agregada para usarla en socio
function _listarDepartamentoAction(){
    $zug = new ZonaUbicacionGeografica();
    $ldepartamento = $zug->listarDepartamento();
    require_once 'view/zonaubicaciongeografica/Vdepartamento.php';
}

 
function _obtenerProvinciaAction(){

    $id = $_POST['id'];
    $zug=new ZonaUbicacionGeografica();
    $lzug=$zug->obtenerDistritoSocio($id); 
    $response = array();
    $response["idUge"] =$lzug->id_Uge; 
    $response["nombreUge"] =$lzug->nombre_Uge;
    $response["tipoUge"] =$lzug->tipo_Uge;
    $response["idSubUge"] =$lzug->idSub_Uge;  
    $response["estado_Uge"] =$lzug->estado_Uge;  
    header('Content-Type: application/json');
    echo json_encode($response);
}

//----------------------------------


function _listarZonaUbicacionGeograficaAction(){
      $zug = new ZonaUbicacionGeografica();
      $lzug=$zug->listarZonaUbicacionGeografica();
      require 'view/zonaubicaciongeografica/Vlistazonaubicaciongeografica.php';
     }

//Esto es obtener idDepartamento por provincia
function _obtenerIdDptoxIdProvinciaAction(){
    $cod = $_POST['id'];
    $provincia=new ZonaUbicacionGeografica();
    $lprovincia=$provincia->obtenerIdDptoxIdProvincia($cod); 
    $response = array();
    $response["idSubUge"] =$lprovincia->idSub_Uge; 
    header('Content-Type: application/json');
    echo json_encode($response);
     }



function _listarZonaUbicacionGeograficaxidZonAction(){
      $codigozon=$_POST['codZon']; 
      $zug = new ZonaUbicacionGeografica();
      $lzug=$zug->listarZonaUbicacionGeograficaxidZon($codigozon);
      require 'view/zonaubicaciongeografica/Vlistazonaubicaciongeografica.php';
     }

function _insertarZonaUbicacionAction(){      
       $codigozon=$_POST['codZon']; 
       $codigouge=$_POST['codUge']; 
       if (!empty($_POST['codZug'])) {
             $codzug=$_POST['codZug']; 
             $zug= new ZonaUbicacionGeografica();
             $mzug=$zug->modificarZonaUbicacionGeografica($codigozon, $codigouge);  
             echo "Zona ubicación geográfica modificada correctamente";
        }else{
            $zug= new ZonaUbicacionGeografica();
            $nzug=$zug->insertarZonaUbicacion($codigozon,$codigouge);  
            echo "Zona ubicación geográfica insertada correctamente";
        }         

}

function _eliminarZonaubicaciongeograficaAction(){         
         try {
         $codigoZug= $_POST["codigoZug"];         
         $zug=new ZonaUbicacionGeografica();
         $ezug=$zug->eliminarZonaUbicacionGeografica($codigoZug); 
         echo "Eliminación de Zona ubicación geográfica realizado correctamente";
         } catch (Exception $e) {
           echo "Este información no se puede eliminar porque se encuentra relacionado a otros datos.";
         }
}

function _estadoZonaUbicacionGeograficaAction(){
             $codZug=$_POST['idZug']; 
             $estadoZug=$_POST['estadoZug']; 
             $ezug= new ZonaUbicacionGeografica();
             $lezug=$ezug->estadoZonaUbicacionGeografica($codZug,$estadoZug);  
             echo "Cambia de estado de Zona ubicación geográfica realizada correctamente";
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