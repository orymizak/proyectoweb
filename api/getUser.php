<?php

     // error_reporting(E_ERROR);
    require "connection.php";

    //$username = 198;
    $userID = htmlentities(addslashes($_POST['userID']));
    //$username = htmlentities(addslashes($username));

    $sql = "SELECT * FROM users WHERE ID = :username";

    $result = $mysqli->prepare($sql);
    $result->execute(array(":username"=>$userID));

    while($datos = $result->fetch(PDO::FETCH_ASSOC)) {
        // $datos[] = $result;

        $response[] = $datos;

    }

    echo json_encode($response);
?>