<?php

    error_reporting(E_ERROR);
    require "connection.php";

    session_start();
    $userID = $_SESSION['ID'];

    // CONSULTAR PRIMERO
    $sql = "SELECT * FROM bag WHERE user_ID = :iduser";
    $result = $mysqli->prepare($sql);
    $result->execute(array(":iduser"=>$userID));
    
    while($datos = $result->fetch(PDO::FETCH_ASSOC)) {
    	$products_ID = $datos['products_ID'];

	    $sql2 = "SELECT * FROM products WHERE id = '$products_ID'";
	    $result2 = $mysqli->prepare($sql2);
	    $result2->execute();
	    
    	while($datos2 = $result2->fetch(PDO::FETCH_ASSOC)) {	
    		$new = $datos2['stock'] - $datos['quantity'];

    		if ($new >= 0){

	            $sql3 = "UPDATE products SET stock = '$new' WHERE ID = '$products_ID';
	            		 DELETE FROM bag WHERE user_ID = '$userID';";
		        $result3 = $mysqli->prepare($sql3);
			    $result3->execute();
        		echo '<script>alert("Usted ha pagado los artículos.");window.location.href = "../cart.php"</script>';

			}
			else
			{
        		echo '<script>alert("Hubo un error al procesar tu pago (no hay inventario suficiente).");window.location.href = "../cart.php"</script>';
			}
    	}
    }
    echo '<script>window.location.href = "../cart.php"</script>';

?>