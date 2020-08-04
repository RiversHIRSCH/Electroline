<?php
require_once "../models/crudInventarioModel.php";

$accion = $_POST['accion'];

if ($accion == "leer") {
    $resultado = CrudInventario::leer($_POST['cat']);
} elseif ($accion == "agregar") {
    $resultado = CrudInventario::agregar($_POST['producto'], $_POST['marca'], $_POST['precio'], $_POST['categoria'], $_POST['descripcion']);
    echo $resultado;
}

if (count($resultado) > 0 && $accion == "leer") {
    if ($_POST['cat'] == "ventas") {
        echo '
            <table id="tabla' . $_POST['cat'] . '" class="order-column hover nowrap compact" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="center-align">Producto</th>
                        <th class="center-align">Cliente</th>
                        <th class="center-align">Fecha</th>
                        <th class="center-align">Descripción</th>
                        <th class="center-align">Acciones</th>
                    </tr>
                </thead>
                <tbody>
        ';
        foreach ($resultado as $row) {
            echo '
                    <tr>
                        <td>' . $row['producto'] . '</td>
                        <td>' . $row['cliente'] . '</td>
                        <td>' . $row['fecha'] . '</td>
                        <td>' . $row['descripcion'] . '</td>
                        <td class="center">
                            <i class="tiny material-icons">edit</i>
                            <i class="tiny material-icons" style="padding-left: 7vh;">delete</i>
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
                    <th class="center-align">ID Producto</th>
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
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['nombre'] . '</td>
                    <td>' . $row['marca'] . '</td>
                    <td>$ ' . $row['precio'] . '</td>
                    <td>' . $row['descripcion'] . '</td>
                    <td class="center">
                        <i class="tiny material-icons">edit</i>
                        <i class="tiny material-icons" style="padding-left: 7vh;">delete</i>
                    </td>
                </tr>
        ';
        }
        echo '
                </tbody>
            </table>
        ';
    }
}
