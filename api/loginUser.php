<?php
    
    require "connection.php";

    error_reporting(E_ERROR);
    
    $device = $_POST['device'];
    $username = htmlentities(addslashes($_POST['username']));
    $password = htmlentities(addslashes($_POST['password']));
    
    $sql = "SELECT * FROM users WHERE username = :username";

    $result = $mysqli->prepare($sql);
    $result->execute(array(":username"=>$username));

    //LOGIN PARA WEB
    if(is_null($device)){

        while($registro = $result->fetch(PDO::FETCH_ASSOC)){
            if(password_verify($password, $registro['password'])){
                session_start();

                $_SESSION['username'] = $username;
                $_SESSION['ID'] = $registro['ID'];
    
                echo "<script type='text/javascript'>
                window.location.href='http://localhost/index.php';</script>";
                break;
            }
            echo "<script type='text/javascript'>alert('Contraseña incorrecta, reintente.');
            window.location.href='http://localhost/login.php';</script>";
        }
    }

    //LOGIN PARA APP
    if ($device == "1") {
        while($registro = $result->fetch(PDO::FETCH_ASSOC)){    
            if(password_verify($password, $registro['password'])){

                $response = $registro;

                $response['status'] = 1;
                $response['status_text'] = "Usted se ha conectado, bienvenido $username.";

                break;
            }
            $response['status'] = 0;
            $response['status_text'] = "Error, la contraseña no es correcta, verifique.";
        }

    header('Content-Type: application/json');
    echo json_encode($response);
    }

    $mysqli->connection = null;

?>