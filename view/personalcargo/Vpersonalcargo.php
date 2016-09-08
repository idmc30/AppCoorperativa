<!DOCTYPE html>
<html  lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Pagina | PersonalCargo</title>
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
              Personal y Cargos
              <small>Mantenimiento de Personal Cargo</small>
            </h1>
            <ol class="breadcrumb">
            <!--  <li><a href="#"><i class="fa fa-dashboard"></i>Mantenimientos</a></li>
              <li class="active">Personal Cargos</li>-->
            </ol>
          </section>


        <!-- Main content -->
          <section class="content">
            <div class="box box-default">
                <div class="box-body">
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="npecargo" name="npecargo">Nuevo-PCargo</button>
                </div><!-- /.box-body -->
              </div>
                   <div class="row">
                        <div id="prueba">
                       
                        </div>
                      </div><!-- /.row -->

          </section><!-- /.content -->
        
 
      </div><!-- /.content-wrapper -->


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Cargo Personal</h4>
      </div>
      <div class="modal-body">
        <form  action="" method="post"  id="frmsustentoxmetas" >
                    <div class="col-xs-8">                            
                      <label>Cargos:</label>
                       <select class="form-control" id="idcargos"  name="idcargos">
                         <?php  foreach ($lcargo as $cargos): ?>
                         <option style="display:none;" value="0"  selected>Seleccionar Cargos</option>   <option value="<?php echo $cargos->id_Cargo; ?>">
                           <?php echo utf8_encode($cargos->nombre_Car)?></option>
                           <?php endforeach; ?>  

                       </select>                                  

                          </div>

                       <div class="col-xs-4">
                          <label>DNI del Personal:</label>
                            <input class="form-control" placeholder="DNI ..." maxlength="8"
                              type="text" id="dnipersonal" name="dnipersonal">
                       </div>
                     </br>
                        <div class="form-group">
                             <label>Datos Personal:</label>
                            <input class="form-control" disabled="" placeholder="Datos del Personal ..." 
                              type="text" id="datospersonal" name="datospersonal">                        
                          </div>                                             
         </form>                 
      </div>
      <div class="modal-footer">
        <input type="hidden" id="codigopersonal">
        <input type="hidden" id="codigocargo">
        <input type="hidden" id="codigocargopersonal">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnguardarpca" name="btnguardarpca">Guardar</button>
      </div>
    </div>
  </div>
</div>
    <script src="view/plugins/jQuery/jQuery-2.1.4.min.js"></script>

     <?php include 'view/includes/modalcontrasena.php'; ?>
     <?php include "view/includes/footer.php";?>
 
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
     
    <!-- jQuery 2.1.4 -->

    <script src="view/scripts/bootbox.js"></script>
    <script src="view/scripts/personalcargo.js"></script>
    <script src="view/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="view/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src='view/plugins/fastclick/fastclick.min.js'></script>
    <script src="view/dist/js/app.min.js" type="text/javascript"></script>
    <!-- Demo -->
    <script src="view/dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>