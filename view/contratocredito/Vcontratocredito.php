<!DOCTYPE html>
<html  lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Pagina | Contrato de Credito</title>
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
              Contrato de Credito
              <small>Mantenimiento Cotrato de Credito</small>
            </h1>
           <!-- <ol class="breadcrumb">-->
              <!--<li><a href="#"><i class="fa fa-dashboard"></i>Mantenimiento</a></li>
              <li class="active">Zona Ubicación Geográfica</li>  -->
           <!-- </ol> -->
          </section>
          <!-- Main content -->
           <section class="content">
           
                        <div class="col-md-6">
                           <div class="box box-info">
                              <div class="box-header with-border">
                                <h3 class="box-title">Gestion de Prestamos</h3>
                                <div class="box-body">
                                  <div class="form-group">
                                      <label class="col-sm-3 control-label" style="width:11%;">
                                      <b>Cliente:</b></label>
                                      <div class="col-sm-9">
                                          <select class="form-control" id="cmbpersonal"  name="cmbpersonal">
                                             <option style="display:none;" value=""  selected>Socios</option> 
                                           <?php  foreach ($lsocio as $socio): ?>
                                            <option value="<?php echo $socio->id_Soc;?>">
                                             <?php echo strtoupper($socio->nombres_Soc ).' '.strtoupper($socio->apellidoPat_Soc).' ' .strtoupper($socio->apellidoMat_Soc);?></option>
                                             <?php endforeach; ?>  

                                         </select>     
                                      </div>                                    
                                  </div>
                                  </br></br>
                                  <div class="form-group">
                                    <label class="col-sm-4 control-label" style="width:20%";>
                                      <b><b>Credito:</b></b>
                                      </label>
                                      <div class="col-sm-4">
                                      <div class="input-group">
                                          <div class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                          </div>
                                          <input placeholder="Credito ..." id="credito" class="form-control" onkeypress="return soloNumeros(event)" type="text">
                                        </div>
                                      </div>                        
                                  </div>
                                    </br> </br>
                                   
                                 <div class="form-group">
                                      <label class="col-sm-5 control-label" style="width:20%";>
                                      <b><b>(TEA)Tasa Efectiva Anual:</b></b>
                                      </label>
                                     <div class="input-group">
                                     <div class="col-sm-7">
                                      <div class="input-group">
                                          <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                          </div>
                                            <?php  foreach ($ltea as $tea): ?>

                                             <!--<input placeholder="TEA ..." disabled="" value="52.87" id="tea" class="form-control" type="text">-->
                                                <input type="text" value="<?php echo $tea->valor_tas; ?>" id="tea" name="tea" class="form-control" disabled="";>
                                           <?php endforeach; ?> 
                                        </div>
                                      </div>    
                                      </div>                                            
                                </div>
                                </br>
                                <div class="form-group">
                                      <label class="col-sm-6 control-label" style="width:20%";>
                                      <b><b>N° Cuotas:</b></b>
                                      </label>
                                       <div class="col-sm-4">
                                         <select class="form-control" id="ncuotas">                                         
                                              <option value="">- -Cuotas - - </option>
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5">5</option>
                                              <option value="6">6</option>
                                              <option value="7">7</option>
                                              <option value="8">8</option>
                                              <option value="9">9</option>
                                              <option value="10">10</option>
                                              <option value="11">11</option>
                                              <option value="12">12</option>
                                              <option value="18">18</option>
                                              <option value="24">24</option>                                          
                                        </select>
                                      </div>              
                                   </div>
                                 <br> <br>
                                   <div class="form-group">
                                     <label class="col-sm-6 control-label" style="width:20%";>
                                      <b><b>Seguro desgravamen:</b></b>
                                      </label>
                                       <div class="input-group">
                                     <div class="col-sm-6">
                                      <div class="input-group">
                                          <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                          </div>
                                          <input id="desgravamen" value="0.0598" disabled="" class="form-control" type="text">
                                        </div>
                                      </div>    
                                      </div>                                                                            
                                </div>
                                
                                 <!--<div class="form-group">
                                     <label class="col-sm-6 control-label" style="width:20%";>
                                      <b><b>Tasa ITF:
                                     </label>-->
                                     <!--  <div class="input-group">
                                     <div class="col-sm-7">
                                          <div class="input-group">
                                              <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                              </div>-->
                                               <?php  foreach ($litf as $ITF): ?>
                                                <!--<input id="itf" value="0.005" disabled="" class="form-control" type="hidden">-->
                                                   <input type="hidden" value="<?php echo $ITF->valor_tas; ?>" id="itf" name="itf" class="form-control" disabled="";>


                                               <?php endforeach; ?> 
                                            <!--</div>
                                          </div>    
                                      </div>                                                                            
                                </div>-->
                                 <br>
                                <div class="form-group">
                                     <label class="col-sm-6 control-label" style="width:20%";>
                                      <b><b>Fecha de Inicio:
                                     </label>
                                       <div class="input-group">
                                     <div class="col-sm-8">
                                          <div class="input-group">
                                              <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                              </div>
                                              <input  id="fechainicio" class="form-control" disabled  value="<?php echo date("Y-m-d ", time());?>" type="text">
                     
                                            </div>
                                          </div>    
                                      </div>                                                                            
                                </div>
                                  <div class="form-group">                                  
                                     <div class="col-sm-8">
                                              <input value="Registrar" class="btn btn-red" style="background: rgb(248, 152, 152)" id="btnguardarPrestamo" name="btnguardarPrestamo"> 
                                     </div>                                                                                                          
                                </div>
                                  <div class="form-group">                                  
                                     <div class="col-sm-4">
                                             <button type="button" class="btn btn-info" id="visualizarsprestamo" name="visualizarsprestamo"><i class="fa fa-eye">Visualizar</i></button>
                                     </div>                                                                                                          
                                </div>

                           </div> 
                        </div>
                       </div> 
                    </div>
                      
                     
                        <div id="muestracuotas" class="col-md-6"></div>                        
              </div>
           </div>
          </section><!-- /.content -->          
      </div><!-- /.content-wrapper -->


<div class="modal fade" id="modalAporte" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Aporte de Socio</h4>
      </div>
      <div class="modal-body">
        <form  action="" method="post"  id="frmaporte" >

                    <div class="form-group">
                          <label>Datos del Socio:</label>
                            <input class="form-control" disabled="" placeholder="Socio..." maxlength="50" type="text" id="txtsocio" name="txtsocio">
                    </div>
                    <div class="form-group">
                          <label>Año de aporte:</label>
                            <input class="form-control" disabled="" placeholder="Año..." maxlength="4" type="text" id="txtanio" name="txtanio">
                    </div>
                    
                    <div class="form-group">
                          <label>Mes:</label>
                            <input class="form-control" disabled="" placeholder="Mes" maxlength="50" type="text" id="txtmes" name="txtmes">
                    </div>
                    <div class="form-group">
                          <label>Monto de aporte:</label>
                            <input class="form-control" disabled="" placeholder="Monto..." maxlength="50" type="text" id="txtmonto" name="txtmonto">
                    </div>

                    <div class="form-group">
                      <label>Fecha de Pago:</label>
                       <input class="form-control"  placeholder="Fecha de Pago  ..." type="text" id="textfecha" name="textfecha" >  
                    </div>                                                                     
         </form>  

      </div>
      <div class="modal-footer">
        <input type="hidden" id="codigoSocio">
        <input type="hidden" id="idMap">
        <input type="hidden" id="anioSel">
        <input type="hidden" id="idMes">
        <input type="hidden" id="idApo">
        
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnguardarAporte" name="btnguardarAporte">Guardar</button>
      </div>
    </div>
  </div>
</div>

    <script src="view/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <?php include "view/includes/footer.php";?>
    <script src="view/dist/js/bootstrap-datepicker.js"></script>
    <script src="view/scripts/bootbox.js"></script>
    <script src="view/scripts/contratocredito.js"></script>                            
    <script src="view/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="view/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src='view/plugins/fastclick/fastclick.min.js'></script>
    <script src="view/dist/js/app.min.js" type="text/javascript"></script>
    <script src="view/dist/js/demo.js" type="text/javascript"></script>

  </body>
</html>