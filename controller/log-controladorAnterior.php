<?php 
session_start();

require_once 'model/clases/usuarios.php';
require_once 'class.inputfilter.php';


function _formAction(){
    
   // require_once 'login.php';
if (!isset($_SESSION['usuario'])) {
	require_once 'login.php';
} else {

	header("location: index.php");
}

}

function _loginAction(){
	$filter = new InputFilter();
      /*      $user = $filter->process($_POST["user"]);
    $pass = $filter->process($_POST["pass"]);*/
    $usu = $_POST["usu"];
	$pass= $_POST["pass"];
    $captcha = sha1($_POST["captcha"]);
    $cookie = $_COOKIE['captcha'];
    $usuario = new Usuarios();
	$usuarios = $usuario->validar($usu, $pass);
	$socio=$usuario->validarSocio($usu,$pass);
	$personal=$usuario->validarPersonal($usu, $pass);
    $response = array();
    $response["tipo"] =$usuarios->tipo_Usu;

   
if ($captcha == $cookie) {
 if ($response["tipo"]=="S") {

    	foreach ($socio as $lsocio) {
			$_SESSION['usuario'] = $lsocio->usuario;
			$_SESSION['nombres'] = $lsocio->nombres_Soc;
			$_SESSION['apellidoPat'] = $lsocio->apellidoPat_Soc;
            $_SESSION['apellidoMat'] = $lsocio->apellidoMat_Soc;
            $_SESSION['direccionSoc'] = $lsocio->direccion_Soc;
            $_SESSION['telefonoSoc'] = $lsocio->telefono_Soc;
            $_SESSION['celularSoc'] = $lsocio->celular_Soc;
            $_SESSION['emailSoc'] = $lsocio->email_Soc;
            $_SESSION['nombreCar'] = "";
            $_SESSION['nombreRol'] = $lsocio->nombre_Rol;
            $_SESSION['tipo'] = $lsocio->tipo_Usu;
            $_SESSION['idRol'] = $lsocio->id_Rol;
            $_SESSION['idUsu'] = $lsocio->id_Usu;
            $_SESSION['idSoc'] = $lsocio->id_Soc;             


			
		}
		header("location: index.php");	
    } else {
    	foreach ($personal as $lpersonal) {
			$_SESSION['usuario'] = $lpersonal->usuario;
			$_SESSION['nombres'] = $lpersonal->nombres_Per;
			$_SESSION['apellidoPat'] = $lpersonal->apellidoPat_Per;
            $_SESSION['apellidoMat'] = $lpersonal->apellidoMat_Per;
            $_SESSION['nombreRol'] = $lpersonal->nombre_Rol;
            $_SESSION['nombreCar'] = $lpersonal->nombre_Car;
			$_SESSION['tipo'] = $lpersonal->tipo_Usu;
			$_SESSION['idRol'] = $lpersonal->id_Rol;
			$_SESSION['idUsu'] = $lpersonal->id_Usu;
		}
		header("location: index.php");	
    }
}else {

	header("location: index.php?page=log&accion=form");
}

   
    
  
}





function _cerrarAction(){
	if (isset($_SESSION['usuario'])) {
		unset($_SESSION['usuario']);
		header("location: index.php?page=log&accion=form");
        die;
	}
}

