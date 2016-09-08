  <div class="box-body">
                 
                </div><!-- /.box-body -->
<link href="view/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <div class="col-xs-12">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de Deudas</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                     <tr>
                        <th>N°</th>
                        <th>Fecha de Pago</th>
                        <th><center>Monto</center></th>
                        <th>Nro Cont. Credito</th>
                        <th>Nro Cuota</th>
                        <th>Nombres</th>                                                  
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Estado</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $c=1; ?>
                       <?php  foreach ($ldeudaxFech as $deuda): ?>
                          <?php 
                           // $date1 = new DateTime($soc->fechaInicio_Soc);//formatear la fecha
                            
                          ?>
                            <tr id="<?php echo $deuda->id_Cuo; ?>">
                                   <td><?php echo "<b>".$c."</b>";?></td>
                                   <td><?php echo $deuda->fecha_Cuo;?></td>  
                                   <td><center><?php echo $deuda->monto_Cuo;?></center></td>
                                   <td><?php echo $deuda->nrocredito_Ccr;?></td> 
                                   <td><?php echo $deuda->numero_Cuo;?></td>                                
                                   <td><?php echo $deuda->nombres_Soc;?></td>
                                   <td><?php echo $deuda->apellidoPat_Soc;?></td>
                                   <td><?php echo $deuda->apellidoMat_Soc;?></td>
                                    <?php if ($deuda->estado_Cuo=="C"): ?>
                                        <td><span class="label label-success">Cancelado</span></td>
                                        <?php else: ?>
                                        <td><span class="label label-danger">Debe</span></td>
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