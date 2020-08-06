<!-- Modal Agregar Inventario -->
<div id="modalInventario" class="modal">
    <form id="formInventario">
        <div class="modal-content">
            <div class="row">
                <h4 id="tituloModalInventario" class="center grey-text"></h4>
                <input type="text" id="idProducto" name="idProducto" style="display: none;">
                <input type="text" id="accion" name="accion" style="display: none;">
                <div class="input-field col s6">
                    <input id="nombreProducto" name="nombreProducto" type="text" class="validate" required>
                    <label for="nombreProducto">Nombre</label>
                </div>
                <div class="input-field col s6">
                    <input id="marcaProducto" name="marcaProducto" type="text" class="validate" required>
                    <label for="marcaProducto">Marca</label>
                </div>
                <div class="input-field col s6">
                    <input id="precioProducto" name="precioProducto" type="number" class="validate" required>
                    <label for="precioProducto">Precio</label>
                </div>
                <div class="file-field input-field col s6">
                    <div class="btn-small red lighten-2 waves-effect waves-light">
                        <span>Imagen</span>
                        <input type="file" id="imagenProducto" name="imagenProducto">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Elige una imagen">
                    </div>
                </div>
                <div class="input-field col s6" style="display: none;">
                    <input id="categoriaProducto" type="text" class="validate" required>
                    <input type="text" id="idCategoria" name="idCategoria">
                </div>
                <div class="input-field col s12">
                    <textarea id="descripcionProducto" name="descripcionProducto" class="materialize-textarea" required></textarea>
                    <label for="descripcionProducto">Descripción</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
            <button type="submit" class="waves-effect waves-green btn-flat">Guardar</button>
        </div>
    </form>
</div>

<!-- Modal Editar Inventario -->
<div id="modalEditarInventario" class="modal">
    <form id="formEditarInventario">
        <div class="modal-content">
            <div class="row valign-wrapper">
                <div class="col s9 left-align">
                    <h4 id="tituloModalEditarInventario" class="grey-text"></h4>
                </div>
                <div class="col s3 right-align">
                    <img src="" id="vizualizadorImagen" style="width: 130px;padding-left: 2vh;">
                </div>
            </div>
            <div class="row">
                <input type="text" id="idProductoE" name="idProductoE">
                <input type="text" id="accionE" name="accion" value="editar">
                <div class="input-field col s6">
                    <input id="nombreProductoE" name="nombreProductoE" type="text" class="validate" required>
                </div>
                <div class="input-field col s6">
                    <input id="marcaProductoE" name="marcaProductoE" type="text" class="validate" required>
                </div>
                <div class="input-field col s6">
                    <input id="precioProductoE" name="precioProductoE" type="number" class="validate" required>
                </div>
                <div class="file-field input-field col s6">
                    <div class="btn-small red lighten-2 waves-effect waves-light">
                        <span>Cambiar imagen</span>
                        <input type="file" id="imagenProductoE" name="imagenProductoE">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Elige una imagen">
                    </div>
                </div>
                <div class="input-field col s6">
                    <input id="categoriaProductoE" type="text" class="validate" required>
                    <input type="text" id="idCategoriaE" name="idCategoriaE">
                </div>
                <div class="input-field col s12">
                    <textarea id="descripcionProductoE" name="descripcionProductoE" class="materialize-textarea" required></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
            <button type="submit" class="waves-effect waves-green btn-flat">Guardar</button>
        </div>
    </form>
</div>

<div class="row">
    <!-- CONTENIDO -->
    <div class="col s12 m9 l10" style="overflow-y: hidden; height: 92vh">
        <div id="seccionAudio" class="section" style="padding-left: 5vh;">
            <div class="row">
                <br>
                <div class="col l4 offset-l4">
                    <div class="row valign-wrapper">
                        <div class="col l6">
                            <h4 style="border-left: 5px solid #e57373; padding-left: 3vh;">Audio</h4>
                        </div>
                        <div class="col l6" style="padding-top: 3vh;">
                            <button class="btn-small red lighten-2 waves-effect waves-light btn modal-trigger" href="#modalInventario" onclick="insertarCategoria('Audio')">Agregar</button>
                        </div>
                    </div>
                </div>
                <div id="contenedorAudio" class="col l12"></div>
            </div>
        </div>
        <div id="seccionCableado" class="section" style="padding-left: 5vh;">
            <div class="row">
                <br>
                <div class="col l4 offset-l4">
                    <div class="row valign-wrapper">
                        <div class="col l6">
                            <h4 style="border-left: 5px solid #e57373; padding-left: 3vh;">Cableado</h4>
                        </div>
                        <div class="col l6" style="padding-top: 3vh;">
                            <button class="btn-small red lighten-2 waves-effect waves-light btn modal-trigger" href="#modalInventario" onclick="insertarCategoria('Cableado')">Agregar</button>
                        </div>
                    </div>
                </div>
                <div id="contenedorCableado" class="col l12"></div>
            </div>
        </div>
        <div id="seccionIluminación" class="section" style="padding-left: 5vh;">
            <div class="row">
                <br>
                <div class="col l5 offset-l4">
                    <div class="row valign-wrapper">
                        <div class="col l6">
                            <h4 style="border-left: 5px solid #e57373; padding-left: 3vh;">Iluminación</h4>
                        </div>
                        <div class="col l6" style="padding-top: 3vh;">
                            <button class="btn-small red lighten-2 waves-effect waves-light btn modal-trigger" href="#modalInventario" onclick="insertarCategoria('Iluminacion')">Agregar</button>
                        </div>
                    </div>
                </div>
                <div id="contenedorIluminacion" class="col l12"></div>
            </div>
        </div>
        <div id="seccionComponentes" class="section" style="padding-left: 5vh;">
            <div class="row">
                <br>
                <div class="col l6 offset-l4">
                    <div class="row valign-wrapper">
                        <div class="col l6">
                            <h4 style="border-left: 5px solid #e57373; padding-left: 3vh;">Componentes</h4>
                        </div>
                        <div class="col l6" style="padding-top: 3vh;">
                            <button class="btn-small red lighten-2 waves-effect waves-light btn modal-trigger" href="#modalInventario" onclick="insertarCategoria('Componentes')">Agregar</button>
                        </div>
                    </div>
                </div>
                <div id="contenedorComponentes" class="col l12"></div>
            </div>
        </div>
        <div id="seccionVentas" class="section" style="padding-left: 5vh;">
            <div class="row">
                <br>
                <div class="col l2 offset-l5">
                    <h4 style="border-left: 5px solid #e57373; padding-left: 3vh;">Ventas</h4>
                </div>
                <div id="contenedorVentas" class="col l12"></div>
            </div>
        </div>
    </div>
    <!-- SCROLLSPY -->
    <div class="col hide-on-small-only m3 l2" style="padding-left: 7vh; padding-top: 20vh;">
        <ul class="section table-of-contents">
            <li><a id="linkSeccionInventario"><strong class="red-text text-lighten-2">INVENTARIO</strong></a></li>
            <li><a id="linkSeccionAudio" class="active">Audio</a></li>
            <li><a id="linkSeccionCableado">Cableado</a></li>
            <li><a id="linkSeccionIluminación">Iluminación</a></li>
            <li><a id="linkSeccionComponentes">Componentes</a></li>
            <br>
            <li><a id="linkSeccionVentas"><strong class="red-text text-lighten-2">VENTAS</strong></a></li>
            <li><a id="linkSeccionVentasGeneral">General</a></li>
        </ul>
    </div>
</div>

<script>
    $(document).ready(function() {
        mostrarAudio();
        mostrarCableado();
        mostrarIluminacion();
        mostrarComponentes();
        mostrarVentas();

        $('#formInventario').submit(function(e) {
            e.preventDefault();
            guardarProducto($('#categoriaProducto').val());
        });

        $('#formEditarInventario').submit(function(e) {
            e.preventDefault();
            console.log("Editando producto");
        });
    });

    function insertarCategoria(categoria) {
        $('#categoriaProducto').val(categoria);
        $('#tituloModalInventario').empty();
        $('#tituloModalInventario').append('<strong>AGREGAR </strong>' + categoria);
    }

    // MOSTRAR AUDIO
    function mostrarAudio() {
        $.ajax({
            type: "POST",
            url: "ajax/crudInventarioAjax.php",
            data: {
                accion: "leer",
                cat: "audio"
            },
            error: function(data) {
                console.error("Error peticion ajax para obtener datos, DETALLES: " + data);
            },
            success: function(data) {
                $('#contenedorAudio').empty();
                $('#contenedorAudio').append(data);
                tabularInventario("tablaaudio");
            }
        });
    }

    // MOSTRAR CABLEADO
    function mostrarCableado() {
        $.ajax({
            type: "POST",
            url: "ajax/crudInventarioAjax.php",
            data: {
                accion: "leer",
                cat: "cableado"
            },
            error: function(data) {
                console.error("Error peticion ajax para obtener datos, DETALLES: " + data);
            },
            success: function(data) {
                $('#contenedorCableado').empty();
                $('#contenedorCableado').append(data);
                tabularInventario("tablacableado");
            }
        });
    }

    // MOSTRAR ILUMINACION
    function mostrarIluminacion() {
        $.ajax({
            type: "POST",
            url: "ajax/crudInventarioAjax.php",
            data: {
                accion: "leer",
                cat: "iluminacion"
            },
            error: function(data) {
                console.error("Error peticion ajax para obtener datos, DETALLES: " + data);
            },
            success: function(data) {
                $('#contenedorIluminacion').empty();
                $('#contenedorIluminacion').append(data);
                tabularInventario("tablailuminacion");
            }
        });
    }

    // MOSTRAR COMPONENTES
    function mostrarComponentes() {
        $.ajax({
            type: "POST",
            url: "ajax/crudInventarioAjax.php",
            data: {
                accion: "leer",
                cat: "componentes"
            },
            error: function(data) {
                console.error("Error peticion ajax para obtener datos, DETALLES: " + data);
            },
            success: function(data) {
                $('#contenedorComponentes').empty();
                $('#contenedorComponentes').append(data);
                tabularInventario("tablacomponentes");
            }
        });
    }

    // MOSTRAR VENTAS
    function mostrarVentas() {
        $.ajax({
            type: "POST",
            url: "ajax/crudInventarioAjax.php",
            data: {
                accion: "leer",
                cat: "ventas"
            },
            error: function(data) {
                console.error("Error peticion ajax para obtener datos, DETALLES: " + data);
            },
            success: function(data) {
                $('#contenedorVentas').empty();
                $('#contenedorVentas').append(data);
                tabularInventario("tablaventas");
            }
        });
    }

    // TABULAR INVENTARIO
    function tabularInventario(id) {
        $('#' + id).DataTable({
            scrollY: 305,
            scrollX: true,
            language: {
                sProcessing: "Procesando...",
                sLengthMenu: "Mostrar _MENU_ registros",
                sZeroRecords: "No se encontraron resultados",
                sEmptyTable: "Ningún dato disponible en esta tabla",
                sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                sInfoPostFix: "",
                sSearch: "Buscar:",
                sUrl: "",
                sInfoThousands: ",",
                sLoadingRecords: "Cargando...",
                oPaginate: {
                    sFirst: "Primero",
                    sLast: "Último",
                    sNext: "Siguiente",
                    sPrevious: "Anterior"
                },
                aria: {
                    SortAscending: ": Activar para ordenar la columna de manera ascendente",
                    SortDescending: ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
    }

    // GUARDAR PRODUCTOS
    function guardarProducto(categoria) {
        let producto = $('#nombreProducto').val();
        let marca = $('#marcaProducto').val();
        let precio = $('#precioProducto').val();
        let descripcion = $('#descripcionProducto').val();
        let idCategoria = 0;
        switch (categoria) {
            case "Audio":
                idCategoria = 3;
                break;
            case "Cableado":
                idCategoria = 1;
                break;
            case "Iluminacion":
                idCategoria = 2;
                break;
            case "Componentes":
                idCategoria = 4;
                break;

            default:
                console.error("Categoria no encontrada !");
                break;
        }
        $('#idCategoria').val(idCategoria);
        $('#accion').val("agregar");
        var formData = new FormData(document.getElementById('formInventario'));
        $.ajax({
            type: "POST",
            url: "ajax/crudInventarioAjax.php",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(echo) {
            let mensaje = echo.split('|');
            if (mensaje[0] == "success") {
                $('#modalInventario').modal('close');
                document.getElementById('formInventario').reset();
                M.toast({
                    html: mensaje[1]
                });
                switch (categoria) {
                    case "Audio":
                        mostrarAudio();
                        break;
                    case "Cableado":
                        mostrarCableado();
                        break;
                    case "Iluminacion":
                        mostrarIluminacion();
                        break;
                    case "Componentes":
                        mostrarComponentes();
                        break;

                    default:
                        console.error("Tabla no actualizada !");
                        break;
                }
            } else if (mensaje[0] == "error") {
                M.toast({
                    html: mensaje[1]
                });
            } else {
                M.toast({
                    html: "Imagen demasiado grande!"
                });
                console.log("No se definió el tipo de respuesta: ");
            }
        });
    }
</script>