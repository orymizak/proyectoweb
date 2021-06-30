<!DOCTYPE html>
<HTML lang ="es">
  <head>
    <?php include "_navbar.php" ?>
	<meta charset="utf-8">
 	<title> 
	  Seyda || Mi cuenta 
	</title>
  	<meta name = "description" content ="Tienda de pulseras y accesorios">
	<meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0, maximum-scale= 1.0, minimum-scale=1.0">
  	<link rel ="stylesheet" href="css/style.css"/>
  	<link rel ="stylesheet" href="js/javascript.js"/>
  </head>
  <body>
  	<center>
	  <div>&nbsp;
	  	<?php
	      $username = isset($_SESSION['username']);
		  if ($username == null || $username == '') {
			include "_login.php";
		  }
		  else
		  {
		  	include "_account.php";
		  }
	  	?>
	  </div>
  	</center><br><br>
  </body>
</html>