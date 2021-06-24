<?php

    require "connection.php";

    $sql = "SELECT ID, price, description, date, name, stock, rate FROM products";

    $result = $mysqli->prepare($sql);
    $result->execute();

    $query = $mysqli->query($sql);
    
    while($resultado = $result->fetch(PDO::FETCH_ASSOC)){
        
        // $resultado['urlmaker'] = "http://localhost/Proyecto/proyectoweb/images/".$resultado['ID'].".png";
        $resultado['urlmaker'] = "http://orymizak.ddns.net/images/".$resultado['ID'].".png";
        $datos[] = $resultado;
    }

    echo json_encode($datos);
?>
