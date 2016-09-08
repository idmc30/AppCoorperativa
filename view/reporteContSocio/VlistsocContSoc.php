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
                        <th>NroCuenta</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Monto</th>
                        <th>Tipo</th> 
                        <th>Tipo de Contrato</th>                        
                        <th>Estado</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $c=1; ?>
                       <?php  foreach ($lCtrxSoc as $ContxSoc): ?>
                            <tr id="<?php echo $ContxSoc->id_Cah; ?>">
                                   <td><?php echo "<b>".$c."</b>";?></td>
                                   <td><?php echo $ContxSoc->nroAhorro_Cah;?></td>  
                                   <td><?php echo $ContxSoc->fechaInicio_Cah;?></td>
                                   <td><?php echo $ContxSoc->fechaFin_Cah;?></td>
                                   <td><?php echo number_format(($ContxSoc->montoDepositado_Cah), 2, '.', ',');?></td>
                                   <?php if ($ContxSoc->fechaFirma_Cah!==NULL): ?>
                                            <?php if ($ContxSoc->tipo_Cah=="F"): ?>
                                                  <td><span class="badge bg-light-blue">Plazo Fijo</span></td>
                                            <?php else: ?>
                                               <td><span class="badge bg-light-blue">Libre Dispon</span></td>
                                            <?php endif ?>

                                    <?php else: ?>
                                     <td><?php echo "";?></td>
                                    <?php endif ?>  

                                      <?php if ($ContxSoc->fechaFirma_Cah==NULL): ?>
                                         <td><span class="badge bg-light-blue">Contrato de Credito</span></td>
                                      <?php else: ?>
                                        <td><span class="badge bg-light-blue">Contrato de Ahorro</span></td>
                                      <?php endif ?>

                                        <?php if ($ContxSoc->estado_Cah=="A"): ?>
                                          <td><span class="label label-success">Activo</span></td>
                                        <?php else: ?>
                                         <td><span class="label label-danger">Inactivo</span></td>
                                        <?php endif ?> 

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