<!DOCTYPE html>
<html  lang="es">
  <head>
    <meta charset="UTF-8">
    <title>P&aacutegina | Reporte de Socios por Zona</title>
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
              Reporte de Socio por Zona
              <small>Listados de Socios por Zona</small>
            </h1>
            <ol class="breadcrumb">
              
            </ol> 
          </section>
          <!-- Main content -->
          <section class="content">
            <div class="col-xs-3">
                <select class="form-control" id="cmbZona"  name="cmbZona">                        
                  <option style="display:none;" value=""  selected>Seleccione Zona</option>  
                        <?php  foreach ($lzonas as $zona): ?>                          
                           <option value="<?php echo $zona->id_Zon; ?>">
                           <?php echo $zona->nombre_Zon." : ".$zona->descripcion_Zon;?></option>
                        <?php endforeach; ?>  
                 </select>                                               
                 </br>    
            <button type="button" class="btn btn-primary"  id="imprimirSocioxZona" name="imprimirSocioxZona">Imprimir</button>   
            </div>

                 <div class="col-xs-3">
                 <select class="form-control" id="cmbtipoContrato"  name="cmbtipoContrato">
                            <option value="0"  selected>Todos</option>                                               
                            <option value="A">Contrato de Ahorro</option>
                            <option value="C">Contrato de Credito</option>
                          
                 </select>


            </div>

            

                   <div class="row">
                        <div id="listarSociosxZona"> 
                        </div>
                   </div><!-- /.row -->

          </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<!-- jQuery 2.1.4 -->
     <script src="view/plugins/jQuery/jQuery-2.1.4.min.js"></script>
     <?php include "view/includes/footer.php";?>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->   
    <script src="view/scripts/bootbox.js"></script>
    <script src="view/scripts/reporteSocioxZona.js"></script>
    <script src="view/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="view/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src='view/plugins/fastclick/fastclick.min.js'></script>
    <script src="view/dist/js/app.min.js" type="text/javascript"></script>
    <script src="view/dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>