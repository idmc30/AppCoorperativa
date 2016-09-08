
<?php

session_start();
require_once 'model/clases/usuarios.php';
require_once 'model/clases/rol.php';
require_once 'model/clases/personalcargo.php';
require_once 'model/clases/socio.php';
require_once 'model/clases/personal.php';
require_once 'class.inputfilter.php';

function _formAction(){
    $rol = new Rol();
    $lrol = $rol->listarRolActivo();
    require_once 'view/usuarios/Vusuario.php';
}



function _cambiarContrasenaAction(){
          $codigousuario=$_POST['codusu'];
         // $clave=md5($_POST['passusu']);
          $clave=$_POST['passusu'];
          $usuario= new Usuarios();
          $rusuarii=$usuario->actualizarPasswor($codigousuario,$clave);
          echo "Se cambio la contraseña";
}




function _listaUsuarioAction(){
    $usuario = new Usuarios();
    $lusuario = $usuario->listarUsuario();
    require_once 'view/usuarios/Vlusuario.php';
}



function _listarPersonalCargoAction(){
       $dni=$_POST['dni'];     
       $pcargo = new Pcargo();
       $lpercargoxdni=$pcargo->getCargoPersonalxDni($dni) ;
      require 'view/usuarios/Vlpersonalcargo.php';
     }





function _insertarUsuarioAction(){
     $usua=strtoupper($_POST['usuar']);
     //$clave=md5($usuario);
     $claveUsu=$usua;
     $tipoUsu=$_POST['Usutipo'];
     $idRol=$_POST['Rolid'];
     $idPca=$_POST['Pcaid'];
     ///$idSoc=$_POST['Socid'];
  
     $usuari= new Usuarios();
     $nusuario=$usuari->insertarUsuario($usua,$claveUsu,$tipoUsu,$idRol,$idPca);
     echo "se inserto correctamente";
}


function _insertarUsuarioSocioAction(){
     $usua=strtoupper($_POST['usuar']);
     //$clave=md5($usuario);
     $claveUsu=$usua;
     $tipoUsu=$_POST['Usutipo'];
     $idRol=$_POST['Rolid'];
    // $idPca=$_POST['Pcaid'];
     $idSoc=$_POST['Socid'];
  
     $usuari= new Usuarios();
     $nusuario=$usuari->insertarUsuarioSocio($usua,$claveUsu,$tipoUsu,$idRol,$idSoc);
     echo "se inserto correctamente";
}



function _obtenerUsuarioAction(){

    $id = $_POST['cod'];
    $usuarios=new Usuarios();
    $lusuario=$usuarios->obtenerUsuario($id); 
    $response = array();
    $response["idUsu"] =$lusuario->id_Usu;
    $response["usuar"] =$lusuario->usuario;  
    $response["claveUsu"] =$lusuario->clave_Usu;  
    $response["tipo_Usu"] =$lusuario->tipo_Usu;  
    $response["estadoUsu"] =$lusuario->estado_Usu;  
    $response["idRol"] =$lusuario->id_Rol;  
    $response["id_Pca"] =$lusuario->id_Pca;  
    header('Content-Type: application/json');
    echo json_encode($response);

}

function _eliminarUsuarioAction(){
     
     $codigo=$_POST['cod'];
     try {
     $usuario= new Usuarios();
     $eusuario=$usuario->eliminarUsuario($codigo);
     echo "Se eliminó correctamente";
     } catch (Exception $e) {
      echo "No se pudo eliminar";
     }
}

function _estadoUsuarioAction(){
      
             $estado=$_POST['estado'];
             $codigoUsuario=$_POST['idusu'];
             $usuario= new Usuarios();
             $estadousuario=$usuario->estadoUsuario($codigoUsuario,$estado);  
             echo "Se cambio correctamente el estado";
}


function _restablecerClaveAction(){
          $codigousuario=$_POST['codusu'];
          //$clave=md5($_POST['passusu']);
          $clave=$_POST['passusu'];
          $usuario= new Usuarios();
          $rusuarii=$usuario->restablecerUsuario($codigousuario,$clave);
          echo "Se restablecion la cuenta de usuario";
}

function _listarCmbSocioActivosAction(){
      $socio= new Socio();
      $lsocio=$socio->listarSocioActivo();                 
      require 'view/usuarios/Vcmbsocio.php';

}

function _listarCmbPersonalActivosAction(){
      $personal= new Personal();
      $lpersonal=$personal->listarPersonalActivo();                 
      require 'view/usuarios/Vcmbpersonal.php';          
}



?>
