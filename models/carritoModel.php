<?php
require_once "conexion.php";

class Carrito
{
    public static function obtenerCarrito($idUsuario)
    {
        $SQL = "SELECT * FROM carrito WHERE idUsuario='$idUsuario';";
        $stmt = Conexion::conectar()->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }
    public static function agregarCarrito($idUsuario, $idProducto, $producto, $marca, $precio, $imagen, $idCategoria, $descripcion)
    {
        $SQL = "INSERT INTO carrito (idUsuario,idProducto,nombre,marca,precio,imagen,idCategoria,descripcion) VALUES ('$idUsuario','$idProducto','$producto','$marca','$precio','$imagen','$idCategoria','$descripcion');";
        $stmt = Conexion::conectar()->prepare($SQL);
        if ($stmt->execute()) {
            echo 'success|Producto añadido al carrito!';
        } else {
            echo "error|Imposible añadir al carrito!";
        }
    }
    public static function buscarProducto($idProducto)
    {
        $SQL = "SELECT * FROM inventario WHERE id='$idProducto';";
        $stmt = Conexion::conectar()->prepare($SQL);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }
    public static function buscarProductoEnCarrito($idProducto)
    {
        $SQL = "SELECT * FROM carrito WHERE idProducto='$idProducto';";
        $stmt = Conexion::conectar()->prepare($SQL);
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        return $resultado;
    }
    public static function eliminarProducto($idProducto)
    {
        $SQL = "DELETE FROM inventario WHERE id='$idProducto';";
        $stmt = Conexion::conectar()->prepare($SQL);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt = null;
    }
    public static function eliminarDelCarrito($idProductoCarrito)
    {
        $SQL = "DELETE FROM carrito WHERE id='$idProductoCarrito';";
        $stmt = Conexion::conectar()->prepare($SQL);
        if ($stmt->execute()) {
            echo "success|Producto eliminado del carrito!";
        } else {
            echo "error|Imposible eliminar del carrito!";
        }
        $stmt = null;
    }
}
