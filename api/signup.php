<?php

    // declaración de elementos base
    require "connection.php";
    error_reporting(E_ERROR);

    // declaración de variables
    $username = htmlentities(addslashes($_POST['username']));
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $phone = htmlentities(addslashes($_POST['phone']));
    $response = $_POST["g-recaptcha-response"];
    
    // $device = "1";
    $device = $_POST['device'];

    $sql_check = "SELECT * FROM users WHERE username = :username";

    $result_check = $mysqli->prepare($sql_check);
    $result_check->execute(array(":username"=>$username));

        if (is_null($device)) {

            if ($result_check->rowCount() == 1)
            {   
                echo '<script>alert("El usuario ya existe"); window.location.href="http://localhost/register.php";</script>';
            }
            else
            {

                $result = $mysqli->prepare("INSERT INTO users (type, username, password, phone, restricted) VALUES (0, '$username', '$password', '$phone', 0)");

                if(!empty($response)){

                    $secret = "6Lf0Hb4aAAAAAMOWmoSn8Pgm5FBVnNExuvylN83n";
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $respuestaValidación = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$ip");
                
                    $jsonResponde = json_decode($respuestaValidación);
                    if($jsonResponde->success){
                    //entrará aquí cuando todo sea correcto 
                        // Realiza la consulta
                        $result->execute();
                        
                        echo '<script>alert("Se ha registrado con éxito"); window.location.href="http://localhost/index.php";</script>';
                    }
                    else
                    {
                        //Google ha detectado que se trata de un proceso no humano
                        header("location:register.php?mensaje=humanCaptcha");
                        exit();
                    }
                }
                else
                {
                    //si entra aquí significa que no se ha pulsado el Captcha
                    echo '<script>alert("Debe ingresar el captcha"); window.location.href="http://localhost/register.php";</script>';
                    exit();
                }



            }
        }
    if ($device == "1") {

        $response = array();

            if ($result->rowCount() == 1)
            {   
                $response['status'] = 1;
                $response['status_text'] = "Error: el usuario ya existe.";
            }
            else
            {
                $result->execute();
                $response['status'] = 0;
                $response['status_text'] = "Usted se ha registrado correctamente.";
            }

        header('Content-Type: application/json');
        echo json_encode($response);

    }
    $mysqli->connection = null;
?>