<?php
    error_reporting(E_ERROR);

    require "conexion.php";

    $username = $_POST['username'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $mysqli->query($sql);
    $response = array();

    if ($result->num_rows == 1){
        $response['status'] = 1;
        $response['status_text'] = "Error, el usuario ya existe.";
        $response['user_arr'] = $result->fetch_assoc();
    }
    else
    {
        $response['status'] = 0;
        $response['status_text'] = "No se encuentra el usuario.";
    }
    $mysqli->close();
    header('Content-Type: application/json');
    echo json_encode($response);
?>
