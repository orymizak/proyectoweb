<?php
    error_reporting(E_ERROR);

    require "connection.php";

    $username = $_POST['username'];
    $device = $_POST['device'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $mysqli->query($sql);
    $response = array();

    if ($result->num_rows == 1) {
        $response['status'] = 1;
        $response['status_text'] = "Error, el usuario ya existe.";
        $response['user_arr'] = $result->fetch_assoc();
    }
    
    if ($result->num_rows == 0) {
        $response['status'] = 0;
        $response['status_text'] = "Se ha registrado el usuario con éxito. Se ha iniciado la sesión.";
    }

    if (is_null($device)) {
        echo $response['status'];
        return;
    }
    
        header('Content-Type: application/json');
        echo json_encode($response);
    $mysqli->close();
?>
