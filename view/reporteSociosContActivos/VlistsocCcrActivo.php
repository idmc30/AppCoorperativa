  <div class="box-body">
                 
                </div><!-- /.box-body -->
<link href="view/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <div class="col-xs-11">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Detalle de Socios</h3>
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
                        <!--<th>NroCuenta</th>                         -->
                        <th>Estado</th> 
                        <th>Fecha</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $c=1; ?>
                       <?php  foreach ($listaSoc as $soc): ?>
                          <?php 
                            $date1 = new DateTime($soc->fechaInicio_Soc);//formatear la fecha
                            
                          ?>
                            <tr id="<?php echo $soc->id_Soc; ?>">
                                   <td><?php echo "<b>".$c."</b>";?></td>
                                   <td><?php echo $soc->apellidoPat_Soc;?></td>  
                                   <td><?php echo $soc->apellidoMat_Soc;?></td>
                                   <td><?php echo $soc->nombres_Soc;?></td>
                                   <td><?php echo $soc->dni_Soc;?></td>
                                   <td><?php echo $soc->direccion_Soc;?></td>
                                   <!--<td><?php echo $soc->nroAhorro_Cah;?></td>-->
                                      <?php if ($soc->estado_Soc=="A"): ?>
                                          <td><span class="badge bg-light-blue">Activo</span></td>
                                        <?php else: ?>
                                         <td><span class="badge bg-light-blue">Inactivo</span></td>
                                        <?php endif ?>                                          
                                   <td><?php echo $date1->format('d-M-Y')?></td>
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