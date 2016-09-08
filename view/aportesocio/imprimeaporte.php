<?php
//$id = $_GET['idcontahorro']; 

require 'view/fpdf/fpdf.php';

$pdf=new FPDF('P','mm',array(75,140));//hoja=> L= horizontal P= vertical, mm=milimetros cm=centimetros, A4  posicion,medidas,tamaño
$pdf->Addpage();//Añadimos página.

$pdf->SetFont('Arial','B',7);
$pdf->Cell(0, 1, "COOPERATIVA DE AHORRO Y CREDITO", 0,0,'C');
$pdf->Ln(3);
$pdf->Cell(0, 1, "VALLE LA LECHE L.T.A.", 0,0,'C');
$pdf->Ln(3);
$pdf->SetFont('Arial','',7);
$pdf->Cell(0, 1, "Av. Andres A. Caceres Nro. 380 - Telef. 288010", 0,'','C');
$pdf->Ln(3);
$pdf->Cell(0, 1, utf8_decode("U.V. Victor R. Haya de la Torre - Ferreñafe"), 0,'','C');
$pdf->Ln(3);
$pdf->Cell(0, 1, "R.U.C. 20487703398", 0,'','C');
$pdf->Ln(1);$pdf->Ln(1);
$pdf->SetFont('Arial','b',7);$pdf->Cell(0, 1, "-------------------------------------------------------------------", 0,'','C');
$pdf->Ln(1);$pdf->Ln(1);
   
$pdf->SetFont('Arial','B',7);
$pdf->Ln(1);
$pdf->Cell(0,1,utf8_decode("N° Voucher: ".$response["idApo"]),0,'','R');
$pdf->Ln(4);
$pdf->Cell(0,1,utf8_encode("FECHA: ".$response["fechaApo"]),0,'','L');
$pdf->Ln(4);
   /* if ($response["tipoMov"]=="D") {
       $pdf->Cell(0,1,utf8_encode("TIPO: DEPOSITO"),0,'','L');
       $pdf->Ln(2);
    } else {
      $pdf->Cell(0,1,utf8_encode("TIPO: RETIRO"),0,'','L');
      $pdf->Ln(2);
    }*/ 
   
    $pdf->SetFont('Arial','B',7);$pdf->Cell(0, 1, "-------------------------------------------------------------------", 0,'','C');
    $pdf->Ln(1);
    $pdf->Ln(2); 
    $pdf->SetFont('Arial','B',7);
    $pdf->Cell(0, 1,utf8_decode('SOCIO N° : '.$response["idSoc"]), 0,'','');
    $pdf->Ln(3);
    $pdf->Cell(0, 1,'CLIENTE:  '.$response["apellidoPatSoc"]." ".$response["apellidoMatSoc"].",".$response["nombresSoc"], 0,'','');
    $pdf->Ln(3);
    $pdf->Cell(0, 1,'DNI: '.$response["dniSoc"], 0,'','');
    $pdf->Ln(3);

    $pdf->SetFont('Arial','b',7);$pdf->Cell(0, 1, "-------------------------------------------------------------------", 0,'','C');
    $pdf->Ln(5);
    $w = array(10,12,20,10);
    $pdf->SetFont('Arial','b',7);$pdf->Cell($w[0],1,'DESCRIPCION','');
    $pdf->SetFont('Arial','b',7);$pdf->Cell($w[1],1,' ','');
      $pdf->SetFont('Arial','b',7);$pdf->Cell($w[1],1,' ','');
    $pdf->SetFont('Arial','b',7);$pdf->Cell($w[3],1,'S/.','');
    $pdf->Ln(2);
    $pdf->SetFont('Arial','b',7);$pdf->Cell(0, 1, "--------------------------------------------------------------------", 0,'','C');
    $pdf->Ln(2);
    $pdf->Ln(2.5);    
     
     

     if ($response["tipoApo"]=="U") {          
         
          $tipoAporte=$response["tipoApo"];
          //$pdf->SetFont('Arial','b',7);$pdf->Cell($w[0],1,'MONTO UNICO // TIPO:    '.$tipoAporte,'');

          //$pdf->Ln(4);
          $pdf->SetFont('Arial','b',7);$pdf->Cell($w[0],1,' CUOTA DE APORTE:                    '.$response["cuotaApo"],'');
          $pdf->Ln(6); 
     } else {

          $tipoAporte=$response["tipoApo"];        
          //$pdf->SetFont('Arial','b',7);$pdf->Cell($w[0],1,'MONTO APORTE // TIPO      '.$tipoAporte,'');
          
          //$pdf->Ln(4);
          $pdf->SetFont('Arial','b',7);$pdf->Cell($w[0],1,' CUOTA DE APORTE:                    '.$response["cuotaApo"],'');
          $pdf->Ln(6);
     }
     

    $pdf->Ln(6);

    $pdf->SetFont('Arial','b',6);$pdf->Cell($w[1],1,"_______________________________________________",'');
    $pdf->Ln(6);
    $pdf->SetFont('Arial','b',7);$pdf->Cell($w[3],1,'                                      Total '.$response["cuotaApo"],'');
    //$pdf->SetFont('Arial','b',6);$pdf->Cell($w[3],1,$opago->cuota_total,'');
    $pdf->Ln(2.5);
    


    $pdf->Ln(6);


$pdf->Ln(2);
$pdf->SetFont('Arial','',7);$pdf->Cell(0, 1, "-----------------------------------------------------------", 0,'','C');
$pdf->Ln(1);$pdf->Ln(1);
//}
$pdf->Output();//Función que nos permite obtener el PDF.
?>