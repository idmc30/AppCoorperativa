<?php

// Make the page validate
ini_set('session.use_trans_sid', '0');

// Include the random string file
require 'rand.php';

// Begin the session
session_start();

// Set the session contents
$_SESSION['captcha_id'] = $str;

?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">

    <title>Login | Usuario</title>
    <?php include "view/includes/cabecera.php";?>

	<script src="view/jquery/jquery.js"></script>
	<script src="view/jquery/jquery.validate.js"></script>	
	<script src="view/captcha/captcha.js"></script>
	
	<style>
	img {
		border: 1px solid #eee;
	}
	p#statusgreen {
		font-size: 1.2em;
		background-color: #fff;
		color: #0a0;
	}
	p#statusred {
		font-size: 1.2em;
		background-color: #fff;
		color: #a00;
	}
	fieldset label {
		display: block;
	}
	fieldset div#captchaimage {
		float: left;
		margin-right: 15px;
	}
	fieldset input#captcha {
		width: 25%;
		border: 1px solid #ddd;
		padding: 2px;
	}
	fieldset input#submit {
		display: block;
		margin: 2% 0% 0% 0%;
	}
	#captcha.success {
		border: 1px solid #49c24f;
		background: #bcffbf;
	}
	#captcha.error {
		border: 1px solid #c24949;
		background: #ffbcbc;
	}
	</style>
</head>




<body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Valle la</b>Leche</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Inicio de Sesion</p>
        <form action="index.php?page=log&accion=login" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="usu"placeholder="Usuario"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="pass"placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>


          <div class="row">
            <div class="col-xs-8">    
                <div class="checkbox icheck">
                
                    <label class="col-sm-3 control-label">
                 <!-- <img src="captcha.php"></label> -->
                 
                   




<form id="captchaform" action="">
	
		<div id="captchaimage"><a href="<?php echo htmlEntities($_SERVER['PHP_SELF'], ENT_QUOTES); ?>" id="refreshimg" title="Click en la imagen para refrescar"><img src="view/captcha/images/image.php?<?php echo time(); ?>" width="135" height="45" alt="Captcha imagen"></a></div>
		
		<input type="text" maxlength="6" name="captcha" id="captcha">
		<input type="submit" name="submit" id="submit" value="Check">
	

		<div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
            </div><!-- /.col -->
          </div>
               

              


              </div>                        
            </div><!-- /.col -->




            
        </form>

        <div class="social-auth-links text-center">
          <p></p>
         
        </div><!-- /.social-auth-links -->

        <a href="#">Olvidó la contraseña</a><br>
        <a href="register.html" class="text-center"></a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="view/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="view/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="view/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>


</html>
