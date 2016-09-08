
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
    $this->Cell(25,10,utf8_decode('APERTURA CUENTA DE AHORRO'),0,0,'C');
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
$pdf->SetFont('Times','',12);
//for($i=1;$i<=85;$i++)
    $pdf->Cell(0,10, utf8_decode("Por el presente documento la COOPERATIVA DE CREDITO  Y AHORRO  VALLE LA LECHE  con R.U.C."));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("N° 20487703398 domiciliadoen Av. Andres A. Caceres Nro. 380 U.V. Victor  R. Haya de la Torre - Ferreñafe,"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("inscrita  en  la  Partida  Registral  N° 00812067 - Registro de  Personas  Juridícas de  Lambayeque - en adelante"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("COOP VALLE  LA  LECHE, cumple con la obligación de informar a El SOCIO, las principales  caracteristicas"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("de la Cuenta de Ahorros aperturada en esta institución, conforme a lo señalado en la Ley N° 29571, modificada"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("por la Ley N° 29888, que establecen normas en materia de protección a los consumidores y Resolución SBS N°"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("8181-2012, que  comtempla el  Reglamento de  Transparencia de  Información y Contratación con Usuarior del"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("Sistema Financiero."));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("Al respecto de ello, se deja constancia que las características de la Cuenta de Ahorros son las siguientes:"));
    $pdf->Ln(12);

    $pdf->Cell(60,10, utf8_decode("  "));
    $pdf->Cell(80,10,"TREA  PARA  CUENTA  DE  AHORRO",1,0,'C');
    $pdf->Ln(10);
    $pdf->Cell(60,10, utf8_decode("  "));
    $pdf->Cell(40,10,"SOLES",1,0,'C');
    $pdf->Cell(40,10,"3.00 %",1,0,'C');

    $pdf->Ln(12);
    $pdf->Cell(0,10, utf8_decode("Características de la cuenta de Ahorros:"));
    $pdf->Ln(8);
    $pdf->Cell(0,10, utf8_decode("N° de cuenta ............................................. Fecha de apertura de depósito: ................................. Moneda: SOLES"));
    $pdf->Ln(8);
    $pdf->Cell(0,10, utf8_decode("1. No existe monto mínimo para apertura de una cuenta de ahorro solo el pago de la cuota de socio."));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("2. El año base es de 360 días."));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("3. El interés se calcula de forma diaria, siendo la fecha de abono de intereses al cierre de mes, el interés a pagar"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("    se generará de acuerdo a los movimientos del mes y al saldo que mantenga en su cuenta."));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("4. No aplican comisiones en caso se efectúen retenciones judiciales por orden o mandato judicial."));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("5. El Impuesto de Transacciones Financieras (ITF) no será aplicado."));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("6. Los estados de cuenta podrán ser solicitados en nuestra agencia sin costo alguno."));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("7. El  Socio  podrá obtener información gratuita sobre el estado de su cuenta, a través de los  siguientes canales:"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("    plataforma o ventanilla o portal web a través  de una  clave de acceso que El Socio en forma personal deberá"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("    habilitar, en nuestras agencias"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("8. Las tasas de interés, comisiones y gastos así como las condiciones contractuales que indican son las vigentes"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("    a la fecha de su suscripción y están sujetas a variación, en cuyo caso se informará al Socio."));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("9. La Cuenta de Ahorros del Socio, está  protegida por el Fondo  de Seguro de Depósitos, según Ley N° 26702"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("    Ley Generales del Sistema Financiero y del Sistema de Seguros y Orgánica de la SBS."));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("10. La fórmula para calcular el interés de una cuenta de ahorros es: I = K * [(1+ TREA /100) n/360 -1]."));
    $pdf->Ln(10);
    $pdf->Cell(0,10, utf8_decode("Por el presente documento El socio declara que el CONTRATO DE OPERACIONES PASIVAS y CARTILLA"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("DE  INFORMACIÓN, le fueron  entregados  para su  lectura, que  se absolvieron  sus dudas y  que  firman con"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("conocimiento pleno de las condiciones establecidas en dichos documentos."));
    $pdf->Ln(7);
    $pdf->Cell(0,10, utf8_decode("                                                                         Ferreñafe, ................. de ......................................... del  20............"));
    $pdf->Ln(18);
    $pdf->Cell(0,10, utf8_decode("....................................................           ....................................................           ...................................................."));
    $pdf->Ln(5);
    $pdf->Cell(0,10, utf8_decode("         LA COOPERATIVA                                    EL  SOCIO                                 CONYUGE  DEL  SOCIO"));

   

    
    /*$pdf->Cell(0,10,'sd '.$i,0,0);
    $pdf->Cell(0,10,'Imprimiendo linea numero   fgfghf jggjhghghg jghhgjhghg jhghghjghjg hjgghjghjg dfsffsdfsdfdsfsdfsdfsd '.$i,0,0);
    $pdf->Ln(6);
    $pdf->Cell(0,10,'Imprimiendo linea numero   fgfghf jggjhghghg jghhgjhghg jhghghjghjg hjgghjghjg dfsffsdfsdfdsfsdfsdfsd '.$i,0,0);
    */

$pdf->Output();
?>

