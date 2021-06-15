<?php
    
    // declaración de elementos base
    error_reporting(E_ERROR);
    require "connection.php";

    // declaración de variables
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $password = hash('sha512', $_POST['password']);
    $message = "";

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $mysqli->query($sql);
    $response = array();

    if ($result->num_rows == 1){
        $response['status'] = 1;
        $response['status_text'] = "El usuario ya existe";
        $response['user_arr'] = $result->fetch_assoc();
    }
    else
    {
        $response['status'] = 0;
        $response['status_text'] = "Permitir registro";
    }
    $mysqli->close();
    header('Content-Type: application/json');
    echo json_encode($response);


// CREACIÓN

  //   {
  //    $sql = "INSERT INTO users (type, username, password, phone, restricted) VALUES (0,'$nombre', '$contra', '$email', 0)";
  //   	$query = $mysqli->query($sql);
  //       echo "usuario creado.";
  //   }
  //    echo "Error, no se ha podido crear el usuario.";
?>