<?php
    require "connection.php";
    //$idBag = 4;
    //$idBag = htmlentities(addslashes($idBag));
    $idBag = htmlentities(addslashes($_POST['ID']));

    $sql = "DELETE FROM bag WHERE ID = :idItem";
    $result = $mysqli->prepare($sql);
    $result->execute(array(":idItem"=>$idBag));

    $response = array();

    $response['status_text'] = "Usted se ha registrado correctamente.";
    
    echo json_encode($response);
    
?>