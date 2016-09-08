<!DOCTYPE html>
<html  lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Pagina | Aporte Socio</title>
    <?php include "view/includes/cabecera.php";?>
    <link  rel="stylesheet" href="view/dist/css/datepicker.css">
   
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
              Aporte - Socio
              <small>Mantenimiento de Aporte de Socio por año</small>
            </h1>
           <!-- <ol class="breadcrumb">-->
              <!--<li><a href="#"><i class="fa fa-dashboard"></i>Mantenimiento</a></li>
              <li class="active">Zona Ubicación Geográfica</li>  -->
           <!-- </ol> -->
          </section>
          <!-- Main content -->
           <section class="content">
            <div class="box box-default">
                <div class="box-body">
                 
                 <div class="col-xs-2">
                  <select class="form-control" id="cboAnio"  name="cboAnio">  
                  <option style="display:none;" value="0"  selected>Seleccione Año </option>                      
                        <?php  foreach ($lanio as $anio): ?>
                          <option value="<?php echo $anio->id_Map."|".$anio->anio_Map; ?>">
                          <?php echo $anio->anio_Map; ?>
                         </option>                        
                       <?php endforeach; ?>  
                 </select>
               </div>
                  <div class="col-xs-3">
                    <select class="form-control" id="cboSocio"  name="cboSocio">                        
                           <option style="display:none;" value="0"  selected>Seleccione Socio</option>                          
                    </select>  
                  </div>
                </div>
              </div>
   
                        <div id="listasocio">
                       
                        </div>
           

          </section><!-- /.content -->  

 <!--<section class="content">
                <div class="col-xs-2">
                <label>Seleccione Año:</label>
                <select class="form-control" id="cboAnio"  name="cboAnio">                        
                        <?php  //foreach ($lanio as $anio): ?>
                          <option style="display:none;" value=""  selected>Seleccione Año</option>   <option value="<?php //echo $anio->anio_Map; ?>">
                           <?php //echo $anio->anio_Map; ?></option>
                          <?php //endforeach; ?>  
                 </select>
                 </div>

                   <div class="col-xs-4">
                          <label>Seleccione Socio:</label>
                         <select class="form-control" id="cboSocio"  name="cboSocio">                        
                           <option style="display:none;" value="0"  selected>Seleccione Socio</option>                          
                        </select>   

                   </div>
                   <div class="col-xs-4">
                    <label >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </label>
                  </br>
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMonto" id="btnMonto" name="btnMonto">Nuevo Aporte de Socio</button>   

                   </div>  
                   <div>
                     
                   </div>                            
                      <br/>
                   <div class="row">
                        <div id="listasocio"></div>
                  </div>--><!-- /.row -->
         <!-- </section>--><!-- /.content -->

         
 

         
      </div><!-- /.content-wrapper -->


<div class="modal fade" id="modalAporte" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Aporte de Socio</h4>
      </div>
      <div class="modal-body">
        <form  action="" method="post"  id="frmaporte" >

                    <div class="form-group">
                          <label>Datos del Socio:</label>
                            <input class="form-control" disabled="" placeholder="Socio..." maxlength="50" type="text" id="txtsocio" name="txtsocio">
                    </div>
                    <div class="form-group">
                          <label>Año de aporte:</label>
                            <input class="form-control" disabled="" placeholder="Año..." maxlength="4" type="text" id="txtanio" name="txtanio">
                    </div>
                    
                    <div class="form-group">
                          <label>Mes:</label>
                            <input class="form-control" disabled="" placeholder="Mes" maxlength="50" type="text" id="txtmes" name="txtmes">
                    </div>
                    <div class="form-group">
                          <label>Monto de aporte:</label>
                            <input class="form-control" disabled="" placeholder="Monto..." maxlength="50" type="text" id="txtmonto" name="txtmonto">
                    </div>

                    <div class="form-group">
                      <label>Fecha de Pago:</label>
                       <input class="form-control"  placeholder="Fecha de Pago  ..." type="text" id="textfecha" name="textfecha" >  
                    </div>                                                                     
         </form>  

      </div>
      <div class="modal-footer">
        <input type="hidden" id="codigoSocio">
        <input type="hidden" id="idMap">
        <input type="hidden" id="anioSel">
        <input type="hidden" id="idMes">
        <input type="hidden" id="idApo">
        
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnguardarAporte" name="btnguardarAporte">Guardar</button>
      </div>
    </div>
  </div>
</div>

    <script src="view/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <?php include "view/includes/footer.php";?>
    <script src="view/dist/js/bootstrap-datepicker.js"></script>
    <script src="view/scripts/bootbox.js"></script>
    <script src="view/scripts/aporte.js"></script>
    <script src="view/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="view/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src='view/plugins/fastclick/fastclick.min.js'></script>
    <script src="view/dist/js/app.min.js" type="text/javascript"></script>
    <script src="view/dist/js/demo.js" type="text/javascript"></script>

  </body>
</html>