<?php 
require_once 'model/clases/aporte.php';
require_once 'model/clases/socio.php';
require_once 'class.inputfilter.php';

function _formAction(){
    $anio = new Aporte();
    $lanio = $anio->listarMontoAporteActivos();
    /*$soc = new  Socio();
    $lsoc = $soc->listarSocioActivo();
    */
    require_once 'view/aporte/Vaporte.php';   
    
}

function _listarSociosxAnioAction(){
      $anio=$_POST['anioa']; 
      $socios = new Aporte();
      $lsocio=$socios->listarSociosxAnio($anio);
      require 'view/aporte/Vlistasocio.php';
}

function _listarAporteIdSocioxAnioAction(){
      $idSocio=$_POST['idSoc']; 
      $mesSocio=$_POST['mesSoc']; 
      $anioSocio=$_POST['anioSoc'];       
      $anioSel=$_POST['anioSele']; 

      if ($anioSel==$anioSocio) {
        $meses = new Aporte();
        $lmeses=$meses->listarSoloMeses($idSocio,$mesSocio,$anioSel);
      }
      else{
      	$mesSocio=1;
        $meses = new Aporte();
        $lmeses=$meses->listarTodoMeses($idSocio,$mesSocio,$anioSel);
      }
     
      //$lsocio=$socios->listarSociosconAportesxAnio($anio);
      require 'view/aporte/Vlistameses.php';
}

function _insertarAporteAction(){     
      
       //$idApo1=$_POST['idApo']; 

       $idSoc=$_POST['idSoc']; 
       $idMap=$_POST['idMap']; 
       $cuota=$_POST['cuotaA']; 
       $mes=$_POST['mesA'];
       $tipo=$_POST['tipoA'];
       //$idAporte=$_POST['idApo']; 


       $fecha = strtotime($_POST['fechaA']);
       $fechaPago=date('Y-m-d',$fecha);
       
       $estado=$_POST['estadoA'];

       if (!empty($_POST["idApo"])) {            
             $idAporte=$_POST['idApo'];
             $aporte= new Aporte();
             $maporte=$aporte->modificarAporte($idAporte, $fechaPago);  
             //echo $fechaPago;
             echo "Modificación de pago de aporte de socio realizado correctamente";
        }else{
            $naporte= new Aporte();
            $raporte=$naporte->insertarAporte($idSoc, $idMap,$cuota,$mes,$tipo,$fechaPago,$estado);  
            echo "Registro de pago de aporte de socio realizado correctamente.";
        }         
}

function _eliminarAporteAction(){
         try {
              $id= $_POST["idApo"];
              if (!empty($_POST["idApo"])) {
                $aporte=new Aporte();
                $eaporte=$aporte->eliminarAporte($id); 
                echo "Eliminación de Aporte completado correctamente.";         
              }
              else
                {echo "No existe aporte por eliminar.";         
                }
              } catch (Exception $e) {
               echo "Este aporte no se puede eliminar porque se encuentra relacionado a otros datos.";
          }
}

function _estadoAporteAction(){      
             $estado=$_POST['e'];
             $idApo=$_POST['id'];
             if ($estado=='P') {
                  $estado=='D';
             }
              else{
                  $estado=='D';
             }
             $aporte= new Aporte();
             $estadoaporte=$aporte->estadoAporte($idApo,$estado);  
             echo "Cambio de estado de Pago de Aporte completado correctamente.";
}

function _imprimiraporteAction(){
//$id=$_GET['idcontahorro'];
         $filter = new InputFilter();
         $id = $filter->process($_GET['idaporte']); 
         $aport= new Aporte();
         $ldata=$aport->imprimirAporte($id);
         $response = array();
         $response["idApo"] =$ldata->id_Apo;           
         $response["cuotaApo"] =$ldata->cuota_Apo;  
         $response["mesApo"] =$ldata->mes_Apo;  
         $response["tipoApo"] =$ldata->tipo_Apo;  
         $response["fechaApo"] =$ldata->fecha_Apo;  
         $response["estadoApo"] =$ldata->estado_Apo;  
         $response["idSoc"] =$ldata->id_Soc;  
         $response["nombresSoc"] =$ldata->nombres_Soc;         
         $response["apellidoPatSoc"] =$ldata->apellidoPat_Soc;  
         $response["apellidoMatSoc"] =$ldata->apellidoMat_Soc;
         $response["dniSoc"] =$ldata->dni_Soc;
         
         $response["direccionSoc"] =$ldata->direccion_Soc;
         $response["telefonoSoc"] =$ldata->telefono_Soc;
         $response["celularSoc"] =$ldata->celular_Soc;           
         require_once 'view/aporte/imprimeaporte.php';
}


?>