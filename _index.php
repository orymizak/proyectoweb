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
                  <h3 class = "textMain2">
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