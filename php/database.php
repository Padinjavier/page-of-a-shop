<?php

session_start();

// $server = "localhost";
// $username = "root";
// $password = "javier20"; /*coloca tu credencial*/
// $dbname = "agencia";

$server = "b3rdarguscbrp8p2o0t9-mysql.services.clever-cloud.com";
$username = "uazolfeeooovduwe";
$password = "yN1MfDIb8jYFjQ3if6BJ"; /*coloca tu credencial*/
$dbname = "b3rdarguscbrp8p2o0t9";
try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname","$username","$password");

    // son excepciones   reporte de errores, lanza excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // imprime por si se genera algun error
    echo('No se puede conectar a MySQL');
}

?>

