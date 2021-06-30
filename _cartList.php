<?php

  $userID = $_SESSION['ID'];

  $sql = "SELECT * FROM bag WHERE user_ID = '$userID'";
  $result = $mysqli->prepare($sql);
  $result->execute();

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

      echo '<tr>
              <th> 
                <section class = "main4">
                  <form method = "post" action = "view.php">
                    <input hidden name = "product_ID" value = "'.$row2['ID'].'">
                      <div>
                          <input type = "image" class = "imgContent3" src = "images/'.$row2['ID'].'.jpg"/>
                      </div>
                  </form>
                </section>
              </th>
              <th style = "text-align:left; width:100%">
                <span class = "desc">
                '.$row2['name'].'
                </span><br><br>
                <span class = "desc2">
                  $'.number_format($row2['price'], 2, ".", ",").'&nbsp;MXN c/u
                <br></span>
                <br><span class = "desc2">
                  Cantidad: '.$row['quantity'].'<br>
                <br></span>
                <span class = "desc2">
                  <span style = "color:red; text-shadow:0px 1px white">$'.$total.'0&nbsp;MXN</span> Subtotal
                </span><br><br>
              <hr>
                  <form action ="api/deletecart.php" method = "post">
                  <input hidden name = "productID" value = "'.$row2['ID'].'"/>
                  <span class = "desc2">
                    Eliminar de la bolsa:&nbsp;&nbsp;
                  </span>
                  <select name = "quantity" style = "border:1px solid black; font-size: 15px">'.$quantity.'';
                    for ($i = 1; $i != $quantity+1; $i++)
                    {
                      echo '<option value = "'.$i.'">&nbsp;&nbsp;'.$i.'</option>';
                    }

                echo '</select> <button type = "submit" id ="bagspinner" class = "btn btn-light btn-sm" title = "Eliminar artículo de la bolsa">❌</button>
                    </form>
              </th>
            </tr>';
      }
    }
?>           