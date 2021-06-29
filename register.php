<!DOCTYPE html>
<HTML lang ="es">
  <head>
    <?php include('navbar.php');?>
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
      <div class ="bg-text">
        <h1>Registrarse</h1>
                      <img src="https://logos.textgiraffe.com/logos/logo-name/Seyda-designstyle-smoothie-m.png" style ="width:20%; max-width:100px"/>
            <div>
            </div>
                <form id="signupForm" method="post" action="api/signup.php">
                Usuario:<br>
                <input type="text" name="username" id="username" title= "Ingresa tu nombre de usuario" placeholder="Nombre de usuario" minlength="8" maxlength="12" required onchange='check();'>
                <br><span id = "msguser"></span><br><br>
                Contrase&ntilde;a:<br>
                <input type="password" name="password" id="password" title= "Ingresa tu contrase&ntilde;a" placeholder="Contrase&ntilde;a" minlength="8" required onkeyup='check();'><br><br>
                Repita su contrase&ntilde;a:<br>
                <input type="password" name="confirm_password" id="confirm_password" title= "Repite tu contrase&ntilde;a" placeholder="Repita su contrase&ntilde;a" minlength="8" required onkeyup='check();'>
                <br><span id = "message"></span><br><br>Tel&eacute;fono:<br>
                <input type="tel" id="phone" pattern="[0-9]{10}" title= "Ingresa tu n&uacute;mero de tel&eacute;fono" name="phone" placeholder="N&uacute;mero de tel&eacute;fono" minlength="10" maxlength="10" required onchange='check();'><br>
                <span id = "msgphone"></span><br><br>
                <center><br>
                <div class="g-recaptcha" data-sitekey="6Lf0Hb4aAAAAAE2SknNH38ubSp8sOKm3PPVdwgNw" required></div>
                </center><br>
                <input type="button" value="Volver" onclick= "history.back();">
                <input type="submit" value="Registrarse" >
            </form><br><br>
      </div><br><br>
    </center>
  </div>
    <!-- FIN DE CONTENIDO -->
  </body>
  <script>

  var check = function() {

    password = document.getElementById('password').value;
    chk_pass = document.getElementById('confirm_password').value;
    name = document.getElementById('username').value;
    color = document.getElementById('message').style.color;
    username = document.getElementById('username').value;
    phone = document.getElementById('phone').value;
    message = document.getElementById('message').innerHTML;
    msguser = document.getElementById('msguser').innerHTML;
    msgphone = document.getElementById('msgphone').innerHTML;

    if (username.length >= 1){
      if (username.length < 8){
          document.getElementById('msguser').style.color = 'red';
          document.getElementById('msguser').innerHTML = 'Ingrese al menos 8 caracteres.';
      }
      if (username.length >= 8){
          document.getElementById('msguser').innerHTML = '';
      }
    }

    if (username.length == 0){
      document.getElementById('msguser').innerHTML = '';
    }

    if (phone.length >= 1){
      if (phone.length < 10){
          document.getElementById('msgphone').style.color = 'red';
          document.getElementById('msgphone').innerHTML = 'Ingrese al menos 10 n&uacute;meros.';
      }
      else{
        document.getElementById('msgphone').innerHTML = '';
      }
    }

    if (phone.length == 0){
      document.getElementById('msgphone').innerHTML = '';
    }

    if (chk_pass.length >= 1){
        if (password == chk_pass) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'Las contrase&ntilde;as coinciden.';
      } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Las contrase&ntilde;as no coinciden.';
      }
    }

    if (chk_pass.length == 0){
      document.getElementById('message').innerHTML = '';
    }

}

window.onload = function() {
    var $recaptcha = document.querySelector('#g-recaptcha-response');

    if($recaptcha) {
        $recaptcha.setAttribute("required", "required");
    }
};

</script>

</html>