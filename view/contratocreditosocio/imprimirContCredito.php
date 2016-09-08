
<?php
require('view/fpdf/fpdf.php');

class PDF extends FPDF{
// Cabecera de página
            function Header(){
                // Logo
                $this->Image('view/dist/img/logo_valle.png',10,8,33);
                // Arial bold 15
                $this->SetFont('Arial','Bu',15);
                // Movernos a la derecha
                $this->Cell(80);
                // Título
                $this->Cell(25,10,utf8_decode('CONTRATO DE CREDITO'),0,0,'C');
                // Arial bold 8
                $this->SetFont('Arial','B',8);
                $this->Cell(124, 13, utf8_decode("FECHA: ".date('d-M-Y')." "), 0, 0, 'C');
                // Salto de línea
                $this->Ln(20);
            }

            // Pie de página
            function Footer(){
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
    $pdf->Cell(0,10,"Conste  por  el  presente  documento  privado,  el  CONTRATO DE CREDITO  que  celebran de  una  parte  la");
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("COOPERATIVA DE CREDITO Y AHORRO  VALLE LA LECHE  con R.U.C. N° 20487703398 domiciliado"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("en Av. Andres A. Caceres Nro. 380 U.V. Victor R. Haya de la Torre - Ferreñafe, inscrita en la Partida Registral"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("N° 00812067 - Registro de Personas Juridícas de Lambayeque - debidamente  representada  por los apoderados"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("facultados  para  el   presente   acto   cuyos   datos  se   consignan   a  la  finalización   del  presente   contrato  a"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("quien   adelante   se   le  denomina  COOPERATIVA  DE  CREDITO  Y  AHORRO  VALLE  LA  LECHE,  y"));
    $pdf->Ln(8);
    $pdf->Cell(0,10, utf8_decode($response["nombresSoc"]." ".$response["apellidoPatSoc"]." ".$response["apellidoMatSoc"]."."));
    $pdf->Ln(7);
    $pdf->Cell(0,10, utf8_decode("D.N.I.  N°   ".$response["dniSoc"].".")); 
    $pdf->Ln(7);
    $pdf->Cell(0,10, utf8_decode($response["direccionSoc"].", ".$response["nombreUge"]."."));
    $pdf->Ln(7);
    $pdf->Cell(0,10, utf8_decode("a  quien  en  adelante  se le  denominará  EL  SOCIO  en  los términos  y  condiciones  siguientes:"));
    $pdf->Ln(10);
    $pdf->SetFont('Times','u',12);
    $pdf->Cell(0,10, utf8_decode("PRIMERA.- ANTECEDENTES:"));
    $pdf->SetFont('Times','',12);
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("COOPERATIVA DE CREDITO Y AHORRO VALLE LA LECHE es una organización cooperativa que capta"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("recursos económicos para que a su vez sean colocados a  travéz de  créditos  directos de  diversas modalidades."));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("Las  referidas operaciones las realiza  única y  exclusivamente  entre sus  socios. Se rige  por  las  disposiciones"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("contenidas en la Ley General de Cooperativas, la Ley General del Sistema Financiero y las normas que dicta la"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("la Superintendencia de Banca y Seguros quien la supervisa a travéz de la FENACREP."));
    $pdf->Ln(10);
    $pdf->SetFont('Times','U',12);
    $pdf->Cell(0,10, utf8_decode("SEGUNDA: DEL CRÉDITO A SER OTORGADO"));
    $pdf->SetFont('Times','',12);
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("A  solicitud de  EL SOCIO,  COOPERATIVA  DE CREDITO  Y AHORRO  VALLE LA LECHE ha acordado"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("concederle, con arreglo a los límites que  regulan  su propia  actividad, un  crédito directo  cuyas condiciones se"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("consignan a continuación, con el objeto de ser aplicado al desarrollo de sus actividades."));
    $pdf->Ln(10);
    $pdf->Cell(0,10, utf8_decode("CONDICIONES  DEL  CRÉDITO:"));
    $pdf->Ln(10);
    $pdf->Cell(0,10, utf8_decode("Moneda y Monto Total S/.  ....................................(................................................................................  y 00/100"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("NUEVOS SOLES)"));
    $pdf->Ln(10);
    $pdf->Cell(0,10, utf8_decode("Plazo Total : ............................. ( ..............................................) meses, computados según cronograma de pagos"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("que se adjunta como ANEXO A, el  mismo  que  debidamente suscrito por las partes, forma parte integrante del"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("presente contrato."));
    $pdf->Ln(10);
    $pdf->Cell(0,10, utf8_decode("Moneda y Forma de Pago del Principal e  Intereses:  El  reembolso  del  principal e  intereses  se  realizará en la"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("misma moneda del crédito, mediante cuotas mensuales según cronograma de pagos que adjunta como Anexo A."));
    $pdf->Ln(10);
    $pdf->Cell(0,10, utf8_decode("Interés Compensatorio: ...................... % efectiva anual,  capitalizable,  pagadera en la misma  moneda, por mes"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("calendario vencido."));
    $pdf->Ln(10);
    $pdf->SetFont('Times','u',12);
    $pdf->Cell(0,10, utf8_decode("TERCERA: PAGARE/S"));
    $pdf->SetFont('Times','',12);
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("En respaldo del crédito otorgado, EL  SOCIO  ha  entregado  a  COOPERATIVA  DE  CREDITO Y AHORRO"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("VALLE LA LECHE un Pagaré suscrito con vencimiento según el cronograma de pago."));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("Es expresamente convenido que  la  emisión  de  títulos  valores por el crédito a que se refiere este contrato, o el"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("perjuicio de los  mismos, no  produce  novación, no extinguirá  la  operación  de  crédito  que  diera  lugar  a  su"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("emisión, ni liberará o extinguirá las garantías que se hubiera otorgado en respaldo de ellas."));
    $pdf->Ln(10);
    $pdf->SetFont('Times','u',12);
    $pdf->Cell(0,10, utf8_decode("CUARTA: GARANTÍAS "));
    $pdf->SetFont('Times','',12);
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("Como garantía por el crédito referido en la cláusula primera, intervienen los señores ..........................................."));
    $pdf->Ln(7);
    $pdf->Cell(0,10, utf8_decode("............................................................................................ (1) , identificado  con  D.N.I.  ................................... ,"));
    $pdf->Ln(7);
    $pdf->Cell(0,10, utf8_decode("con domicilio en  ......................................................................................................................................................"));
    $pdf->Ln(7);
    $pdf->Cell(0,10, utf8_decode("..................................................................................................................................... (2) , identificado con D.N.I."));
    $pdf->Ln(7);
    $pdf->Cell(0,10, utf8_decode("............................ , con domicilio en ........................................................................................................................"));
    $pdf->Ln(7);
    $pdf->Cell(0,10, utf8_decode("para constituirse en AVAL SOLIDARIO."));
    $pdf->Ln(10);
    $pdf->SetFont('Times','u',12);
    $pdf->Cell(0,10, utf8_decode("QUINTA: RESOLUCIÓN DE CONTRATO POR INCUMPLIMIENTO"));
    $pdf->SetFont('Times','',12);
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("Sin  que  esto  importe  una  limitación  a  las  atribuciones  que  por  ley o  pacto  tenga  COOPERATIVA  DE"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("CREDITO  Y  AHORRO  VALLE  LA  LECHE  queda  expresadamente  convenido  que  podrá  en  cualquier"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("momento resolver automáticamente el presente contrato y/o dar por vencidos todos los plazos concedidos  a EL"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("SOCIO y exigir el pago  del íntegro  del saldo  del  crédito  que estuviese  adeudando, gastos y demás gastos de"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("cobranza en que pudiera incurrir ejecutar el Pagaré a que s refiere la cláusula segunda por el integro del importe"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("adeudado, a fin de iniciar las acciones judiciales pertinentes, en los siguientes casos: "));
    $pdf->Ln(8);
    $pdf->Cell(0,10, utf8_decode("  a)  Si EL SOCIO dejara de pagar total o parcialmente, uno o más cuotas de capital o de interé de  crédito a que"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("       se refiere este contrato, sean éstas consecutivas o no;"));
    $pdf->Ln(8);
    $pdf->Cell(0,10, utf8_decode("  b)  Si se comprobare la existencia de falsedad en las informaciones proporcionadas por EL SOCIO al formular"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("       la solicitud del crédito."));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("Queda igualmente convenido  que el retraso  o no  ejercicio  de  la  facultad  que en  esta cláusula  se  concede a"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("COOPERATIVA  DE CREDITO Y AHORRO VALLE LA LECHE en cualquiera de los eventos indicados, no"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("importa  renuncia al  derecho  que  la misma  le concede, pudiendo  por tanto, ejercerse  en cualquier  momento,"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("siempre que se mantengan los hechos o circunstancias que los sustentan."));
    $pdf->Ln(10);
    $pdf->SetFont('Times','u',12);
    $pdf->Cell(0,10, utf8_decode("SEXTA: JURISDICCIÓN"));
    $pdf->SetFont('Times','',12);
    $pdf->Ln(7);
    $pdf->Cell(0,10, utf8_decode("Para todos los efectos del presente contrato, las partes se someten a la Jurisdicción y competencia de los Jueces"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("y Tribunales de Ferreñafe. Las notificaciones y  comunicaciones a las  partes, sean o no  judiciales, se dirigirán"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("al domicilio indicado en la introducción, salvo que  previamente  se  haya comunicado por conducto notarial la"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("variación de domicilio dentro del radio urbano de Ferreñafe."));
    $pdf->Ln(14);
    $pdf->Cell(0,10, utf8_decode("                                                                         Ferreñafe, ................. de ......................................... del  20............"));
    $pdf->Ln(20);
    $pdf->Cell(0,10, utf8_decode("....................................................           ....................................................           ...................................................."));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("         LA COOPERATIVA                                    EL  SOCIO                                 CONYUGE  DEL  SOCIO"));
    $pdf->Ln(20);
    $pdf->Cell(0,10, utf8_decode(""));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode(""));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode(""));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("                              ......................................................                     ........................................................"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("                                                AVAL (1)                                              CONYUGE DEL AVAL (1)"));
    $pdf->Ln(30);
    $pdf->Cell(0,10, utf8_decode("                              ......................................................                     ........................................................"));
    $pdf->Ln(6);
    $pdf->Cell(0,10, utf8_decode("                                                AVAL (2)                                              CONYUGE DEL AVAL (2)"));
    

    
 $pdf->Output();
?>

