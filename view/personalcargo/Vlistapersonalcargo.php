  
<link href="view/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <div class="col-xs-12">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de Personal</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                     <tr>
                        <th>N°</th>
                        <th>Personal</th>
                        <th>Estado</th>
                        <th>Cargo</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Estado</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <?php $c=1; ?>
                       <?php  foreach ($lpercargo as $cargopersonal): ?>
                            <tr id="<?php echo $cargopersonal->id_Cargo; ?>">
                                  <td> <?php echo "<b>".$c."</b>";?></td>
                                        <td> <?php echo $cargopersonal->apellidoPat_Per." ".$cargopersonal->apellidoMat_Per.", ".$cargopersonal->nombres_Per; ?></td>
                                        <?php if ($cargopersonal->estado_Pca=="A"): ?>
                                          <td><span class="label label-success">Activo</span></td>
                                        <?php else: ?>
                                         <td><span class="label label-danger">Inactivo</span></td>
                                        <?php endif ?>
                                        <td><?php echo "<b>".$cargopersonal->nombre_Car."</b>";?></td>                                                       
                                        <td> <button type="button" class="btn btn-default" onclick="editarPCargo('<?php echo $cargopersonal->id_Pca;?>')"><i class="fa fa-pencil"></i></button></td>
                                        <td><button type="button" class="btn btn-default"  onclick="eliminarPCargo('<?php echo $cargopersonal->id_Pca;?>')"><i class="fa fa-close"></i></button></td>
                                        <td><input id="estadoPCargo" name="estadoPCargo" data-idpcar="<?php echo $cargopersonal->id_Pca ?>" class="activarPcargo" type="checkbox" <?php if ($cargopersonal->estado_Pca=="A"): ?>
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
          "bAutoWidth": false
        });
      });
    </script>