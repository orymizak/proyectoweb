<?php

    require "connection.php";
   
    $sql = "SELECT * FROM products";

    $query = $mysqli->query($sql);

    while($resultado = $query->fetch_assoc()) {
        $datos[] = $resultado;
    }

    echo json_encode($datos);
?>
