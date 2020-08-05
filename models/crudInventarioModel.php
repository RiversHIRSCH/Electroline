<?php

use FFI\Exception;

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
        } else {
            $SQL = "SELECT a.id,a.nombre,a.marca,a.precio,a.imagen,b.categoria,a.descripcion
                FROM inventario AS a
                INNER JOIN categorias AS b ON b.id=a.categoria
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
        $SQL = "INSERT INTO inventario (nombre,marca,precio,imagen,categoria,descripcion) VALUES ('$producto','$marca','$precio','$imagen','$categoria','$descripcion');";
        $stmt = Conexion::conectar()->prepare($SQL);
        if ($stmt->execute()) {
            echo 'success|Producto registrado!';
        } else {
            echo "error|Imposible registrar producto!";
        }
    }
}
