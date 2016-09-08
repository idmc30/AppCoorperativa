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
                        <th>Fecha Movimiento</th>
                        <th>Monto</th>
                        <th>Usuario</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $c=1; ?>
                       <?php  foreach ($ldepretir as $depositoRetiro): ?>
                         
                            <tr id="<?php echo $socccr->id_Cah; ?>">
                                   <td><?php echo "<b>".$c."</b>";?></td>
                                   <td><?php echo $depositoRetiro->fecha_Mov;?></td>  
                                   <td><?php echo $depositoRetiro->monto_Mov;?></td>
                                   <td><?php echo $depositoRetiro->usuario;?></td>

                                     <!-- <?php// if ($socccr->tipo_Cah=="F"): ?>
                                          <td><span class="badge bg-light-blue">Plazo Fijo</span></td>
                                        <?php //else: ?>
                                         <td><span class="badge bg-light-blue">Libre Dispon</span></td>
                                        <?php //endif ?>-->                                          
                                     <!--<td><?php //echo $socccr->fechaInicio_Soc?></td>-->
                                        <!--<?php //if ($socccr->estado_Cah=="A"): ?>
                                          <td><span class="label label-success">Activo</span></td>
                                        <?php //else: ?>
                                         <td><span class="label label-danger">Inactivo</span></td>
                                        <?php //endif ?> -->


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