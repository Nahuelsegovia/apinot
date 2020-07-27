<?php
session_start();
require "../../../vendor/autoload.php";
use Bayfront\Utilities\HttpRequest\Request;
require_once('../../../metodos.php');


$nombre = htmlspecialchars(Request::getQuery('nombre'), ENT_QUOTES, 'UTF-8');
$apellido = htmlspecialchars(Request::getQuery('apellido'), ENT_QUOTES, 'UTF-8');
$correo = htmlspecialchars(Request::getQuery('correo'), ENT_QUOTES, 'UTF-8');
$clave = htmlspecialchars(Request::getQuery('clave'), ENT_QUOTES, 'UTF-8');

if(isset($_SESSION['permiso'])){
    $nuevoUsuario = new Usuario($nombre, $apellido, $correo, $clave);
    $nuevoUsuario->crearUsuario();
}

else {
    echo 'No tienes permisos para crear usuarios';
}
?>