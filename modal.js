$(document).ready(function(){
    tablaProductos = $("#tablaProductos").DataTable({
        "columnDefs":[{
            "targets": -1,
            "data":null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class = 'btn btn-danger btnBorrar'>Borrar</button></div></div>"
        }],

    "language" : {
        "lengthMenu":"Mostrar _MENU_ registros",
        "zeroRecords":"No se encontraron resultados",
        "info":"Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty":"Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoFiltered":"(filtrado de un total de _MAX_ registros)",
        "sSearch":"Buscar",
        "oPaginate":{
            "sFirst":"Primero",
            "sLast":"Último",
            "sNext":"Siguiente",
            "sPrevious":"Anterior"
        },
        "sProcessing":"Procesando...",
    }

    });

    $("#btnNuevo").click(function(){
        //alert("hola");
        $("#formProducto").trigger("reset");
        $(".modal-header").css("background-color","#28a745");
        $(".modal-header").css("color","white");
        $(".modal-title").text("Nuevo producto");
        $("#modalCrud").modal("show");
        id=null;
        opcion = 1;
    });

    var fila;

    //*********************************EDITAR*****************************************
    $(document).on("click",".btnEditar",function(){
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        nombre = fila.find('td:eq(1)').text();
        descripcion = fila.find('td:eq(2)').text();
        precio = parseInt(fila.find('td:eq(3)').text());
        imagen = fila.find('td:eq(4)').text();

        $("#nombre").val(nombre);
        $("#descripcion").val(descripcion);
        $("#precio").val(precio);
        $("#imagen").val(imagen);

        opcion = 2;
        $(".modal-header").css("background-color","#007bff");
        $(".modal-header").css("color","white");
        $(".modal-title").text("Editar producto");
        $("#modalCrud").modal("show");

    });

    //******************************BORRAR************************************************
    $(document).on("click",".btnBorrar",function(){
        fila = $(this);
        id = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3
        var respuesta = confirm("¿Eliminar producto "+id+"?");
        if(respuesta){
            $.ajax({
                url: "bd/crud.php",
                type: "POST",
                dataType: "json",
                data: {opcion:opcion, id:id},
                success: function(){
                    alert("entro");
                    tablaProductos.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });
    







    $("#formProducto").submit(function(e){
        e.preventDefault();
        nombre = $.trim($("#nombre").val());
        descripcion = $.trim($("#descripcion").val());
        precio = $.trim($("#precio").val());
        imagen = $.trim($("#imagen").val());

        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {nombre:nombre, descripcion:descripcion, precio:precio, imagen:imagen, id:id, opcion:opcion},
            success: function(data){
                //var datos = JSON.parse(data);
                //console.log(data);
                id = data[0].id;
                nombre = data[0].nombre;
                descripcion = data[0].descripcion;
                precio = data[0].precio;
                imagen = data[0].imagen;
                if(opcion == 1){
                    tablaProductos.row.add([id,nombre,descripcion,precio,imagen]).draw();
                }else{
                    tablaProductos.row(fila).data([id,nombre,descripcion,precio,imagen]).draw();
                }
            } 
        });
        $("#modalCrud").modal("hide");
    });
    });