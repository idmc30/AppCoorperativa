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
    //$this->Ln(2);
    $this->SetFont('Arial', 'B', 10);
    //$this->Image("view/img/menbrete.png", 50, 3, 20, 25);
    // $this->Image("view/img/logr.jpg", 265, 5, 20, 20);
    $this->Cell(0, 1, "COOPERATIVA DE AHORRO Y CREDITO", 0,0,'C');
    $this->Ln(5);
    $this->Cell(0, 1, "VALLE  LA  LECHE L.T.A.", 0,0,'C');
    $this->Cell(0, 2, utf8_decode("  FECHA: ".date('d-m-Y  h:i:s')." "), 0, 0, 'R');
    $this->Ln(10);

  }

}
$pdf=new PDF('L','mm','A4');
$pdf->SetMargins(10, 10, 10);
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0, 2, utf8_decode('Lista de Contratos por Rango de Fecha'), 0, 0, 'C');
$pdf->SetFont('Arial','B',12);
$pdf->Line(10,20,287,20); //linea
$pdf->ln(4);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10, utf8_decode("Del  ".$response["fechIni"]."  al  ".$response["fechFin"]),0,0,'C');

$pdf->ln(14);
$pdf->SetFont('Arial','B',9);
//$pdf->Cell(10,10,"",4);  // modificar le pafding
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(8,10,utf8_decode("N°"),1,0,'C',1);
$pdf->Cell(70,10,"Apellidos y Nombres",1,0,'C',1);
$pdf->Cell(22,10,"DNI",1,0,'C',1);
$pdf->Cell(62,10, utf8_decode("Dirección"),1,0,'C',1);
$pdf->Cell(25,10, "Nro Cuenta",1,0,'C',1);
$pdf->Cell(23,10,"Monto",1,0,'C',1);
$pdf->Cell(25,10,"Tipo",1,0,'C',1);
$pdf->Cell(20,10,"Estado",1,0,'C',1);
$pdf->Cell(22,10,"Fecha Inic.",1,0,'C',1);
$pdf->Ln(10);
    
$cont=1;  //CONTADOR PARA  MOSTRAR EN  FORMA ENUMERADA 
       
 foreach ($lcontxFech as $socccr) {

      //$pdf->Cell(10,10,"",0); //modificar el pading
      $pdf->SetFont('Arial','',8);
      $pdf->Cell(8,6,utf8_decode($cont),1,0,'C'); //Campo barra numerica
      $pdf->Cell(70,6,utf8_decode($socccr->apellidoPat_Soc." ".$socccr->apellidoMat_Soc." ".$socccr->nombres_Soc),1,0,'L'); 
      $pdf->Cell(22,6,utf8_decode($socccr->dni_Soc),1,0,'C');
      $pdf->Cell(62,6,utf8_decode($socccr->direccion_Soc),1,0,'L');
      $pdf->Cell(25,6,utf8_decode($socccr->nroAhorro_Cah),1,0,'C');
      $pdf->Cell(23,6,utf8_decode(number_format(($socccr->montoActual_Cah), 2, '.', ','))."  ",1,0,'R');

      if ($socccr->fechaFirma_Cah!==NULL) {
            if ($socccr->tipo_Cah=="F") {
              $pdf->Cell(25,6,utf8_decode("Plazo Fijo"),1,0,'C');
            } else {
              $pdf->Cell(25,6,utf8_decode("Libre Dispon"),1,0,'C');
            }
      } else {
            $pdf->Cell(25,6,utf8_decode("Crédito "),1,0,'C');
      }
        
      if ($socccr->estado_Cah=="A") {
          $pdf->SetFont('Arial','',8);
           $pdf->Cell(20,6,utf8_decode("Activo"),1,0,'C');
        } else {
          $pdf->SetFont('Arial','',8);
           $pdf->Cell(20,6,utf8_decode("Inactivo"),1,0,'C');
        }

      $pdf->Cell(22,6,utf8_decode($socccr->dni_Soc),1,0,'C');
      $cont= $cont+1;
      $pdf->Ln(6);
      }

                  
   $pdf->Output();
?>