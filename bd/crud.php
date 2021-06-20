<?php
    include_once '../bd/conexion.php';
    $objeto = new conexion();
    $conexion = $objeto->Conectar();

    //Recibir datos enviados mediante POST
    $name = (isset($_POST['name'])) ? $_POST['name'] : '';
    $description = (isset($_POST['description'])) ? $_POST['description'] : '';
    $price = (isset($_POST['price'])) ? $_POST['price'] : '';
    //este sí funciona
    //$image = (isset($_POST['image'])) ? $_POST['image'] : '';
    //este también
    $image = filter_input(INPUT_POST, 'image');


    //$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    //$image = (isset($_POST['image'])) ? addslashes(file_get_contents($_FILES['image']['tmp_name'])) : '';
    //$image = (isset($_POST['image'])) ? $_POST['image'] : '';

    $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
    $ID = (isset($_POST['ID'])) ? $_POST['ID'] : '';

    switch($opcion){
        case 1:
            $consulta = "INSERT INTO products (name, description, price, image) VALUES ('$name','$description', '$price', '$image')";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            $consulta = "SELECT ID, name, description, price, image FROM products ORDER BY ID DESC LIMIT 1";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
        case 2:
            $consulta = "UPDATE products SET name='$name', description='$description', price='$price', image='$image' WHERE ID='$ID' ";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            $consulta = "SELECT ID, name, description, price, image FROM products WHERE ID='$ID' ";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
        case 3:
            $consulta = "DELETE from products WHERE ID='$ID' ";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            break;
    }

    print json_encode($data, JSON_UNESCAPED_UNICODE);
    $conexion = NULL;