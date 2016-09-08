
<?php
require('view/fpdf/fpdf.php');


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('view/dist/img/logo_valle.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','Bu',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(25,10,utf8_decode('CRONOGRAMA DE PAGOS'),0,0,'C');
    // Arial bold 8
    $this->SetFont('Arial','B',8);
    $this->Cell(124, 13, utf8_decode("FECHA: ".date('d-M-Y')." "), 0, 0, 'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial', 'B', 7.5);
    
    $this->Cell(186,2, "COOPERATIVA DE AHORRO Y CREDITO VALLE LA LECHE L.T.A.", 0, 0, 'C');
    $this->Ln(3);
    $this->Cell(180, 2, "Av. Andres A. Caceres Nro. 380 - Telef. 288010", 0, 0, 'C');
  $this->Ln(3);
    $this->Cell(180, 2, utf8_decode("U.V. Victor R. Haya de la Torre - Ferreñafe"), 0, 0, 'C');
  $this->Ln(3);
    $this->Cell(180, 2, "R.U.C. 20487703398", 0, 0, 'C');    
    $this->Ln(-5);
    // Número de página
    $this->SetFont('Arial','B',8);
    $this->Cell(360, 2,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
//$pdf->SetFont('Times','',12);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(30,5,"",2);  // modificar le pafding
$pdf->Cell(0,6, utf8_decode("Socio: ". $response["apellidoPatSoc"]." ".$response["apellidoMatSoc"]." ".$response["nombresSoc"] ),0,0,''); //.$response["nombresSoc"]. "                Moneda: SOLES"));
$pdf->Ln(5);
$pdf->Cell(30,5,"",2);  // modificar le pafding
$pdf->Cell(0,6, utf8_decode("N° de Contrato de Crédito: ".$response["nrocreditoCcr"]."     Monto: ".$response["montoCuotaCcr"]),0,0,'');
$pdf->Ln(5);
$pdf->Cell(30,5,"",2);  // modificar le pafding
$pdf->Cell(46,6, utf8_decode("Fecha de Inicio : ".$response["fechaInicioCcr"]),0,0,'');
$pdf->Cell(22,6, utf8_decode("        Fecha de Fin : ".$response["fechaFinCcr"] ),0,0,'');
$pdf->Ln(6);
$pdf->Cell(30,5,"",2);  // modificar le pafding
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(15,8,utf8_decode("N° Cuota"),1,0,'C',1);  
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(25,8,"Monto",1,0,'C',1); 
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(25,8,"Amortizacion",1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(34,8,"FechaVencimiento",1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(30,8,"Estado",1,0,'C',1);
//$pdf->SetFillColor(201, 201, 201);
//$pdf->Cell(30,10,"Estado",1,0,'C',1);
//$pdf->SetFillColor(201, 201, 201);
//$pdf->Cell(30,10,"Contrato",1,0,'C',1);  
$pdf->Ln(8);
//$pdf->SetMargins(8, 10 , 10);
 $cont=1;  //CONTADO PARA  MOSTRAR EN  FORMA ENUMERADA 
       
       
 foreach ($lcuotas as $cuotas) {

      $pdf->Cell(30,5,"",2); //modificar el pading
      $pdf->SetFont('Arial','',8);
      $pdf->Cell(15,6,utf8_decode($cuotas->numero_Cuo),1,0,'C'); //Campo barra numerica
      $pdf->Cell(25,6,utf8_decode($cuotas->monto_Cuo),1,0,'C'); 
      $pdf->Cell(25,6,utf8_decode($cuotas->interes_Cuo),1,0,'C');                  
      $pdf->Cell(34,6,utf8_decode($cuotas->fecha_Cuo),1,0,'C');
      //$pdf->Cell(30,6,utf8_decode($CtrxSoc->montoDepositado_Cah),1,0,'C');
          if ($cuotas->estado_Cuo=="C") {
              $pdf->SetFont('Arial','',8);
              $pdf->Cell(30,6,utf8_decode("Cancelado"),1,0,'C');
           }else {
              $pdf->SetFont('Arial','',8);
              $pdf->Cell(30,6,utf8_decode("Debe"),1,0,'C');
          }

  
      $cont= $cont+1;
      $pdf->Ln(6);
      }


$pdf->Output();
?>

