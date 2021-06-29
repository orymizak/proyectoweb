<?php
    
    require "connection.php";

    error_reporting(E_ERROR);
    
    $device = $_POST['device'];
    $username = htmlentities(addslashes($_POST['username']));
    $password = htmlentities(addslashes($_POST['password']));
    
    $sql = "SELECT * FROM users WHERE (username = :username OR phone = :username)";

    $result = $mysqli->prepare($sql);
    $result->execute(array(":username"=>$username));

    //LOGIN PARA WEB
    if(is_null($device)){

        while($registro = $result->fetch(PDO::FETCH_ASSOC)){
            if(password_verify($password, $registro['password'])){

                $isBanned = $registro['restricted'];
                if ($isBanned == 1)
                {
                    echo "<script type='text/javascript'>alert('El usuario está bloqueado')
                    window.location.href='../index.php';</script>";
                }
                if ($isBanned == 0)
                {

                    session_start();
                    $_SESSION['username'] = $registro['username'];
                    $_SESSION['ID'] = $registro['ID'];
                    $_SESSION['type'] = $registro['type'];
        
                    echo "<script type='text/javascript'>
                    window.location.href='../index.php';</script>";

                }


                break;
            }
            echo "<script type='text/javascript'>alert('Contraseña incorrecta, reintente.');
            window.location.href='../login.php';</script>";
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