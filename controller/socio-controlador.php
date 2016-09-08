<?php

session_start();

require_once 'model/clases/socio.php';
require_once 'model/clases/zonaubicaciongeografica.php';
require_once 'class.inputfilter.php';

function _formAction(){
    $zug = new ZonaUbicacionGeografica();
    $ldepartamento = $zug->listarDepartamento();
    require_once 'view/socio/Vsocio.php';
}

function _listarSocioAction(){

      $socio= new Socio();
      $lsocio=$socio->listarSocio();
      require_once 'view/socio/Vlsocio.php';

}

function _insertarSocioAction(){
       $nomSoc=strtoupper($_POST['nomsoc']); 
       $apePatSoc=strtoupper($_POST['patsoc']); 
       $apeMatSoc=strtoupper($_POST['matsoc']); 
       $dniSoc=$_POST['dnisoc'];
       $resolApo=$_POST['resolsoc'];
       $idUge=$_POST['coddistsoc'];
       $direSoc=$_POST['dirsoc'];
       $telefSoc=$_POST['telsoc'];
       $celuSoc=$_POST['celsoc'];
       $emailSoc=strtoupper($_POST['emsoc']);
       $anio=date('Y');
       $mes=date('m');
       $dia=date('d');
       $fechIniSoc=$anio."-".$mes."-".$dia;
       $oSocio = new Socio();
       $numero_actual = $oSocio->getnumSocion();
       $num = $numero_actual->nro_Soc ;
       $len=strlen($num+1);
       $ceros=11-$len;
       $valor='';
       
       if (!empty($_POST['idsocio'])) {
             $idSocio=$_POST['idsocio'];
          try {
            $socio= new Socio();
            $lsocio=$socio->getSocio($idSocio);
            $response=array();
            $response["dni"] =$lsocio->dni_Soc;
            if ($response["dni"]== $dniSoc) {
               $msociodos=$socio->modificarSociosinDni($nomSoc, $apePatSoc,$apeMatSoc,$direSoc,$telefSoc,$celuSoc,$emailSoc,$idUge,$resolApo,$idSocio);
               echo "se modifico correctamente";
            } else {
              $msocio=$socio->modificarSocio($nomSoc, $apePatSoc,$apeMatSoc,$dniSoc,$direSoc,$telefSoc,$celuSoc,$emailSoc,$idUge,$resolApo,$idSocio);
              echo "se modifico correctamente";
            }
          } catch (Exception $e) {
            echo "no se puede registrar por que el socio ya existe";
          }
       } else {
         for ($j=0; $j<$ceros; $j++){
                $valor=$valor.'0';  
            }
             $nSoc=$valor.($num+1);
             try {
                $socio= new Socio();
                $nsocio=$socio->insertarSocio($nomSoc, $apePatSoc,$apeMatSoc,$dniSoc,$direSoc,$telefSoc,$celuSoc,$emailSoc,$idUge,$nSoc,$resolApo,$fechIniSoc);
                echo "Socio registrado correctamente";
             } catch (Exception $e) {
                echo "no se puede registrar por que el dni del socio ya existe";
             }
       }          
}
 
function _obtenerSocioAction(){

    $id = $_POST['cod'];
    $socio=new Socio();
    $lsocio=$socio->getSocio($id); 
    $response = array();
    $response["idSoc"] =$lsocio->id_Soc;
    $response["nombresSoc"] =$lsocio->nombres_Soc;  
    $response["apellidoPatSoc"] =$lsocio->apellidoPat_Soc;  
    $response["apellidoMatSoc"] =$lsocio->apellidoMat_Soc;  
    $response["dniSoc"] =$lsocio->dni_Soc;  
    $response["direccionSoc"] =$lsocio->direccion_Soc;  
    $response["telefonoSoc"] =$lsocio->telefono_Soc;  
    $response["celularSoc"] =$lsocio->celular_Soc;
    $response["emailSoc"] =$lsocio->email_Soc;  
    $response["estadoSoc"] =$lsocio->estado_Soc; 
    $response["idUge"] =$lsocio->id_Uge;
    $response["idProv"] =$lsocio->idProvincia;
    $response["idDpto"] =$lsocio->idDpto;
    //$response["idSubUge"] =$lsocio->idSub_Uge;
    //$response["idUsu"] =$lsocio->id_Usu;
    $response["nroSoc"] =$lsocio->nro_Soc;
    $response["resolucionApo"] =$lsocio->resolucion_Apo;  
    $response["fechaInicioSoc"] =$lsocio->fechaInicio_Soc;
    $response["fechaFinSoc"] =$lsocio->fechaFin_Soc;    
    header('Content-Type: application/json');
    echo json_encode($response);

}

function _obtenerSocioxDniAction(){

    $dni = $_POST['dni'];
    $socio=new Socio();
    $lsocio=$socio->getSocioxDni($dni); 
    $response = array();
    $response["idSoc"] =$lsocio->id_Soc;
    $response["nombresSoc"] =$lsocio->nombres_Soc;  
    $response["apellidoPatSoc"] =$lsocio->apellidoPat_Soc;  
    $response["apellidoMatSoc"] =$lsocio->apellidoMat_Soc;  
    $response["dniSoc"] =$lsocio->dni_Soc;  
    $response["direccionSoc"] =$lsocio->direccion_Soc;  
    $response["telefonoSoc"] =$lsocio->telefono_Soc;  
    $response["celularSoc"] =$lsocio->celular_Soc;
    $response["emailSoc"] =$lsocio->email_Soc;  
    $response["estadoSoc"] =$lsocio->estado_Soc; 
    $response["idUge"] =$lsocio->id_Uge;
    $response["idUsu"] =$lsocio->id_Usu;
    $response["nroSoc"] =$lsocio->nro_Soc;
    $response["resolucionApo"] =$lsocio->resolucion_Apo;  
    $response["fechaInicioSoc"] =$lsocio->fechaInicio_Soc;
    $response["fechaFinSoc"] =$lsocio->fechaFin_Soc;    
    header('Content-Type: application/json');
    echo json_encode($response);

}


function _eliminarSocioAction(){
         try {
         $codigo= $_POST["cod"];
         $socio=new Socio();
         $esocio=$socio->eliminarSocio($codigo); 
         echo "Eliminación de Socio completado correctamente.";         
          } catch (Exception $e) {
           echo "Este socio no se puede eliminar porque se encuentra relacionado a otros datos.";
        }
    }
function _estadoSocioAction(){
             $estado=$_POST['estado'];
             $codigoSocio=$_POST['idsocio'];
             $socio= new Socio();
             $estadosocio=$socio->estadoSocio($codigoSocio,$estado);  
             echo "Cambio de estado de Socio completado correctamente.";
}


function _fechaFinalSocioAction(){
    $idSoc=$_POST['idSocio'];
    $fechaFinSoc=date('Y-m-d');
    $socio= new Socio();
    $finSocio=$socio->fechaFinSocio($fechaFinSoc,$idSoc);
    echo "Se cambio la fecha final";

}




?>
