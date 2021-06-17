<?php
    //Encbezado CROS para que pueda hacerse la llamada

	/*$server = "orymizak.ddns.net";
	$dbname = "seyda_db";
	$username = "seyda_admin";
	$password = "seydamoda";*/

	$server = "localhost:33065";
	$dbname = "seydabd";
	$username = "root";
	$password = "";

	 	$mysqli = new mysqli($server, $username, $password, $dbname);
	 	// Aquí sucede la conexión
	 	//echo 'Conectado';
	 	return $mysqli;
	 	die ("Connection failed: " . $mysqli->connect_error);
?>


<!-- 
<?php
//$database = "seyda_bd";
//$username = "seyda_admin";
//$password = "seydamoda";
//$port = "orymizak.ddns.net";

// falta hacer petición
$conn = mysqli_connect($port, $username, $password, $database);

if(!$conn){
    die ("Error en la conexion: ".mysqli_connect_error());
}

$nombre = $_POST["user"];
$pass = $_POST["password"];

//$query =mysqli_query($conn, "Select * FROM users WHERE username = '".$nombre."' and password = '".$pass."'");

$query =mysqli_query($conn, "Select * FROM usuario WHERE user = '".$nombre."' and pass = '".$pass."'");


$nr = mysqli_num_rows($query);

if($nr==1){
    header("Location: admin.php");
}else{
    echo "datos incorrectos";
}
?> -->