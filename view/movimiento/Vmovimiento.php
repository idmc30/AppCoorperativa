<!DOCTYPE html>
<html  lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Pagina | Movimiento</title>
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
              Socios-Movimiento
              <small>Operaciones de Movimiento</small>
            </h1>
            <ol class="breadcrumb">
              <!--<li><a href="#"><i class="fa fa-dashboard"></i>Mantenimiento</a></li>
              <li class="active">Zona Ubicación Geográfica</li>  -->
            </ol> 
          </section>
          <!-- Main content -->
          <section class="content">
              <div class="col-xs-3">

                <select class="form-control" id="cmbtipoContrato"  name="cmbtipoContrato">
                 <option style="display:none;" value="0"  selected>Seleccione tipo de Contrato 
                 </option>                                               
                            <option value="F">Plazo Fijo</option>
                            <option value="L">Libre Disponibilidad</option>
                          
                 </select>
                </br>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modamovimiento" id="nmovimiento" name="nmovimiento">Nuevo Movimiento</button>       
                </div>
                <input type="hidden" id="txttipocontrato" name="txttipocontrato">

            <div class="col-xs-5">

                <select class="form-control" id="cmbMovimiento"  name="cmbMovimiento">
                    <option style="display:none;" value="0"  selected>Seleccione Numero de Cuenta - Socio</option>                         
                 </select>
                 <br/>                   
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12" id="informacion" name="informacion">
                     
              </div>
              <br/>
           <div class="row">
                        <div id="lmovimiento"></div>
                  </div><!-- /.row -->

          </section><!-- /.content -->
        
 
      </div><!-- /.content-wrapper -->


<div class="modal fade" id="modamovimiento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa  fa-money"></i> Nuevo Movimiento</h4>
      </div>
      <div class="modal-body">
        <form  action="" method="post">
                    <div class="form-group">
                      <label>Tipo de Movimiento</label>
                      <select class="form-control" id="cmbTipoMovimiento"  name="cmbTipoMovimiento">
                        <option style="display:none;" value="0"  selected>SELECCIONE TIPO DE MOVIMIENTO</option>
                        <option value="D">DEPOSITO</option>
                        <option value="R">RETIRO</option>
                      </select>
                    </div>
          
                    <div class="form-group">
                      <label>Monto</label>
                      <input type="text" id="textmonto" name="textmonto" onkeypress="return soloNumeroDecimales(event,this)">
                    </div>                                                                         
         </form>  

      </div>
</br></br></br>
      <div class="modal-footer">
        <input type="hidden" id="texttipomovimiento" name="texttipomovimiento">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnguardarMovimiento" name="btnguardarMovimiento">Guardar</button>
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
     <script src="view/scripts/validador.js"></script>
    <script src="view/scripts/movimiento.js"></script>
    <script src="view/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="view/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src='view/plugins/fastclick/fastclick.min.js'></script>
    <script src="view/dist/js/app.min.js" type="text/javascript"></script>
    <!-- Demo -->
    <script src="view/dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>