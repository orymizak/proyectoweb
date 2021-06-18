<!DOCTYPE html>
<HTML lang ="es">
  <head>
      <meta charset="utf-8">
        <title> Seyda || Login </title>
        <meta name = "description" content ="Tienda de pulseras y accesorios">
        <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0, maximum-scale= 1.0, minimum-scale=1.0">
        <link rel ="stylesheet" href="css/style.css"/>
        <link rel ="stylesheet" href="js/javascript.js"/>

    <?php include "api/connection.php" ?>
  </head>
  <body>

  <?php include('api/connection.php');

    session_start(); 
    $username = isset($_SESSION['username']);
      if ($username == null || $username == '') {
        echo 
        '<div>&nbsp;
            <div class ="bg-text">
              <p style ="font-size:25px"><b>Iniciar sesi&oacute;n</b></p>
                  <div>
                      <img src="src/admin.png" id="icon" alt="icono usuario" />
                      <!-- <img src="https://logos.textgiraffe.com/logos/logo-name/Seyda-designstyle-smoothie-m.png" style ="width:50%; max-width:300px"/> -->
                  </div>
                      <form id="loginForm" method="post" action="api/loginUser.php"><br><br>
                      Usuario:<br><br>
                      <input type="text" id="username" title= "Ingresa tu nombre de usuario" name="username" placeholder="username"><br><br>
                      Contrase&ntilde;a:<br><br>
                      <input type="password" id="password" title= "Ingresa tu contrase&ntilde;a" name="password" placeholder="password"><br><br>
                      <input type="submit" value="Conectarse" >
                  </form>
            </div><br><br>
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