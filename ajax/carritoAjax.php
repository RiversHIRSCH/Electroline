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
                        <a onclick="eliminarDelCarrito(' . "'" . $value['id'] . "'" . ')" class="secondary-content" title="Eliminar del carrito"><i class="material-icons red-text">delete</i></a>
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
                        <button onclick="pedirCarrito(' . $_POST['idUsuario'] . ')" class="btn waves-effect waves-light blue" type="button" name="action">Hacer pedido</button>
                    </div>
                </div>
            </div>
        ';
    }
} elseif ($tipoPeticion == "agregar") {
    $existenteEnPedidos = Carrito::buscarUsuarioEnPedidos($_POST['idUsuario']);
    if (count($existenteEnPedidos) == 0) {
        $existenteEnCarrito = Carrito::buscarProductoEnCarrito($_POST['idProducto'], $_POST['idUsuario']);
        if (count($existenteEnCarrito) == 0) {
            $producto = Carrito::buscarProducto($_POST['idProducto']);
            Carrito::agregarCarrito($_POST['idUsuario'], $_POST['idProducto'], $producto['nombre'], $producto['marca'], $producto['precio'], addslashes($producto['imagen']), $producto['idCategoria'], $producto['descripcion']);
        } else {
            echo "success|El producto ya se encuentra en el carrito!";
        }
    } else {
        echo "error|Ya tienes un pedido esperandote!";
    }
} elseif ($tipoPeticion == "eliminar") {
    Carrito::eliminarDelCarrito($_POST['idProductoCarrito']);
} elseif ($tipoPeticion == "hacerPedido") {
    $existente = Carrito::buscarUsuarioEnPedidos($_POST['idUsuario']);
    if (count($existente) == 0) {
        $carrito = Carrito::obtenerCarrito($_POST['idUsuario']);
        $pedido = 0;
        foreach ($carrito as $key => $value) {
            $pedido = $pedido + Carrito::agregarPedido($_POST['idUsuario'], $value['idProducto'], $value['nombre'], $value['marca'], $value['precio'], addslashes($value['imagen']), $value['idCategoria'], $value['descripcion']);
        }
        if ($pedido == count($carrito)) {
            if (Carrito::eliminarCarrito($_POST['idUsuario'])) {
                echo "success|Pedido realizado!";
            } else {
                echo "error|Imposible eliminar carrito!";
            }
        } else {
            echo "error|Imposible realizar pedido!";
        }
    } else {
        echo "error|Ya has realizado un pedido!";
    }
} elseif ($tipoPeticion == "eliminarPedido") {
    Carrito::eliminarPedido($_POST['idUsuario']);
}
