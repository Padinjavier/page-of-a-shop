 <?php

session_start();

$server = 'localhost';
$username = 'root';
$password = 'javier20';
$database = 'login';

$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);

?>