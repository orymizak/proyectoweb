<?php
    session_start();
    require "connection.php";

    $userID = $_SESSION['ID'];
    $phone = $_POST['phone'];

    $hash = password_hash($passwordnew, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET phone = '$phone' WHERE ID = '$userID'";
    $result = $mysqli->prepare($sql);
    $result->execute();
    echo '<script>alert("Se ha cambiado el número de teléfono.");window.location.href="../account.php"</script>';
?>