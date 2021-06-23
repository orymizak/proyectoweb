<?php

    require "connection.php";

    error_reporting(E_ERROR);

    $username = htmlentities(addslashes($_POST['username']));
    $device = $_POST['device'];

    $sql = "SELECT * FROM users WHERE username = :username";

    $result = $mysqli->prepare($sql);
    $result->execute(array(":username"=>$username));

    $response = array();

    if ($device == "1") {
            if ($result->rowCount() == 1)
            {   
                $response['status'] = 1;
                $response['status_text'] = "Error: el usuario ya existe.";
            }
            else
            {
                $response['status'] = 0;
                $response['status_text'] = "Usted se ha registrado correctamente.";
            }

    }

    if (is_null($device)) {
        echo "<center>Este es el navegador web, aqu&iacute; no hay huevos de pascua 🤡";
        return;
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    $mysqli->connection = null;
?>
