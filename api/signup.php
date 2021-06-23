<?php
    
    // declaración de elementos base
    require "connection.php";
    error_reporting(E_ERROR);

    // declaración de variables
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $device = $_POST['device'];
    $response = $_POST["g-recaptcha-response"];

    // para encriptar
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (type, username, password, phone, restricted) VALUES (0,'$username', '$hash', '$phone', 0)";


// LOGIN PARA WEB
if (is_null($device)){

    if(!empty($response)){
        $secret = "6Lf0Hb4aAAAAAMOWmoSn8Pgm5FBVnNExuvylN83n";
        $ip = $_SERVER['REMOTE_ADDR'];
        $respuestaValidación = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$ip");
    
        $jsonResponde = json_decode($respuestaValidación);
        if($jsonResponde->success){
        //entrará aquí cuando todo sea correcto 
            // Realiza la consulta
            //$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

            $query = $mysqli->query($sql);
            
            echo '<script>alert("Se ha registrado con éxito"); window.location.href="http://localhost/test.php";</script>';
                     
                // AUTO LOGIN (RECUPERAR Y CONECTAR) PENDIENTE DE REALIZAR   
                // session_start();
                // $_SESSION['username'] = $username;

            $mysqli->close();
                        
                //$sql->execute();              
                //mysqli_close($con);

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
        echo '<script>alert("Debe ingresar el captcha"); window.location.href="http://localhost/test.php";</script>';
        exit();
    }
}

if ($device == "1") {
    $query = $mysqli->query($sql);
    // REGISTRO BÁSICO
    header('Content-Type: application/json');
    $mysqli->close();
}