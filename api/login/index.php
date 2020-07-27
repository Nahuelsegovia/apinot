<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
require "../../vendor/autoload.php";
use Bayfront\Utilities\HttpRequest\Request;
require_once('../../metodos.php');


$correo = Request::getQuery('correo');
$clave= Request::getQuery('clave');

$nuevaPublicacion = new Usuario('prueba', 'prueba', 'prueba', 'prueba');
$nuevaPublicacion->comprobarUsuario($correo, $clave);


?>