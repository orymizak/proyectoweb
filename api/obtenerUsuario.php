<?php

    require "connection.php";
    $username = "Hansel";
   
    $sql = "SELECT * FROM users WHERE username = '$username'";

    $query = $mysqli->query($sql);

    while($resultado = $query->fetch_assoc()) {
        $datos[] = $resultado;
    }

    echo json_encode($datos);
?>