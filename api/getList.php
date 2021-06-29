<?php

    require "connection.php";

    $values = $_POST['values'];

            $sql = "SELECT * FROM products ORDER BY name ASC";
            $result = $mysqli->prepare($sql);
            $result->execute();


            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                  echo '
                  <div>
                    <section class = "main">

                      <a href = "#">
                        <div class = "imgCont">
                          <center>
                          <img class = "imgContent" src = "../images/'.$row['ID'].'.png" alt ="">
                          </center>
                        </div>

                        <h3 class = "textTitle">
                          '.$row['name'].'
                        </h3>

                        <p class = "textMain">
                          Descripci&oacute;n del art&iacute;culo:<br>'.$row['description'].'
                        </p>

                        <p class = "textMain">
                          Stock: '.$row['stock'].'
                        </p>

                      </a>

                    <input type = "number" MIN="1" MAX="'.$row['stock'].'" VALUE="1" SIZE="6"/>

                    <button onclick = "index.php">
                      A&ntilde;adir al carrito
                    </button>

                    </section>
                  </div>';
                }
?>
