
<?php

session_start();

require_once 'model/clases/menu.php';
require_once 'class.inputfilter.php';

function _formAction(){
  

    require_once 'view/menu/Vmenu.php';
}


function _listaMenuAction(){
    $menu = new Menu();
    $lmenu = $menu->listarMenuSub();
    require_once 'view/menu/Vlmenu.php';
}



function _insertarMenuAction(){
      
      $nombremenu=ucfirst($_POST['menunom']); 
      $detalemnu=$_POST['menudeta']; 
      $link=$_POST['menulink']; 
      
      if (!empty($_POST["idmenu"])) {
             $codmenu=$_POST['idmenu'];
             $menu= new Menu();
             $mmenu=$menu->modificarMenuySubMenu($nombremenu, $detalemnu,$link,$codmenu);  
             echo "Se modico correctamente el personal";
        }else{
         $menu= new Menu();
         $nmenu=$menu->insertarMenu($nombremenu, $detalemnu,$link);
         echo "se inserto correctamente el menú";
        }    


}
 




function _insertarSubMenuAction(){
      
      $nombresubmenu=ucfirst($_POST['submenunom']); 
      $detasubmenu=$_POST['submenudeta']; 
      $linksubmenu=$_POST['submenulink']; 
      $idpadremenu=$_POST['idmenupadre']; 
      if (!empty($_POST["codsubmenu"])) {
          $idsubmenu=$_POST['codsubmenu'];
           $menu= new Menu();
           $nmenu=$menu->modificarMenuySubMenu($nombresubmenu, $detasubmenu,$linksubmenu,$idsubmenu);
           echo "se modificó correctamente el sub menú";
      } else {
           $menu= new Menu();
           $nmenu=$menu->insertarSubMenu($nombresubmenu, $detasubmenu,$idpadremenu,$linksubmenu);
           echo "se inserto correctamente el sub menú";
      }

}


function _obtenerMenuSubAction(){

    $id = $_POST['cod'];
    $menu=new Menu();
    $lmenu=$menu->getMenuSub($id); 
    $response = array();
    $response["idmen"] =$lmenu->id_Men;
    $response["nombremen"] =$lmenu->nombre_Men;  
    $response["idsubmen"] =$lmenu->idSub_Men;  
    $response["detallemen"] =$lmenu->detalle_Men;  
    $response["nivelmen"] =$lmenu->nivel_Men;  
    $response["linkmen"] =$lmenu->link_Men;  
    $response["estadomen"] =$lmenu->estado_Men;  
    //$response["ordemen"] =$lmenu->orden;  
    header('Content-Type: application/json');
    echo json_encode($response);

}


function _eliminarMenuySubMenuAction(){
         $codigo= $_POST["cod"];
         try {
        $menu=new Menu();
         $emenu=$menu->eliminarMenuSub($codigo) ; 
         echo "Se eliminó Correctamente";
        } catch (Exception $e) {
           echo "No se puede eliminar";
        }
         
    }

function _estadoMenuySubMenuAction(){
      
             $estado=$_POST['estados'];
             $codigoMenSubMen=$_POST['idmen'];
             $menu= new Menu();
             $estadomenus=$menu->estadoMenuSub($codigoMenSubMen,$estado);  
             echo "se cambio de estado correctamente";
}






?>
