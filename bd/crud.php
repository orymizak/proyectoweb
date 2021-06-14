<?php
    include_once '../bd/conexion.php';
    $objeto = new conexion();
    $conexion = $objeto->Conectar();

    //Recibir datos enviados mediante POST
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
    $precio = (isset($_POST['precio'])) ? $_POST['precio'] : '';
    $imagen = (isset($_POST['imagen'])) ? $_POST['imagen'] : '';
    $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
    $id = (isset($_POST['id'])) ? $_POST['id'] : '';

    switch($opcion){
        case 1:
            $consulta = "INSERT INTO productos (nombre, descripcion, precio, imagen) VALUES ('$nombre','$descripcion', '$precio', '$imagen')";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            $consulta = "SELECT id, nombre, descripcion, precio, imagen FROM productos ORDER BY id DESC LIMIT 1";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
        case 2:
            $consulta = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio', imagen='$imagen' WHERE id='$id' ";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();

            $consulta = "SELECT id, nombre, descripcion, precio, imagen FROM productos WHERE id='$id' ";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
        case 3:
            $consulta = "DELETE from productos WHERE id='$id' ";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            break;
    }

    print json_encode($data, JSON_UNESCAPED_UNICODE);
    $conexion = NULL;