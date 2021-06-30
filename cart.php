<!DOCTYPE html>
<HTML lang ="es">
  <head>
    <?php include "_navbar.php" ?>
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
          <h1>Carrito de compras</h1>
        </header>
        <div>
          <table style = "max-width:700px">
            <?php include "_cartList.php";?>
          </table>
        </div>
      </div>
      <br>
        <span class = "desc"><b>
          Total a pagar: $<?php echo number_format($totalM, 2, ".", ","); ?>&nbsp;MXN<br><br>
        </b></span>
          <a href = "api/buy.php">
            <button class = "btn btn-success">
              Realizar compra
            </button>
          </a>
      <br>
      <br>
      
      <?php include "_social.php";?>

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


  </body>
</html>