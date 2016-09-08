  <div class="box-body">
                 
                </div><!-- /.box-body -->
<link href="view/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <div class="col-xs-12">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Detalle de Movimientos</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                     <tr>
                        <th>N°</th>
                        <th>Típo de Movimiento</th>
                        <th>Monto</th>
                        <th>Fecha de Movimiento</th>
                        <th>Usuario</th>
                        <th>Imprimir</th> 
                        <th>Condicion</th>                         
                        <th>Estorno</th> 
                      </tr>
                    </thead>
                    <tbody>
                      <?php $c=1; ?>
                       <?php  foreach ($lmovimiento as $movimiento): ?>
                            <tr id="<?php echo $movimiento->id_Mov; ?>">
                                        <td> <?php echo "<b>".$c."</b>";?></td>
                                         <?php if ($movimiento->tipo_Mov=="D"): ?>
                                           <td><span class="badge bg-light-blue">Deposito</span></td>
                                          <?php elseif($movimiento->tipo_Mov=="I"): ?> 
                                           <td><span class="badge bg-light-blue">Monto Inicial</span></td>
                                         <?php else: ?>
                                           <td><span class="badge bg-red">Retiro</span></td>
                                         <?php endif ?>                                    
                                        <td> <?php echo $movimiento->monto_Mov; ?></td>
                                        <td> <?php echo $movimiento->fecha_Mov; ?></td>
                                        <td> <?php echo $movimiento->usuario; ?></td>   
                                        <td><a href="index.php?page=movimiento&accion=imprimirmovimiento&idcontahorro=<?php echo $movimiento->id_Mov;  ?>"  target="_blank" class="btn btn-primary" ><i class="fa fa-print"></i></a></td>
                                        <?php if ($movimiento->condicion_Mov =="N"): ?>
                                        <td><span class="label label-success">Normal</span></td>
                                        <?php else: ?>
                                         <td><span class="label label-danger">Estorno</span></td>
                                        <?php endif ?>        
                                        <td><button type="button" class="btn btn-default" onclick="estornarMovimiento('<?php echo $movimiento->id_Mov;?>')" <?php if ($movimiento->condicion_Mov !="N" || $movimiento->tipo_Mov =="I" ) {
                                         echo 'disabled=""';
                                        }?>><i class="fa fa-reply"></i></button></td>
                                      </tr>
                        <?php $c=$c+1 ?>  
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
             <script src="view/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
             <script src="view/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
             <script type="text/javascript">
                $(function () {
                  $("#example1").dataTable();
                  $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                  });
                });
            </script>