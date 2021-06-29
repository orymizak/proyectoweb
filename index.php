<!DOCTYPE html>
<HTML lang ="es">

  <head>
    <?php include('navbar.php');?>
      <meta charset="utf-8">
      <title>Seyda || Tienda de Accesorios</title>
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
	        <h1>Bienvenido a</h1>
	        <img src="src/seyda.png"/>
	      </header>

	      <p>
	        &iexcl;La mejor tienda de pulseras en l&iacute;nea&excl;
	      </p>

	      <header><hr><br>
	        <h2>&Uacute;ltimas novedades</h2>
	      </header>


<?php
  $sql = "SELECT * FROM products ORDER BY date DESC LIMIT 3";
  $result = $mysqli->prepare($sql);
  $result->execute();

  while($row = $result->fetch(PDO::FETCH_ASSOC)){

    echo '
          <section class = "main">
            <form method = "POST" action = "view.php">
            <input hidden name = "product_ID" value = "'.$row['ID'].'">
	              <div class = "imgCont">
	                <center>
                  <input type = "image" class = "imgContent" src = "../images/'.$row['ID'].'.jpg"/>
	                </center>
	              </div>

	              <div class = "txtCont">
	                <h3 class = "textTitle">
	                  '.$row['name'].'
	                </h3>
	              </div>

	              <p class = "textMain">
	                $'.$row['price'].' MXN
	              </p>
            </form>
          </section>';
      }
?>        
	    </div>
	    <br>
	    <br>
	    
	    <a href = "products.php">
	      <section class = "seeMore">
	        Ver m&aacute;s...
	      </section><br>
	      </a>
	    <hr>
	      <div class = "socialIcons">
	        <a href ="https://www.facebook.com/"><img title = "&iexcl;Ir a Facebook&excl;" src ="src/ico_facebook.png"></a>
	        <a href ="https://www.twitter.com/"><img title = "&iexcl;Ir a Twitter&excl;" src ="src/ico_twitter.png"></a>
	        <a href ="https://www.instagram.com/"><img title = "&iexcl;Ir a Instagram&excl;" src ="src/ico_instagram.png"></a>
	      </div>
	  </div><br>
	    
	      <div class = "footer">
	        <div class ="footCont">
	          <p>
	            Derechos de autor por Seyda Moda. Todos los derechos reservados ®.</p>
	          <p>
	          <a href ="https://www.youtube.com/watch?v=dQw4w9WgXcQ">Acerca de Seyda Moda</a> | 
	          <a href ="https://www.youtube.com/watch?v=dQw4w9WgXcQ">Acuerdo del Servicio</a> | 
	          <a href ="https://www.youtube.com/watch?v=dQw4w9WgXcQ">Pol&iacute;tica de Privacidad</a></p>
	        </div>
	      </div><br>
	</div> 
  </center>
</body>
</html>