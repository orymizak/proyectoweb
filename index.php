<!DOCTYPE html>
<HTML lang ="es">

  <head>
    <?php include "_navbar.php" ?>
      <meta charset="utf-8">
      <title>Seyda || Tienda de Accesorios</title>
    	<meta name="description" content="Tienda de pulseras y otros accesorios">
      <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0, maximum-scale= 1.0, minimum-scale=1.0">
    	<link rel ="stylesheet" href="css/style.css"/>
    	<link rel ="stylesheet" href="js/javascript.js"/>
	   <meta name="google-site-verification" content="8_fBiy04ffw9vKgDz_RbkMv4pekDAP-sguCMl_uSF78" />
  </head>

<body>
  <center>
	<div>&nbsp;
	  <div class ="bg-text">
	    <div class = "mainContent">

	      <header class = "title">
	        <h1>Bienvenido a</h1>
	        <img src="src/seyda.png" alt="La mejor tienda de pulseras y accesorios"/>
	      </header>

	      <p>
	        &iexcl;La mejor tienda de pulseras en l&iacute;nea&excl;
	      </p>

	      <header><hr><br>
	        <h2>&Uacute;ltimas novedades</h2>
	      </header>

	      <?php include "_index.php";?>


	    </div><br><br>
	    <form action = "products.php">
	      <input type = "submit" class = "btn btn-success btn-lg" href = "products.php" value = "Ver m&aacute;s" class = "seeMore">
      	</form>
	      <br>
	    <?php include "_social.php";?>
	  </div><br>
      <?php include "_footer.php";?>
	</div> 
  </center>
</body>
</html>