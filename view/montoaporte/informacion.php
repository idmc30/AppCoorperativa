
<?php 
    $lmovimiento=$movto->MontoActualContMovimiento($id);
    $response=array();
    $response["monto"] =$lmovimiento->montoActual_Cah;


?>


<?php 
  $vmonto=$response["monto"];
  
?>



<div class="info-box">
                              <span class="info-box-icon bg-aqua"><i class="fa fa-credit-card"></i></span>
                              <div class="info-box-content">
                                <span class="info-box-text">Monto Disponible</span>

                                <span class="info-box-number"><?php echo $vmonto;?></span>
                                  <span class="info-box-text">Messages</span>
                                <span class="info-box-number">1,410</span>
                              </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
