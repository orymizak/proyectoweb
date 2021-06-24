<?php

     // error_reporting(E_ERROR);
    require "connection.php";

    $username = "hansel2123";
    // $username = htmlentities(addslashes($_POST['username']));
    $username = htmlentities(addslashes($username));

    $sql = "SELECT * FROM users WHERE username = :username";

    $result = $mysqli->prepare($sql);
    $result->execute(array(":username"=>$username));

    while($datos = $result->fetch(PDO::FETCH_ASSOC)) {
        // $datos[] = $result;

        $response[] = $datos;

    }

    echo json_encode($response);
?>