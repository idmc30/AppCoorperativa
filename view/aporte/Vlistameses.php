<link href="view/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <div class="col-xs-12">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Lista de Monto Aporte por año</h3>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>                        
                        <th>N°</th>
                        <th>Año</th>
                        <th>Mes</th>
                        <th>Monto de Aporte</th>
                        <th>Monto Pagado</th>
                        <th>Estado</th>
                        <th>Fecha Ingreso</th>                                                
                        <th>Fecha Pago</th>                                                
                        <th>Registrar</th>                        
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Imprimir</th>                       
                      </tr>
                    </thead>
                    <tbody>
                       <?php $c=1; ?>
                         <?php  foreach ($lmeses as $mes): ?>

                                         <tr id="<?php echo $mes->id_Mes; ?>">

                                        

                                         <td> <?php echo "<b>".$c."</b>";?></td>
                                         <td> <?php echo $mes->anio_Map; ?></td>
                                         <td> <?php echo $mes->nombre_Mes; ?></td>
                                         <td> <?php echo $mes->monto_Map; ?></td>
                                         <td> <?php echo $mes->cuota_Apo; ?></td>
                                         <?php if ($mes->estado_Apo=="P"): ?>
                                          <td><span class="label label-success">Pagado</span></td>
                                         <?php else: ?>
                                         <td><span class="label label-danger">Debe</span></td>
                                         <?php endif ?>             
                                         
                                         <td> 
                                         <?php  
                                         if (is_null($mes->fechaInicio_Soc))
                                         {
                                            echo "No hay fecha";
                                         }
                                         else{
                                              echo date("d-m-Y",strtotime($mes->fechaInicio_Soc)); 
                                         }
                                         ?>
                                         </td>

                                         <td> 
                                         <?php  
                                         $fecha=date("d-m-Y",strtotime($mes->fecha_Apo));
                                         if (is_null($mes->fecha_Apo))
                                         {
                                            echo "No hay fecha";
                                         }
                                         else{
                                              echo date("d-m-Y",strtotime($mes->fecha_Apo)); 
                                         }
                                         ?>
                                         </td>                                        
                                         <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAporte" onclick="registramontoaporte('<?php echo $mes->id_Mes;?>','<?php echo $mes->monto_Map;?>','<?php echo $mes->nombre_Mes;?>')" <?php if ($mes->id_Apo != ''){echo  "disabled";} ?> ><i class="fa fa-pencil"></i></button></td>                                        
                                         <td><button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalAporte" onclick="editarmontoaporte('<?php echo $mes->id_Apo;?>','<?php echo $mes->id_Mes;?>','<?php echo $mes->monto_Map;?>','<?php echo $mes->nombre_Mes;?>','<?php echo $fecha;?>')" <?php if ($mes->id_Apo == ''){echo  "disabled";} ?> ><i class="fa fa-pencil"></i></button></td>
                                         <td><button type="button" class="btn btn-default"  onclick="eliminaraporte('<?php echo $mes->id_Apo;?>')"><i class="fa fa-close"></i></button></td>                                         
                                         
                                        
                                         <td>

                                          <?php 
                                              if (is_null($mes->id_Apo)) { ?>
                                                <a class="btn btn-primary" ><i class="fa fa-print"></i></a>      
                                          
                                          <?php }else{ ?>
                                          <a href="index.php?page=aporte&accion=imprimiraporte&idaporte=<?php echo $mes->id_Apo;  ?>"  target="_blank" class="btn btn-primary" ><i class="fa fa-print"></i></a></td>                                                                                      
                                          
                                          <?php } ?>
                                        </td>
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
