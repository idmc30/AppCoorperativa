    <div class="row">
      <div class="col-xs-10">
       <div class="box">
                    <div class="box-header">
                  <h3 class="box-title">Lista de Impuesto a las Transacciones Financieras(ITF) </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>N°</th>
                        <th>Año</th>
                        <th>Valor</th>
                        <th>Estado</th>
                        <th>Editar</th>                        
                        <th>Activar</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php $c=1; ?>
                         <?php  foreach ($ltea as $tea): ?>
                             <tr id="<?php echo $tea->id_tas; ?>">
                                  <td> <?php echo "<b>".$c."</b>";?></td>
                                        <td> <?php echo $tea->anio_tas; ?></td>
                                        <td><?php echo $tea->valor_tas; ?></td>  
                                        <?php if ($tea->estado_tas=="A"): ?>
                                        <td><span class="label label-success">Activo</span></td>
                                        <?php else: ?>
                                        <td>  <span class="label label-danger">Inactivo</span> </td>
                                        <?php endif ?>
                                                                                                                                                         
                                        <td> <button type="button" class="btn btn-default" onclick="editarItf('<?php echo $tea->id_tas;?>')">Editar</button></td>
                                        <td><input type="radio" name="estadoItf" id="estadoItf" value="<?php echo $tea->id_tas ?>" <?php if ($tea->estado_tas=="A"): ?>
                                          checked
                                        <?php endif ?>></td>
                                        <!--<td><input id="estadoTasa" name="estadoTasa" data-idtasa="<?php echo $tea->id_tas ?>" class="activarTasa" type="checkbox" <?php if ($tea->estado_tas=="A"): ?>
                                            checked
                                          <?php else: ?>
                                            
                                          <?php endif ?> ></td>-->
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
