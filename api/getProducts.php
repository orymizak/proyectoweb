<?php

    require "connection.php";

    // $sql = "SELECT * FROM products";
    $sql = "SELECT ID, price, description, date, name FROM products";

    $query = $mysqli->query($sql);

    while($resultado = $query->fetch_assoc()) {
        $datos[] = $resultado;
    }

    echo json_encode($datos);
?>
