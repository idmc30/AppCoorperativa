<?php
//$id = $_GET['idcontahorro']; 

require 'view/fpdf/fpdf.php';

$pdf=new FPDF('P','mm',array(75,102));//hoja=> L= horizontal P= vertical, mm=milimetros cm=centimetros, A4  posicion,medidas,tamaño
$pdf->Addpage();//Añadimos página.
$pdf->SetFont('Arial','B',7);
$pdf->Cell(0, 1, "COOPERATIVA DE AHORRO Y CREDITO", 0,0,'C');
$pdf->Ln(3);
$pdf->Cell(0, 1, "VALLE  LA  LECHE L.T.A.", 0,0,'C');
$pdf->Ln(3);
$pdf->SetFont('Arial','',7);
$pdf->Cell(0, 1, "Av. Andres A. Caceres Nro. 380 - Telef. 288010", 0,'','C');
$pdf->Ln(3);
$pdf->Cell(0, 1, utf8_decode("U.V. Víctor R. Haya de la Torre - Ferreñafe"), 0,'','C');
$pdf->Ln(3);
$pdf->Cell(0, 1, "R.U.C. 20487703398", 0,'','C');
$pdf->Ln(4);
$pdf->SetFont('Arial','b',7);
$pdf->Cell(0, 1, "____________________________________________", 0,'','C');
$pdf->Ln(3);
$pdf->SetFont('Arial','b',7);

$pdf->Ln(1);
$pdf->Cell(0,1,utf8_decode("N° Operación:                                    ".$response["nroTicketMov"]),0,'','');
$pdf->Ln(4);
$pdf->Cell(0,1,utf8_encode("FECHA: "."                                 ".$response["fechaMov"]),0,'','');
$pdf->Ln(2);

$pdf->SetFont('Arial','b',7);
$pdf->Cell(0, 1, "____________________________________________", 0,'','C');
$pdf->Ln(5); 
$pdf->SetFont('Arial','',7);
$pdf->Cell(0, 1,utf8_decode('N° CUENTA AHORRO:                     '.$response["nroAhorroCah"]), 0,'','');
$pdf->Ln(3);
$pdf->Cell(0, 1,'SOCIO :  '.$response["apellidoPatSoc"]." ".$response["apellidoMatSoc"].", ".$response["nombresSoc"], 0,'','');
$pdf->Ln(3);
$pdf->Cell(0, 1,'DNI: '.$response["dniSoc"], 0,'','');
$pdf->Ln(3);
  
     if ($response["tipoMov"]=="D") {
          $pdf->SetFont('Arial','',7);
          $pdf->Cell(0, 1, "____________________________________________", 0,'','C');
          $pdf->Ln(4);
          $w = array(15,12,22,15);
          $pdf->SetFont('Arial','b',7);
          $pdf->Cell(0,1,"D E P O S I T O",0,'','C');
          $pdf->SetFont('Arial','',7);
          $pdf->Ln(2);
          $pdf->Cell(0, 1, "____________________________________________", 0,'','C');
          $pdf->Ln(3);
         
          $MONTOINICIAL=$response["montoActualCah"]-$response["montoMov"];
          $pdf->Ln(3);
          $pdf->Cell($w[0],1,'MONTO ANTERIOR:                              '.$MONTOINICIAL,'');
          $pdf->Ln(4);
          $pdf->SetFont('Arial','',7);
          $pdf->SetFont('Arial','b',7);
          $pdf->Cell($w[0],1,'MONTO RECIBIDO :                               '.$response["montoMov"],'');
          $pdf->Ln(4);
          $pdf->SetFont('Arial','b',7);$pdf->Cell(0, 1, "____________________________________________", 0,'','C');
          $pdf->Ln(4);
          $pdf->SetFont('Arial','b',7);$pdf->Cell(0,1,'SALDO ACTUAL                       Total  S/. '.$response["montoActualCah"],'');
          $pdf->Ln(2);
          $pdf->SetFont('Arial','b',7);$pdf->Cell(0, 1, "____________________________________________", 0,'','C');
         
     } elseif($response["tipoMov"]=="I")  {
         $pdf->SetFont('Arial','',7);
          $pdf->Cell(0, 1, "____________________________________________", 0,'','C');
          $pdf->Ln(4);
          $w = array(15,12,22,15);
          $pdf->SetFont('Arial','b',7);
          $pdf->Cell(0,1,"M O N T O     A P E R T U R A",0,'','C');
          $pdf->SetFont('Arial','',7);
          $pdf->Ln(2);
          $pdf->Cell(0, 1, "____________________________________________", 0,'','C');
          $pdf->Ln(3);

         $MONTOINICIAL=$response["montoActualCah"]+0;
          $pdf->Ln(3);
          $pdf->SetFont('Arial','B',7);$pdf->Cell(0,1,'MONTO ABONADO :                                '.number_format($response["montoMov"], 2, '.', ','),'');
          $pdf->Ln(4);
          $pdf->SetFont('Arial','b',7);$pdf->Cell(0, 1, "____________________________________________", 0,'','C');
          $pdf->Ln(6);
          $pdf->SetFont('Arial','b',7);$pdf->Cell(0,1,'SALDO DISPONIBLE             Total   S/.  '.number_format($response["montoMov"], 2, '.', ','),'');
          $pdf->Ln(4);
          $pdf->SetFont('Arial','b',7);$pdf->Cell(0, 1, "____________________________________________", 0,'','C');
          

     }else{
          $pdf->SetFont('Arial','',7);
          $pdf->Cell(0, 1, "____________________________________________", 0,'','C');
          $pdf->Ln(4);
          $w = array(15,12,22,15);
          $pdf->SetFont('Arial','b',7);
          $pdf->Cell(0,1,"R  E  T  I  R  O",0,'','C');
          $pdf->SetFont('Arial','',7);
          $pdf->Ln(2);
          $pdf->Cell(0, 1, "____________________________________________", 0,'','C');
          $pdf->Ln(3);
          
         $MONTOINICIAL=$response["montoActualCah"]+$response["montoMov"];
         $pdf->Ln(3);
         $pdf->Cell(0,1,'MONTO ANTERIOR:                              '.$MONTOINICIAL,'');
         $pdf->Ln(4);
         $pdf->SetFont('Arial','',7);
         $pdf->SetFont('Arial','B',7);$pdf->Cell(0,1,'MONTO PAGADO :                               - '.$response["montoMov"],'');
         $pdf->Ln(4);
         $pdf->SetFont('Arial','b',7);
         $pdf->Cell(0, 1, "____________________________________________", 0,'','C');
         $pdf->Ln(4);
         $pdf->Cell(0,1,'SALDO ACTUAL                       Total  S/. '.$response["montoActualCah"],'');
         $pdf->Ln(2);
         $pdf->Cell(0, 1, "____________________________________________", 0,'','C');
  
     }
  $pdf->SetFont('Arial','',7);
  $pdf->Ln(4);
  $pdf->Cell(0, 1,'Cajero: '.$response["usuarioUsu"], 0,'','');


$pdf->Output();//Función que nos permite obtener el PDF.
?>