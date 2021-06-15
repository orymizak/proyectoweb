<?php

	// este no será del todo necesario 
    require "connection.php";
    
    $idUsuario = $_POST['idUsuario'];
    
    $sql = "DELETE FROM usuarios WHERE idUsuario='$idUsuario'";
    $query = $mysqli->query($sql);
    
?>
