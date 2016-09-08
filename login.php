<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Coop. Valle laLeche | Inicio de Sesion</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="view/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="view/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="view/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Coop. Valle la</b>Leche</a>
      </div>
      <div class="login-box-body">
        <p class="login-box-msg"><b>Inicio de Sesi&oacute;n</b></p>
        <form action="index.php?page=log&accion=login" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="usu"placeholder="Ingresar Usuario"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="pass"placeholder="Ingresar Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>


          <div class="row">
            <div class="col-xs-8">    
                <div class="checkbox icheck">
                
                    <label class="col-sm-3 control-label">
                <img src="captcha.php"></label>

                <div class="col-sm-7">
                <input placeholder="Captcha..." maxlength="4" name="captcha" id="captcha" class="form-control" type="text"><p></p>
                </div>

              </div>                        
            </div>
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
            </div>
          </div>
        </form>

        <div class="social-auth-links text-center">
          <p></p>
         
        </div>

           <p>Olvid&oacute; la contrase&ntilde;a..? contactarse con la entidad</p>
        <a href="register.html" class="text-center"></a>

      </div>
    </div>

    <script src="view/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="view/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="view/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' 
        });
      });
    </script>
  </body>
</html>