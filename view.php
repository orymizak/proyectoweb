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


<?php 
  
  $productID = $_POST['product_ID'];
  $sql = "SELECT * FROM products WHERE id = '$productID'";
  $result = $mysqli->prepare($sql);
  $result->execute();

  // if (isset($_SESSION['username']) == '') {
  //   echo "<p>Aviso: para agregar art&iacute;culos a tu bolsa, <a href ='login.php'>inicia sesi&oacute;n</a></p><hr>";
  // }

  while($row = $result->fetch(PDO::FETCH_ASSOC)){
  echo '<header class = "title">
          <h1>'.$row['name'].'</h1>
        </header>
        <hr>';
    if (isset($_SESSION['username']) == '') {
      echo "<p>Aviso: para agregar art&iacute;culos a tu bolsa, <a href ='login.php'>inicia sesi&oacute;n</a></p><hr>";
    }
        echo '
          <center>
          <section class = "main3">
            <a href = "#">
              <div class = "imgCont">
                <center>
                <img class = "imgContent2" src = "images/'.$row['ID'].'.jpg" alt ="">
                </center>
              </div>
              <h2 style = "color:black">
              Descripci&oacute;n del art&iacute;culo:<br>
              </h2>
              <p class = "textMain3">
                '.$row['description'].'
              </p>
              <p class = "textMain3">
                  <b>Disponible: '.$row['stock'].'</b>
              </p>
              <p class = "textMain">
                $'.$row['price'].' MXN
              </p>
            </a>';

        if (isset($_SESSION['username']) != '' && $row['stock'] > 0) {
          echo '
          <form method="post" action="api/addtocart.php">
            <input hidden name = "userID" value ="'.$_SESSION['ID'].'"/>
            <input hidden name = "productID" value ="'.$row['ID'].'"/>
            <select name = "quantity" style = "border:1px solid black">';

              for ($i = 1; $i != $row['stock']+1; $i++)
              {
                echo '<option value = "'.$i.'">'.$i.'</option>';
              }

              echo $row['stock'].'</select>
            <input type = "submit" value ="A&ntilde;adir"/>
          </form>';
        }
        if ($row['stock'] <= 0){
          echo '<span style = "color:red">Temporalmente agotado</span>';
        }
  }
?>

</section>
</center>
      </div>
      <br>
      <br>
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


  </body>
</html>