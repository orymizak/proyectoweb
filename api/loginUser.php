<?php
    error_reporting(E_ERROR);
    require "connection.php";
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $device = $_POST['device'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password ='$password'";
    $result = $mysqli->query($sql);

        // LOGIN PARA WEB
        if (is_null($device)) {

            if ($result->num_rows == 1) {
                session_start();
                $_SESSION['username'] = $username;
                echo "<script type='text/javascript'> alert('Bienvenido.'); 
                window.location.href='http://localhost/test.php';</script>";
            }

            if ($result->num_rows == 0) {
                echo "<script type='text/javascript'> alert('La información ingresada no es correcta.'); 
                window.location.href='http://localhost/test.php';</script>";
            }

        }

        // LOGIN PARA APP
        if ($device == "1") {
            $response = array();

            if ($result->num_rows == 1) {
                $response['status'] = 1;
                $response['status_text'] = "Usted se ha conectado, bienvenido $username.";
                $response['user_arr'] = $result->fetch_assoc();
                
                session_start();
                $_SESSION['username'] = $username;
            }

            if ($result->num_rows == 0) {
                $response['status'] = 0;
                $response['status_text'] = "Error, la contraseña del usuario $username no es correcta, verifíquela.";
            }

            $mysqli->close();
            header('Content-Type: application/json');
            echo json_encode($response);

        }
?>
