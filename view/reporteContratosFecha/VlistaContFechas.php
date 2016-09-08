  <div class="box-body">
                 
                </div><!-- /.box-body -->
<link href="view/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <div class="col-xs-12">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Lista de Contratos por Fechas</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                     <tr>
                        <th>N°</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Nombres</th>
                        <th>Dni</th>
                        <th>direccion</th> 
                        <th>NroCuenta</th>                         
                        <th>Monto</th>
                        <th>Tipo</th> 
                       <!-- <th>Tipo de Contrato</th> -->

                        <th>Estado</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $c=1; ?>
                       <?php  foreach ($lcontxFech as $socccr): ?>
                            <tr id="<?php echo $socccr->id_Cah; ?>">
                                   <td><?php echo "<b>".$c."</b>";?></td>
                                   <td><?php echo utf8_encode($socccr->apellidoPat_Soc);?></td>  
                                   <td><?php echo utf8_decode($socccr->apellidoMat_Soc);?></td>
                                   <td><?php echo utf8_decode($socccr->nombres_Soc);?></td>
                                   <td><?php echo $socccr->dni_Soc;?></td>
                                   <td><?php echo $socccr->direccion_Soc;?></td>
                                   <td><?php echo $socccr->nroAhorro_Cah;?></td>
                                   <td><?php echo number_format(($socccr->montoActual_Cah), 2, '.', ',');?></td>
                                   <?php if ($socccr->fechaFirma_Cah!==NULL): ?>
                                       <?php if ($socccr->tipo_Cah=="F"): ?>
                                             <td><span class="badge bg-light-blue">Plazo Fijo</span></td>
                                       <?php else: ?>
                                            <td><span class="badge bg-light-blue">Libre Dispon</span></td>
                                       <?php endif ?>
                                    <?php else: ?>
                                        <td><?php echo '<span class="badge bg-light-blue">Contrato de Credito</span>';?></td>
                                    <?php endif ?>  

                                    <!--<?php //if ($socccr->fechaFirma_Cah==NULL): ?>
                                         <td><span class="badge bg-light-blue">Contrato de Credito</span></td>
                                    <?php //else: ?>
                                        <td><span class="badge bg-light-blue">Contrato de Ahorro</span></td>
                                    <?php //endif ?>-->
                                    
                                     <?php if ($socccr->estado_Cah=="A"): ?>
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