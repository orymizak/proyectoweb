<?php
include_once 'conexion.php';
$objeto = new conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, nombre, descripcion, precio, imagen FROM productos";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<HTML lang="es">

    <head>
        <meta charset = "utf-8">
        <title> Seyda || Login </title>
        <meta name = "description" content ="Tienda de pulseras y accesorios">
        <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0, maximum-scale= 1.0, minimum-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="admin.css">

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.25/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.25/datatables.min.js"></script>
    </head>

    <body>
        <header>
        </header>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <button id="btnNuevo" type="button" class="btn btn-success">Nuevo</button>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="tablaProductos" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>id</th>
                                    <th>nombre</th>
                                    <th>descripcion</th>
                                    <th>precio</th>
                                    <th>imagen</th>
                                    <th>Acciones</ht>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($data as $dat){
                                ?>
                                <tr>
                                    <td><?php echo  $dat['id']?></td>
                                    <td><?php echo  $dat['nombre']?></td>
                                    <td><?php echo  $dat['descripcion']?></td>
                                    <td><?php echo  $dat['precio']?></td>
                                    <td><?php echo  $dat['imagen']?></td>
                                    <td></td>
                                </tr>
                                <?php
                                    }
                                ?>    
                            </tbody>
                        </table>   
                    </div> 
                </div>
            </div>
        </div>


        <!------------Modal---------->

        <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" clase="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;
                            </span>
                        </button>
                    </div>
                    <form id="formProducto">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombre" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre">
                            </div>
                            <div class="form-group">
                                <label for="descripcion" class="col-form-label">Descripcion:</label>
                                <input type="text" class="form-control" id="descripcion">
                            </div>
                            <div class="form-group">
                                <label for="precio" class="col-form-label">Precio:</label>
                                <input type="text" class="form-control" id="precio">
                            </div>
                            <div class="form-group">
                                <label for="imagen" class="col-form-label">Imagen:</label>
                                <input type="text" class="form-control" id="imagen">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                            <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
    </body>

</html>