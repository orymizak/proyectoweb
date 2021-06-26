<?php

    require "connection.php";

    //$userID = 1;
    //$userID = htmlentities(addslashes($userID));
    $userID = htmlentities(addslashes($_POST['userID']));
    


    $phone = htmlentities(addslashes($_POST['phone']));
    //$phone = 9999999999;
    //$phone = htmlentities(addslashes($phone));    

    $sql = "UPDATE users SET phone='$phone' WHERE ID = :userID";

    $result = $mysqli->prepare($sql);
    $result->execute(array(":userID"=>$userID));

    $response = array();
    $response['status_text'] = "Usted se ha registrado correctamente.";
    
    echo json_encode($response);

?>
