<?php

    error_reporting(E_ERROR);
    require "connection.php";

    // $userID = 214;
    $userID = $_POST['userID'];

    $sql = "SELECT * FROM bag JOIN products ON bag.products_ID = products.ID WHERE user_ID = '$userID'";
    //"SELECT * FROM bag JOIN products ON bag.products_ID = products.ID"

    
    $result = $mysqli->prepare($sql);

    $result->execute();

    while($resultado = $result->fetch(PDO::FETCH_ASSOC)){

        // $resultado['urlmaker'] = "http://localhost/Proyecto/proyectoweb/images/".$resultado['ID'].".png";
        $productoVAR = $resultado['products_ID'];
        $resultado['urlmaker'] = "http://orymizak.ddns.net/images/".$resultado['products_ID'].".png";

        $sql2 = "SELECT price FROM products WHERE ID = '$productoVAR'";
        $result2 = $mysqli->prepare($sql2);
        $result2->execute();
        while($checker = $result2->fetch(PDO::FETCH_ASSOC)){
            $resultado['price'] = $checker['price'];
        }

        $datos [] = $resultado;
    }
    echo json_encode($datos);
?>
