<?php
    //Encbezado CROS para que pueda hacerse la llamada
	// header("Access-Control-Allow-Origin: *");
		
    require "database.php";

	 	$mysqli = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DATABASE_NAME);
	 	// Aquí sucede la conexión
	 	//echo 'Conectado';
	 	return $mysqli;
	 	die ("Connection failed: " . $mysqli->connect_error);
?>