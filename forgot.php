<!DOCTYPE html>
<HTML lang ="es">
  <head>
      <?php include('navbar.php');?>
      <meta charset="utf-8">
      <title>Seyda || Cat&aacute;logo</title>
    	<meta name="description" content="Tienda de pulseras y otros accesorios">
      <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0, maximum-scale= 1.0, minimum-scale=1.0">
    	<link rel ="stylesheet" href="css/style.css"/>
    	<link rel ="stylesheet" href="js/javascript.js"/>
  </head>

  <body>

  <center>
  <div>&nbsp;
    <div class ="bg-text">
      <div class = "mainContent">

        <header class = "title">
          <h1>Recuperar cuenta</h1>
        </header>

        <hr>
        <h3>
          Ingresa la informaci&oacute;n solicitada (obligatorio).
        </h3>
          <form method = "post" action = "api/recover.php">
          <p>
            Ingresa tu usuario o tu tel&eacute;fono:
          </p>
            <input type = "text" name = "identification" minlength="8" maxlength="12" required>
          <p>
            Ingresa tu nueva contrase&ntilde;a:
          </p>
            <input type = "text" name = "newpassword" minlength="8" maxlength="12" required>
          <p>
            Ingresa tu hashkey:
          </p>
            <input type = "text" name = "hash" minlength="12" maxlength="12" required>
          <p>
            <input type = "submit" value = "Enviar">
          </p>
          </form>
      </div>
    </div>
  </div> 


  </body>
</html>