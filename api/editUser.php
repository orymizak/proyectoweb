<?php

    require "connection.php";
    $userID = htmlentities(addslashes($_POST['userID']));
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $phone = htmlentities(addslashes($_POST['phone']));
    

    $sql = "UPDATE usuarios SET ID='$userID', phone='$phone', password ='$password' WHERE idUsuario='$idUsuario'";
    $query = $mysqli->query($sql);

?>
