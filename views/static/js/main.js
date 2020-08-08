$(document).ready(function () {
    // CERRAR SESION
    $('#salir').on('click', function () {
        $.ajax({
            type: "POST",
            url: "ajax/loginAjax.php",
            data: {
                tipoPeticion: "salir"
            },
            error: function (data) {
                console.error(data);
            },
            success: function (data) {
                location.href = "welcome";
            }
        });
    });
    // MOSTRAR LO MAS NUEVO
    $.ajax({
        type: "POST",
        url: "ajax/busquedaAjax.php",
        data: {
            tipo: "loMasNuevo"
        },
        error: function (data) {
            console.error("Error peticion ajax para obtener datos, DETALLES: " + data);
        },
        success: function (data) {
            $('#contenedorLoMasNuevo').empty();
            $('#contenedorLoMasNuevo').append(data);
        }
    });

    // EVENTOS CLICK DE BOTONES PRINCIPALES
    $("#loMasNuevo").on('click', function () {
        document
            .getElementById("seccionLoMasNuevo")
            .scrollIntoView({ block: "start", behavior: "smooth" });
    });
    $("#quienesSomos").on('click', function () {
        document
            .getElementById("seccionQuienesSomos")
            .scrollIntoView({ block: "end", behavior: "smooth" });
    });
    $("#contactanos").on('click', function () {
        document
            .getElementById("seccionContactanos")
            .scrollIntoView({ block: "end", behavior: "smooth" });
    });

    // SCROLLSPY'S DE LA SESION DE ADMINISTRADOR
    $('#linkSeccionInventario').on('click', function () {
        document
            .getElementById("seccionAudio")
            .scrollIntoView({ block: "start", behavior: "smooth" });
        $('#linkSeccionAudio').addClass("active");
        $('#linkSeccionCableado').removeClass("active");
        $('#linkSeccionIluminación').removeClass("active");
        $('#linkSeccionComponentes').removeClass("active");
        $('#linkSeccionPedidosGeneral').removeClass("active");
        $('#linkSeccionVentasGeneral').removeClass("active");
    });
    $('#linkSeccionAudio').on('click', function () {
        document
            .getElementById("seccionAudio")
            .scrollIntoView({ block: "start", behavior: "smooth" });
        $('#linkSeccionAudio').addClass("active");
        $('#linkSeccionCableado').removeClass("active");
        $('#linkSeccionIluminación').removeClass("active");
        $('#linkSeccionComponentes').removeClass("active");
        $('#linkSeccionPedidosGeneral').removeClass("active");
        $('#linkSeccionVentasGeneral').removeClass("active");
    });
    $('#linkSeccionCableado').on('click', function () {
        document
            .getElementById("seccionCableado")
            .scrollIntoView({ block: "start", behavior: "smooth" });
        $('#linkSeccionAudio').removeClass("active");
        $('#linkSeccionCableado').addClass("active");
        $('#linkSeccionIluminación').removeClass("active");
        $('#linkSeccionComponentes').removeClass("active");
        $('#linkSeccionPedidosGeneral').removeClass("active");
        $('#linkSeccionVentasGeneral').removeClass("active");
    });
    $('#linkSeccionIluminación').on('click', function () {
        document
            .getElementById("seccionIluminación")
            .scrollIntoView({ block: "start", behavior: "smooth" });
        $('#linkSeccionAudio').removeClass("active");
        $('#linkSeccionCableado').removeClass("active");
        $('#linkSeccionIluminación').addClass("active");
        $('#linkSeccionComponentes').removeClass("active");
        $('#linkSeccionPedidosGeneral').removeClass("active");
        $('#linkSeccionVentasGeneral').removeClass("active");
    });
    $('#linkSeccionComponentes').on('click', function () {
        document
            .getElementById("seccionComponentes")
            .scrollIntoView({ block: "start", behavior: "smooth" });
        $('#linkSeccionAudio').removeClass("active");
        $('#linkSeccionCableado').removeClass("active");
        $('#linkSeccionIluminación').removeClass("active");
        $('#linkSeccionComponentes').addClass("active");
        $('#linkSeccionPedidosGeneral').removeClass("active");
        $('#linkSeccionVentasGeneral').removeClass("active");
    });
    $('#linkSeccionPedidos').on('click', function () {
        document
            .getElementById("seccionPedidos")
            .scrollIntoView({ block: "start", behavior: "smooth" });
        $('#linkSeccionAudio').removeClass("active");
        $('#linkSeccionCableado').removeClass("active");
        $('#linkSeccionIluminación').removeClass("active");
        $('#linkSeccionComponentes').removeClass("active");
        $('#linkSeccionPedidosGeneral').addClass("active");
        $('#linkSeccionVentasGeneral').removeClass("active");
    });
    $('#linkSeccionPedidosGeneral').on('click', function () {
        document
            .getElementById("seccionPedidos")
            .scrollIntoView({ block: "start", behavior: "smooth" });
        $('#linkSeccionAudio').removeClass("active");
        $('#linkSeccionCableado').removeClass("active");
        $('#linkSeccionIluminación').removeClass("active");
        $('#linkSeccionComponentes').removeClass("active");
        $('#linkSeccionPedidosGeneral').addClass("active");
        $('#linkSeccionVentasGeneral').removeClass("active");
    });
    $('#linkSeccionVentas').on('click', function () {
        document
            .getElementById("seccionVentas")
            .scrollIntoView({ block: "start", behavior: "smooth" });
        $('#linkSeccionAudio').removeClass("active");
        $('#linkSeccionCableado').removeClass("active");
        $('#linkSeccionIluminación').removeClass("active");
        $('#linkSeccionComponentes').removeClass("active");
        $('#linkSeccionPedidosGeneral').removeClass("active");
        $('#linkSeccionVentasGeneral').addClass("active");
    });
    $('#linkSeccionVentasGeneral').on('click', function () {
        document
            .getElementById("seccionVentas")
            .scrollIntoView({ block: "start", behavior: "smooth" });
        $('#linkSeccionAudio').removeClass("active");
        $('#linkSeccionCableado').removeClass("active");
        $('#linkSeccionIluminación').removeClass("active");
        $('#linkSeccionComponentes').removeClass("active");
        $('#linkSeccionPedidosGeneral').removeClass("active");
        $('#linkSeccionVentasGeneral').addClass("active");
    });

    // DETECTAR CLICK EN LOS BOTONES DE REGISTRO O INICIO DE SESION
    $('#btnIngresar').on('click', function () {
        document.getElementById("eleccionInicio").style.display = "none";
        document.getElementById("eleccionRegistro").style.display = "none";
        document.getElementById("eleccionIngresar").style.display = "block";
    });
    $('#btnRegistrarme').on('click', function () {
        document.getElementById("eleccionInicio").style.display = "none";
        document.getElementById("eleccionRegistro").style.display = "block";
        document.getElementById("eleccionIngresar").style.display = "none";
    });
    $('#regresarDeRegistro').on('click', function () {
        document.getElementById("eleccionInicio").style.display = "block";
        document.getElementById("eleccionRegistro").style.display = "none";
        document.getElementById("eleccionIngresar").style.display = "none";
    });
    $('#regresarDeIngresar').on('click', function () {
        document.getElementById("eleccionInicio").style.display = "block";
        document.getElementById("eleccionRegistro").style.display = "none";
        document.getElementById("eleccionIngresar").style.display = "none";
    });
    $('#creaTuCuentaAhora').on('click', function () {
        document.getElementById("eleccionInicio").style.display = "none";
        document.getElementById("eleccionRegistro").style.display = "block";
        document.getElementById("eleccionIngresar").style.display = "none";
    });

    // DETECTAR ENTER EN LAS BARRAS DE BUSQUEDA
    $('#search').keypress(function (e) {
        let code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            let busqueda = $('#search').val();
            if (busqueda == "" || busqueda == " ") {
                // Sin datos para buscar
            }
            else {
                if (location.pathname == "/Electroline/" || location.pathname == "/Electroline/welcome") { // Validar si se esta en la bienvenida...
                    var formulario = document.getElementById("infoForm"); // redireccionar al home
                    $('#info').val(busqueda);
                    formulario.submit();
                } else {
                    obtenerDatosGenerales();
                }
            }
        }
    });
    $('#searchInMenu').keypress(function (e) {
        let code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            let busqueda = $('#searchInMenu').val();
            if (busqueda == "" || busqueda == " ") {
                // Sin datos para buscar
            }
            else {
                if (location.pathname == "/Electroline/" || location.pathname == "/Electroline/welcome") { // Validar si se esta en la bienvenida...
                    var formulario = document.getElementById("infoForm"); // redireccionar al home
                    $('#info').val(busqueda);
                    formulario.submit();
                } else {
                    obtenerDatosGenerales();
                }
            }
        }
    });

    // SUBMIT DE FORMULARIOS
    $('#formInventario').submit(function (e) {
        e.preventDefault();
        guardarProducto($('#categoriaProducto').val());
    });
    $('#formEditarInventario').submit(function (e) {
        e.preventDefault();
        editarProducto($('#categoriaProductoE').val());
    });
    $('#formRegistrarUsuario').submit(function (e) {
        e.preventDefault();
        let nombre = $('#nombreRegistroUsuario').val();
        let domicilio = $('#domicilioRegistroUsuario').val();
        let email = $('#emailRegistroUsuario').val();
        let telefono = $('#telefonoRegistroUsuario').val();
        let contrasenia = $('#contraseniaRegistroUsuario').val();
        $.ajax({
            type: "POST",
            url: "ajax/loginAjax.php",
            data: {
                tipoPeticion: "registrar",
                nombre,
                domicilio,
                email,
                telefono,
                contrasenia
            },
            error: function (data) {
                console.error(data);
            },
            success: function (data) {
                let mensaje = data.split("|");
                if (mensaje[0] == "success") {
                    M.toast({
                        html: mensaje[1]
                    })
                } else if (mensaje[0] == "error") {
                    M.toast({
                        html: mensaje[1]
                    })
                } else {
                    console.log("Tipo de respuesta no definido!");
                }
            }
        });
    });
    $('#formIdentificarUsuario').submit(function (e) {
        e.preventDefault();
        let email = $('#correoUsuario').val();
        let contrasenia = $('#contraseniaUsuario').val();
        $.ajax({
            type: "POST",
            url: "ajax/loginAjax.php",
            data: {
                tipoPeticion: "identificar",
                email,
                contrasenia
            },
            error: function (data) {
                console.error(data);
            },
            success: function (data) {
                let mensaje = data.split("|");
                if (mensaje[0] == "success") {
                    if (email == "admin@admin") {
                        location.href = "inventory";
                    } else {
                        location.href = "welcome";
                    }
                } else if (mensaje[0] == "error") {
                    M.toast({
                        html: mensaje[1]
                    })
                } else {
                    console.log("Tipo de respuesta no definido!");
                }
            }
        });
    });
});

function obtenerDatosGenerales() {
    let busqueda = $('#search').val();
    $.ajax({
        type: "POST",
        url: "ajax/busquedaAjax.php",
        data: {
            tipo: "general",
            busqueda
        },
        error: function (data) {
            console.error("Error peticion ajax para obtener datos, DETALLES: " + data);
        },
        success: function (data) {
            $('#busqueda').empty();
            $('#busqueda').append(data);
            document.getElementById("tituloDashboard").innerHTML = "Resultados de busqueda...";
            $('#minimo').val("");
            $('#maximo').val("");
        }
    });
}

function vaciarBuscador() {
    $('#search').val("");
}

function buscarPorCategoria(categoria) {
    $.ajax({
        type: "POST",
        url: "ajax/busquedaAjax.php",
        data: {
            tipo: "categoria",
            busqueda: categoria
        },
        error: function (data) {
            console.error("Error peticion ajax para obtener datos, DETALLES: " + data);
        },
        success: function (data) {
            $('#busqueda').empty();
            $('#busqueda').append(data);
            $('#search').val(categoria);
            document.getElementById("tituloDashboard").innerHTML = "Resultados de busqueda por categoría (" + categoria + ")";
            $('#minimo').val("");
            $('#maximo').val("");
        }
    });
}

function busquedaPorRangoDePrecio() {
    let minimo = $('#minimo').val();
    let maximo = $('#maximo').val();

    if (minimo == "" || maximo == "") {
        M.toast({ html: 'Ingresa un rango!' });
    } else {
        if (minimo < 0 || maximo < 0) {
            M.toast({ html: 'Rango inválido!' });
        } else {
            $.ajax({
                type: "POST",
                url: "ajax/busquedaAjax.php",
                data: {
                    tipo: "rangoDePrecio",
                    minimo,
                    maximo
                },
                error: function (data) {
                    console.error("Error peticion ajax para obtener datos, DETALLES: " + data);
                },
                success: function (data) {
                    $('#busqueda').empty();
                    $('#busqueda').append(data);
                    $('#search').val("");
                    document.getElementById("tituloDashboard").innerHTML = "Resultados de busqueda por rango de precio (" + minimo + " - " + maximo + ")";
                }
            });
        }
    }
}

function insertarCategoria(categoria) {
    $('#categoriaProducto').val(categoria);
    $('#tituloModalInventario').empty();
    $('#tituloModalInventario').append('<strong>AGREGAR </strong>' + categoria);
}

// INVENTARIO //////////////////////////////////////////////////////////////////////////
// MOSTRAR AUDIO
function mostrarAudio() {
    $.ajax({
        type: "POST",
        url: "ajax/crudInventarioAjax.php",
        data: {
            accion: "leer",
            cat: "audio"
        },
        error: function (data) {
            console.error("Error peticion ajax para obtener datos, DETALLES: " + data);
        },
        success: function (data) {
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
        error: function (data) {
            console.error("Error peticion ajax para obtener datos, DETALLES: " + data);
        },
        success: function (data) {
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
        error: function (data) {
            console.error("Error peticion ajax para obtener datos, DETALLES: " + data);
        },
        success: function (data) {
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
        error: function (data) {
            console.error("Error peticion ajax para obtener datos, DETALLES: " + data);
        },
        success: function (data) {
            $('#contenedorComponentes').empty();
            $('#contenedorComponentes').append(data);
            tabularInventario("tablacomponentes");
        }
    });
}

// MOSTRAR PEDIDOS
function mostrarPedidos() {
    $.ajax({
        type: "POST",
        url: "ajax/crudInventarioAjax.php",
        data: {
            accion: "leer",
            cat: "pedidos"
        },
        error: function (data) {
            console.error("Error peticion ajax para obtener datos, DETALLES: " + data);
        },
        success: function (data) {
            $('#contenedorPedidos').empty();
            $('#contenedorPedidos').append(data);
            tabularInventario("tablapedidos");
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
        error: function (data) {
            console.error("Error peticion ajax para obtener datos, DETALLES: " + data);
        },
        success: function (data) {
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
    }).done(function (data) {
        let mensaje = data.split('|');
        if (mensaje[0] == "success") {
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
            $('#modalInventario').modal('close');
            document.getElementById('formInventario').reset();
            M.toast({
                html: mensaje[1]
            });
        } else if (mensaje[0] == "error") {
            M.toast({
                html: mensaje[1]
            });
        } else {
            console.log("No se definió el tipo de respuesta");
        }
    });
}

// EDITAR PRODUCTOS
function editarProducto(categoria) {
    let idCategoria = 0;
    switch (categoria) {
        case "audio":
            idCategoria = 3;
            break;
        case "cableado":
            idCategoria = 1;
            break;
        case "iluminación":
            idCategoria = 2;
            break;
        case "componentes":
            idCategoria = 4;
            break;

        default:
            console.error("Categoria no encontrada !");
            break;
    }
    $('#idCategoriaE').val(idCategoria);
    var formData = new FormData(document.getElementById('formEditarInventario'));
    $.ajax({
        type: "POST",
        url: "ajax/crudInventarioAjax.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    }).done(function (data) {
        let mensaje = data.split('|');
        if (mensaje[0] == "success") {
            switch (categoria) {
                case "audio":
                    mostrarAudio();
                    break;
                case "cableado":
                    mostrarCableado();
                    break;
                case "iluminación":
                    mostrarIluminacion();
                    break;
                case "componentes":
                    mostrarComponentes();
                    break;

                default:
                    console.error("Tabla no actualizada !");
                    break;
            }
            $('#modalEditarInventario').modal('close');
            M.toast({
                html: mensaje[1]
            });
        } else if (mensaje[0] == "error") {
            M.toast({
                html: mensaje[1]
            });
        } else {
            console.log("No se definió el tipo de respuesta");
        }
    });
}

// ELIMINAR PRODUCTOS
function eliminarProducto(idProducto, categoria) {
    $.ajax({
        type: "POST",
        url: "ajax/crudInventarioAjax.php",
        data: {
            accion: "eliminar",
            idProducto
        },
        error: function (data) {
            console.error("Error peticion ajax para eliminar producto, DETALLES: " + data);
        },
        success: function (data) {
            let mensaje = data.split("|");
            if (mensaje[0] == "success") {
                switch (categoria) {
                    case "audio":
                        mostrarAudio();
                        break;
                    case "cableado":
                        mostrarCableado();
                        break;
                    case "iluminación":
                        mostrarIluminacion();
                        break;
                    case "componentes":
                        mostrarComponentes();
                        break;

                    default:
                        console.error("Tabla no actualizada !");
                        break;
                }
                M.toast({
                    html: mensaje[1]
                })
            } else if (mensaje[0] == "error") {
                M.toast({
                    html: mensaje[1]
                })
            } else {
                console.log("Tipo de respuesta no definido!");
            }
        }
    });
}

// VER PEDIDO
function verPedido(idUsuario) {
    $.ajax({
        type: "POST",
        url: "ajax/pedidosAjax.php",
        data: {
            tipoPeticion: "verPedido",
            idUsuario
        },
        error: function (data) {
            console.error("Error peticion ajax para ver pedidos, DETALLES: " + data);
        },
        success: function (data) {
            $('#contenedorVerPedidos').empty();
            $('#contenedorVerPedidos').append(data);
            $('#modalVerPedidos').modal('open');
        }
    });
}

function pedidoPagado(idUsuario) {
    $.ajax({
        type: "POST",
        url: "ajax/pedidosAjax.php",
        data: {
            tipoPeticion: "pagarPedido",
            idUsuario
        },
        error: function (data) {
            console.error("Error peticion ajax para pagar pedido, DETALLES: " + data);
        },
        success: function (data) {
            let mensaje = data.split("|");
            if (mensaje[0] == "success") {
                $('#modalVerPedidos').modal('close');
                mostrarPedidos();
                mostrarVentas();
                M.toast({ html: mensaje[1] });
            } else if (mensaje[0] == "error") {
                M.toast({ html: mensaje[1] });
            } else {
                console.log("Tipo de respuesta no definido!"+data);
            }
        }
    });
}

/////////////////////////////////////////////////////////////////////////
// CARRITO DE COMPRAS
function obtenerCarrito(idUsuario) {
    $.ajax({
        type: "POST",
        url: "ajax/carritoAjax.php",
        data: {
            tipoPeticion: "leer",
            idUsuario
        },
        error: function (data) {
            console.error("Error peticion ajax para obtener carrito, DETALLES: " + data);
        },
        success: function (data) {
            $('#contenedorCarrito').empty();
            $('#contenedorCarrito').append(data);
        }
    });
}

function aniadirAlCarrito(idProducto) {
    if (idUsuarioGlobal != 0) {
        $.ajax({
            type: "POST",
            url: "ajax/carritoAjax.php",
            data: {
                tipoPeticion: "agregar",
                idProducto,
                idUsuario: idUsuarioGlobal
            },
            error: function (data) {
                console.error("Error peticion ajax para agregar al carrito, DETALLES: " + data);
            },
            success: function (data) {
                let mensaje = data.split("|");
                if (mensaje[0] == "success") {
                    obtenerCarrito(idUsuarioGlobal);
                    $('#modalCarrito').modal('open');
                    M.toast({ html: mensaje[1] });
                } else if (mensaje[0] == "error") {
                    if (confirm(mensaje[1] + " Quires cancelarlo y crear un nuevo carrito?")) {
                        $.ajax({
                            type: "POST",
                            url: "ajax/carritoAjax.php",
                            data: {
                                tipoPeticion: "eliminarPedido",
                                idUsuario: idUsuarioGlobal
                            },
                            error: function (data) {
                                console.error("Error peticion ajax para eliminar pedido, DETALLES: " + data);
                            },
                            success: function (data) {
                                let mensaje = data.split("|");
                                aniadirAlCarrito(idProducto); // recursivo XD
                                M.toast({ html: mensaje[1] });
                            }
                        });
                    }
                } else {
                    console.log("Tipo de respuesta no definido!");
                }

            }
        });
    } else {
        M.toast({ html: 'Debes iniciar sesión para añadir productos al carrito ' });
    }
}

function eliminarDelCarrito(idProductoCarrito) {
    $.ajax({
        type: "POST",
        url: "ajax/carritoAjax.php",
        data: {
            tipoPeticion: "eliminar",
            idProductoCarrito
        },
        error: function (data) {
            console.error("Error peticion ajax para eliminar del carrito, DETALLES: " + data);
        },
        success: function (data) {
            obtenerCarrito(idUsuarioGlobal);
            let mensaje = data.split("|");
            M.toast({ html: mensaje[1] });
        }
    });
}

function pedirCarrito(idUsuario) {
    $.ajax({
        type: "POST",
        url: "ajax/carritoAjax.php",
        data: {
            tipoPeticion: "hacerPedido",
            idUsuario
        },
        error: function (data) {
            console.error("Error peticion ajax para eliminar del carrito, DETALLES: " + data);
        },
        success: function (data) {
            let mensaje = data.split("|");
            if (mensaje[0] == "success") {
                $('#modalCarrito').modal('close');
                $('#modalPedido').modal('open');
            } else if (mensaje[0] == "error") {
                M.toast({ html: mensaje[1] });
            } else {
                console.log("Tipo de respuesta no definido!");
            }

        }
    });
}