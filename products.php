<!DOCTYPE html>
<HTML lang ="es">
  <head>
    <?php include "_navbar.php" ?>
    <meta charset="utf-8">
    <title>
      Seyda || Cat&aacute;logo
    </title>
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
              <h1>Cat&aacute;logo de productos</h1>
            </header>
            <p>
              &iexcl;Los mejores accesorios que van bien contigo&excl;
            </p><hr><br>
            <?php include "_productList.php";?>
          </div><br><br>
          <?php include "_social.php";?>
        </div><br>
        <?php include "_footer.php";?>
      </div> 
    </center>
  </body>
</html>