    <div class="row">
      <div class="col-xs-10">
       <div class="box">
                    <div class="box-header">
                  <h3 class="box-title">Listado de Cargo</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>N°</th>
                        <th>Cargo</th>
                        <th>Estado</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Estado</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                       <?php $c=1; ?>
                         <?php  foreach ($lcargo as $cargo): ?>
                             <tr id="<?php echo $cargo->id_Cargo; ?>">
                                  <td> <?php echo "<b>".$c."</b>";?></td>
                                        <td> <?php echo $cargo->nombre_Car; ?></td>
                                        <?php if ($cargo->estado_Car=="A"): ?>
                                          <td><span class="label label-success">Activo</span></td>
                                        <?php else: ?>
                                         <td><span class="label label-danger">Inactivo</span></td>
                                        <?php endif ?>                                                       
                                        <td> <button type="button" class="btn btn-default" onclick="editarcargo('<?php echo $cargo->id_Cargo;?>')"><i class="fa fa-pencil"></i></button></td>
                                        <td><button type="button" class="btn btn-default"  onclick="eliminarcargo('<?php echo $cargo->id_Cargo;?>')"><i class="fa fa-close"></i></button></td>
                                        <td><input id="estadoCargo" name="estadoCargo" data-idcargo="<?php echo $cargo->id_Cargo ?>" class="activarCargo" type="checkbox" <?php if ($cargo->estado_Car=="A"): ?>
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
