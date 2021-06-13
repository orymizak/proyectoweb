<?php
    error_reporting(E_ERROR);

    require "conexion.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password ='$password'";
    $result = $mysqli->query($sql);
    $response = array();

    if ($result->num_rows == 1){
        $response['status'] = 1;
        $response['status_text'] = "Usted se ha conectado, bienvenido $username.";
        $response['user_arr'] = $result->fetch_assoc();
    }
    else
    {
        $response['status'] = 0;
        $response['status_text'] = "Error, la contraseña del usuario $username no es correcta, verifíquela.";
    }
    $mysqli->close();
    header('Content-Type: application/json');
    echo json_encode($response);
?>
