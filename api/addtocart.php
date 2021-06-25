<?php

    // error_reporting(E_ERROR);
    require "connection.php";

    // $userID = 189;
    // $productsID = 3;
    // $quantBag = 1;
    // $device = "1";

    $userID = $_POST['userID'];
    $productsID = $_POST['productID'];
    $quantBag = $_POST['quantity'];
    $device = $_POST['device'];
    
    // CONSULTAR PRIMERO
    $sql = "SELECT * FROM bag WHERE user_ID = :iduser AND products_ID = :productsID";
    $result = $mysqli->prepare($sql);
    $result->execute(array(":iduser"=>$userID, ":productsID"=>$productsID));
    
    if ($result->rowCount() == 1)
    {
        while($datos = $result->fetch(PDO::FETCH_ASSOC)) {

            // STOCK
            $sql = "SELECT stock FROM products WHERE ID = :productsID";
            $result = $mysqli->prepare($sql);
            $result->execute(array(":productsID"=>$productsID));

            // ACTUALIZAR
            $newquantity = $datos['quantity']+$quantBag;
            $response = $datos['products_ID'];
            $getProduct = $datos['products_ID'];

            if ($result->rowCount() == 1)
            {
                while ($datos = $result->fetch(PDO::FETCH_ASSOC))
                {
                    if ($newquantity > $datos['stock']){
                        
                        $check = "2";

                        if (is_null($device)) {
                            echo "<script type='text/javascript'>alert('No se puede añadir más producto.');
                                    window.location.href='http://localhost/products.php';</script>";
                        }
                        break;
                    }

                    if ($newquantity <= $datos['stock'])
                    {
                        $sql = "UPDATE bag SET quantity = '$newquantity' WHERE user_ID = '$userID' AND products_ID = '$getProduct'";
                        $result = $mysqli->prepare($sql);
                        $result->execute();

                        $check = "3";

                        if (is_null($device)) {
                            echo "<script type='text/javascript'>alert('Producto ACTUALIZADO');
                                    window.location.href='http://localhost/products.php';</script>";
                        }
                    }
                }
            }
            else
            {
                echo json_encode("no existe el producto");
            }
        }
    }   
    else
    {
        // INSERTA SI NO HAY
        $sql = "INSERT INTO bag (user_ID, products_ID, quantity) VALUES ('$userID', '$productsID', '$quantBag')";
        $result = $mysqli->prepare($sql);
        $result->execute();

        if (is_null($device)) {
            echo "<script type='text/javascript'>alert('Producto AÑADIDO');
                    window.location.href='http://localhost/products.php';</script>";
        }
        $check = "1";
    }
    if ($device = "1")
    {
        echo json_encode($check);
    }
?>