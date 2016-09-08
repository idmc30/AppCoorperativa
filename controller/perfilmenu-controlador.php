
<?php

session_start();


require_once 'model/clases/perfilmenu.php';
require_once 'model/clases/menu.php';
require_once 'model/clases/rol.php';
require_once 'class.inputfilter.php';

function _formAction(){
  
     $rol= new Rol();
     $lrol = $rol->listarRolActivo();
    require_once 'view/perfilmenu/Vperfilmenu.php';
}


function _listaMenuAction(){
    $codiperfil=$_POST['id']; 
    $menu = new Menu();
    $lmenu = $menu->listarMenuSubActivados();
    $perfilmenu= new PerfilMenu();
    require_once 'view/perfilmenu/Vlperfilmenu.php';
}



/*
function _insertarMenuPerfilAction(){
      $codiperfil=$_POST['idperf']; 
      $codmenu=$_POST['idmen']; 
      $menu = new Menu();
      $lmenu = $menu->insertarPerfilMenu($codiperfil,$codmenu);
      echo "Asignado correctamente";

}*/


function _manejomenuPerfilAction(){
    $codiperfil=$_POST['idperfi']; 
    $codmenu=$_POST['idmen']; 
    $accion = $_POST['estado'];
    $menuperfil = new PerfilMenu();
    if ($accion == "insertar") {
        $imenu = $menuperfil->insertarPerfilMenu($codiperfil,$codmenu); 
        echo "Se agregó correctamente";       
    } else {
       $emenu = $menuperfil->eliminarPerfilMenu($codiperfil,$codmenu);
        echo "Se quito correctamente";       
    }
}



?>
