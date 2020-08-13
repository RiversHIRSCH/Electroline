<?php

require_once "../models/pedidosModel.php";

$tipoPeticion = $_POST['tipoPeticion'];

if ($tipoPeticion == "verPedido") {
    $pedido = Pedidos::obtenerPedido($_POST['idUsuario']);
    $idUsuario = $_POST['idUsuario'];
    $nombreUsuario = "";
    $correo = "";
    $telefono = "";
    $total = 0;
    foreach ($pedido as $key => $value) {
        $nombreUsuario = $value['nombreUsuario'];
        $correo = $value['correo'];
        $telefono = $value['telefono'];
        $total = $total + $value['precio'];
    }
    echo '
            <div class="modal-content">
                <h4>' . $nombreUsuario . '</h4>
                <div class="row">
                    <div class="col s8 valign-wrapper">
                        <p>' . $correo . '</p>
                        <p style="padding-left: 3vh;">' . $telefono . '</p>
                    </div>
                    <div class="col s4 valign-wrapper">
                        <h5>Total</h5>
                        <h6 style="padding-left: 3vh;">$ ' . number_format($total, 2, ".", ",") . '</h6>
                    </div>
                </div>
                <ul class="collection">
                ';
    foreach ($pedido as $key => $value) {
        echo '
                    <li class="collection-item avatar">
                        <img src="data:image/jpeg;base64,' . base64_encode($value['imagen']) . '" alt="" class="circle blue lighten-2">
                        <span class="title">' . $value['nombreProducto'] . '</span>
                        <p>$ ' . number_format($value['precio'], 2, ".", ",") . '</p>
                        <p class="truncate">' . $value['descripcion'] . '</p>
                    </li>
        ';
    }
    echo '
                </ul>
            </div>
            <div class="modal-footer">
                <a class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                <a onclick="pedidoPagado(' . "'" . $idUsuario . "'" . ')" class="waves-effect waves-light btn blue">PAGADO !</a>
            </div>
    ';
} elseif ($tipoPeticion == "pagarPedido") {
    $pedido = Pedidos::obtenerPedido($_POST['idUsuario']);
    $agregados = 0;
    foreach ($pedido as $key => $value) {
        $cliente = $value['nombreUsuario'] . ", " . $value['correo'] . ", " . $value['telefono'];
        $descripcion = "Marca:" . $value['marca'] . ", Precio:" . number_format($value['precio'], 2, ".", ",") . ", " . $value['descripcion'];
        $agregados = $agregados + Pedidos::aniadirVenta($value['nombreProducto'], $cliente, $descripcion);
    }
    if ($agregados == count($pedido)) {
        if (Pedidos::eliminarPedido($_POST['idUsuario'])) {
            $productosEliminados = 0;
            foreach ($pedido as $key => $value) {
                $productosEliminados = $productosEliminados + Pedidos::eliminarInventario($value['idProducto']);
            }
            if ($productosEliminados == count($pedido)) {
                echo 'success|Pedido pagado!';
            } else {
                echo "error|Imposible eliminar de inventario!";
            }
        } else {
            echo 'success|Imposible eliminar pedido!';
        }
    } else {
        echo 'error|Imposible pagar pedido!';
    }
}
