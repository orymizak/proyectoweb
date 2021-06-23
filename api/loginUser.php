<?php
    error_reporting(E_ERROR);
    require "connection.php";
    
    //$username = $_POST['username'];
    //$password = $_POST['password'];
    $device = $_POST['device'];


    $username = htmlentities(addslashes($_POST['username']));
    $password = htmlentities(addslashes($_POST['password']));
    //$contador = 0;

    //CAMBIAR LINEA
    $mysqli = new PDO("mysql:host=localhost:33065; dbname=seydabd", "root","");

    
    $mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM users WHERE username= :username";

    $result = $mysqli->prepare($sql);
    $result->execute(array(":username"=>$username));

    //LOGIN PARA WEB
    if(is_null($device)){
        while($registro = $result->fetch(PDO::FETCH_ASSOC)){

            if(password_verify($password, $registro['password'])){
                //$contador=1;
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['ID'] = $registro['ID'];
    
                echo "<script type='text/javascript'>
                window.location.href='http://localhost/test.php';</script>";
                break;
            }
            echo "<script type='text/javascript'> 
                window.location.href='http://localhost/test.php';</script>";
        }
    }

    //LOGIN PARA APP
    if ($device == "1") {
        $response = array();

        while($registro = $result->fetch(PDO::FETCH_ASSOC)){

            if(password_verify($password, $registro['password'])){
                //$contador=1;
                $response['status'] = 1;
                $response['status_text'] = "Usted se ha conectado, bienvenido $username.";
                $response['user_arr'] = $result->fetch_assoc();
                
                session_start();
                $_SESSION['username'] = $username;
                break;
            }
            $response['status'] = 0;
            $response['status_text'] = "Error, la contraseña no es correcta, verifique.";
        }
        $mysqli->close();
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    

    // falta implementar métodos para evitar solicitudes sin datos (isset) algo así como
    // if (!isset($password) && !isset ($username)) { ejecutar query }
    //$result = $mysqli->query($sql);


            // LOGIN PARA WEB
            /*if (is_null($device)) {

                // if ($result->num_rows == 1 && password_verify($password,$hash)) {
                    if ($result->num_rows == 1){

                    session_start();
                    $_SESSION['username'] = $username;

                    while($result = $result->fetch_assoc()) {
                    	// comprobar con otras variables
                        $_SESSION['ID'] = $resultado['ID'];
                    }

                    echo "<script type='text/javascript'>
                    window.location.href='http://localhost/test.php';</script>";
                }

                // if ($result->num_rows == 0 && password_verify($password,$hash)) {
                    if ($resultado->num_rows == 0) {
                    echo "<script type='text/javascript'> 
                    window.location.href='http://localhost/test.php';</script>";
                }

            }*/

            // LOGIN PARA APP
            /*if ($device == "1") {
                $response = array();

                // if (password_verify($password,$hash)){

                    if ($result->num_rows == 1) {
                        $response['status'] = 1;
                        $response['status_text'] = "Usted se ha conectado, bienvenido $username.";
                        $response['user_arr'] = $result->fetch_assoc();
                        
                        session_start();
                        $_SESSION['username'] = $username;
                    }

                    if ($result->num_rows == 0) {
                        $response['status'] = 0;
                        $response['status_text'] = "Error, la contraseña no es correcta, verifique.";
                    }

                // }

                $mysqli->close();
                header('Content-Type: application/json');
                echo json_encode($response);

            }*/


?>
