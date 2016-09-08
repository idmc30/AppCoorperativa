<?php error_reporting(0);?>
    <div class="row">
      <div class="col-xs-12">
       <div class="box">
                    <div class="box-header">
                  <h3 class="box-title">Listado de Menu</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Activar</th>
                        <th>N°</th>
                        <th>Nombre-Menu</th>
                        <th>Descripcion</th>
                        <th>Direccion</th>
                        <th>Nivel</th>                       
                      </tr>
                    </thead>
                    <tbody>
                       <?php $c=1; ?>
                       <?php $d=1; ?>
                         <?php  foreach ($lmenu as $menu): ?>
                             <tr id="<?php echo $menu->id_Men; ?>">
                              <?php  $comprobarperfilrol = $perfilmenu->estadoCheckMenuPerfil($codiperfil, $menu->id_Men)?>
                                <?php if ($comprobarperfilrol): ?>
                                    <td><input id="asignarMenu" name="asignarMenu" data-idmenysubmen="<?php echo $menu->id_Men; ?>" class="agregarMenu" type="checkbox" checked></td>
                                <?php else: ?>
                                     <td><input id="asignarMenu" name="asignarMenu" data-idmenysubmen="<?php echo $menu->id_Men; ?>" class="agregarMenu" type="checkbox"></td>
                                <?php endif ?>                                        

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
                                              <td>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $menu->nombre_Men; ?></td>
                                           <?php endif ?>
                                        <td> <?php echo $menu->detalle_Men; ?></td>
                                        <td> <?php echo $menu->link_Men; ?></td>
                                           <?php if ($menu->idSub_Men==NULL): ?>
                                              <td> <?php echo "<b>Menu</b>" ?></td>
                                            <?php else: ?>
                                              <td> <?php echo "<b>Sub-Menu</b>" ?></td>
                                            <?php endif ?>                                    
                                      
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
