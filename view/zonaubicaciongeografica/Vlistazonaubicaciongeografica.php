  <div class="box-body">
                 
                </div><!-- /.box-body -->
<link href="view/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <div class="col-xs-12">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de Zona Ubicación Geográfica</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                     <tr>
                        <th>N°</th>
                        <th>Zona</th>
                        <th>Departamento</th>
                        <th>Provincia</th>
                        <th>Distrito</th>
                        <th>Estado</th>  
                       <!-- <th>Editar</th> -->
                        <th>Eliminar</th>
                        <th>Activar</th>                       
                      </tr>
                    </thead>
                    <tbody>
                      <?php $c=1; ?>
                       <?php  foreach ($lzug as $zug): ?>
                            <tr id="<?php echo $zug->id_Zug; ?>">
                                        <td> <?php echo "<b>".$c."</b>";?></td>
                                        <td> <?php echo $zug->nombre_Zon; ?></td>
                                        <td> <?php echo $zug->departamento; ?></td>
                                        <td> <?php echo $zug->provincia; ?></td>
                                        <td> <?php echo $zug->distrito; ?></td>
                                        <?php if ($zug->estado_Zug=="A"): ?>
                                        <td><span class="label label-success">Activo</span></td>
                                        <?php else: ?>
                                         <td><span class="label label-danger">Inactivo</span></td>
                                        <?php endif ?>                                        
                                        
                                        <td><button type="button" class="btn btn-default"  onclick="eliminarZonaUbicacionGeografica('<?php echo $zug->id_Zug;?>')"><i class="fa fa-close"></i></button></td>
                                        <td><input id="estadoZug" name="estadoZug" data-idzug="<?php echo $zug->id_Zug ?>" class="activarZug" type="checkbox" <?php if ($zug->estado_Zug=="A"): ?>
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