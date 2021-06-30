<?php
    session_start();
    require "connection.php";

    $userID = $_POST['identification'];
    $passwordnew = $_POST['newpassword'];
    $hash = password_hash($passwordnew, PASSWORD_DEFAULT);
    $hashkey = $_POST['hash'];

    $sql = "SELECT password, hashkey FROM users where (username='$userID' OR phone = '$userID')";
    $result = $mysqli->prepare($sql);
    $result->execute();

    while($resultado = $result->fetch(PDO::FETCH_ASSOC)){

        if ($hashkey == $resultado['hashkey']){

            $sql = "UPDATE users SET password = '$hash' WHERE username = '$userID'";
            $result = $mysqli->prepare($sql);
            $result->execute();
            echo '<script>alert("Usted ha cambiado su contraseña con éxito."); window.location.href ="../account.php"</script>';
            break;
        }
        echo '<script>alert("No se pudo corroborar su identidad. Reintente."); window.location.href ="../forgot.php"</script>';
        break;
    }
    echo '<script>alert("No se pudo encontrar la cuenta. Reintente."); window.location.href ="../forgot.php"</script>';

?>