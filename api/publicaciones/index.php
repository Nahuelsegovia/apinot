<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once('../../metodos.php');


$publicaciones = new Publicacion('titulo', 'contenido', 'imagen', 'fecha');
$publicaciones->verPublicaciones();

?>