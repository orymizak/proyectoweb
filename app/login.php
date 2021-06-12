<?php
    error_reporting(E_ERROR);

    require "conexion.php";

    $nombre = $_POST['nombre'];
    $contra = $_POST['contra'];

    $sql = "SELECT * FROM users WHERE username = '$nombre' AND password ='$contra'";
    $result = $mysqli->query($sql);
    $response = array();

    if ($result->num_rows == 1){
        $response['status'] = 1;
        $response['status_text'] = "Login success";
        $response['user_arr'] = $result->fetch_assoc();
    }
    else
    {
        $response['status'] = 0;
        $response['status_text'] = "Login failed";
    }
    $mysqli->close();
    header('Content-Type: application/json');
    echo json_encode($response);
?>
