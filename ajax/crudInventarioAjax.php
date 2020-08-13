<?php
require_once "../models/crudInventarioModel.php";

$accion = $_POST['accion'];

if ($accion == "leer") {
    $resultado = CrudInventario::leer($_POST['cat']);
    if (count($resultado) > 0) {
        if ($_POST['cat'] == "ventas") {
            echo '
                <table id="tabla' . $_POST['cat'] . '" class="order-column hover nowrap compact" style="width: 100%;">
                    <thead>
                        <tr>
                            <th class="center-align">Producto</th>
                            <th class="center-align">Cliente</th>
                            <th class="center-align">Fecha</th>
                            <th class="center-align">Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
            ';
            foreach ($resultado as $row) {
                echo '
                        <tr>
                            <td>' . $row['producto'] . '</td>
                            <td>' . $row['cliente'] . '</td>
                            <td class="center-align">' . date("d-m-Y", strtotime($row['fecha'])) . '</td>
                            <td>' . $row['descripcion'] . '</td>
                        </tr>
                ';
            }
            echo '
                    </tbody>
                </table>
            ';
        } elseif ($_POST['cat'] == "pedidos") {
            echo '
                    <table id="tabla' . $_POST['cat'] . '" class="order-column hover nowrap compact" style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="center-align">Cliente</th>
                                <th class="center-align">Correo</th>
                                <th class="center-align">Teléfono</th>
                                <th class="center-align">Fecha</th>
                                <th class="center-align">Total</th>
                                <th class="center-align">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                ';
            foreach ($resultado as $row) {
                echo '
                            <tr>
                                <td>' . $row['usuario'] . '</td>
                                <td>' . $row['correo'] . '</td>
                                <td class="center-align">' . $row['telefono'] . '</td>
                                <td class="center-align">' . date("d-m-Y", strtotime($row['fecha'])) . '</td>
                                <td class="right-align">$ ' . number_format($row['total'], 2, ".", ",") . '</td>
                                <td class="center-align">
                                    <i onclick="verPedido(' . "'" . $row['idUsuario'] . "'" . ')" class="tiny material-icons" title="Ver pedido">visibility</i>
                                </td>
                            </tr>
                    ';
            }
            echo '
                        </tbody>
                    </table>
                ';
        } else {
            echo '
            <table id="tabla' . $_POST['cat'] . '" class="order-column hover nowrap compact" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="center-align">Producto</th>
                        <th class="center-align">Marca</th>
                        <th class="center-align">Precio</th>
                        <th class="center-align">Descripción</th>
                        <th class="center-align">Acciones</th>
                    </tr>
                </thead>
                <tbody>
            ';
            foreach ($resultado as $row) {
                echo '
                    <tr>
                        <td>' . $row['nombre'] . '</td>
                        <td>' . $row['marca'] . '</td>
                        <td>$ ' . $row['precio'] . '</td>
                        <td>' . $row['descripcion'] . '</td>
                        <td class="center">
                            <i class="tiny material-icons" onclick="prepararCampos' . $row['id'] . '()">edit</i>
                            <i id="btnEliminarProducto' . $row['id'] . '" class="tiny material-icons" style="padding-left: 7vh;">delete</i>
                        </td>
                    </tr>

                    <script>
                        function prepararCampos' . $row['id'] . '(){
                            $("#idProductoE").val("' . $row['id'] . '");
                            $("#nombreProductoE").val("' . $row['nombre'] . '");
                            $("#marcaProductoE").val("' . $row['marca'] . '");
                            $("#precioProductoE").val("' . $row['precio'] . '");
                            $("#descripcionProductoE").val("' . $row['descripcion'] . '");
                            $("#categoriaProductoE").val("' . $row['categoria'] . '");
                            $("#vizualizadorImagen").attr("src","data:image/jpeg;base64,' . base64_encode($row['imagen']) . '");
                            $("#tituloModalEditarInventario").empty();
                            $("#tituloModalEditarInventario").append("<strong>' . strtoupper($row['nombre']) . ' </strong>");
                            $("#modalEditarInventario").modal("open");
                        }

                        $("#btnEliminarProducto' . $row['id'] . '").on("click", function(){
                            if(confirm("Seguro de eliminar ' . $row['nombre'] . ' ?")){
                                eliminarProducto("' . $row['id'] . '","' . $row['categoria'] . '");
                            }
                        });
                    </script>
            ';
            }
            echo '
                    </tbody>
                </table>
            ';
        }
    } else {
        echo '
            <div class="col s12 center-align" style="padding-top:5vh;">
                <div class="row">
                    <div class="col s6 offset-s3">
                        <div class="card blue lighten-2">
                            <div class="card-content white-text">
                                <span class="card-title">Atención!</span>
                                <p style="text-align: justify;">Aún no existen elementos de esta categoría</p>
                                <hr>
                                <p class="center-align"><small><i class="fas fa-spin fa-sync-alt"></i> Agregue elementos al inventario o espere a que clientes soliciten sus pedidos.</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';
    }
} elseif ($accion == "agregar") {
    if ($_FILES['imagenProducto']['error'] === 4) {
        die("error|Seleccione una imagen!");
    } elseif ($_FILES['imagenProducto']['error'] === 1) {
        die("error|La imagen sobrepasa el limite de tamaño (2MB)");
    } elseif ($_FILES['imagenProducto']['error'] === 0) {
        $imagenBinaria = addslashes(file_get_contents($_FILES['imagenProducto']['tmp_name']));
        $nombreArchivo = $_FILES['imagenProducto']['name'];
        $extensiones = array('jpg', 'jpeg', 'gif', 'png', 'bmp');
        $extension = explode('.', $nombreArchivo);
        $extension = end($extension);
        $extension = strtolower($extension);
        if (!in_array($extension, $extensiones)) {
            die('error|Sólo elija imagenes con extensiones: ' . implode(', ', $extensiones));
        } else {
            CrudInventario::agregar($_POST['nombreProducto'], $_POST['marcaProducto'], $_POST['precioProducto'], $imagenBinaria, $_POST['idCategoria'], $_POST['descripcionProducto']);
        }
    } else {
        die("error|Verifique sus datos");
    }
} elseif ($accion == "editar") {
    $reservadoCarrito = CrudInventario::buscarProductoEnCarrito($_POST['idProductoE']);
    $reservadoPedido = CrudInventario::buscarProductoEnPedido($_POST['idProductoE']);
    if (count($reservadoCarrito) == 0 && count($reservadoPedido) == 0) {
        if ($_FILES['imagenProductoE']['error'] === 4) {
            CrudInventario::editar($_POST['idProductoE'], $_POST['nombreProductoE'], $_POST['marcaProductoE'], $_POST['precioProductoE'], "", $_POST['idCategoriaE'], $_POST['descripcionProductoE']);
        } elseif ($_FILES['imagenProductoE']['error'] === 1) {
            die("error|La imagen sobrepasa el limite de tamaño (2MB)");
        } elseif ($_FILES['imagenProductoE']['error'] === 0) {
            $imagenBinaria = addslashes(file_get_contents($_FILES['imagenProductoE']['tmp_name']));
            $nombreArchivo = $_FILES['imagenProductoE']['name'];
            $extensiones = array('jpg', 'jpeg', 'gif', 'png', 'bmp');
            $extension = explode('.', $nombreArchivo);
            $extension = end($extension);
            $extension = strtolower($extension);
            if (!in_array($extension, $extensiones)) {
                die('error|Sólo elija imagenes con extensiones: ' . implode(', ', $extensiones));
            } else {
                CrudInventario::editar($_POST['idProductoE'], $_POST['nombreProductoE'], $_POST['marcaProductoE'], $_POST['precioProductoE'], $imagenBinaria, $_POST['idCategoriaE'], $_POST['descripcionProductoE']);
            }
        } else {
            die("error|Verifique sus datos");
        }
    } else {
        echo 'error|Imposible editar producto, ya está en el carrito o pedido de algún cliente';
    }
} elseif ($accion == "eliminar") {
    $reservadoCarrito = CrudInventario::buscarProductoEnCarrito($_POST['idProductoE']);
    $reservadoPedido = CrudInventario::buscarProductoEnPedido($_POST['idProductoE']);
    if (count($reservadoCarrito) == 0 && count($reservadoPedido) == 0) {
        CrudInventario::eliminar($_POST['idProducto']);
    } else {
        echo 'error|Imposible eliminar producto, ya está en el carrito o pedido de algún cliente';
    }
}
