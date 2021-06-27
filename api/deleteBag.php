<?php

	// este no será del todo necesario 
    require "connection.php";
    
    $idUsuario = htmlentities(addslashes($_POST['id']));
    
    $sql = "DELETE FROM bag WHERE idUsuario='$idUsuario'";
    $query = $mysqli->query($sql);
    $response = array();
    $response['status_text'] = "Usted se ha registrado correctamente.";
    
    echo json_encode($response);

    
?>