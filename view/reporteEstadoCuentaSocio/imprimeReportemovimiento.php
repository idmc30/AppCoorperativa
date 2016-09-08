
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
    $this->SetFont('Arial','Bui',15);
    // Movernos a la derecha
    //$this->Cell(80);
    // Título
    $this->Cell(0,10,utf8_decode('ESTADO DE CUENTA'),0,0,'C');
    // Arial bold 9
    $this->SetFont('Arial','B',9);
    $this->Cell(0, 13, utf8_decode("FECHA: ".date('d-M-Y  h:i:s')." "), 0, 0, 'R');
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
$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Times','',11);
 if ($response["tipoCah"]=="F") {
   $pdf->Cell(120,8, utf8_decode("SOCIO: ".$response["nombresSoc"]." ". $response["apellidoPatSoc"]." ".$response["apellidoMatSoc"]),0);
   $pdf->Cell(0,8, utf8_decode("    N° Cta.: ".$response["nroAhorroCah"]),0,0,'C');
   $pdf->Ln(6);
   $pdf->Cell(85,8, utf8_decode("Dirección : ". $response["direccionSoc"]),0,0,'');
   $pdf->Cell(30,8, utf8_decode("DNI: ". $response["dniSoc"]),0,0,'C');
   $pdf->Cell(0,8, utf8_decode("CTA AHORRO: Plazo Fijo       "),0,0,'R');
   $pdf->Ln(6);
   $pdf->Cell(0,8, utf8_decode("Monto Disponible :  ".number_format($response["montoActualCah"], 2, '.', ',')."              Moneda: SOLES"));

 } else {
   $pdf->Cell(120,8, utf8_decode("SOCIO: ".$response["nombresSoc"]." ". $response["apellidoPatSoc"]." ".$response["apellidoMatSoc"]));
   $pdf->Cell(0,8, utf8_decode("N° Cta.: ".$response["nroAhorroCah"]),0,0,'C');
   $pdf->Ln(6);
   $pdf->Cell(85,8, utf8_decode("Dirección : ". $response["direccionSoc"]),0,0,'');
   $pdf->Cell(30,8, utf8_decode("DNI: ". $response["dniSoc"]),0,0,'C');
   $pdf->Cell(0,8, utf8_decode("CTA AHORRO : Libre Disponibilidad     "),0,0,'R');
   $pdf->Ln(6);
   $pdf->Cell(70,8, utf8_decode("Monto de Apertura :  ".number_format($response["montoDepositadoCah"], 2, '.', ',')),0,0,'');
   $pdf->Cell(70,8, utf8_decode("Monto Disponible :  ".number_format($response["montoActualCah"], 2, '.', ',')),0,0,'');
   $pdf->Cell(50,8, utf8_decode("Moneda : SOLES  "),0,0,'');

 }


$pdf->Ln(10);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1,5,"",2);  // modificar le pafding
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(10,10,utf8_decode("N°"),1,0,'C',1);  
$pdf->Cell(32,10,"Tipo Movimiento",1,0,'C',1); 
$pdf->Cell(30,10,"Monto",1,0,'C',1);
$pdf->Cell(50,10,"Fecha Movimiento",1,0,'C',1);
$pdf->Cell(30,10,"Usuario",1,0,'C',1);
$pdf->Cell(30,10,utf8_decode("Condición"),1,0,'C',1);
$pdf->Ln(10);
//$pdf->SetMargins(8, 10 , 10);
 $cont=1;  //CONTADO PARA  MOSTRAR EN  FORMA ENUMERADA 
       
 foreach ($lmovimiento as $movimiento) {

      $pdf->Cell(1,6,"",0,0); //modificar el pading
      $pdf->SetFont('Arial','',10);

      $pdf->Cell(10,6,utf8_decode($cont),1,0,'C'); //Campo barra numerica
          if ($movimiento->tipo_Mov=="D") {
              $pdf->SetFont('Arial','',10);
              $pdf->Cell(32,6,utf8_decode(" Deposito"),1,0,'L');
          } elseif($movimiento->tipo_Mov=="I") {
                $pdf->SetFont('Arial','',10);
                $pdf->Cell(32,6,utf8_decode(" Monto Inicial"),1,0,'L');
          }else{
                $pdf->SetFont('Arial','',10);
                $pdf->Cell(32,6,utf8_decode(" Retiro"),1,0,'L');
          }

      $pdf->Cell(30,6,utf8_decode(number_format(($movimiento->monto_Mov), 2, '.', ','))."  ",1,0,'R'); 
      $pdf->Cell(50,6,utf8_decode($movimiento->fecha_Mov),1,0,'C');                  
      $pdf->Cell(30,6,utf8_decode($movimiento->usuario),1,0,'C');
      if ($movimiento->condicion_Mov =="N") {
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(30,6,utf8_decode("Normal"),1,0,'C');
      } else {
          $pdf->SetFont('Arial','',10);
          $pdf->Cell(30,6,utf8_decode("Extorno"),1,0,'C');
      }
      $cont= $cont+1;
      $pdf->Ln(6);
      }

$pdf->Output();
?>

