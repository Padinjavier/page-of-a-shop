<?php

session_start();

$server = "localhost";
$username = "root";
$password = "0173621360"; /*coloca tu credencial*/
$dbname = "agencia";

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname","$username","$password");

    // son excepciones   reporte de errores, lanza excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // imprime por si se genera algun error
    echo('No se puede conectar a MySQL');
}

?>

