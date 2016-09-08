<link href="view/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <div class="col-xs-12">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de Socios</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>N°</th>
                        <th>N° de Socio</th>
                        <th>Nombres y Apellidos</th>
                        <th>Dni</th>
                        <th>N°Resolucion</th>
                        <th>Estado</th>
                        <th>Distrito</th>
                        <th>Direccion</th>
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
                         <?php  foreach ($lsocio as $socio): ?>
                             <tr id="<?php echo $socio->id_Soc; ?>">
                                        <td> <?php echo "<b>".$c."</b>";?></td>
                                        <td><?php echo $socio->nro_Soc; ?></td>
                                        <td> <?php echo $socio->apellidoPat_Soc." ".$socio->apellidoMat_Soc.", ".$socio->nombres_Soc ; ?></td>                                        
                                        <td> <?php echo $socio->dni_Soc; ?></td>
                                        <td> <?php echo $socio->resolucion_Apo; ?></td>
                                        <?php if ($socio->estado_Soc=="A"): ?>
                                          <td><span class="label label-success">Activo</span></td>
                                        <?php else: ?>
                                         <td><span class="label label-danger">Inactivo</span></td>
                                        <?php endif ?>  
                                        <td> <?php echo "<b>".$socio->nombre_Uge."</b>"; ?></td>  
                                        <td> <?php echo $socio->direccion_Soc; ?></td> 
                                        <td> <?php echo $socio->telefono_Soc; ?></td> 
                                        <td> <?php echo $socio->celular_Soc; ?></td>  
                                        <td> <?php echo $socio->email_Soc; ?></td>  
                                        <td><button type="button" class="btn btn-default" onclick="editarSocio('<?php echo $socio->id_Soc;?>')"><i class="fa fa-pencil"></i></button></td>
                                        <td><button type="button" class="btn btn-default" onclick="eliminarSocio('<?php echo $socio->id_Soc;?>')"><i class="fa fa-close"></i></button></td>
                                        <td><input id="estadoSocio" name="estadoSocio" data-idsocio="<?php echo $socio->id_Soc; ?>" class="activarSocio" type="checkbox" <?php if ($socio->estado_Soc=="A"): ?>
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