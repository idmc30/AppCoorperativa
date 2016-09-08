  <div class="box-body">
                 
                </div><!-- /.box-body -->
<link href="view/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <div class="col-xs-12">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de Personal Zona</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                     <tr>
                        <th>N°</th>
                        <th>Nombres</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>DNI</th>
                        <th>Zona</th>
                        <th>Estado</th>                         
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Estado</th>                       
                      </tr>
                    </thead>
                    <tbody>
                      <?php $c=1; ?>
                       <?php  foreach ($lperzon as $pz): ?>
                            <tr id="<?php echo $pz->id_Pzo; ?>">
                                        <td> <?php echo "<b>".$c."</b>";?></td>
                                        <td> <?php echo $pz->nombres_Per; ?></td>
                                        <td> <?php echo $pz->apellidoPat_Per; ?></td>
                                        <td> <?php echo $pz->apellidoMat_Per; ?></td>
                                        <td> <?php echo $pz->dni_Per; ?></td>
                                        <td> <?php echo $pz->nombre_Zon; ?></td>
                                        <?php if ($pz->estado_Pzo=="A"): ?>
                                        <td><span class="label label-success">Activo</span></td>
                                        <?php else: ?>
                                         <td><span class="label label-danger">Inactivo</span></td>
                                        <?php endif ?>        

                                        <td><button type="button" class="btn btn-default" onclick="obtenerPersonalZonaxIdPzo('<?php echo $pz->id_Pzo;?>')"><i class="fa fa-pencil"></i></button></td>
                                        <td><button type="button" class="btn btn-default"  onclick="eliminarPersonalZona('<?php echo $pz->id_Pzo;?>')"><i class="fa fa-close"></i></button></td>
                                                                        
                                        <td><input id="estadoPzo" name="estadoPzo" data-idpzo="<?php echo $pz->id_Pzo ?>" class="activarPzo" type="checkbox" <?php if ($pz->estado_Pzo=="A"): ?>
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