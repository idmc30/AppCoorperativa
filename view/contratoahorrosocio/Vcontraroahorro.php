<!DOCTYPE html>
<html  lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Pagina | Contrato de Ahorro</title>
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
              Contrato de Ahorro
              <small>Mantenimiento de Contato de Ahorro</small>
            </h1>
            <ol class="breadcrumb">
             <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Permisos</a></li>
              <li class="active">Menu</li>-->
            </ol>
          </section>


        <!-- Main content -->
          <section class="content">
            <div class="box box-default">
                 <!--<div class="box-body">
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalcontAhorro" id="nuevocontahorro" name="nuevocontahorro">Nuevo Contrato</button>
                </div>--><!-- /.box-body -->
              </div>
                
                <div class="row">
                 <div  id="listarcontratoahorro"></div>
           
               </div>
          </div><!-- /.row -->
          </section><!-- /.content -->
        
      </div><!-- /.content-wrapper -->
 
<div id="modalcontAhorro" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-file-text-o"></i> Contrato de Ahorro</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
                      <label>Fecha de Inicio:</label>
                       <input class="form-control"  placeholder="Fecha de Inicio  ..." type="text" id="textfechainicio" name="textfechainicio" >  
                     
        </div>
        <div class="form-group">
                      <label>Fecha Final</label>
                      <input class="form-control"  placeholder="Fecha Final de Contrato ..." type="text" id="textfechfinal" name="textfechfinal">
        </div>
        <div class="form-group">
                      <label>Monto Depositado</label>
                      <input class="form-control" placeholder="Monto depositado..." type="text" id="txtmontodespositado" name="txtmontodespositado" maxlength="12" onkeypress="return soloNumeroDecimales(event,this)">
         </div>
          <div class="form-group">
          <label>Tipo:</label>              
            <select class="form-control" id="cmbtipocontrato"  name="cmbtipocontrato">
             <option style="display:none;" value="0"  selected>Tipo de Contrato</option> 
                <option value="F">Plazo Fijo</option>
                <option value="L">Libre Disponibilidad</option>
            </select>  
         </div>
         <!--<div class="form-group">
                      <label>Trem:</label>
                      <input class="form-control" placeholder="Tasa de Retorno Efectiva Mensual ..." type="text" id="texttrem" name="texttrem" maxlength="15" onkeypress="return soloNumeroDecimales(event,this)">
         </div>-->
         <div class="form-group">
                      <label>Tem:</label>
                      <input class="form-control" placeholder="Tasa Efectiva Mensual ..." type="text" id="texttem" name="texttem" maxlength="15" disabled="">
         </div>
         <div class="form-group">
          <label>Socios:</label>              
            <select class="form-control" id="cmbsocio"  name="cmbsocio">
            <?php  foreach ($lsocio as $socio): ?>
             <option style="display:none;" value="0"  selected>Socios</option>   <option value="<?php echo $socio->id_Soc; ?>">
                           <?php echo utf8_encode(strtoupper($socio->apellidoPat_Soc ).' ' .strtoupper($socio->apellidoMat_Soc).', ' .strtoupper($socio->nombres_Soc))?></option>
                           <?php endforeach; ?>  
            </select>  
         </div>
         

      </div>
      <div class="modal-footer">
        <input type="hidden" id="textidcontrahorro">
        <input type="hidden" id="textidsocio">
        <input type="hidden" id="texttipo">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnguardarcontratoahorro" name="btnguardarcontratoahorro">Guardar</button>
      </div>
    </div>

  </div>
</div>



  <!-- jQuery 2.1.4 -->
   <script src="view/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="view/dist/js/main.js"></script>

     <?php include "view/includes/footer.php";?>
 
      <!--Add the sidebars background. This div must be placed
           immediately after the control sidebar -->
    <script src="view/scripts/bootbox.js"></script>
 
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
    <script src="view/dist/js/bootstrap-datepicker.js"></script>
    <script src="view/scripts/contratoahorrosocio.js"></script>


  </body>
</html>