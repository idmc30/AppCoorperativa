  
<link href="view/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <div class="col-xs-12">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de Usuarios</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>N°</th>
                        <th>Usuario</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Nombres</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Perfil</th>
                        <th>Cargo</th>
                        <th>Restablecer Contrasena</th>
                        <th>Eliminar</th>
                        <th>Activacion</th>    

                      </tr>
                    </thead>
                    <tbody>
                      <?php $c=1; ?>
                         <?php  foreach ($lusuario as $usuario): ?>
                             <tr id="<?php echo $usuario->id_usu; ?>">
                                        <td> <?php echo "<b>".$c."</b>";?></td>
                                        <td> <?php echo $usuario->usuario; ?></td>
                                        <?php if ($usuario->tipo_Usu=="P"): ?>
                                         <td> <?php echo "<b>PERSONAL</b>"; ?></td>     
                                        <?php else: ?>
                                          <td> <?php echo "<b>SOCIO</b>"; ?></td>  
                                        <?php endif ?>
                                        <?php if ( $usuario->estado_Usu=="A"): ?>
                                          <td><span class="label label-success">Activo</span></td>
                                        <?php else: ?>
                                         <td><span class="label label-danger">Inactivo</span></td>
                                        <?php endif ?>   
                                        <td> <?php echo $usuario->nombres_soc; ?></td> 
                                        <td> <?php echo $usuario->apellidopat_soc; ?></td>  
                                        <td> <?php echo $usuario->apellidomat_soc; ?></td> 
                                        <td> <?php echo "<b>".$usuario->nombre_rol."</b>"; ?></td> 
                                        <?php if ($usuario->nombre_car==NULL): ?>
                                         <td> <?php echo "<b>Socio</b>"; ?></td>
                                        <?php else: ?>
                                         <td><?php echo "<b>".$usuario->nombre_car."</b>"; ?></td>
                                        <?php endif ?>
                                        <td><button type="button" class="btn btn-default" onclick="restablecerPass('<?php echo $usuario->id_usu ?>','<?php echo $usuario->usuario ?>')"><i class="fa fa-refresh"></i></button></td>
                                        <td><button type="button" class="btn btn-default"  onclick="eliminarUsuario('<?php echo $usuario->id_usu;?>')"><i class="fa fa-close"></i></button></td>
                                        <td><input id="estadoUsuario" name="estadoUsuario" data-idusuario="<?php echo $usuario->id_usu ?>" class="activarUsuario" type="checkbox" <?php if ($usuario->estado_Usu=="A"): ?>
                                            checked
                                          <?php else: ?>
                                          
                                          <?php endif ?> ></td>
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
          "bAutoWidth": false,
          "lengthMenu": "registros por página",
          
        });
      });
    </script>