
<?php

session_start();

require_once 'model/clases/personal.php';
require_once 'class.inputfilter.php';

function _formAction(){
    $personal = new Personal();
    $lpersonal = $personal->listarPersonal();

    require_once 'view/personal/Vpersonal.php';
}


function _listapruebaAction(){
$personal = new Personal();
    $lpersonal = $personal->listarPersonal();

    require_once 'view/personal/Vlispersonal.php';


}



function _insertarPersonalAction(){
      
       $nombre=strtoupper($_POST['nompersona']); 
       $apepaterno=strtoupper($_POST['apppersona']); 
       $apematerno=strtoupper($_POST['apemapersona']); 
       $dni=$_POST['dnipersona'];
       $telefono=$_POST['telefpersona'];
       $celu=$_POST['celupersona'];
       $correo=$_POST['emailpesona'];
        if (!empty($_POST["codpersona"])) {
             $idpersona=$_POST['codpersona'];
             $personal= new Personal();
             $mpersonal=$personal->modificarPersonal($nombre, $apepaterno,$apematerno,$dni,$telefono,$celu,$correo,$idpersona);  
             echo "Se modico correctamente el personal";
        }else{
            $personal= new Personal();
            $npersonal=$personal->insertarPersonal($nombre, $apepaterno,$apematerno,$dni,$telefono,$celu,$correo);  

            echo "Se inserto correctamente el personal";
        }         

}
 


function _estadoPersonalAction(){
      
             $estado=$_POST['estado'];
             $codigoCargo=$_POST['idpersonal'];
             $personal= new Personal();
             $estadopersonal=$personal->estadoPersonal($codigoCargo,$estado);  
             echo "correcto";
}


function _eliminarPersonalAction(){
 try {
         $codigo= $_POST["cod"];
         $personal=new Personal();
         $epersonal=$personal->eliminarPersonal($codigo); 
         echo "Se eliminó Correctamente este personal";
        } catch (Exception $e) {
         echo "No se puede eliminar este personal ya que cuenta con un cargo";
        }
}

function _obtenerPersonalAction(){
    $id = $_POST['cod'];
    $personal=new Personal();
    $lpersonal=$personal->getPersonal($id); 
    $response = array();
    $response["idpersonal"] =$lpersonal->id_Per;
    $response["nompersonal"] =$lpersonal->nombres_Per;  
    $response["apepapersonal"] =$lpersonal->apellidoPat_Per;  
    $response["apemapersonal"] =$lpersonal->apellidoMat_Per;  
    $response["dnipersonal"] =$lpersonal->dni_Per;  
    $response["telefpersonal"] =$lpersonal->telefono_Per;  
    $response["celupersonal"] =$lpersonal->celular_Per;  
    $response["emailpersonal"] =$lpersonal->email_Per;  
    header('Content-Type: application/json');
    echo json_encode($response);
}

function _obtenerPersonalxDniAction(){

    $dni = $_POST['dni'];
    $personal=new Personal();
    $lpersonal=$personal->getPersonalxDni($dni); 
    $response = array();
    $response["idpersonal"] =$lpersonal->id_Per;
    $response["nompersonal"] =$lpersonal->nombres_Per;  
    $response["apepapersonal"] =$lpersonal->apellidoPat_Per;  
    $response["apemapersonal"] =$lpersonal->apellidoMat_Per;  
    $response["dnipersonal"] =$lpersonal->dni_Per;  
    $response["telefpersonal"] =$lpersonal->telefono_Per;  
    $response["celupersonal"] =$lpersonal->celular_Per;  
    $response["emailpersonal"] =$lpersonal->email_Per;  
    header('Content-Type: application/json');
    echo json_encode($response);

}



?>
