<?php
require "../../../vendor/autoload.php";
use Bayfront\Utilities\HttpRequest\Request;
require_once('../../../metodos.php');


$nombre = Request::getQuery('nombre');
$apellido = Request::getQuery('apellido');
$correo = Request::getQuery('correo');
$clave = Request::getQuery('clave');

$nuevoUsuario = new Usuario($nombre, $apellido, $correo, $clave);
$nuevoUsuario->crearUsuario();


?>