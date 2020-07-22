<?php

$servername = "localhost";  
$username = "root";   
$password = "root";       
$dbname = "apitesting"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die("Conexión falló: " . mysqli_connect_error());
    echo ' No conectado';
}

?>