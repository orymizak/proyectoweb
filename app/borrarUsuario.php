<?php

	// este no será del todo necesario 
    require "conexion.php";
    
    $idUsuario = $_POST['idUsuario'];
    
    $sql = "DELETE FROM usuarios WHERE idUsuario='$idUsuario'";
    $query = $mysqli->query($sql);
    
?>
