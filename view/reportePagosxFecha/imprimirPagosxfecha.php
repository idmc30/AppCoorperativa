<?php

require 'view/fpdf/fpdf.php';


class PDF extends FPDF{

function Footer()
  {
    // To be implemented in your own inherited class
    //$this->Ln(2);
    $this->SetY(-12);
    $this->SetFont('Arial','B',10);      
    $this->Cell(0,10,"Pag ".$this->PageNo(),0,0,'C');  
    
  }

  function Header()  {
    // To be implemented in your own inherited class
    $this->SetFont('Arial', 'B', 10);
    $this->Cell(0, 1, "COOPERATIVA DE AHORRO Y CREDITO", 0,0,'C');
    $this->Ln(5);
    $this->Cell(0, 1, "VALLE  LA  LECHE L.T.A.", 0,0,'C');
    $this->SetFont('Arial', 'B', 8);
    $this->Cell(0, 2, utf8_decode("  FECHA: ".date('d-m-Y  H:i:s')." "), 0, 0, 'R');
    $this->Ln(10);

  }

}


$pdf=new PDF('P','mm','A4');
$pdf->SetMargins(10, 10, 10);
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0, 2, utf8_decode('Lista  de  Pagos  por  Fecha'), 0, 0, 'C');
$pdf->SetFont('Arial','B',12);
$pdf->Line(10,20,200,20); //linea
$pdf->ln(4);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10, utf8_decode("FECHAS:  ".$response["fechIni"]."   al   ".$response["fechFin"]),0,0,'C');
$pdf->ln(10);
$pdf->Cell(0,10, utf8_decode("TOTAL DE PAGOS:  ".number_format($response["sumpagos"], 2, '.', ',')),0,0,'L');

$pdf->ln(14);
$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(8,10,utf8_decode("N°"),1,0,'C',1);
$pdf->Cell(38,10,"Fecha de Pago",1,0,'C',1);
$pdf->Cell(20,10,"Monto",1,0,'C',1);
$pdf->Cell(26,10,"Ticket",1,0,'C',1);
$pdf->Cell(26,10,utf8_decode("N° Cont. Crédito"),1,0,'C',1);
$pdf->Cell(71,10, utf8_decode("Nombres y Apellidos"),1,0,'C',1);
$pdf->Ln(10);

    
$cont=1;  //CONTADO PARA  MOSTRAR EN  FORMA ENUMERADA 
       
foreach ($lpagoxFech as $pagos) {
     
      $pdf->SetFont('Arial','',9);
      $pdf->Cell(8,6,utf8_decode($cont),1,0,'C'); //Campo barra numerica
      $pdf->Cell(38,6,$pagos->fecha_Pag,1,0,'C'); 
      $pdf->Cell(20,6,$pagos->monto_Pag,1,0,'C'); 
      $pdf->Cell(26,6,$pagos->nroTicket_Pag,1,0,'C');
      $pdf->Cell(26,6,$pagos->nrocredito_Ccr,1,0,'C');
      $pdf->Cell(71,6,utf8_decode($pagos->nombres_Soc." ".$pagos->apellidoPat_Soc." ".$pagos->apellidoMat_Soc),1,0,'L'); 
      $cont= $cont+1;
      $pdf->Ln(6);
      }

               
$pdf->Output();
?>