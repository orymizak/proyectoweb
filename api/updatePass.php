<?php

    require "connection.php";

    //$userID = 1;
    //$userID = htmlentities(addslashes($userID));
    $userID = htmlentities(addslashes($_POST['userID']));
    


    $password = htmlentities(addslashes($_POST['password']));
    //$phone = 9999999999;
    //$phone = htmlentities(addslashes($phone));    

    $sql = "UPDATE users SET password='$password' WHERE ID = :userID";

    $result = $mysqli->prepare($sql);
    $result->execute(array(":userID"=>$userID));
	if(password_verify($password, $registro['password'])){
		$response = array();
		$response['status_text'] = "Usted se ha conectado, bienvenido $username.";

	    break;
	}
    echo json_encode($response);

?>