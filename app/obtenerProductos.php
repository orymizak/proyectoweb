<?php

    require "conexion.php";
    
   
    $sql = "SELECT * FROM productos";

    $query = $mysqli->query($sql);

    while($resultado = $query->fetch_assoc()) {
        $datos[] = $resultado;
    }

    echo json_encode($datos);
?>
