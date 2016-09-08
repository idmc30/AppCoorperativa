<?php
error_reporting(0);
session_start(); 
require_once 'model/clases/menu.php';
   $menu = new Menu();
   $lmenu = $menu->listarMenuxUsuario($_SESSION['idRol']);
?>


 <!-- sidebar: style can be found in sidebar.less -->
   <aside class="main-sidebar">
        <section class="sidebar">
          <ul class="sidebar-menu">
            <li class="header">Menu de Navegacion</li>
              <?php echo $_SESSION['idRol'];?>

                <?php foreach ($lmenu as $menunav): ?>

                    <?php if (($menunav->idSub_Men)==null): ?>

                            <li class="treeview">
                              <a href="#">
                                <i class="fa fa-circle-o"></i> <span><?php echo utf8_encode($menunav->nombre_Men)?></span> <i class="fa fa-angle-left pull-right"></i>
                              </a>
                              <ul class="treeview-menu">
                                    <?php foreach ($lmenu as $menunav1): ?>
                                     <?php if (($menunav1->idSub_Men) == ($menunav->id_Men)): ?>
                                         <li><a href="<?php echo $menunav1->link_Men; ?>">
                                                <i class="fa fa-circle-o"></i><?php echo $menunav1->nombre_Men;?></a>
                                         </li>
                                        <?php endif ?>
                                     <?php endforeach ?>
                              </ul> 
                            </li>


                      <?php endif ?>

                <?php endforeach ?>

          </ul>
        </section>
        <!-- /.sidebar -->
   </aside>