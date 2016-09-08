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
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Nombres</th>
                        <th>Dni</th>
                        <th>Direcci&oacute;n</th> 
                        <th>Distrito</th> 
                        <th>Nro Cuenta</th>                         
                        <th>Tipo</th> 
                        <th>Tipo de Contrato</th> 
                        <th>Fecha</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $n=1; ?>
                       <?php  foreach ($lSocioxZona as $dato): ?>
                         
                            <tr id="<?php echo $socccr->id_Cah; ?>">
                                   <td><?php echo "<b>".$n."</b>";?></td>
                                   <td><?php echo $dato->apellidoPat_Soc;?></td>  
                                   <td><?php echo $dato->apellidoMat_Soc;?></td>
                                   <td><?php echo $dato->nombres_Soc;?></td>
                                   <td><?php echo $dato->dni_Soc;?></td>
                                   <td><?php echo $dato->direccion_Soc;?></td>
                                   <td><?php echo $dato->nombre_Uge;?></td>
                                   <td><?php echo $dato->nroContrato_Con;?></td>
                                   <td><span class="badge bg-light-blue"><?php echo $dato->tipo_Acc;?></span></td>                                                                  
                                   <td><span class="badge bg-light-blue"><?php echo $dato->tipo_Con;?></span></td>                                                                  
                                   <td><?php echo date("d-m-Y",strtotime($dato->fecha_Con)); ?></td>   

                              </tr>
                              
                        <?php $n=$n+1 ?>  
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