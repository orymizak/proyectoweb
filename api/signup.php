<?php
    
    // declaración de elementos base
    error_reporting(E_ERROR);
    require "connection.php";

    // declaración de variables
    $username = $_POST['_username'];
    //$phone = $_POST['phone'];
    $password = hash('sha512', $_POST['_password']);
    $message = "";

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $mysqli->query($sql);
    $response = array();

    if ($result->num_rows == 1){
        /*$response['status'] = 1;
        $response['status_text'] = "El usuario ya existe";
        $response['user_arr'] = $result->fetch_assoc();*/
        echo "<script type='text/javascript'> alert('El usuario ya existe.'); window.location.href='http://localhost/proyectoweb/register.php';</script>";
    }
    else
    {
        /*$response['status'] = 0;
        $response['status_text'] = "Permitir registro";*/
        //$sql = "INSERT INTO users (type, username, password, phone, restricted) VALUES (0,'$nombre', '$contra', '$email', 0)";
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        $query = $mysqli->query($sql);
        echo "<script type='text/javascript'> alert('Usuario creado con éxito.'); window.location.href='http://localhost/proyectoweb/login.php';</script>";
    }
    $mysqli->close();
    //header('Content-Type: application/json');
    echo json_encode($response);


// CREACIÓN

  //   {
  //    $sql = "INSERT INTO users (type, username, password, phone, restricted) VALUES (0,'$nombre', '$contra', '$email', 0)";
  //   	$query = $mysqli->query($sql);
  //       echo "usuario creado.";
  //   }
  //    echo "Error, no se ha podido crear el usuario.";
?>