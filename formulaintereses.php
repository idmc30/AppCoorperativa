<?php 
$montoapertura="1200";
$montoSaldo=$montoapertura;
$TEA_Trad="10.5";
$P1 = (1+($TEA_Trad/100));
$P2 = pow($P1, 0.0027777778); //($P1)^(0.0027777778)
echo  $P2."<br>";
    
$TEA_Diaria_T= ($P2)-1;
echo  "TEA Ahorro Tradicional Diario</br>";
echo $TEA_Diaria_T;
	//A continuación reemplacemos en la fórmula de interés compuesto:
$n = "15";
$P3 = pow(1+$TEA_Diaria_T, $n)-1;
$InteresTradicionalMensual = $montoSaldo * $P3;
$InteresMensual = $montoSaldo + $InteresTradicionalMensual;
echo "</br>";
echo "Interes Ahorro Tradicional Mensual : ".$InteresTradicionalMensual;
echo "</br>";
echo "Capital mas Interes redondeados : ".round($InteresMensual,4);
echo "</br>";
echo "Capital mas Interes : ".$InteresMensual;
?>