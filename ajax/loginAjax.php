<?php
require_once "../models/loginModel.php";

$tipoPeticion = $_POST['tipoPeticion'];

if ($tipoPeticion == "registrar") {
    if ($_POST['nombre'] != "" && $_POST['email'] != "" && $_POST['telefono'] != "" && $_POST['contrasenia'] != "") {
        Login::registrarUsuario($_POST['nombre'], $_POST['email'], $_POST['telefono'], $_POST['contrasenia']);
    } else {
        echo 'error|Llene los campos';
    }
} elseif ($tipoPeticion == "identificar") {
    if ($_POST['email'] != "" && $_POST['contrasenia'] != "") {
        Login::identificarUsuario($_POST['email'], $_POST['contrasenia']);
    } else {
        echo 'error|Llene los campos';
    }
} elseif ($tipoPeticion == "actualizar") {
    Login::actualizarUsuario($_POST['idUsuario'], $_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['contrasenia']);
} elseif ($tipoPeticion == "salir") {
    Login::salir();
}
