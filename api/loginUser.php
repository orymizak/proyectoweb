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
    
                echo "<script type='text/javascript'>alert('Sesión iniciada.');
                window.location.href='http://localhost/test.php';</script>";
                break;
            }
            // if(!password_verify($password, $registro['password'])){
                echo "<script type='text/javascript'>alert('Contraseña incorrecta.');
                window.location.href='http://localhost/test.php';</script>";
                // break;
            // }
        }
    }

    //LOGIN PARA APP
    if ($device == "1") {

        while($registro = $result->fetch(PDO::FETCH_ASSOC)){

            if(password_verify($password, $registro['password'])){
                $response['status'] = 1;
                $response['status_text'] = "Usted se ha conectado, bienvenido $username.";

                $response['ID'] = $registro['ID'];
                $response['username'] = $registro['username'];
                $response['phone'] = $registro['phone'];
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
