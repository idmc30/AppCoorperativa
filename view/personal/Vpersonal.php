<!DOCTYPE html>
<html  lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Pagina | Personal</title>
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
              Personal
              <small>Mantenimiento de Personal</small>
            </h1>
            <ol class="breadcrumb">
             <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Mantenimiento</a></li>
              <li class="active">Personal</li>-->
            </ol>
          </section>


        <!-- Main content -->
          <section class="content">
            <div class="box box-default">
                <div class="box-body">
                 <button type="button" class="btn btn-primary" id="modal" name="modal">Nuevo Personal</button>
                </div><!-- /.box-body -->
              </div>
               
          <div class="row">
            <div id="prueba">
           
            </div>
          </div><!-- /.row -->

          </section><!-- /.content -->
        
      </div><!-- /.content-wrapper -->
 
<div class="modal fade" id="modalpersonal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                        <h4 class="modal-title"><i class="fa  fa-child"></i>     Personal</h4>
                    </div>
                   
                    <form  action="" method="post">
                      <div class="modal-body">
                          <div class="form-group">
                            
                             <label>Nombres:</label>
                              <input class="form-control" placeholder="Nombres ..." type="text" id="nompersonal" name="nompersonal" maxlength=50 onkeypress="return soloLetras(event)">
                          </div>
                          <div class="form-group">
                             <label>Apellido Paterno:</label>
                              <input class="form-control" placeholder="Apellido Paterno ..." type="text" id="apepat" name="apepat" maxlength=50 onkeypress="return soloLetras(event)">
                          </div>
                          <div class="form-group">
                            
                             <label>Apellido Materno:</label>
                              <input class="form-control" placeholder="Apellido Materno ..." type="text" id="apemat" name="apemat" maxlength=50 onkeypress="return soloLetras(event)">
                          </div>
                           <div class="form-group">
                             <label>Dni:</label>
                              <input class="form-control" placeholder="Dni ..." maxlength="8" type="text" id="dnipersonal" name="dnipersonal" onkeypress="return soloNumeros(event)">
                          </div>
                             <div class="form-group">
                             <label>Telefono:</label>
                              <input class="form-control" placeholder="Telefono ..." type="text" id="telefpersonal" name="telefpersonal" maxlength=6  onkeypress="return soloNumeros(event)">
                          </div>
                           <div class="form-group">
                             <label>Celular:</label>
                              <input class="form-control" placeholder="Celular ..." type="text" id="celupersonal" name="celupersonal" maxlength=9 onkeypress="return soloNumeros(event)">
                          </div>
                          <div class="form-group">
                          <label for="exampleInputEmail1">Correo</label>
                          <input class="form-control" id="exampleInputEmail1" placeholder="Ingresar Email" type="email" maxlength=50>
                        </div>
                            <input type="hidden" id="codigopersonal">

                        <div class="modal-footer clearfix">
                            <button type="button" class="btn btn-primary" id="btnguardarpersonal">Guardar</button>
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
    <script src="view/scripts/personal.js"></script>
    <script src="view/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="view/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src='view/plugins/fastclick/fastclick.min.js'></script>
    <script src="view/dist/js/app.min.js" type="text/javascript"></script>
    <!-- Demo -->
    <script src="view/dist/js/demo.js" type="text/javascript"></script>

 
  </body>
</html>