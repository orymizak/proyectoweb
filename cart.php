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
          <h1>Carrito de compras</h1>
        </header>

        <p>
          Descripci&oacute;n gen&eacute;rica.
        </p>


<?php

  $userID = $_SESSION['ID'];

  $sql = "SELECT * FROM bag WHERE user_ID = '$userID'";
  $result = $mysqli->prepare($sql);
  $result->execute();

  echo '<div>
          <table>
            
            <tr>
              <th>
                Nombre
              </th>
              <th>
                Cantidad
              </th>
              <th>
                Precio
              </th>
              <th>
                Total
              </th>
            </tr>';

  while($row = $result->fetch(PDO::FETCH_ASSOC)){

    $productID = $row['products_ID'];

    $sql2 = "SELECT * FROM products WHERE ID = '$productID'";
    $result2 = $mysqli->prepare($sql2);
    $result2->execute();

    while($row2 = $result2->fetch(PDO::FETCH_ASSOC)){

      $total = ((double)$row2['price'] * (double)$row['quantity']);
      $totalM = $total+$totalM;
      $totalQ = (int)$row['quantity'] +$totalQ;
      $quantity = $row['quantity'];

      echo '
            <tr>
              <th>
                <a class = "table" href = "view.php">
                '.$row2['name'].'
                </a>
              </th>
              <th>
              '.$quantity.'<form action ="api/deletecart.php" method = "post">
                  <input hidden name = "productID" value = "'.$row2['ID'].'"/>
                  <select name = "quantity" style = "border:1px solid black">'.$quantity.'';
                    while ($quantity != 0) {
                      echo '<option value = "'.$quantity.'">'.$quantity.'</option>';
                      $quantity--;
                    }
                echo '</select>&nbsp;<button type = "submit" id ="bagspinner" title = "Eliminar artículo de la bolsa">❌</button>
                    </form>
              </th>
              <th>
                $'.number_format($row2['price'], 2, ".", ",").'&nbsp;MXN
              </th>
              <th>
                $'.number_format($total, 2, ".", ",").'&nbsp;MXN
              </th>
            </tr>';
      }
    }
?>           
            <tr>
              <th>
                &nbsp;
              </th>
              <th>
                <?php echo $totalQ; ?>
              </th>
              <th>
                &nbsp;
              </th>
              <th>
                $<?php echo number_format($totalM, 2, ".", ","); ?>&nbsp;MXN
              </th>
            </tr>
          </table>
        </div>
      </div>
      <br>
          <a href = "api/buy.php"><button>Realizar compra</button></a>
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