<!DOCTYPE html>
<html  lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Pagina | Socio</title>
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
              Socios
              <small>Mantenimiento de Socio</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i>Mantenimientos</a></li>
              <li class="active">Socio</li>
            </ol>
          </section>


        <!-- Main content -->
          <section class="content">
            <div class="box box-default">
                <div class="box-body">
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalsocio" id="nsocio" name="nsocio">Nuevo Socio</button>
                </div><!-- /.box-body -->
              </div>
                   <div class="row">
                        <div id="listasocio">
                       
                        </div>
                      </div><!-- /.row -->

          </section><!-- /.content -->
        
 
      </div><!-- /.content-wrapper -->


<div class="modal fade" id="modalsocio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Socio</h4>
      </div>
      <div class="modal-body">
     <form  action="" method="post"  id="frmzug" >
                  <div class="form-group">
                      <label>Nombres:</label>
                      <input class="form-control" placeholder="Nombres ..." type="text" id="nomsocio" name="nomsocio" maxlength=50 onkeypress="return soloLetras(event)">
                    </div>

                   <div class="form-group">
                      <label>Apellido Paterno:</label>
                      <input class="form-control" placeholder="Apellidos Paterno..." type="text" id="appatsocio" name="appatsocio" maxlength=50 onkeypress="return soloLetras(event)">
                    </div>

                     <div class="form-group">
                      <label>Apellido Materno:</label>
                      <input class="form-control" placeholder="Apellido Materno ..." type="text" id="apmatsocio" name="apmatsocio" maxlength=50 onkeypress="return soloLetras(event)">
                    </div>

                   <div class="form-group">
                      <label>Dni:</label>
                      <input class="form-control" placeholder="Dni ..." type="text" id="dnisocio" name="dnisocio" maxlength="8" onkeypress="return soloNumeros(event)"> 
                    </div>
                    <div class="form-group">
                      <label>Resolucion de Aprobacion:</label>
                      <input class="form-control" placeholder="Resolucion ..." type="text" id="resolsocio" name="resolsocio"> 
                    </div>

                     <div class="col-xs-4">                            
                      <label>Departamento:</label>
                      
                     <select class="form-control" id="dpto"  name="dpto">
                        
                        <option style="display:none;" value="0" selected>Departamento</option>
                        <?php  foreach ($ldepartamento as $dpto): ?>                                                        
                            <option value="<?php echo $dpto->id_Uge; ?>"><?php echo utf8_encode($dpto->nombre_Uge)?></option>
                        <?php endforeach; ?>  

                        </select>     
                    </div>

                    <div class="col-xs-4">                            
                      <label>Provincia:</label>
                      
                        <select class="form-control" id="provincia"  name="provincia">

                         <!--<option style="display:none;" value="0" selected>Provincia</option>   -->
                         
                        </select>     

                   </div>
                  
                    <div class="col-xs-4">                            
                      <label>Distrito:</label>
                      
                        <select class="form-control" id="distrito"  name="distrito">
                        
                        <!-- <option style="display:none;" value="0"  selected>Distrito</option> -->
                           
                       </select>   
                    </div>
                  <div class="form-group">
                      <label>Direccion</label>
                      <input class="form-control" placeholder="Direccion ..." type="text" id="dirsocio" name="dirsocio">
                    </div> 
                     <div class="form-group">
                      <label>Telefono</label>
                      <input class="form-control" placeholder="Telefono ..." type="text" id="telefsocio" name="telefsocio" maxlength=6 onkeypress="return soloNumeros(event)" >
                    </div>
                     <div class="form-group">
                      <label>Celular</label>
                      <input class="form-control" placeholder="Celular ..." type="text" id="celusocio" name="celusocio"  maxlength=9 onkeypress="return soloNumeros(event)">
                    </div> 
                     <div class="form-group">
                      <label>Email</label>
                      <input class="form-control" placeholder="Email ..." type="text" id="emailsocio" name="emailsocio">
                    </div>                                             
         </form>                 
      </div>
      <div class="modal-footer">
        <input type="hidden" id="codigopersonal">
        <input type="hidden" id="codigocargo">
        <input type="hidden" id="codigocargopersonal">
        <input type="hidden" id="codigodistritosocio">
        <input type="hidden" id="soccodigo">


        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnguardarsocio" name="btnguardarsocio">Guardar</button>
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
    <script src="view/scripts/socio.js"></script>
    <script src="view/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="view/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src='view/plugins/fastclick/fastclick.min.js'></script>
    <script src="view/dist/js/app.min.js" type="text/javascript"></script>
    <!-- Demo -->
    <script src="view/dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>