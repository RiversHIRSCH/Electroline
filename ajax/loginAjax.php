<?php
require_once "../models/loginModel.php";

$tipoPeticion = $_POST['tipoPeticion'];

if ($tipoPeticion == "registrar") {
    Login::registrarUsuario($_POST['nombre'], $_POST['domicilio'], $_POST['email'], $_POST['telefono'], $_POST['contrasenia']);
} elseif ($tipoPeticion == "identificar") {
    Login::identificarUsuario($_POST['email'], $_POST['contrasenia']);
} elseif ($tipoPeticion == "salir") {
    Login::salir();
}
