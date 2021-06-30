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
          <h1>Cat&aacute;logo de productos</h1>
        </header>

        <p>
          Los mejores accesorios que van bien contigo
        </p>
        <hr>


<?php

  $sql = "SELECT * FROM products ORDER BY date DESC";
  $result = $mysqli->prepare($sql);
  $result->execute();


        if (isset($_SESSION['username']) == '') {
          echo "<p>Aviso: para agregar art&iacute;culos a tu bolsa, <a href ='login.php'>inicia sesi&oacute;n</a></p><hr>";
        }

  while($row = $result->fetch(PDO::FETCH_ASSOC)){
  echo '<div>
          <section class = "main2">
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
                  Disponible: '.$row['stock'].'

              </div>
              
              <p class = "textMain">
                $'.$row['price'].' MXN
              </p>
            </form>

';

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

                echo ''.$row['stock'].'';
                echo '</select>

            <input type = "submit" value ="A&ntilde;adir"/>
          </form>';
        }
        if ($row['stock'] <= 0){
          echo '<span style = "color:red">Temporalmente agotado</span>';
        }

        echo '
          </section>
        </div>';
      }
?>           
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