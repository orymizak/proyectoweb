<?php
include_once 'bd/conexion.php';
$objeto = new conexion();
$conexion = $objeto->Conectar();

//$consulta = "SELECT ID, name, description, price, date, stock FROM products";
$consulta = "SELECT id, nombre, descripcion, precio, imagen FROM productos";
// $consulta = "SELECT * FROM images";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<HTML lang="es">

    <head>
        <meta charset = "utf-8">
        <title> Seyda || Administrador </title>
        <meta name = "description" content ="Tienda de pulseras y accesorios">
        <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0, maximum-scale= 1.0, minimum-scale=1.0">
        
        <!--JQuery-->
        <!--script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script-->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
       <!--HOJA DE ESTILO---> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!--Bootstrap js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!--DATATABLE--------->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.25/b-1.7.1/r-2.2.9/sl-1.3.3/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.25/b-1.7.1/r-2.2.9/sl-1.3.3/datatables.min.js"></script>

        <script src="modal.js"></script>
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
                                    <td><img src="data:image/jpg;base64,<?php echo base64_encode($dat['imagen']); ?>"/></td>
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

        <div class="modal fade" id="modalCrud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;
                                </span>
                        </button>
                    </div>
                    <form id="formProducto" method="POST" enctype="multipart/form-data">
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
                                <input type="file" class="form-control" id="imagen">
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