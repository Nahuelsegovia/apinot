<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
require "../../../vendor/autoload.php";
use Bayfront\Utilities\HttpRequest\Request;
require_once('../../../metodos.php');


$titulo = Request::getQuery('titulo');
$contenido = Request::getQuery('contenido');
$imagen = Request::getQuery('imagen');
$fecha = Request::getQuery('fecha');

if(isset($_SESSION['permiso'])){
    $nuevaPublicacion = new Publicacion($titulo, $contenido, $imagen, $fecha);
    $nuevaPublicacion->crearPublicacion();
}

else {
    echo 'No tienes permisos para crear publicaciones';
}

?>