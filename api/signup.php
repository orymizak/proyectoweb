<?php
    
    // declaración de elementos base
    error_reporting(E_ERROR);
    require "connection.php";

    // declaración de variables
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $device = $_POST['device'];

    // para encriptar
    // $password = password_hash($password, PASSWORD_DEFAULT);


        $sql = "INSERT INTO users (type, username, password, phone, restricted) VALUES (0,'$username', '$password', '$phone', 0)";
        $query = $mysqli->query($sql);

    // LOGIN PARA WEB
    if (is_null($device)) {

        echo '<script>alert("Se ha registrado con éxito, usted ha iniciado sesión"); window.location.href="http://localhost/test.php";</script>';

        $mysqli->close();
        session_start();
        $_SESSION['username'] = $username;
                
    }

    if ($device == "1") {

        // REGISTRO BÁSICO
        header('Content-Type: application/json');

    }
