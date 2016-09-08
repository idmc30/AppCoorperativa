


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
$pdf->SetFont('Arial','B',7);
$pdf->Ln(1);
$pdf->Cell(0,1,utf8_decode("N° Voucher:                                                      ".$response["idApo"]),0,'','');
$pdf->Ln(4);
$pdf->Cell(0,1,utf8_encode("FECHA:                                 ".$response["fechaApo"]),0,'','');
$pdf->Ln(2);
$pdf->SetFont('Arial','b',7);$pdf->Cell(0, 1, "____________________________________________", 0,'','C');
$pdf->Ln(5); 
$pdf->SetFont('Arial','',7);
$pdf->Cell(0, 1,utf8_decode('SOCIO N° : '.$response["idSoc"]), 0,'','');
$pdf->Ln(3);
$pdf->Cell(0, 1,'NOMBRE:  '.$response["apellidoPatSoc"]." ".$response["apellidoMatSoc"].", ".$response["nombresSoc"], 0,'','');
$pdf->Ln(3);
$pdf->Cell(0, 1,'DNI: '.$response["dniSoc"], 0,'','');
$pdf->Ln(3);
$pdf->SetFont('Arial','',7);
$pdf->Cell(0, 1, "____________________________________________", 0,'','C');
$pdf->Ln(4);
$w = array(15,12,22,15);
$pdf->SetFont('Arial','b',7);
$pdf->Cell(0,1,"PAGO   DE   APORTACION",0,'','C');
$pdf->SetFont('Arial','',7);
$pdf->Ln(2);
$pdf->Cell(0, 1, "____________________________________________", 0,'','C');
$pdf->Ln(6.5);
  
 switch ($response["mesApo"]) {
   case '1':
      $mes="Enero";
     break;
   case '2':
      $mes="Febrero";
     break;
  case '3':
      $mes="Marzo";
     break;
   case '4':
      $mes="Abril";
     break;
    case '5':
      $mes="Mayo";
     break;
    case '6':
      $mes="Junio";
     break;
    case '7':
      $mes="Julio";
     break;
     case '8':
      $mes="Agosto";
     break;
     case '9':
      $mes="Setiembre";
     break;

     case '10':
      $mes="Octubre";
     break;
     case '11':
      $mes="Noviembre";
     break;
     case '12':
      $mes="Diciembre";
     break;     
   
  
 }

  if ($response["tipoApo"]=="U") {          
         
      $tipoAporte=$response["tipoApo"];
      //$pdf->Ln(4);
      $pdf->SetFont('Arial','b',7);
      $pdf->Cell($w[0],1,utf8_decode(' Cuota de '.$mes." :                         S/.  ".$response["cuotaApo"]),'');
  } else {

      $tipoAporte=$response["tipoApo"];        
      //$pdf->Ln(4);
      $pdf->SetFont('Arial','b',7);
      $pdf->Cell($w[0],1,' CUOTA DE [MES]:                                   '.$response["cuotaApo"],'');
     }

$pdf->Ln(4);
$pdf->SetFont('Arial','b',7);
$pdf->Cell(0, 1, "____________________________________________", 0,'','C');
$pdf->Ln(5);
$pdf->SetFont('Arial','b',7);
$pdf->Cell($w[3],1,'     Monto Pagado                 Total     S/.  '.$response["cuotaApo"],'');
$pdf->Ln(3);
$pdf->Cell(0, 1, "____________________________________________", 0,'','C');
$pdf->SetFont('Arial','',7);
$pdf->Ln(4);
$pdf->Cell(0, 1,'Cajero: '.$response["dniSoc"], 0,'','');

//}
$pdf->Output();//Función que nos permite obtener el PDF.
?>