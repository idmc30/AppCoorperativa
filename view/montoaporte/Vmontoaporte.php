<!DOCTYPE html>
<html  lang="es">
  <head>

    <meta charset="UTF-8">
    <title>Pagina | Monto de Aporte</title>
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
              Aportes
              <small>Mantenimiento de Monto de Aporte</small>
            </h1>
            <ol class="breadcrumb">
             <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Principal</a></li>
              <li class="active">Primera Pagina</li>-->
            </ol>
          </section>


        <!-- Main content -->
          <section class="content">
            <div class="box box-default">
                <div class="box-body">
                 <button type="button" class="btn btn-primary" id="modal" name="modal">Insertar Monto Aporte</button>
                </div><!-- /.box-body -->
              </div>
                <div class="box box-default" id="listamontoaporte"></div>
          </section><!-- /.content -->
                       

      </div><!-- /.content-wrapper -->
 
<div class="modal fade" id="montoApor" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                        <h4 class="modal-title"><i class="fa  fa-comment-o"></i>Ingrese Monto de Aporte:</h4>
                    </div>
                   
                    <form  action="" method="post"  id="frmmontoaporte" enctype="multipart/form-data">
                      <div class="modal-body">
                          <div class="form-group">                            
                             <label>Año de aporte:</label>
                             <input class="form-control" placeholder="Año ..." type="text" id="anio" name="anio" maxlength="4" onkeypress="return soloNumeros(event)">
                             <label>Monto de Aporte:</label>
                             <input class="form-control" placeholder="Monto ..." type="text" id="montoaporte" name="montoaporte" maxlength="15" onkeypress="return soloNumeroDecimales(event,this)">
                          </div>
                            <input type="hidden" id="codigomontoaporte">

                        <div class="modal-footer clearfix">
                            <button type="button" class="btn btn-primary" id="btnguardarmontoaporte">Guardar</button>
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        </div>
                      </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
        
    <script src="view/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <?php include "view/includes/footer.php";?>
 
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
     
    <!-- jQuery 2.1.4 -->
    
    <script src="view/scripts/bootbox.js"></script>
    <script src="view/scripts/montoaporte.js"></script>
    <script src="view/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="view/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="view/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

    <script src="view/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src='view/plugins/fastclick/fastclick.min.js'></script>
    <script src="view/dist/js/app.min.js" type="text/javascript"></script>
    <!-- Demo -->
    <script src="view/dist/js/demo.js" type="text/javascript"></script>

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
  </body>
</html>