
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
    $this->Cell(25,10,utf8_decode('Reporte de Contratos por Socio'),0,0,'C');
    // Arial bold 8
    $this->SetFont('Arial','B',8);
    $this->Cell(0, 13, utf8_decode("FECHA: ".date('d-M-Y  H:i:s')." "), 0, 0, 'R');
    // Salto de línea
    $this->Ln(15);
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
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10, utf8_decode("SOCIO: ".$response["nombresSoc"]." ".$response["apellidoPatSoc"]." ".$response["apellidoMatSoc"]));
$pdf->Ln(5);
$pdf->Cell(0,10, utf8_decode("DNI: ". $response["dniSoc"]));

//$pdf->SetFont('Times','',12);
//$pdf->Cell(0,10, utf8_decode("Nombre del Socio: ...............................".$response["nombresSoc"]. "                       Moneda: SOLES"));
$pdf->Ln(10);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(1,5,"",2);  // modificar le pafding
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(10,10,utf8_decode("N°"),1,0,'C',1);  
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(30,10,"Nro Cuenta",1,0,'C',1); 
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(30,10,"Fecha Inicio",1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(30,10,"Fecha Fin",1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(30,10,"Monto",1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(30,10,"Tipo",1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(30,10,"Contrato",1,0,'C',1);  
$pdf->Ln(10);
//$pdf->SetMargins(8, 10 , 10);
 $cont=1;  //CONTADO PARA  MOSTRAR EN  FORMA ENUMERADA 
       
       
 foreach ($lCtrxSoc as $CtrxSoc) {

      $pdf->SetFont('Arial','',8);
      $pdf->Cell(1,5,"",2); //modificar el pading
      $pdf->Cell(10,6,utf8_decode($cont),1,0,'C'); //Campo barra numerica
      $pdf->Cell(30,6,utf8_decode($CtrxSoc->nroAhorro_Cah),1,0,'L'); 
      $pdf->Cell(30,6,utf8_decode($CtrxSoc->fechaInicio_Cah),1,0,'L');                  
      $pdf->Cell(30,6,utf8_decode($CtrxSoc->fechaFin_Cah),1,0,'C');
      $pdf->Cell(30,6,utf8_decode(number_format(($CtrxSoc->montoDepositado_Cah), 2, '.', ','))."  ",1,0,'C');
      if ($CtrxSoc->fechaFirma_Cah!==NULL) {
          if ($CtrxSoc->tipo_Cah=="F") {
              $pdf->SetFont('Arial','B',8);
              $pdf->Cell(30,6,utf8_decode("Plazo Fijo"),1,0,'C');
          } else {
                $pdf->SetFont('Arial','B',8);
                $pdf->Cell(30,6,utf8_decode("Libre Dispon"),1,0,'C');
          }

      } else {
        $pdf->Cell(30,6,utf8_decode(""),1,0,'C');
      }

      if ($CtrxSoc->fechaFirma_Cah==NULL) {
          $pdf->SetFont('Arial','B',8);
          $pdf->Cell(30,6,utf8_decode("Cont. de Credito"),1,0,'C');
      } else {
          $pdf->SetFont('Arial','B',8);
          $pdf->Cell(30,6,utf8_decode("Cont. de Ahorro"),1,0,'C');
      }
      $cont= $cont+1;
      $pdf->Ln(6);
      }


$pdf->Output();
?>

