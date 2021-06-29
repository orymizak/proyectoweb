<!DOCTYPE html>
<HTML lang ="es">
  <head>
    <?php include('navbar.php');?>
      <meta charset="utf-8">
        <title> Seyda || Mi cuenta </title>
        <meta name = "description" content ="Tienda de pulseras y accesorios">
        <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0, maximum-scale= 1.0, minimum-scale=1.0">
        <link rel ="stylesheet" href="css/style.css"/>
        <link rel ="stylesheet" href="js/javascript.js"/>
  </head>
  <body>

<center>
	<div>&nbsp;<?php
		    $username = isset($_SESSION['username']);
			if ($username == null || $username == '') {
			echo 
			'<div class ="bg-text">
			      <h1>Iniciar sesión</h1>
			      <img style = "width:20%; max-width:100px" src="src/seyda.png"/>

			      <form method="post" action="api/loginUser.php">
			      <p>
			        Usuario:
			      </p>
			        <input type="text" REQUIRED id="username" title= "Ingresa tu nombre de usuario" name="username" placeholder="Usuario">
				  <p>
			        Contrase&ntilde;a:
			      </p>
			        <input type="password" REQUIRED id="password" title= "Ingresa tu contrase&ntilde;a" name="password" placeholder="Contraseña">
				  <p>
			        <input type="submit" value="Conectarse">
			      </p>
			      <p>
			      	&iquest;Olvidaste tu <a href="forgot.php" class = "contentLink" title="Registrar usuario">contrase&ntilde;a</a>&quest;
			      </p><hr>
			      <p>
			      	No tienes una cuenta? <a href="register.php" class = "contentLink" title="Registrar usuario">Reg&iacute;strate aqu&iacute;</a>
			      </p>
			      </form>
			      
			    </div>';
			}
			else
			{
				include "account.php";
			}
	    ?></div>
</center>
</body>
</html>