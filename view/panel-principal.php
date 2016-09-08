  <?php 
  error_reporting(0);
  session_start();
  require_once 'model/clases/zonaubicaciongeografica.php';
   $zug = new ZonaUbicacionGeografica();
    $ldepartamento = $zug->listarDepartamento();
  ?>

<!DOCTYPE html>
<html  lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Pagina | Principal</title>
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
            Pagina Principal
            <small>Bienvenido</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Principal</a></li>
            <li class="active">Primera Pagina</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
         <div class="callout callout-info">
              <h4>Bienvenido!</h4>
              <p>Cooperativa Valle la Leche:.</p> 
            </div>
          </br>
          <?php 
                if ($_SESSION['tipo']=="S") {
                    echo "<h3><b>Datos Personales</b></h3> <br>";
                    echo "Apellidos Paterno ".$_SESSION['apellidoPat']."</br>";
                    echo "Apellidos Materno ". $_SESSION['apellidoMat']."</br>";
                    echo "Nombres: ".$_SESSION['nombres']."</br>";
                    echo "Direccion:".$_SESSION['direccionSoc']."</br>";
                    if ($_SESSION['telefonoSoc']!="") {
                    echo "Telefono: ".$_SESSION['telefonoSoc']."</br>";
                    } else {
                    echo "Telefono: No cuenta con telefono</br>";
                    }
                    if ($_SESSION['celularSoc']!="") {
                      echo "Celular: ".$_SESSION['celularSoc']."</br>";
                    } else {
                      echo "Celular: No cuenta con celular</br>";
                    }                
                    echo "Actualizar Datos: <a href='javascript:cambiarDatos(".$_SESSION['idSoc'].")'>Pulse aqui</a>";
                 } else {
                    echo "";
                   }
             
              ?>

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



      
     
    </div><!-- ./wrapper -->
        <?php include "view/includes/modalcontrasena.php";?>
    <!-- jQuery 2.1.4 -->
    <script src="view/plugins/jQuery/jQuery-2.1.4.min.js"></script>
 <?php include "view/includes/footer.php";?>
    <script src="view/scripts/panelprincipal.js"></script>
    <script src="view/scripts/toastr.js"></script>

    <!-- Bootstrap 3.3.2 JS -->
    <script src="view/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="view/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='view/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="view/dist/js/app.min.js" type="text/javascript"></script>
    
    <!-- Demo -->
    <script src="view/dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>