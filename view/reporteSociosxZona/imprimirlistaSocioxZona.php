
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
          //$this->Cell(80);
          // Título
          $this->Cell(0,10,utf8_decode('LISTADO DE SOCIO POR ZONA'),0,0,'C');
          // Arial bold 8
          $this->SetFont('Arial','B',8);
          $this->Cell(0, 13, utf8_decode("FECHA: ".date('d-M-Y')." "), 0, 0, 'R');
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
          
          $this->Cell(0,2, "COOPERATIVA DE AHORRO Y CREDITO VALLE LA LECHE L.T.A.", 0, 0, 'C');
          $this->Ln(3);
          $this->Cell(0, 2, "Av. Andres A. Caceres Nro. 380 - Telef. 288010", 0, 0, 'C');
          $this->Ln(3);
          $this->Cell(0, 2, utf8_decode("U.V. Victor R. Haya de la Torre - Ferreñafe"), 0, 0, 'C');
          $this->Ln(3);
          $this->Cell(0, 2, "R.U.C. 20487703398", 0, 0, 'C');    
          $this->Ln(-5);
          // Número de página
          $this->SetFont('Arial','B',8);
          $this->Cell(0, 2,'Pagina '.$this->PageNo().'/{nb}',0,0,'R');
      }
}

// Creación del objeto de la clase heredada
$pdf=new PDF('L','mm','A4');
$pdf->SetLeftMargin(5);
$pdf->SetDisplayMode('real','default'); 
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

  $cont2=1;
  foreach ($lzona as $dato) {

    $pdf->SetFont('Arial','B',11);
    if ( $cont2==1  )
    {
      $pdf->Cell(65,6,utf8_decode("NOMBRE ZONA : ". $dato->nombre_Zon ." - ". $dato->descripcion_Zon ),0,0,'L');  
      $pdf->Ln(6);
      $pdf->Cell(65,6,utf8_decode("FORMADA POR: "),0,0,'L'); 
      $pdf->Ln(6);
      $pdf->Cell(65,6,utf8_decode("                               ".$cont2 . ". Departamento: ". $dato->departamento . "   Provincia: ". $dato->provincia . "   Distrito: ". $dato->distrito),0,0,'L');
    }     
    else
    {
      $pdf->Cell(65,6,utf8_decode("                               ".$cont2 . ". Departamento: ". $dato->departamento . "   Provincia: ". $dato->provincia . "   Distrito: ". $dato->distrito),0,0,'L');
    }
      
    $cont2= $cont2+1;
    $pdf->Ln(6);

  }



$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(15,10,utf8_decode("N°"),1,0,'C',1);  
$pdf->SetFillColor(201, 201, 201);

$pdf->Cell(65,10,"Apellidos y Nombres",1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
/* $pdf->Cell(30,10,"Apellido Paterno",1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(30,10,"Apellidos Materno",1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(40,10,"Nombres",1,0,'C',1); */
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(17,10,"DNI",1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(50,10, utf8_decode("Dirección"),1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(30,10, utf8_decode("Distrito"),1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(30,10, utf8_decode("N° Cuenta"),1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(26,10,"Tipo",1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(30,10,"Tipo de Contrato",1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);
$pdf->Cell(25,10,"Fecha",1,0,'C',1);
$pdf->SetFillColor(201, 201, 201);

$pdf->Ln(10);
//$pdf->SetMargins(8, 10 , 10);
$cont=1;  //CONTADO PARA  MOSTRAR EN  FORMA ENUMERADA 
      
//$pdf->Cell(5,10,"",0); //modificar el pading  


  foreach ($lSocioxZona as $dato) {
   


      $pdf->SetFont('Arial','',8);
      $pdf->Cell(15,8,utf8_decode($cont),1,0,'C'); //Campo barra numerica
      $pdf->Cell(65,8,utf8_decode($dato->apellidoPat_Soc ." ". $dato->apellidoMat_Soc ." ". $dato->nombres_Soc),1,0,'L'); 
      $pdf->Cell(17,8,utf8_decode($dato->dni_Soc),1,0,'C');
      $pdf->Cell(50,8,utf8_decode($dato->direccion_Soc),1,0,'L');
      //$pdf->MultiCell(40,12,utf8_decode($dato->direccion_Soc), 'LRT', 'L', 0);
      //$pdf->MultiCell(40,6,utf8_decode($dato->direccion_Soc),0,1,'L',0);
      //$pdf->MultiCell(40, 6,utf8_decode($dato->direccion_Soc), 1, 'J'); 
      $pdf->Cell(30,8,utf8_decode($dato->nombre_Uge),1,0,'C');
      $pdf->Cell(30,8,utf8_decode($dato->nroContrato_Con),1,0,'C');
      $pdf->Cell(26,8,utf8_decode($dato->tipo_Acc),1,0,'L');
      $pdf->Cell(30,8,utf8_decode($dato->tipo_Con),1,0,'L');
      $pdf->Cell(25,8,date("d-m-Y",strtotime($dato->fecha_Con)),1,0,'C');



      $cont= $cont+1;
      $pdf->Ln(8);
  }
             
  $pdf->Output();

?>

