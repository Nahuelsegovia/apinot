<?php
session_start();
require "../../../vendor/autoload.php";
use Bayfront\Utilities\HttpRequest\Request;
require_once('../../../metodos.php');


$nombre = Request::getQuery('nombre');
$apellido = Request::getQuery('apellido');
$correo = Request::getQuery('correo');
$clave = Request::getQuery('clave');

if(isset($_SESSION['permiso'])){
    $nuevoUsuario = new Usuario($nombre, $apellido, $correo, $clave);
    $nuevoUsuario->crearUsuario();
}

else {
    echo 'No tienes permisos para crear usuarios';
}
?>