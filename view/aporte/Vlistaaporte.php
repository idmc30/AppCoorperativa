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
                  <th>DNI</th>
                  <th>Nombres</th>
                  <th>Apellido Paterno</th>
                  <th>Apellido Materno</th>
                  <th>Estado</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                  <th>Estado</th>                       
                  <th>Ver</th>                       
                  <th>Ver</th>                       
                </tr>
              </thead>
              <tbody>
                 <?php $c=1; ?>
                   <?php  foreach ($lsocio as $socio): ?>
                                   <tr id="<?php echo $aporte->id_Map; ?>">
                                   <td> <?php echo "<b>".$c."</b>";?></td>
                                   <td> <?php echo $socio->dni_Soc; ?></td>
                                   <td> <?php echo $socio->nombres_Soc; ?></td>
                                   <td> <?php echo $socio->apellidoPat_Soc; ?></td>
                                   <td> <?php echo $socio->apellidoMat_Soc; ?></td>
                                   <td> <?php echo $socio->_Soc; ?></td>
                                   <?php if ($socio->estado_Soc=="A"): ?>
                                    <td><span class="label label-success">Activo</span></td>
                                   <?php else: ?>
                                   <td><span class="label label-danger">Inactivo</span></td>
                                   <?php endif ?>                                                       
                                   <td><button type="button" class="btn btn-default" onclick="editarmontoaporte('<?php echo $socio->id_Soc;?>')"><i class="fa fa-pencil"></i></button></td>
                                   <td><button type="button" class="btn btn-default"  onclick="eliminarmontoaporte('<?php echo $socio->id_Soc;?>')"><i class="fa fa-close"></i></button></td>
                                   <td><input id="estadoMontoAporte" name="estadoMontoAporte" data-idmaporte="<?php echo $socio->id_Soc;?>" class="activarMontoAporte" type="checkbox" <?php if ($aporte->estado_Soc=="A"): ?>                                    
                                   checked
                                   <?php else: ?>                                      
                                   <?php endif ?> ></td>
                                   <td><a href="index.php?page=aporte&accion=imprimiraporte&idaporte=<?php echo $aporte->id_Map;  ?>"  target="_blank" class="btn btn-primary" ><i class="fa fa-print"></i></a></td>
                                   <td><a href="index.php?page=aporte&accion=imprimiraporte" target="_blank" class="btn btn-primary"><i class="fa fa-eye"></i> Ver</a></td>
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