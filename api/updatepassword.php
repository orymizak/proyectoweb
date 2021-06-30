<?php
    session_start();
    require "connection.php";

    $userID = $_SESSION['ID'];
    $passwordold = $_POST['passwordold'];
    $passwordnew = $_POST['password'];

    $sql = "SELECT password FROM users WHERE ID = '$userID'";
    $result = $mysqli->prepare($sql);
    $result->execute();

    while($resultado = $result->fetch(PDO::FETCH_ASSOC)){
        if (password_verify($passwordold, $resultado['password'])){
            $hash = password_hash($passwordnew, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password = '$hash' WHERE ID = '$userID'";
            $result = $mysqli->prepare($sql);
            $result->execute();
            echo '<script>alert("La contraseña se ha cambiado correctamente");window.location.href="../account.php"</script>';
            break;
        }
        echo '<script>alert("La contraseña vieja no es correcta, reintente");window.location.href="../account.php"</script>';
    }
?>