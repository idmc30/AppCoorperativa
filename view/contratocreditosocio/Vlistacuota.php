 <!--<div class="col-md-6">-->
     <div class="box box-primary">
         <div class="box-header with-border">
           <h3 class="box-title">Vista Previa Cuotas</h3>
             <div class="box-tools pull-right">
             </div>
            <div class="box-body">
             <div class="box-body">
                 <table class="table table-bordered">
                         <tbody>
                                            <tr>
                                              <th style="width: 10px">Nº</th>
                                              <th>Fecha Venc.</th>
                                              <th style="width: 40px">Cuota</th>
                                              <th>Amortización</th>
                                              <th style="width: 40px">Saldo</th>
                                              <th style="width: 40px">Interes mod</th>
                                            
                                            </tr>
                                            
                                             <?php 
                                                  $saldo_Capital=$credito;
                                                  for ($i=1; $i <= $xcuota; $i++) { 

                                                    $nuevafecha = strtotime ( '+'.$i.' month' , strtotime ( $fechainicio ) ) ;
                                                    $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
                                                    $txttem= ((pow((1+($tea/100)),30/360))-1)*100;
                                                    $txtcuota= ((pow((1 + ($txttem/100)),$xcuota) * ($txttem/100)) / (pow((1 + ($txttem/100)),$xcuota)-1)) * $credito ;

                                                    $Intereses=$txttem;
                                                    
                                                    $txtseguro2=$desgravamen;
                                                    
                                                    $Interes_Cuota= round(($saldo_Capital *  $Intereses)/100,8);
                                                    //echo "<pre>'Interés de Cuota':$Interes_Cuota</pre>";
                                                    $Interes_Ajustado = round($Interes_Cuota  - 0.02,2);
                                                    //echo "<pre>'Interes Ajustado':$Interes_Ajustado</pre>";
                                                    //$txtcliente=$_POST['txtcodigo'];
                                                    $txtcuota2=round($txtcuota,2);
                                                      //$seguro_cuota= round(($saldo_Capital * $txtseguro2)/100,2);
                                                    $segurocuota =  round(($saldo_Capital * $txtseguro2)/100,2);
                                                    // ******************** interes ******************************
                                                    $Amortiz_capital= round($txtcuota2 - $Interes_Ajustado,2);
                                                    $total_cuota= $txtcuota2 + $segurocuota;  
                                                    $saldo_Capital = round($saldo_Capital - (round($txtcuota,2) - $Interes_Ajustado),2);  
                                                    $saldo_Capital2= abs(round($saldo_Capital));
                                                    
                                                    
                                                    echo '<tr>
                                                    <td>'.$i.'</td>
                                                    <td>'.$nuevafecha.'</td>
                                                    <td><span class="label label-sm label-warning">'.round($txtcuota,2).'</span></td>
                                                    <td>'.$Amortiz_capital.'</td>  
                                                    <td>'.$saldo_Capital2.'</td>
                                                    <td>'.$Interes_Ajustado.'</td>
                                                  </tr>';
                                                  }
                                               ?>
                                           <input type="hidden" value="<?php echo $nuevafecha; ?>" id="fechfinal" name="fechfinal">    
                         </tbody>
              </table>
           </div>        
          </div>
       </div>
     </div>
 <!--</div>  -->
                     