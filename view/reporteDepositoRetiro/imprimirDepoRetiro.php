
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
    $this->Cell(25,10,utf8_decode('LISTADO DE MOVIMIENTOS'),0,0,'C');
    // Arial bold 8
    $this->SetFont('Arial','B',8);
    $this->Cell(124, 13, utf8_decode("FECHA: ".date('d-M-Y')." "), 0, 0, 'C');
    // Salto de línea
    $this->Ln(10);
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
$pdf->SetFont('Times','',16);
if ($response["tipoMovimiento"] == "D") {
    $pdf->Cell(0,10, utf8_decode("Depositos"),0,0,'C');
} else {
    $pdf->Cell(0,10, utf8_decode("Retiros"),0,0,'C');
}
$pdf->SetFont('Times','',12);
$pdf->Ln(8);
$pdf->Cell(0,10, utf8_decode("Del  ".$response["fechIni"]."   al   ".$response["fechFin"]),0,0,'C');
$pdf->Ln(10);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(15,5,"",2);  // modificar le pafding
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(10,10,utf8_decode("N°"),1,0,'C',1);  
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(40,10,"Fecha de Movimiento",1,0,'C',1); 
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(40,10,"Monto",1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(30,10,"Usuario",1,0,'C',1);
$pdf->Cell(30,10,utf8_decode("N° de Ticket"),1,0,'C',1);
$pdf->Ln(10);
//$pdf->SetMargins(8, 10 , 10);
$cont=1;  //CONTADO PARA  MOSTRAR EN  FORMA ENUMERADA 
       
  
 foreach ($ldepretir as $depositoretiro) {

      $pdf->Cell(15,5,"",2); //modificar el pading
      $pdf->SetFont('Arial','',8);
      $pdf->Cell(10,6,utf8_decode($cont),1,0,'C'); //Campo barra numerica
      $pdf->Cell(40,6,utf8_decode($depositoretiro->fecha_Mov),1,0,'C'); 
      $pdf->Cell(40,6,utf8_decode($depositoretiro->monto_Mov),1,0,'C');                  
      $pdf->Cell(30,6,utf8_decode($depositoretiro->usuario),1,0,'C');
      $pdf->Cell(30,6,utf8_decode("N° de Ticket"),1,0,'C');

      // $pdf->Cell(30,6,utf8_decode($depositoretiro->montoDepositado_Cah),1,0,'C');
      $cont= $cont+1;
      $pdf->Ln(6);
      }

$pdf->Cell(15,5,"",2); //modificar el pading
$pdf->SetFont('Arial','',10);
$pdf->Cell(150,8, utf8_decode("Total  -->   ". $response["sumTotal"]),1,0,'C');

$pdf->Output();
?>

