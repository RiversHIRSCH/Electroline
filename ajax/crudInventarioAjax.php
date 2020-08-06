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
} elseif ($accion == "eliminar") {
    CrudInventario::eliminar($_POST['idProducto']);
}
