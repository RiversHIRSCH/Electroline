<?php

require_once "conexion.php";

class Pedidos
{
    public static function obtenerPedido($idUsuario)
    {
        $SQL = "SELECT a.idUsuario,a.idProducto,a.nombre AS nombreProducto,a.marca,a.precio,a.imagen,a.descripcion,b.nombre AS nombreUsuario,b.correo,b.telefono
                FROM pedidos AS a
                INNER JOIN usuarios AS b
                    ON b.id=a.idUsuario
                WHERE a.idUsuario='$idUsuario';";
        $stmt = Conexion::conectar()->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }
    public static function aniadirVenta($producto, $cliente, $descripcion)
    {
        $SQL = "INSERT INTO ventas (producto,cliente,descripcion) VALUES ('$producto','$cliente','$descripcion');";
        $stmt = Conexion::conectar()->prepare($SQL);
        if ($stmt->execute()) {
            return 1;
        } else {
            return 0;
        }
    }
    public static function eliminarPedido($idUsuario)
    {
        $SQL = "DELETE FROM pedidos WHERE idUsuario='$idUsuario';";
        $stmt = Conexion::conectar()->prepare($SQL);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt = null;
    }
}
