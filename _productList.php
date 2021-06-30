
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
                <h3 class = "textMain2">
                  '.$row['name'].'
                </h3><span class = "textMain3">';

              if ($row['stock'] <= 0){
                echo '<span style = "color:red">Temporalmente agotado</span>';
              }
              else
              {
                echo 'Disponible: '.$row['stock'];
              }

          echo '</span></div>
                <p class = "textMain">
                  $'.$row['price'].' MXN
                </p>
              </form><center>';

    if (isset($_SESSION['username']) != '' && $row['stock'] > 0) {
          
      echo '<form method="post" action="api/addtocart.php">
            <input hidden name = "userID" value ="'.$_SESSION['ID'].'"/>
            <input hidden name = "productID" value ="'.$row['ID'].'"/>
            <select name = "quantity" style = "border:1px solid black">';

              for ($i = 1; $i != $row['stock']+1; $i++)
              {
                echo '<option value = "'.$i.'">'.$i.'</option>';
              }
              echo $row['stock'].'
              </select>
            <input class = "btn btn-success btn-sm" id = "btn-add" type = "submit" value ="A&ntilde;adir"/>&nbsp;
          </form>';
        }
      else{
      echo '<select disabled style = "border:1px solid black">
              <option default = "0"/>0&nbsp;&nbsp;&nbsp;
            </select>
            <input disabled  class = "btn btn-success btn-sm" id = "btn-add" type = "submit" value ="A&ntilde;adir"/>';
        }
      echo '</section>
        </div>';
      }
?>           