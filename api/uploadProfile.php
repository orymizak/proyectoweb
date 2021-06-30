<?php
    
    session_start();
    require "connection.php";

    $userID = $_SESSION['ID'];
    $imgName = time() . '_' . $_FILES['profileImage']['name'];
    $imgTemp = $_FILES['profileImage']['tmp_name'];

    $target = 'profile/' . $imgName;

    if (move_uploaded_file($imgTemp, $target)) {

        $sql = "UPDATE users SET profile_image = '$imgName' WHERE id = '$userID'";
        $result = $mysqli->prepare($sql);
        $result->execute();

        echo '<script>window.location.href="../account.php";</script>';
        die();
    }
    else
    {
        echo '<script>window.history.back();</script>';
    }

?>