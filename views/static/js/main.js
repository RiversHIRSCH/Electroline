$(document).ready(function () {
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
            console.log("Datos recuperados0");
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

    // DETECTAR ENTER EN LAS BARRAS DE BUSQUEDA
    $('#search').keypress(function (e) {
        let code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            let busqueda = $('#search').val();
            if (busqueda == "" || busqueda == " ") {
                // Sin datos para buscar
            }
            else {
                obtenerDatosGenerales();
                if (location.pathname == "/Electroline/") { // Validar si se esta en la bienvenida...
                    var formulario = document.getElementById("infoForm"); // redireccionar al home
                    $('#info').val(busqueda);
                    formulario.submit();
                }
            }
        }
    });
    $('#searchInMenu').keypress(function (e) {
        let code2 = (e.keyCode ? e.keyCode : e.which);
        if (code2 == 13) {
            let busqueda2 = $('#searchInMenu').val();
            if (busqueda2 == "" || busqueda2 == " ") {
                // Sin datos para buscar
            }
            else {
                obtenerDatosGenerales();
                if (location.pathname == "/Electroline/") { // Validar si se esta en la bienvenida...
                    var formulario = document.getElementById("infoForm"); // redireccionar al home
                    $('#info').val(busqueda2);
                    formulario.submit();
                }
            }
        }
    });

    // DISEÑO DATATABLES DE INVENTARIO Y VENTAS
    $('#tablaAudio').DataTable({
        scrollY: 305,
        scrollX: true,
        language: {
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            sInfo:
                "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
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
                SortDescending:
                    ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
    $('#tablaCableado').DataTable({
        scrollY: 305,
        scrollX: true,
        language: {
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            sInfo:
                "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
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
                SortDescending:
                    ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
    $('#tablaIluminacion').DataTable({
        scrollY: 305,
        scrollX: true,
        language: {
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            sInfo:
                "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
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
                SortDescending:
                    ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
    $('#tablaComponentes').DataTable({
        scrollY: 305,
        scrollX: true,
        language: {
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            sInfo:
                "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
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
                SortDescending:
                    ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
    $('#tablaVentas').DataTable({
        scrollY: 305,
        scrollX: true,
        language: {
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            sInfo:
                "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
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
                SortDescending:
                    ": Activar para ordenar la columna de manera descendente"
            }
        }
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
            console.log("Datos recuperados1");
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
            console.log("Datos recuperados2");
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
                    console.log("Datos recuperados3");
                    $('#busqueda').empty();
                    $('#busqueda').append(data);
                    $('#search').val("");
                    document.getElementById("tituloDashboard").innerHTML = "Resultados de busqueda por rango de precio (" + minimo + " - " + maximo + ")";
                }
            });
        }
    }
}

function aniadirAlCarrito(id) {
    M.toast({ html: 'Añadir al carrito ' + id });
}