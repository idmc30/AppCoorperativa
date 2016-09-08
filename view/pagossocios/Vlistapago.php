  <div class="box-body">
                 
                </div><!-- /.box-body -->
<link href="view/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <div class="col-xs-12">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de Contrato de Credito</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                     <tr>
                        <th>N°</th>
                        <th>Nro de Credito</th>
                        <th>Monto</th>
                        <th>Nro de Cuotas</th>
                        <th>Tasa Efectiva Anual</th>
                        <th>Seguro</th>
                        <!-- <th>Tasa Efectiva Mensual</th>-->   
                        <th>Fecha de Inicio</th>
                        <th>Fecha Final</th>
                        <th>Estado</th>
                        <th>Detalle</th>
                      </tr>
                    </thead>
                 
                    <tbody>
                      <?php $c=1; ?>
                       <?php  foreach ($lcontratocredito as $contCredito): ?>
                           <?php 
                            $date1 = new DateTime($contCredito->fechaInicio_Ccr);//formatear la fecha
                            $date2 = new DateTime($contCredito->fechaFin_Ccr);
                          ?>
                            <tr id="<?php echo $contCredito->id_Ccr; ?>">
                                        <td> <?php echo "<b>".$c."</b>";?></td>
                                        <td> <?php echo $contCredito->nrocredito_Ccr; ?></td>
                                        <td> <?php echo $contCredito->montoCredito_Ccr;?></td>
                                        <td> <?php echo $contCredito->nroCuota_Ccr;?></td>
                                        <td> <?php echo $contCredito->tea_Ccr; ?></td>
                                        <td> <?php echo $contCredito->segruo_Ccr; ?></td>
                                        <!-- <td> <?php echo $contCredito->tem_Ccr; ?></td> -->
                                        <td> <?php echo '<b>'.$date1->format('d-M-Y')."</b>";?></td>
                                        <td> <?php echo '<b>'.$date2->format('d-M-Y').'</b>';?></td>
                                        <?php if ($contCredito->estado_Ccr=="A"): ?>
                                        <td><span class="label label-success">Activo</span></td>
                                        <?php else: ?>
                                         <td><span class="label label-danger">Inactivo</span></td>
                                        <?php endif ?>
                                        <td><button type="button" class="btn btn-primary" onclick="listarCuotas('<?php echo $contCredito->id_Ccr; ?>');">Detalle</button></td>
                                        
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