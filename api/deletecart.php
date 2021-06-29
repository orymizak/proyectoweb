<?php
    
    session_start();
    include "connection.php";
    
    $userID = $_SESSION['ID'];
    $productsID = $_POST['productID'];
    $quantBag = $_POST['quantity'];

    $sql = "SELECT * FROM bag WHERE user_ID = $userID AND products_ID = $productsID";
    $result = $mysqli->prepare($sql);
    $result->execute();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){

        $new = $row['quantity'] - $quantBag;
        
        if ($new <= 0){
            // delete
            $sql2 = "DELETE FROM bag WHERE user_ID = '$userID' AND products_ID = '$productsID'";
        }
        else
        {   
            // actualizar
            $sql2 = "UPDATE bag SET quantity = '$new' WHERE user_ID = '$userID' AND products_ID = '$productsID'";
        }

        echo '<script>window.location.href = "../cart.php"</script>';
        $result2 = $mysqli->prepare($sql2);
        $result2->execute();
    }

?>