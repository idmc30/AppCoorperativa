<?php 

require_once 'model/clases/rol.php';
require_once 'class.inputfilter.php';

function _formAction(){
   require_once 'view/rol/Vrol.php';
}

function _insertarRolAction(){
      
       $nombre=strtoupper($_POST['nom']); 

        if (!empty($_POST["codRol"])) {
             $idRol=$_POST['codRol'];
             $rol= new Rol();
             $mRol=$rol->modificarRol($idRol,$nombre);  
             echo "Perfil modificado correctamente";
         }
        else{
            $rol= new Rol();
            $nrol=$rol->insertarRol($nombre);  
            echo "Perfil insertado correctamente";
        }         
}
 
          
function _estadoRolAction(){
      
             $estado=$_POST['estado'];
             $codigoRol=$_POST['idRol'];             
             $rol= new Rol();
             $estado=$rol->estadoRol($codigoRol,$estado); 
             echo "Cambio de estado realizado correctamente";
}

function _listarRolAction(){
       $rol = new Rol();
       $lrol=$rol->listarRol();
      require 'view/rol/Vlistarol.php';
}

function _eliminarRolAction(){
        try {
                 $codigo= $_POST["codRol"];
                 $rol=new Rol();
                 $erol=$rol->eliminarRol($codigo); 
                 echo "Perfil eliminado Correctamente";
        
        } catch (Exception $e) {
               echo "Esta Perfil no se puede eliminar porque se encuentra relacionado.";
        }      
}

function _obtenerRolAction(){
    $id = $_POST['codRol'];
    $rol=new Rol();
    $lrol=$rol->obtenerRol($id); 
    $response = array();
    $response["idRol"] =$lrol->id_Rol;
    $response["nomRol"] =$lrol->nombre_Rol;  
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>