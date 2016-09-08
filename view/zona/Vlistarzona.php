<link href="view/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <div class="row">
      <div class="col-xs-10">
       <div class="box">
                <div class="box-header">
                <h3 class="box-title">ZONA</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>N°</th>
                        <th>Zona</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Activar</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php $c=1; ?>
                         <?php  foreach ($lzona as $zona): ?>
                              <tr id="<?php echo $zona->id_Zona; ?>">
                                        <td> <?php echo "<b>".$c."</b>";?></td>
                                        <td> <?php echo $zona->nombre_Zon; ?></td>
                                        <td> <?php echo $zona->descripcion_Zon; ?></td>
                                        <?php if ($zona->estado_Zon=="A"): ?>
                                        <td><span class="label label-success">Activo</span></td>
                                        <?php else: ?>
                                        <td>  <span class="label label-danger">Inactivo</span> </td>
                                        <?php endif ?>
                                                                                                                                                            
                                        <td><button type="button" class="btn btn-default" onclick="editarZona('<?php echo $zona->id_Zon;?>')">Editar</button></td>

                                        <td><button type="button" class="btn btn-default"  onclick="eliminarZona('<?php echo $zona->id_Zon;?>')">Eliminar</button></td>

                                        <td><input id="estadoZona" name="estadoZona" data-idzona="<?php echo $zona->id_Zon ?>" class="activarZona" type="checkbox" <?php if ($zona->estado_Zon=="A"): ?>
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