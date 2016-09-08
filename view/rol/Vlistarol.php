    <div class="row">
      <div class="col-xs-10">
       <div class="box">
                    <div class="box-header">
                  <h3 class="box-title">Lista de Perfiles</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>N°</th>
                        <th>Perfil</th>
                        <th>Estado</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Activar</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php $c=1; ?>
                         <?php  foreach ($lrol as $rol): ?>
                             <tr id="<?php echo $rol->id_Rol; ?>">
                                  <td> <?php echo "<b>".$c."</b>";?></td>
                                        <td> <?php echo $rol->nombre_Rol; ?></td>
                                        <?php if ($rol->estado_Rol=="A"): ?>
                                        <td><span class="label label-success">Activo</span></td>
                                        <?php else: ?>
                                        <td>  <span class="label label-danger">Inactivo</span> </td>
                                        <?php endif ?>
                                                                                                                                                            
                                        <td> <button type="button" class="btn btn-default" onclick="editarRol('<?php echo $rol->id_Rol;?>')">Editar</button></td>

                                        <td><button type="button" class="btn btn-default"  onclick="eliminarRol('<?php echo $rol->id_Rol;?>')">Eliminar</button></td>

                                        <td><input id="estadoRol" name="estadoRol" data-idrol="<?php echo $rol->id_Rol ?>" class="activarRol" type="checkbox" <?php if ($rol->estado_Rol=="A"): ?>
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
