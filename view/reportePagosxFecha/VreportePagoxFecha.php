<!DOCTYPE html>
<html  lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Pagina | Reporte Pago-Fecha</title>
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
              Reporte de Pagos por Fecha
              <small>Lista de pagos realizados por fecha</small>
            </h1>
            <ol class="breadcrumb">
              <!--<li><a href="#"><i class="fa fa-dashboard"></i>Mantenimiento</a></li>
              <li class="active">Zona Ubicación Geográfica</li>  -->
            </ol> 
          </section>
          <!-- Main content -->
             </br>
            <div class="col-xs-3">
                    <div class="form-group">
                       <input class="form-control" placeholder="Fecha de Inicio  ..." type="text" id="textfechainicio" name="textfechainicio">  
                     </div>
                   </br>
                     <button type="button" class="btn btn-primary"  id="nmovimiento" name="nmovimiento">Consultar</button>
               <button type="button" class="btn btn-primary"  id="impsocccr" name="impsocccr">Imprimir</button>

                                
                </div>
                 <div class="col-xs-3">
                     <div class="form-group">
                      <input class="form-control" placeholder="Fecha Final de Contrato ..." type="text" id="textfechfinal" name="textfechfinal">
                     </div>
                   
               

                  </div>   
                </br>
          <section class="content">
            <div class="row">
              <!--<button type="button" class="btn btn-primary"  id="nmovimiento" name="nmovimiento">Consultar</button>
               <button type="button" class="btn btn-primary"  id="impsocccr" name="impsocccr">Imprimir</button>-->
            </div>
                <input type="hidden" id="txttipocontrato" name="txttipocontrato">

          
                <!--<div class="col-md-3 col-sm-6 col-xs-12" id="informacion" name="informacion">
                     
              </div>-->
              <br/>
           <div class="row">
                        <div id="lreportePagofecha"></div>
                  </div><!-- /.row -->

          </section><!-- /.content -->
        
 
      </div><!-- /.content-wrapper -->


     <script src="view/plugins/jQuery/jQuery-2.1.4.min.js"></script>
     <?php include "view/includes/footer.php";?>
 
       <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
     
    <!-- jQuery 2.1.4 -->
    <script src="view/scripts/bootbox.js"></script>
     <script src="view/scripts/validador.js"></script>
     <script src="view/dist/js/bootstrap-datepicker.js"></script>
      <script src="view/scripts/reportePagoFecha.js"></script>
    <script src="view/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="view/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src='view/plugins/fastclick/fastclick.min.js'></script>
    <script src="view/dist/js/app.min.js" type="text/javascript"></script>
    <!-- Demo -->
    <script src="view/dist/js/demo.js" type="text/javascript"></script>
      
  </body>
</html>