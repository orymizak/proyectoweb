<!DOCTYPE html>
<HTML lang ="es">
  <head>
      <meta charset="utf-8">
        <title> Seyda || Registrarse </title>
        <meta name = "description" content ="Tienda de pulseras y accesorios">
        <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0, maximum-scale= 1.0, minimum-scale=1.0">
        <link rel ="stylesheet" href="css/style.css"/>
        <link rel ="stylesheet" href="js/javascript.js"/>

  </head>
  <body>
  <div>&nbsp;
      <div class ="bg-text">
        <p style ="font-size:25px"><b>Registrarse</b></p>
            <div>
                <!-- <img src="https://logos.textgiraffe.com/logos/logo-name/Seyda-designstyle-smoothie-m.png" style ="width:50%; max-width:300px"/> -->
            </div>
                <form id="signupForm" method="post" action="api/signup.php"><br><br>
                Usuario:<br><br>
                <input type="text" id="_username" title= "Ingresa tu nombre de usuario" name="_username" placeholder="Nombre de usuario" minlength="8" maxlength="12" required><br><br>
                Contrase&ntilde;a:<br><br>
                <input type="password" name="_password" id="_password" title= "Ingresa tu contrase&ntilde;a" placeholder="Contrase&ntilde;a" minlength="8" required onkeyup='check();'><br><br>
                Repita su contrase&ntilde;a:<br><br>
                <input type="password" name="_confirm_password" id="_confirm_password" title= "Repite tu contrase&ntilde;a" placeholder="Repita su contrase&ntilde;a" minlength="8" required onkeyup='check();'><br><br>
                Tel&eacute;fono:<br><br>
                <input type="text" id="_phone" title= "Ingresa tu n&uacute;mero de tel&eacute;fono" name="_username" placeholder="N&uacute;mero de tel&eacute;fono" minlength="10" maxlength="10" required><br><br>
                <br><span id = "message"></span><br>
                <input type="submit" value="Registrarse" >
            </form>
      </div><br><br>
  </div>
    <!-- FIN DE CONTENIDO -->
  </body>
  <script>
  var check = function() {
  if (document.getElementById('_password').value ==
    document.getElementById('_confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Las contrase&ntilde;as coinciden.';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Las contrase&ntilde;as no coinciden.';
  }
}
</script>

</html>