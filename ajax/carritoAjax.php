<?php
require_once "../models/carritoModel.php";

$tipoPeticion = $_POST['tipoPeticion'];

if ($tipoPeticion == "leer") {
    $carrito = Carrito::obtenerCarrito($_POST['idUsuario']);
    $total = 0;
    if (count($carrito) > 0) {
        echo '
            <div class="col s12 m7 l8 xl9">
                <ul class="collection">
        ';
        foreach ($carrito as $key => $value) {
            $total = $total + $value['precio'];
            echo '
                    <li class="collection-item avatar">
                        <img src="data:image/jpeg;base64,' . base64_encode($value['imagen']) . '" alt="" class="circle blue lighten-2">
                        <span class="title">' . $value['nombre'] . '</span>
                        <p>$ ' . number_format($value['precio'], 2, ".", ",") . '</p>
                        <p class="truncate">' . $value['descripcion'] . '</p>
                        <a onclick="eliminarDelCarrito(' . "'" . $value['id'] . "'" . ')" class="secondary-content" title="Eliminar del carrito"><i class="material-icons">delete</i></a>
                    </li>
            ';
        }
        echo '
                </ul>
            </div>
            <div class="col s12 m5 l4 xl3">
                <div class="row valign-wrapper">
                    <div class="col s6 left-align">
                        <h3>Total</h3>
                    </div>
                    <div class="col s6 right-align">
                        <h4>$ ' . number_format($total, 2, ".", ",") . '</h4>
                    </div>
                </div>
                <div class="row valign-wrapper">
                    <div class="col s12 right-align">
                        <button onclick="pagarCarrito(' . $_POST['idUsuario'] . ')" class="btn waves-effect waves-light blue" type="button" name="action">Pagar carrito</button>
                    </div>
                </div>
            </div>
        ';
    }
} elseif ($tipoPeticion == "agregar") {
    $existente = Carrito::buscarProductoEnCarrito($_POST['idProducto']);
    if (count($existente) == 0) {
        $producto = Carrito::buscarProducto($_POST['idProducto']);
        Carrito::agregarCarrito($_POST['idUsuario'], $_POST['idProducto'], $producto['nombre'], $producto['marca'], $producto['precio'], addslashes($producto['imagen']), $producto['idCategoria'], $producto['descripcion']);
    } else {
        echo "error|El producto ya se encuentra en el carrito!";
    }
} elseif ($tipoPeticion == "eliminar") {
    Carrito::eliminarDelCarrito($_POST['idProductoCarrito']);
}
