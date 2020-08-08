<?php
error_reporting(0);
require_once "../models/busquedaModel.php";

$tipo = $_POST['tipo'];

# DEFINIENDO TIPO DE BUSQUEDA
if ($tipo == "general") {
    $busqueda = $_POST['busqueda'];
    $resultado = Busqueda::listarBusquedaGeneral($busqueda);
} elseif ($tipo == "categoria") {
    $busqueda = $_POST['busqueda'];
    $resultado = Busqueda::listarBusquedaPorCategoria($busqueda);
} elseif ($tipo == "rangoDePrecio") {
    $minimo = $_POST['minimo'];
    $maximo = $_POST['maximo'];
    $resultado = Busqueda::listarBusquedaPorRangoDePrecio($minimo, $maximo);
} elseif ($tipo == "loMasNuevo") {
    $resultado = Busqueda::listarBusquedaLoMasNuevo();
} else {
    echo 'NO SE DEFINIO UN TIPO DE BUSQUEDA !!!';
}

# SI EL RESULTADO DE LA CONSULTA TIENE FILAS SE MUESTRAN LAS CARDS
if (count($resultado) == 0) {
    echo '
        <script>
            document.getElementById("cardVacio").style.display = "block";
        </script>
    ';
} else {
    if ($tipo == "loMasNuevo") {
        foreach ($resultado as $row) {
            echo '
            <div class="col l3 m4 s6 nmmes" style="padding: 2vh;">
                <div class="card sticky-action" style="overflow: visible;">
                    <div class="card-image waves-effect waves-block waves-light" style="height: 20vh;">
                        <img class="activator" src="data:image/jpeg;base64,' . base64_encode($row['imagen']) . '">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">
                            ' . substr($row['nombre'], 0, 10) . '...
                            <i class="material-icons right activator">more_vert</i>
                        </span>
                        <div class="valign-wrapper">
                            <div class="col s6 left">
                                <h6><strong class="grey-text text-darken-4">$ ' . $row['precio'] . '</strong></h6>
                            </div>
                            <div class="col s6 right">
                                <p class="right"><small class="blue-text text-darken-1">' . $row['categoria'] . '</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <div class="valign-wrapper">
                            <div class="col l4 s12 offset-l4 right-align">
                                <a class="tooltipped blue-text text-lighten-2" data-position="bottom" data-tooltip="Añadir al carrito" onclick="debesIniciarSesion()">
                                    <i class="small material-icons">add_shopping_cart</i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-reveal" style="display: none; transform: translateY(0%);">
                        <i class="material-icons right">close</i>
                        <span class="card-title grey-text text-darken-4">' . $row['nombre'] . '</span>
                        <p>' . $row['descripcion'] . '</p>
                    </div>
                </div>
            </div>
        ';
        }
    } else {
        echo '
            <script>
                document.getElementById("cardVacio").style.display = "none";
            </script>
        ';
        foreach ($resultado as $row) {
            echo '
            <div class="col l3 m4 s6 nmmes" style="padding: 2vh;">
                <div class="card sticky-action" style="overflow: visible;">
                    <div class="card-image waves-effect waves-block waves-light" style="height: 20vh;">
                        <img class="activator" src="data:image/jpeg;base64,' . base64_encode($row['imagen']) . '">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">
                            ' . substr($row['nombre'], 0, 10) . '...
                            <i class="material-icons right activator">more_vert</i>
                        </span>
                        <div class="valign-wrapper">
                            <div class="col s6 left">
                                <h6><strong class="grey-text text-darken-4">$ ' . $row['precio'] . '</strong></h6>
                            </div>
                            <div class="col s6 right">
                                <p class="right"><small class="blue-text text-darken-1">' . $row['categoria'] . '</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <div class="valign-wrapper">
                            <div class="col l4 s12 offset-l4 right-align">
                                <a class="tooltipped blue-text text-lighten-2" data-position="bottom" data-tooltip="Añadir al carrito" onclick="aniadirAlCarrito(' . "'" . $row['id'] . "'" . ');">
                                    <i class="small material-icons">add_shopping_cart</i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-reveal" style="display: none; transform: translateY(0%);">
                        <i class="material-icons right">close</i>
                        <span class="card-title grey-text text-darken-4">' . $row['nombre'] . '</span>
                        <p>' . $row['descripcion'] . '</p>
                    </div>
                </div>
            </div>
        ';
        }
    }
}
