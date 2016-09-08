  <?php 
  error_reporting(0);
  session_start();
  ?>
<ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="view/dist/img/VictorEnrique160x160.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php  
                                            
                                            if ($_SESSION['tipo']=="S") {
                                               echo "Tipo de Usuario: Socio";
                                            } else {
                                              echo "Tipo de Usuario: Personal";
                                            }
                                            ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="view/dist/img/VictorEnrique160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $_SESSION['nombres'] ."  ".$_SESSION['apellidoPat']." ".$_SESSION['apellidoMat'] ;?>
                      <small> <?php 
                                 if ($_SESSION['nombreCar']) {
                                   echo "<b>PERFIL: ".$_SESSION['nombreRol']."</b>";
                                    echo "<br>";
                                    echo "<b>".$_SESSION['nombreCar']."</b>";
                                 } else {
                                     echo "<b>PERFIL: ".$_SESSION['nombreRol']."</b>";
                                      
                                 }
                      ?>
                      </small>
                      <input type="hidden" id="idgUsu" name="idgUsu" value="<?php echo $_SESSION['idUsu']; ?>">
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                   

                     <a href="#"  class="btn btn-default btn-flat" data-toggle="modal" data-target="#modalcambiopass" id="pass" name="pass">Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="index.php?page=log&accion=cerrar" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <input type="hidden" value="<?php echo $_SESSION['idUsu'];?>" id="textcodusu" name="textcodusu">
              <input type="hidden" value="<?php echo $_SESSION['idSoc']; ?>" id="txtcodsoc" name="txtcodsoc"> 
              <input type="hidden" value="<?php echo $_SESSION['mesSoc']; ?>" id="txtmessoc" name="txtmessoc"> 
              <input type="hidden" value="<?php echo $_SESSION['anioSoc']; ?>" id="txtaniosoc" name="txtaniosoc"> 
              <li>
                <!--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->
              </li>
            </ul>








