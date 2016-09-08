    <div class="row">
      <div class="col-xs-10">
       <div class="box">
                    <div class="box-header">
                  <h3 class="box-title">Lista de Monto Aporte</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>N°</th>
                        <th>Año</th>
                        <th>Monto de Aporte</th>
                        <th>Estado</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Estado</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                       <?php $c=1; ?>
                         <?php  foreach ($lmontoaporte as $aporte): ?>
                                         <tr id="<?php echo $aporte->id_Map; ?>">
                                         <td> <?php echo "<b>".$c."</b>";?></td>
                                         <td> <?php echo $aporte->anio_Map; ?></td>
                                         <td> <?php echo $aporte->monto_Map; ?></td>
                                         <?php if ($aporte->estado_Map=="A"): ?>
                                          <td><span class="label label-success">Activo</span></td>
                                         <?php else: ?>
                                         <td><span class="label label-danger">Inactivo</span></td>
                                         <?php endif ?>                                                       
                                         <td><button type="button" class="btn btn-default" onclick="editarmontoaporte('<?php echo $aporte->id_Map;?>')"><i class="fa fa-pencil"></i></button></td>
                                         <td><button type="button" class="btn btn-default"  onclick="eliminarmontoaporte('<?php echo $aporte->id_Map;?>')"><i class="fa fa-close"></i></button></td>
                                         <td><input id="estadoMontoAporte" name="estadoMontoAporte" data-idmaporte="<?php echo $aporte->id_Map ?>" class="activarMontoAporte" type="checkbox" <?php if ($aporte->estado_Map=="A"): ?>
                                            checked
                                          <?php else: ?>
                                            
                                          <?php endif ?> ></td>
                                      </tr>

                        <?php $c=$c+1 ?>  
                         <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
      </div><!-- /.col -->
       </div>
