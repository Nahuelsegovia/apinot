<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once('../../metodos.php');


$usuarios = new Usuario('nombrecito', 'apellidox', 'correo', 'clave');
$usuarios->verUsuarios();

?>