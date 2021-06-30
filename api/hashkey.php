<?php
 
    session_start();
	 require_once('connection.php');

	$userID = $_SESSION['ID'];
	$hashkey = bin2hex(random_bytes(6));

    $sql = "UPDATE users SET hashkey = '$hashkey' WHERE id = '$userID'";
    $result = $mysqli->prepare($sql);
    $result->execute();
    echo '<script>alert("Se ha generado el hashkey.");window.location.href="../account.php"</script>';
    die();

?>	 