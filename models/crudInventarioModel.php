<?php
error_reporting(0);

require_once "conexion.php";

class CrudInventario
{
    public static function leer($categoria)
    {
        if ($categoria == "ventas") {
            $SQL = "SELECT * FROM ventas";
            $stmt = Conexion::conectar()->prepare($SQL);
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt = null;
        } elseif ($categoria == "pedidos") {
            $SQL = "SELECT a.idUsuario,a.fecha,b.nombre AS usuario,b.correo,b.telefono,
                        SUM(IF(a.precio!=0,a.precio,0))AS total
                    FROM pedidos AS a
                    INNER JOIN usuarios AS b 
                        ON b.id=a.idUsuario
                    GROUP BY a.idUsuario";
            $stmt = Conexion::conectar()->prepare($SQL);
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt = null;
        } else {
            $SQL = "SELECT a.id,a.nombre,a.marca,a.precio,a.imagen,b.categoria,a.descripcion
                FROM inventario AS a
                INNER JOIN categorias AS b ON b.id=a.idCategoria
                WHERE b.categoria='$categoria'
                GROUP BY a.id";
            $stmt = Conexion::conectar()->prepare($SQL);
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt = null;
        }
    }
    public static function agregar($producto, $marca, $precio, $imagen, $categoria, $descripcion)
    {
        $SQL = "INSERT INTO inventario (nombre,marca,precio,imagen,idCategoria,descripcion) VALUES ('$producto','$marca','$precio','$imagen','$categoria','$descripcion');";
        $stmt = Conexion::conectar()->prepare($SQL);
        try {
            if ($stmt->execute()) {
                echo 'success|Producto registrado!';
            } else {
                echo "error|Imposible registrar producto!";
            }
        } catch (Exception $e) {
            echo "error|Imagen demasiado grande!";
        }
    }
    public static function editar($idProducto, $nombre, $marca, $precio, $imagen, $categoria, $descripcion)
    {
        if ($imagen == "") {
            $SQL = "UPDATE inventario
                SET nombre='$nombre',
                    marca='$marca',
                    precio='$precio',
                    idCategoria='$categoria',
                    descripcion='$descripcion'
                WHERE id='$idProducto';";
        } else {
            $SQL = "UPDATE inventario
                SET nombre='$nombre',
                    marca='$marca',
                    precio='$precio',
                    imagen='$imagen',
                    idCategoria='$categoria',
                    descripcion='$descripcion'
                WHERE id='$idProducto';";
        }
        $stmt = Conexion::conectar()->prepare($SQL);
        try {
            if ($stmt->execute()) {
                echo "success|Producto actualizado!";
            } else {
                echo "error|Imposible actualizar producto!";
            }
        } catch (Exception $e) {
            echo "error|Imagen demasiado grande!";
        }
        $stmt = null;
    }
    public static function eliminar($idProducto)
    {
        $SQL = "DELETE FROM inventario WHERE id='$idProducto';";
        $stmt = Conexion::conectar()->prepare($SQL);
        if ($stmt->execute()) {
            echo "success|Producto eliminado!";
        } else {
            echo "error|Imposible eliminar producto!";
        }
        $stmt = null;
    }
}
