<?php
require_once "conexion.php";

class Busqueda
{
    public static function listarBusquedaGeneral($busqueda)
    {
        $palabras = explode(" ", $busqueda);
        $SQL = "SELECT a.id,a.nombre,a.marca,a.precio,a.imagen,b.categoria,a.descripcion,a.idCategoria
                FROM inventario AS a
                INNER JOIN categorias AS b ON b.id=a.idCategoria
                WHERE a.nombre LIKE '%$palabras[0]%' OR a.marca LIKE '%$palabras[0]%' OR b.categoria LIKE '%$palabras[0]%' OR a.descripcion LIKE '%$palabras[0]%'
                GROUP BY a.id";
        $stmt = Conexion::conectar()->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    public static function listarBusquedaPorCategoria($busqueda)
    {
        $SQL = "SELECT a.id,a.nombre,a.marca,a.precio,a.imagen,b.categoria,a.descripcion,a.idCategoria
                FROM inventario AS a
                INNER JOIN categorias AS b ON b.id=a.idCategoria
                WHERE b.categoria='$busqueda'
                GROUP BY a.id";
        $stmt = Conexion::conectar()->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    public static function listarBusquedaPorRangoDePrecio($minimo, $maximo)
    {
        $SQL = "SELECT a.id,a.nombre,a.marca,a.precio,a.imagen,b.categoria,a.descripcion,a.idCategoria
                FROM inventario AS a
                INNER JOIN categorias AS b ON b.id=a.idCategoria
                WHERE a.precio BETWEEN $minimo AND $maximo
                GROUP BY a.id";
        $stmt = Conexion::conectar()->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    public static function listarBusquedaLoMasNuevo()
    {
        $SQL = "SELECT a.id,a.nombre,a.marca,a.precio,a.imagen,b.categoria,a.descripcion,a.idCategoria
                FROM inventario AS a
                INNER JOIN categorias AS b ON b.id=a.idCategoria
                ORDER BY id DESC LIMIT 8";
        $stmt = Conexion::conectar()->prepare($SQL);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }
}
