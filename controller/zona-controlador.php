<?php 

require_once 'model/clases/zona.php';
require_once 'class.inputfilter.php';

function _formAction(){
   require_once 'view/zona/Vzona.php';
}

function _insertarZonaAction(){
      
       $nombre=strtoupper($_POST['nombre']); 
       $descripcion=strtoupper($_POST['descripcion']); 

        if (!empty($_POST["codigo"])) {
             $idZon=$_POST['codigo'];
             $zona= new Zona();
             $mZona=$zona->modificarZona($idZon,$nombre,$descripcion);  
             echo "Zona modificada correctamente";
         }
        else{
            $zona= new Zona();
            $nZona=$zona->insertarZona($nombre,$descripcion);  
            echo "Zona insertada correctamente";
        }         
}
 
function _estadoZonaAction(){
      
             $estado=$_POST['estado'];
             $codigoZona=$_POST['codigo'];             
             $zona= new Zona();
             $estado=$zona->estadoZona($codigoZona,$estado); 
             echo "Cambio de estado realizado correctamente";
}



function _listarZonaAction(){
       $zona = new Zona();
       $lzona=$zona->listarZona();
      require 'view/zona/Vlistarzona.php';
     }

function _eliminarZonaAction(){

         $codigo= $_POST["codigo"];
        try {
         $zona=new Zona();
         $ezona=$zona->eliminarZona($codigo); 
         echo "Zona eliminada Correctamente";
          } catch (Exception $e) {
           echo "Esta zona no se puede eliminar porque se encuentra relacionada.";
        }
    }

function _obtenerZonaAction(){
    $id = $_POST['codigo'];
    //echo $id;
    $zona=new Zona();
    $lzona=$zona->obtenerZona($id); 
    $response = array();
    $response["idZon"] =$lzona->id_Zon;
    $response["nombreZon"] =$lzona->nombre_Zon;  
    $response["descripcionZon"] =$lzona->descripcion_Zon;  
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>