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