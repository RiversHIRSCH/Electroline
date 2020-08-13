<?php
session_start();

require_once "conexion.php";

class Login
{
    public static function registrarUsuario($nombre, $correo, $telefono, $contrasenia)
    {
        $SQL = "SELECT * FROM usuarios WHERE correo = '$correo';";
        $stmt = Conexion::conectar()->prepare($SQL);
        $stmt->execute();
        if (count($stmt->fetchAll()) == 0) {
            $stmt = null;
            $contrasenia = password_hash($contrasenia, PASSWORD_BCRYPT);
            $SQL = "INSERT INTO usuarios (nombre,correo,telefono,contrasenia) VALUES ('$nombre','$correo','$telefono','$contrasenia');";
            $stmt = Conexion::conectar()->prepare($SQL);
            if ($stmt->execute()) {
                echo "success|Usuario registrado!";
            } else {
                echo "error|Imposible registrar usuario!";
            }
        } else {
            echo "error|El mail de usuario ya existe!";
        }
        $stmt = null;
    }
    public static function identificarUsuario($correo, $password)
    {
        $SQL = "SELECT id,contrasenia FROM usuarios WHERE correo='$correo';";
        $stmt = Conexion::conectar()->prepare($SQL);
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        if (count($resultado) > 0 && password_verify($password, $resultado[0]['contrasenia'])) {
            if ($correo == "admin@admin") {
                $_SESSION['admin_id'] = $resultado[0]['id'];
            } else {
                $_SESSION['user_id'] = $resultado[0]['id'];
            }
            echo "success| ";
        } else {
            echo "error|Verifica tus datos!";
        }
        $stmt = null;
    }
    public static function actualizarUsuario($idUsuario, $nombre, $correo, $telefono, $contrasenia)
    {
        if ($contrasenia == "") {
            $SQL = "UPDATE usuarios
                    SET nombre='$nombre',
                        correo='$correo',
                        telefono='$telefono'
                    WHERE id='$idUsuario';";
        } else {
            $contrasenia = password_hash($contrasenia, PASSWORD_BCRYPT);
            $SQL = "UPDATE usuarios
                    SET nombre='$nombre',
                        correo='$correo',
                        telefono='$telefono',
                        contrasenia='$contrasenia'
                    WHERE id='$idUsuario';";
        }
        $stmt = Conexion::conectar()->prepare($SQL);
        if ($stmt->execute()) {
            echo "success|Usuario actualizado!";
        } else {
            echo "error|Imposible actualizar usuario!";
        }
        $stmt = null;
    }
    public static function salir()
    {
        session_start();
        session_unset();
        session_destroy();
    }
}
