<?php
    //Encbezado CROS para que pueda hacerse la llamada
	// header("Access-Control-Allow-Origin: *");
		
    	require "database.php";

	 	$mysqli = new PDO(SERVER_ROUTE, USERNAME, PASSWORD);
    	$mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	 	return $mysqli;
	 	die ("Connection failed: " . $mysqli->connect_error);
?>

