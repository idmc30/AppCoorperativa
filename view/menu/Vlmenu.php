    <div class="row">
      <div class="col-xs-12">
       <div class="box">
                    <div class="box-header">
                  <h3 class="box-title">Estructura del Menú</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>N°</th>
                        <th>Nombre-Menu</th>
                        <th>Descripcion</th>
                        <th>Direccion</th>
                        <th>Nivel</th>
                        <th>Estado</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Agregar</th>
                        <th>Estado</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                       <?php $c=1; ?>
                       <?php $d=1; ?>
                         <?php  foreach ($lmenu as $menu): ?>
                             <tr id="<?php echo $menu->id_Men; ?>">
                             	            <?php $submenu=$menu->idSub_Men;?>
			                               <?php if ($menu->idSub_Men==NULL): ?>
			                                     <?php $d=1; ?> 
			                                 	 <td> <?php echo "<b>".$c."</b>";?></td>
			                                 	   <?php $c=$c+1 ?>  
			                               <?php else: ?>
			                                        <?php $c=$c-1 ?>
			                                          <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "<b>".$c.".".$d."</b>";?></td>
			                                        <?php if ($submenu==$menu->idSub_Men): ?>
						                                 	   <?php $d=$d+1 ?> 
						                                 	   <?php $c=$c+1 ?>  
			                                   				                                 	   
			                                        <?php endif ?>
			                                 	  
			                               <?php endif ?>
			                                    
                                           <?php if ($menu->idSub_Men==NULL): ?>
                                               <td> <?php echo $menu->nombre_Men; ?></td>
                                           <?php else: ?>
                                           	  <td> 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $menu->nombre_Men; ?></td>
                                           <?php endif ?>
                                        <td> <?php echo $menu->detalle_Men; ?></td>
                                        <td> <?php echo $menu->link_Men; ?></td>
                                           <?php if ($menu->idSub_Men==NULL): ?>
                                            	<td> <?php echo "<b>Menu</b>" ?></td>
                                            <?php else: ?>
                                            	<td> <?php echo "<b>Sub-Menu</b>" ?></td>
                                            <?php endif ?>

                                        <?php if ($menu->estado_Men=="A"): ?>
                                        <td><span class="label label-success">Activo</span></td>
                                        <?php else: ?>
                                        <td><span class="label label-danger">Inactivo</span></td>
                                        <?php endif ?>                                                       
                                        <td> <button type="button" class="btn btn-default" onclick="editarMenuySubMenu('<?php echo $menu->id_Men;?>')"><i class="fa fa-pencil"></i></button></td>
                                        <td><button type="button" class="btn btn-default"  onclick="eliminarMenuySubMenu('<?php echo $menu->id_Men;?>')"><i class="fa fa-close"></i></button></td>
                                         <?php if ($menu->idSub_Men==NULL): ?>
                                        <td><button type="button" class="btn btn-default" onclick="asignarMenu(<?php echo $menu->id_Men;?>)"data-toggle="modal" data-target="#modalsubmenu"><i class="fa fa-plus-circle"></i></button></td> 	
                                         <?php else: ?>
                                       	<td></td>
                                         <?php endif ?>
                                        <td><input id="estadoMenu" name="estadoMenu" data-idmenysubmen="<?php echo $menu->id_Men; ?>" class="activarMenus" type="checkbox" <?php if ($menu->estado_Men=="A"): ?>
                                            checked
                                          <?php else: ?>
                                            
                                          <?php endif ?> ></td>

                                      </tr>

                      
                         <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
      </div><!-- /.col -->
       </div>
