<?php

    require "connection.php";
    $idUsuario = 195;

    $sql = "SELECT * FROM bag JOIN products ON bag.products_ID = products.ID";
    $result = $mysqli->prepare($sql);
    $result->execute();

    $query = $mysqli->query($sql);


    while($resultado = $result->fetch(PDO::FETCH_ASSOC)) {
    	$resultado['urlmaker'] = "http://localhost/Proyecto/proyectoweb/images/".$resultado['ID'].".png";
    	$datos[] = $resultado;
    }

    echo json_encode($datos);

?>