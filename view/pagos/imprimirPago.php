<?php
//$id = $_GET['idcontahorro']; 

require 'view/fpdf/fpdf.php';

$pdf=new FPDF('P','mm',array(75,102));//hoja=> L= horizontal P= vertical, mm=milimetros cm=centimetros, A4  posicion,medidas,tamaño
$pdf->SetMargins(10, 8, 10);
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
$pdf->Ln(4);
$pdf->Cell(0,1,utf8_decode("N° Ticket :                                       ".$response["nroTicketPag"] ),0,'','');
$pdf->Ln(4);
$pdf->Cell(0,1,utf8_encode("FECHA:                                ".$response["fechaPag"]),0,'','');
$pdf->Ln(2);
$pdf->Cell(0, 1, "____________________________________________", 0,'','C');
$pdf->Ln(5); 
$pdf->SetFont('Arial','',7);
$pdf->Cell(0, 1,utf8_decode('N° Contrato de Crédito:                   '.$response["nrocreditoCcr"]), 0,'','');
$pdf->Ln(3);
$pdf->Cell(0, 1,'SOCIO : '.$response["apellidoPatSoc"]." ".$response["apellidoMatSoc"].", ".$response["nombresSoc"], 0,'','');
$pdf->Ln(3);
$pdf->Cell(0, 1,'DNI: '.$response["dniSoc"], 0,'','');
$pdf->Ln(3);
$pdf->Cell(0, 1,'Monto del Prestamo :   S/.  '.$response["montoCreditoCcr"], 0,'','');
$pdf->Ln(3);
$pdf->Cell(0, 1,utf8_decode('N° de Cuotas: ').$response["nroCuotaCcr"], 0,'','');
$pdf->Ln(3);
$pdf->SetFont('Arial','',7);
$pdf->Cell(0, 1, "____________________________________________", 0,'','C');
$pdf->Ln(4);
$pdf->SetFont('Arial','b',7);
$pdf->Cell(0,1,"Pago de Cuota de Prestamo",0,'','C');
$pdf->SetFont('Arial','',7);
$pdf->Ln(2);
$pdf->Cell(0, 1, "____________________________________________", 0,'','C');
$pdf->Ln(5);
$pdf->SetFont('Arial','B',7);
$pdf->Cell(0,1,'Cuota Pagada :      '.$response["numeroCuo"].'/'.$response["nroCuotaCcr"], 0,'','');
$pdf->Ln(4);
$pdf->Cell(0,1,'Fecha Vto. : '.$response["fechaPag"], 0,'','');
$pdf->Ln(4);
$pdf->Cell(45,1,'Monto :                                             S/.  ', 0,'','');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,1,$response["montoCuo"], 0,'','');
$pdf->SetFont('Arial','B',7);
$pdf->Ln(3);
$pdf->Cell(0, 1, "____________________________________________", 0,'','C');
$pdf->SetFont('Arial','',7);
$pdf->Ln(4);
$pdf->Cell(0, 1,'Cajero: '.$response["dniSoc"], 0,'','');



$pdf->Output();//Función que nos permite obtener el PDF.
?>