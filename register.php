<!DOCTYPE html>
<HTML lang ="es">
  <head>
    <?php include "_navbar.php" ?>
      <meta charset="utf-8">
        <title> Seyda || Registrarse </title>
        <meta name = "description" content ="Tienda de pulseras y accesorios">
        <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0, maximum-scale= 1.0, minimum-scale=1.0">
        <link rel ="stylesheet" href="css/style.css"/>
        <link rel ="stylesheet" href="js/javascript.js"/>
        <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <body>
  <div>&nbsp;
    <center>
      <div class ="bg-text">&nbsp;
        <h1>
          Registrarse
        </h1><hr>
          <img src="src/seyda.png" style ="width:20%; max-width:100px"/>
            <div>
            </div>
                <form id="signupForm" method="post" action="api/signup.php">
                Usuario:
                <input type="text" class="form-control" name="username" id="username" title= "Ingresa tu nombre de usuario" placeholder="Nombre de usuario" minlength="8" maxlength="12" required onchange='check();'>
                <p id = "msguser"></p>
                Contrase&ntilde;a:
                <input type="password" class="form-control" name="password" id="password" title= "Ingresa tu contrase&ntilde;a" placeholder="Contrase&ntilde;a" minlength="8" required onkeyup='check();'>
                Repita su contrase&ntilde;a:
                <input type="password" class="form-control" name="confirm_password" id="confirm_password" title= "Repite tu contrase&ntilde;a" placeholder="Repita su contrase&ntilde;a" minlength="8" required onkeyup='check();'>
                <p id = "message"></p>
                Tel&eacute;fono:
                <input type="tel" class="form-control" id="phone" pattern="[0-9]{10}" title= "Ingresa tu n&uacute;mero de tel&eacute;fono" name="phone" placeholder="N&uacute;mero de tel&eacute;fono" minlength="10" maxlength="10" required onchange='check();'>
                <p id = "msgphone"></p>
                <center>
                <div class="g-recaptcha" data-sitekey="6Lf0Hb4aAAAAAE2SknNH38ubSp8sOKm3PPVdwgNw" required></div>
                </center><br>
                <input type="button" class = "btn btn-danger" value="Volver" onclick= "history.back();">
                <input type="submit" class = "btn btn-primary" value="Registrarse" >
            </form><br><br>
      </div><br><br>
    </center>
  </div>
</body>
  

</html>