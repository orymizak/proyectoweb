<?php
    //Encbezado CROS para que pueda hacerse la llamada
    header("Access-Control-Allow-Origin: *");

	$server = "orymizak.ddns.net";
	$dbname = "seyda_db";
	$username = "seyda_admin";
	$password = "seydamoda";

	 	$mysqli = new mysqli($server, $username, $password, $dbname);
	 	// Aquí sucede la conexión
	 	//echo 'Conectado';
	 	return $mysqli;
	 	die ("Connection failed: " . $mysqli->connect_error);
?>