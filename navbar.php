<!DOCTYPE html>
<HTML>
  <head>
    <meta name="viewport" content="width=device-width"><!-- , user-scalable=no -->
    <link rel ="stylesheet" href="css/style.css"/>
    <link rel ="stylesheet" href="css/bar.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="topnav">
      <a href="index.php" class="active" title ="Ir a inicio">
        <p id="title">SEYDA</p>
      </a>

      <div id="myLinks">
        <a class = "link" title ="Ir al cat&aacute;logo" href="products.php">Productos</a>
        <a class = "link" title ="M&aacute;s informaci&oacute;n acerca de nosotros" href="about-us.php">Nosotros</a>
        <a class = "link" title ="&iexcl;Con&eacute;ctate&excl;" href="login.php">Login</a>
        
      </div>
      <!-- Botón de hamburguesa en móviles -->
      <a href="javascript:void(0);" title ="Desplegar men&uacute;" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
    
    <script type = "text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    
    <!-- Este permite la inserción y función de javascript en el navbar -->
    <script type = "text/javascript" >
      <?php require_once("js/javascript.js");?>
    </script>

  </body>
</HTML>