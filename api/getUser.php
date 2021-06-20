<?php

     error_reporting(E_ERROR);
    require "connection.php";
    $username = "hansel2123";
    $sql = "SELECT * FROM users WHERE username = '$username'";

    $query = $mysqli->query($sql);

    while($resultado = $query->fetch_assoc()) {
        $datos[] = $resultado;
    }
    
    // if ($resultado.msql_num_rows == 1) {
    // 	// MOSTRAR CONTENIDO
    // }
    // else {
    // 	// OCULTAR
    // }

    echo json_encode($datos);
?>