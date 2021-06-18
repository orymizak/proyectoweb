<?php
    //Encbezado CROS para que pueda hacerse la llamada
	header("Access-Control-Allow-Origin: *");

    require "database.php";

 	$mysqli = new mysqli($server, $username, $password, $dbname);
 	// Aquí sucede la conexión
 	return $mysqli;
 	die ("Connection failed: " . $mysqli->connect_error);
 	
?>