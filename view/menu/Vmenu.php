<!DOCTYPE html>
<html  lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Pagina | Menu</title>
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
              Menú
              <small>Mantenimiento de Menu</small>
            </h1>
            <ol class="breadcrumb">
             <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Permisos</a></li>
              <li class="active">Menu</li>-->
            </ol>
          </section>


        <!-- Main content -->
          <section class="content">
            <div class="box box-default">
                 <div class="box-body">
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalmenu" id="nmenu" name="nmenu">Nuevo Menu</button>
                </div><!-- /.box-body -->
              </div>
                <div class="box box-default" id="listarmenu"></div>
          </section><!-- /.content -->
        
      </div><!-- /.content-wrapper -->
 
<div id="modalmenu" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Menu</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
                      <label>Nombre Menu:</label>
                      <input class="form-control" placeholder="Menu ..." type="text"  id="nommenu" name="nommenu" >
        </div>
        <div class="form-group">
                      <label>Descripcion</label>
                      <input class="form-control"  placeholder="Descripcion ..." type="text" id="desmenu" name="desmenu">
        </div>
        <div class="form-group">
                      <label>link</label>
                      <input class="form-control" placeholder="Url ..." type="text" id="linkmenu" name="linkmenu">
         </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="codupdatemenu">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnguardarmenu" name="btnguardarmenu">Guardar</button>
      </div>
    </div>

  </div>
</div>


<div id="modalsubmenu" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sub Menu</h4>
      </div>
      <div class="modal-body">
           <div class="form-group" id="ocultar">

                      <label>Nombre de Menu:</label>
                      <input class="form-control"  disabled="" type="text" id="nommenu2" name="nommenu2">
        </div>
        <div class="form-group">
                      <label>Nombre Sub-Menu:</label>
                      <input class="form-control" placeholder="Sub Menu ..." type="text" id="nomsubmenu" name="nomsubmenu">
        </div>
        <div class="form-group">
                      <label>Descripcion:</label>
                      <input class="form-control"  placeholder="Descripcion ..." type="text" id="submenudescrip" name="submenudescrip">
        </div>
        <div class="form-group">
                      <label>link</label>
                      <input class="form-control" placeholder="Url..." type="text" id="submenulink" neme="submenulink">
         </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="codimenupadre">
        <input type="hidden" id="codupdatesubmenu">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnguardarsubmenu" name="btnguardarsubmenu">Guardar</button>
      </div>
    </div>

  </div>
</div>


   <?php include "view/includes/modalcontrasena.php";?>
  <!-- jQuery 2.1.4 -->
    <script src="view/plugins/jQuery/jQuery-2.1.4.min.js"></script>

     <?php include "view/includes/footer.php";?>
 
      <!--Add the sidebars background. This div must be placed
           immediately after the control sidebar -->
    <script src="view/scripts/bootbox.js"></script>
    <script src="view/scripts/menu.js"></script>
    <script src="view/scripts/validador.js"></script>
 
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