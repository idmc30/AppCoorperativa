  
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
                        <th>Nombres</th>
                        <th>Apellido Parterno</th>
                        <th>Apellido Materno</th>
                        <th>Dni</th>
                        <th>Estado</th>
                        <th>Telef-Fijo</th>
                        <th>Celular</th>
                        <th>Email</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Activar</th>    

                      </tr>
                    </thead>
                    <tbody>
                      <?php $c=1; ?>
                         <?php  foreach ($lpersonal as $personal): ?>
                             <tr id="<?php echo $personal->id_Per; ?>">
                                        <td> <?php echo "<b>".$c."</b>";?></td>
                                        <td> <?php echo $personal->nombres_Per; ?></td>
                                        <td> <?php echo $personal->apellidoPat_Per; ?></td>
                                        <td> <?php echo $personal->apellidoMat_Per; ?></td>
                                        <td> <?php echo $personal->dni_Per; ?></td>
                                        <?php if ($personal->estado_Per=="A"): ?>
                                          <td><span class="label label-success">Activo</span></td>
                                        <?php else: ?>
                                         <td><span class="label label-danger">Inactivo</span></td>
                                        <?php endif ?>   
                                        <td> <?php echo $personal->telefono_Per; ?></td> 
                                        <td> <?php echo $personal->celular_Per; ?></td>  
                                        <td> <?php echo $personal->email_Per; ?></td>  
                                        <td><button type="button" class="btn btn-default" onclick="editarPersonal('<?php echo $personal->id_Per;?>')"><i class="fa fa-pencil"></i></button></td>
                                        <td><button type="button" class="btn btn-default"  onclick="eliminarPersonal('<?php echo $personal->id_Per;?>')"><i class="fa fa-close"></i></button></td>
                                        <td><input id="estadoPersonal" name="estadoPersonal" data-idpersonal="<?php echo $personal->id_Per ?>" class="activarPersonal" type="checkbox" <?php if ($personal->estado_Per=="A"): ?>
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