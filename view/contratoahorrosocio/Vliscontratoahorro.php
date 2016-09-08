  
<link href="view/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <div class="col-xs-12">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de Contratos</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>N°</th>
                        <th>Num-Contrato de Ahorro</th>                       
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Fin</th>
                        <th>Monto Depositado</th>
                        <th>Monto Actual</th>                       
                        <th>Tipo</th>
                        <th>estado</th>
                        <th>Socio</th>
                          <!--<th>Editar</th>
                        <th>Eliminar</th>
                        <th>Activar</th>--> 
                        <th>Contrato</th>       
                      </tr>
                    </thead>
                    <tbody>
                      <?php $c=1; ?>
                         <?php  foreach ($lcontahorro as $contahorro): ?>
                             <tr id="<?php echo $contahorro->id_Cah; ?>">
                                        <td> <?php echo "<b>".$c."</b>";?></td>
                                        <td> <?php echo $contahorro->nroAhorro_Cah; ?></td>                                        
                                        <td> <?php echo "<b>".$contahorro->fechaInicio_Cah."</b>"; ?></td>
                                        <td> <?php echo "<b>".$contahorro->fechaFin_Cah."</b>"; ?></td>
                                        <td> <?php echo $contahorro->montoDepositado_Cah; ?></td>
                                        <td> <?php echo $contahorro->montoActual_Cah; ?></td>                                        
                                        <?php if ($contahorro->tipo_Cah=="F"): ?>
                                          <td><span class="badge bg-light-blue">Plazo Fijo</span></td>
                                        <?php else: ?>
                                         <td><span class="badge bg-light-blue">Libre Disponibilidad</span></td>
                                        <?php endif ?>                                          

                                        <?php if ($contahorro->estado_Cah=="A"): ?>
                                          <td><span class="label label-success">Activo</span></td>
                                        <?php else: ?>
                                         <td><span class="label label-danger">Inactivo</span></td>
                                        <?php endif ?> 
                                        <td> <?php echo $contahorro->apellidoPat_Soc." ".$contahorro->apellidoMat_Soc.", ".$contahorro->nombres_Soc ?></td>  
                                        <!--<td><button type="button" class="btn btn-default" onclick="editarContAhorro('<?php echo $contahorro->id_Cah;?>')"><i class="fa fa-pencil"></i></button></td>
                                        <td><button type="button" class="btn btn-default"  onclick="eliminarContAhorro('<?php echo $contahorro->id_Cah;?>')"><i class="fa fa-close"></i></button></td>
                                        <td><input id="estadoContAhorro" name="estadoContAhorro" data-idcontahorro="<?php echo $contahorro->id_Cah ?>" class="activarContAhorro" type="checkbox" <?php if ($contahorro->estado_Cah=="A"): ?>
                                            checked
                                          <?php else: ?>
                                            
                                          <?php endif ?> ></td>-->
                                        <td><a href="index.php?page=contratoahorro&accion=imprimircontahorro&cod=<?php echo "$contahorro->id_Cah"; ?>" target="_blank" class="btn btn-primary"><i class="fa fa-eye"></i> Ver</a></td>

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