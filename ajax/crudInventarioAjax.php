<?php
require_once "../models/crudInventarioModel.php";

$accion = $_POST['accion'];

if ($accion == "leer") {
    $resultado = CrudInventario::leer($_POST['cat']);
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
} elseif ($accion == "agregar") {
    if ($_FILES['imagenProducto']['error'] === 4) {
        die("success|Vacio");
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
}
