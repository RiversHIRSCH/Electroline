<!-- Modal Structure -->
<div id="modalAgregarAudio" class="modal">
    <div class="modal-content">
        <div class="row">
            <h4 class="center grey-text"><strong>AGREGAR</strong></h4>
            <form>
                <div class="input-field col s6">
                    <input id="nombreProductoAudio" type="text" class="validate" required>
                    <label for="nombreProductoAudio">Nombre</label>
                </div>
                <div class="input-field col s6">
                    <input id="marcaProductoAudio" type="text" class="validate" required>
                    <label for="marcaProductoAudio">Marca</label>
                </div>
                <div class="input-field col s6">
                    <input id="precioProductoAudio" type="number" class="validate" required>
                    <label for="precioProductoAudio">Precio</label>
                </div>
                <div class="input-field col s6">
                    <input id="categoriaProductoAudio" type="text" class="validate" value="Audio" disabled>
                    <label for="categoriaProductoAudio">Categoria</label>
                </div>
                <div class="input-field col s12">
                    <textarea id="descripcionProductoAudio" class="materialize-textarea"></textarea>
                    <label for="descripcionProductoAudio">Descripción</label>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a onclick="guardarProducto('Audio');" class="modal-close waves-effect waves-green btn-flat">Guardar</a>
    </div>
</div>
<div id="modalAgregarCableado" class="modal">
    <div class="modal-content">
        <div class="row">
            <h4 class="center grey-text"><strong>AGREGAR</strong></h4>
            <form>
                <div class="input-field col s6">
                    <input id="nombreProductoCableado" type="text" class="validate" required>
                    <label for="nombreProductoCableado">Nombre</label>
                </div>
                <div class="input-field col s6">
                    <input id="marcaProductoCableado" type="text" class="validate" required>
                    <label for="marcaProductoCableado">Marca</label>
                </div>
                <div class="input-field col s6">
                    <input id="precioProductoCableado" type="number" class="validate" required>
                    <label for="precioProductoCableado">Precio</label>
                </div>
                <div class="input-field col s6">
                    <input id="categoriaProductoCableado" type="text" class="validate" value="Cableado" disabled>
                    <label for="categoriaProductoCableado">Categoria</label>
                </div>
                <div class="input-field col s12">
                    <textarea id="descripcionProductoCableado" class="materialize-textarea"></textarea>
                    <label for="descripcionProductoCableado">Descripción</label>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a onclick="guardarProducto('Cableado');" class="modal-close waves-effect waves-green btn-flat">Guardar</a>
    </div>
</div>
<div id="modalAgregaIluminacion" class="modal">
    <div class="modal-content">
        <div class="row">
            <h4 class="center grey-text"><strong>AGREGAR</strong></h4>
            <form>
                <div class="input-field col s6">
                    <input id="nombreProductoIluminacion" type="text" class="validate" required>
                    <label for="nombreProductoIluminacion">Nombre</label>
                </div>
                <div class="input-field col s6">
                    <input id="marcaProductoIluminacion" type="text" class="validate" required>
                    <label for="marcaProductoIluminacion">Marca</label>
                </div>
                <div class="input-field col s6">
                    <input id="precioProductoIluminacion" type="number" class="validate" required>
                    <label for="precioProductoIluminacion">Precio</label>
                </div>
                <div class="input-field col s6">
                    <input id="categoriaProductoIluminacion" type="text" class="validate" value="Ilumunación" disabled>
                    <label for="categoriaProductoIluminacion">Categoria</label>
                </div>
                <div class="input-field col s12">
                    <textarea id="descripcionProductoIluminacion" class="materialize-textarea"></textarea>
                    <label for="descripcionProductoIluminacion">Descripción</label>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a onclick="guardarProducto('Iluminacion');" class="modal-close waves-effect waves-green btn-flat">Guardar</a>
    </div>
</div>
<div id="modalAgregarComponentes" class="modal">
    <div class="modal-content">
        <div class="row">
            <h4 class="center grey-text"><strong>AGREGAR</strong></h4>
            <form>
                <div class="input-field col s6">
                    <input id="nombreProductoComponentes" type="text" class="validate" required>
                    <label for="nombreProductoComponentes">Nombre</label>
                </div>
                <div class="input-field col s6">
                    <input id="marcaProductoComponentes" type="text" class="validate" required>
                    <label for="marcaProductoComponentes">Marca</label>
                </div>
                <div class="input-field col s6">
                    <input id="precioProductoComponentes" type="number" class="validate" required>
                    <label for="precioProductoComponentes">Precio</label>
                </div>
                <div class="input-field col s6">
                    <input id="categoriaProductoComponentes" type="text" class="validate" value="Componentes" disabled>
                    <label for="categoriaProductoComponentes">Categoria</label>
                </div>
                <div class="input-field col s12">
                    <textarea id="descripcionProductoComponentes" class="materialize-textarea"></textarea>
                    <label for="descripcionProductoComponentes">Descripción</label>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a onclick="guardarProducto('Componentes');" class="modal-close waves-effect waves-green btn-flat">Guardar</a>
    </div>
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
                            <button class="btn-small red lighten-2 waves-effect waves-light btn modal-trigger" href="#modalAgregarAudio">Agregar</button>
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
                            <button class="btn-small red lighten-2 waves-effect waves-light btn modal-trigger" href="#modalAgregarCableado">Agregar</button>
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
                            <button class="btn-small red lighten-2 waves-effect waves-light btn modal-trigger" href="#modalAgregaIluminacion">Agregar</button>
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
                            <button class="btn-small red lighten-2 waves-effect waves-light btn modal-trigger" href="#modalAgregarComponentes">Agregar</button>
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
    });

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

    // MOSTRAR COMPONENTES
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
        let producto = $('#nombreProducto' + categoria).val();
        let marca = $('#marcaProducto' + categoria).val();
        let precio = $('#precioProducto' + categoria).val();
        let descripcion = $('#descripcionProducto' + categoria).val();
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
        $.ajax({
            type: "POST",
            url: "ajax/crudInventarioAjax.php",
            data: {
                accion: "agregar",
                producto,
                marca,
                precio,
                categoria: idCategoria,
                descripcion
            },
            error: function(data) {
                console.error("Error peticion ajax para obtener datos, DETALLES: " + data);
            },
            success: function(data) {
                alert("Producto agregado exitosamente");
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
            }
        });
    }
</script>