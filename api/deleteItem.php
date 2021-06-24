<?php

	// este no será del todo necesario 
    require "connection.php";
    
    $idItem = $_POST['id'];
    $sql = "DELETE FROM bag WHERE user_ID = 'idItem'";
    $query = $mysqli->query($sql);
    
?>