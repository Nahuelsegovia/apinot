<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
require "../../../vendor/autoload.php";
use Bayfront\Utilities\HttpRequest\Request;
require_once('../../../metodos.php');


$titulo = htmlspecialchars(Request::getQuery('titulo'), ENT_QUOTES, 'UTF-8');
$contenido = htmlspecialchars(Request::getQuery('contenido'), ENT_QUOTES, 'UTF-8');
$imagen = htmlspecialchars(Request::getQuery('imagen'), ENT_QUOTES, 'UTF-8');
$fecha = htmlspecialchars(Request::getQuery('fecha'), ENT_QUOTES, 'UTF-8');

if(isset($_SESSION['permiso'])){
    $nuevaPublicacion = new Publicacion($titulo, $contenido, $imagen, $fecha);
    $nuevaPublicacion->crearPublicacion();
}

else {
    echo 'No tienes permisos para crear publicaciones';
}

?>