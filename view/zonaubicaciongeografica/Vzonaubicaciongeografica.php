<!DOCTYPE html>
<html  lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Pagina | Zona Ubicaci&oacute;n Geográfica</title>
    <?php include "view/includes/cabecera.php";?>   

  </head>
  <body class="skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="index.php?page=panel&accion=panel" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>V</b>ALLE</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Valle la</b>LECHE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <?php include "view/includes/logo.php";?>
          </div>
        </nav>
      </header>
         
      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
    
           <?php include "view/includes/menunavegacion.php";?>
     



      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
         <section class="content-header">
            <h1>
              Zona - Ubicación Geográfica
              <small>Mantenimiento de Zona Ubicación Geográfica</small>
            </h1>
            <ol class="breadcrumb">
              <!--<li><a href="#"><i class="fa fa-dashboard"></i>Mantenimiento</a></li>
              <li class="active">Zona Ubicación Geográfica</li>  -->
            </ol> 
          </section>
          <!-- Main content -->
          <section class="content">
            <div class="col-xs-3">

                <select class="form-control" id="cmbZona"  name="cmbZona">                        
                        <?php  foreach ($lzona as $zona): ?>
                          <option style="display:none;" value=""  selected>Seleccione Zona</option>   <option value="<?php echo $zona->id_Zon; ?>">
                           <?php echo $zona->nombre_Zon . " - " . $zona->descripcion_Zon?></option>
                          <?php endforeach; ?>  
                 </select>
                       </br>  
                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalZug" id="nzug" name="nzug">Asignar Distrito a Zona</button>   
            </div>



                   <div class="row">
                        <div id="prueba">
                       
                        </div>
                      </div><!-- /.row -->

          </section><!-- /.content -->
        
 
      </div><!-- /.content-wrapper -->


<div class="modal fade" id="modalZug" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Asignar Distrito a Zona</h4>
      </div>
      <div class="modal-body">
        <form  action="" method="post"  id="frmzug" >

                    <div class="col-xs-8">
                          <label>Nombre Zona:</label>
                            <input class="form-control" disabled="" placeholder="Zona..." maxlength="50"
                              type="text" id="nombreZona" name="nombreZona">
                    </div>
                    </br></br></br>

                    <div class="col-xs-4">                            
                      <label>Departamento:</label>
                      
                        <select class="form-control" id="iddpto"  name="iddpto">
                         <?php  foreach ($ldepartamento as $dpto): ?>
                         <option style="display:none;" value="0"  selected>Departamento</option>   <option value="<?php echo $dpto->id_Uge; ?>">
                           <?php echo utf8_encode($dpto->nombre_Uge)?></option>
                           <?php endforeach; ?>  

                        </select>     
                    </div>

                    <div class="col-xs-4">                            
                      <label>Provincia:</label>
                      
                        <select class="form-control" id="idprovincia"  name="idprovincia">

                         <option style="display:none;" value="0" selected>Provincia</option>   
                         
                        </select>     

                   </div>
                  
                    <div class="col-xs-4">                            
                      <label>Distrito:</label>
                      
                        <select class="form-control" id="iddistrito"  name="iddistrito">
                        
                         <option style="display:none;" value="0"  selected>Distrito</option>   
                           
                       </select>   
                    </div>

                     
                                                                  
         </form>  

      </div>
</br></br></br>
      <div class="modal-footer">
        <input type="hidden" id="codigoDepartamento">
        <input type="hidden" id="codigoProvincia">
        <input type="hidden" id="codigoDistrito">
        <input type="hidden" id="codigoZona">
        <input type="hidden" id="codigoZug">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnguardarzug" name="btnguardarzug">Guardar</button>
      </div>
    </div>
  </div>
</div>




     <script src="view/plugins/jQuery/jQuery-2.1.4.min.js"></script>
     <?php include "view/includes/footer.php";?>
 
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
     
    <!-- jQuery 2.1.4 -->
    
    <script src="view/scripts/bootbox.js"></script>
    <script src="view/scripts/zonaubicaciongeografica.js"></script>
    <script src="view/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="view/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src='view/plugins/fastclick/fastclick.min.js'></script>
    <script src="view/dist/js/app.min.js" type="text/javascript"></script>
    <!-- Demo -->
    <script src="view/dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>