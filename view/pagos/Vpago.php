<!DOCTYPE html>
<html  lang="es">
  <head>
    <meta charset="UTF-8">
    <title>P&aacutegina | Pago de Prestamos</title>
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
              Pagos
              <small>Operacion de Pagos de Prestamos</small>
            </h1>
            <ol class="breadcrumb">
              <!--<li><a href="#"><i class="fa fa-dashboard"></i>Mantenimiento</a></li>
              <li class="active">Zona Ubicación Geográfica</li>  -->
            </ol> 
          </section>
          <!-- Main content -->
          <section class="content">
            <div class="col-xs-3">

                <select class="form-control" id="cmbCliente"  name="cmbCliente">                        
                  <option style="display:none;" value=""  selected>Seleccione Socio</option>  
                        <?php  foreach ($lsocioa as $socio): ?>
                          
                           <option value="<?php echo $socio->id_Soc; ?>">
                           <?php echo $socio->apellidoPat_Soc." ".$socio->apellidoMat_Soc.", ".$socio->nombres_Soc;?></option>
                          <?php endforeach; ?>  
                 </select>
               </br>       
            </div>

                   <div class="row">
                        <div id="listaprestamosxsocio"> 
                        </div>
                   </div><!-- /.row -->

          </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<div class="modal fade bs-example-modal-lg" id="largo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myLargeModalLabel">Listado de Cuotas</h4>
        </div>
        <div class="modal-body">
          <div id="listadocuostas"></div>
        </div>
        <br><br><br>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
       
      </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="pagodetalle">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myLargeModalLabel">Pago de Cuota</h4>
        </div>
        <div class="modal-body">
           <form role="form">
              <div class="form-group">
                      <label>Nro de Credito</label>
                      <input class="form-control"  type="text" id="txtnrocredito" name="txtnrocredito" disabled="">
              </div>
              <div class="form-group">
                      <label>Socio</label>
                      <input class="form-control"  type="text" id="txtsocio" name="txtsocio" disabled="">
              </div>
              <div class="form-group">
                      <label>Monto Cuota</label>
                      <input class="form-control"  type="text" id="txtmontocuota" name="txtmontocuota" disabled="">
              </div>
              <div class="form-group">
                      <label>Efectivo</label>
                      <input class="form-control"  type="text" id="txtefectivo" name="txtefectivo" >
              </div>
              <div class="form-group">
                      <label>Vuelto</label>
                      <input class="form-control"  type="text" id="txtvuelto" name="txtvuelto" disabled="" >
              </div>
              <div class="form-group">
                    <button type="button" class="btn btn-success" id="btncalcular" name="btncalcular">Calcular</button>
              </div>
           </form>
        </div>
        <input type="hidden" id="txtidcuota" name="txtidcuota">
        <input type="hidden" id="txtidcontcredito" name="txtidcontcredito">
        <br><br>
         <div class="modal-footer clearfix">
            <button type="button" class="btn btn-primary" id="btnguardarpago" name="btnguardarpago">Guardar</button>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
         </div>
      </div><!-- /.modal-content -->
  </div>
</div>




<!-- jQuery 2.1.4 -->
     <script src="view/plugins/jQuery/jQuery-2.1.4.min.js"></script>
     <?php include "view/includes/footer.php";?>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->   
    <script src="view/scripts/bootbox.js"></script>
    <script src="view/scripts/pago.js"></script>
    <script src="view/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="view/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src='view/plugins/fastclick/fastclick.min.js'></script>
    <script src="view/dist/js/app.min.js" type="text/javascript"></script>
    <!-- Demo -->
    <script src="view/dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>