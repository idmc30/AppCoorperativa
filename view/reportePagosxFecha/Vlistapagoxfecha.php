  <div class="box-body">
                 
                </div><!-- /.box-body -->
<link href="view/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <div class="col-xs-11">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de Pagos</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                     <tr>
                        <th>N°</th>
                        <th>Fecha de Pago</th>
                        <th><center>Monto</center></th>
                        <th>Nro Ticket</th>
                        <th>Nro Contr.Credito</th>
                        <th>Nombres</th>                                                  
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $c=1; ?>
                       <?php  foreach ($lpagoxFech as $pagoporfecha): ?>
                          <?php 
                           // $date1 = new DateTime($soc->fechaInicio_Soc);//formatear la fecha
                            
                          ?>
                            <tr id="<?php echo $pagoporfecha->id_Pag; ?>">
                                   <td><?php echo "<b>".$c."</b>";?></td>
                                   <td><?php echo $pagoporfecha->fecha_Pag;?></td>  
                                   <td><center><?php echo $pagoporfecha->monto_Pag;?></center></td>
                                   <td><?php echo $pagoporfecha->nroTicket_Pag;?></td>
                                   <td><?php echo $pagoporfecha->nrocredito_Ccr;?></td>                                   
                                   <td><?php echo $pagoporfecha->nombres_Soc;?></td>
                                   <td><?php echo $pagoporfecha->apellidoPat_Soc;?></td>
                                   <td><?php echo $pagoporfecha->apellidoMat_Soc;?></td>
                                                                   
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