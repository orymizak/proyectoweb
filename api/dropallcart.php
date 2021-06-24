<?php

	// este no será del todo necesario 
    require "connection.php";
    
    $idUsuario = $_POST['id'];
    $sql = "DELETE FROM bag WHERE user_ID = '$idUsuario'";
    $query = $mysqli->query($sql);
    
?>