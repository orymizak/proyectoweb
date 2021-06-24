<!DOCTYPE html>
<HTML lang ="es">
  <head>
    <?php include('navbar.php');?>
      <meta charset="utf-8">
        <title> Seyda || Login </title>
        <meta name = "description" content ="Tienda de pulseras y accesorios">
        <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0, maximum-scale= 1.0, minimum-scale=1.0">
        <link rel ="stylesheet" href="css/style.css"/>
        <link rel ="stylesheet" href="js/javascript.js"/>

  </head>
  <body>

  <?php 

    $username = isset($_SESSION['username']);
      if ($username == null || $username == '') {
        echo 
        '<div>&nbsp;
          <center>
            <div class ="bg-text-login">
              <div style ="font-size:25px; padding-top:20px"><b>Iniciar sesión</b></div>
                      <img src="https://logos.textgiraffe.com/logos/logo-name/Seyda-designstyle-smoothie-m.png" style ="width:20%; max-width:100px"/>

                      <form id="loginForm" method="post" action="api/loginUser.php">
                        Usuario:<br><br>
                        <input type="text" REQUIRED id="username" title= "Ingresa tu nombre de usuario" name="username" placeholder="Usuario"><br><br>
                        Contrase&ntilde;a:<br><br>
                        <input type="password" REQUIRED id="password" title= "Ingresa tu contrase&ntilde;a" name="password" placeholder="Contraseña"><br><br>
                        <input type="submit" value="Conectarse">
                        <br><br>&iquest;Olvidaste tu <a href="forgot.php" class = "contentLink" title="Registrar usuario">contrase&ntilde;a</a>&quest;<br><hr>
                        <br>No tienes una cuenta? 
                        <a href="register.php" class = "contentLink" title="Registrar usuario">Reg&iacute;strate aqu&iacute;</a><br><br>
                      </form>
            </div><br><br>
          </center>
        </div>;';
      }
      else
      {
        include "account.php";
      }

    ?>
    <!-- FIN DE CONTENIDO -->
  </body>
</html>