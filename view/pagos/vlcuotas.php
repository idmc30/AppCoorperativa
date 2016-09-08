    <div class="row">
      <div class="col-xs-12">
       <div class="box">
                    <div class="box-header">
               
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Nro de Cuotas</th>
                        <th>Monto</th>
                        <th>Amortizacion</th>
                        <th>fecha Vencimiento</th>
                        <th>Estado</th>
                        <th>Pagar</th>
                        <th>Imprimir</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php $c=1; ?>
                         <?php  foreach ($lcuotas as $cuotas): ?>
                          <?php 
                            $date = new DateTime($cuotas->fecha_Cuo);//formatear la fecha
                         
                          ?>
                             <tr id="<?php echo $cuotas->id_Cargo; ?>">
                                  <td> <?php echo "<b>".$cuotas->numero_Cuo."</b>";?></td>
                                        <td> <?php echo $cuotas->monto_Cuo;?></td>
                                        <td> <?php echo $cuotas->interes_Cuo;?></td>
                                        <td> <?php echo '<b>'.$date->format('d-M-Y')."</b>"?></td>
                                        <?php if ($cuotas->estado_Cuo=="C"): ?>
                                        <td><span class="label label-success">Cancelado</span></td>
                                        <?php else: ?>
                                        <td><span class="label label-danger">Debe</span></td>
                                        <?php endif ?>     

                                        <td><button type="button" class="btn btn-default" onclick="pagarCuota('<?php echo $cuotas->id_Cuo;?>')"  <?php if ($cuotas->estado_Cuo=="C") {
                                          echo "disabled=''";
                                        } ?>><i class="fa fa-pencil"></i></button></td>
                                        <td><button type="button" class="btn btn-default"  onclick="imprimirCuota('<?php echo $cuotas->id_Cuo;?>')" <?php if ($cuotas->estado_Cuo=="P") {
                                           echo "disabled=''";
                                        }
                                              
                                         ?>><i class="fa fa-print"></i></button></td>
                             </tr>
                        <?php $c=$c+1 ?>  
                         <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
      </div><!-- /.col -->
       </div>
