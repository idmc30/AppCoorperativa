<!DOCTYPE html>
<html  lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Pagina | Perfil Menú</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="view/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
   
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="view/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="view/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link href="view/dist/css/toastr.css" rel="stylesheet" type="text/css" />
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
              Perfil Menu
              <small>Asignacion de Menu a Perfil</small>
            </h1>
            <ol class="breadcrumb">
              <!--<li><a href="#"><i class="fa fa-dashboard"></i>Mantenimiento</a></li>
              <li class="active">Zona Ubicación Geográfica</li>  -->
            </ol> 
          </section>
          <!-- Main content -->
          <section class="content">
            <div class="col-xs-3">

                <select class="form-control" id="cmbPerfil"  name="cmbPerfil">                        
                   <option style="display:none;" value=""  selected>---Seleccione Perfil---</option>  
                        <?php  foreach ($lrol as $rol): ?>
                           <option value="<?php echo $rol->id_Rol; ?>">
                             <?php echo utf8_encode($rol->nombre_Rol)?></option>
                          <?php endforeach; ?>  
                 </select>
                       </br>  
                       <input type="hidden" id="codperfil" name="codperfil">
            </div>
              <div id="listamenusubmenu">
          </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

   
 
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
   
    <!-- jQuery 2.1.4 -->
    <script src="view/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <?php include "view/includes/footer.php";?>

    <script src="view/scripts/bootbox.js"></script>
    <script src="view/scripts/perfilmenu.js"></script>
    <script src="view/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="view/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src='view/plugins/fastclick/fastclick.min.js'></script>
    <script src="view/dist/js/app.min.js" type="text/javascript"></script>
    <!-- Demo -->
    <script src="view/dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>