<?php
session_start();

require '../php/database.php';
echo $_GET['ID'];
echo $_GET['bloqueo'];

if((isset($_GET['ID'])) & (isset($_GET['bloqueo']))) {
    $id = $_GET['ID'];
    $bloqueo = $_GET['bloqueo'];

    if($bloqueo=="si"){
        $sql = "UPDATE usuarios SET bloqueado = 'no' WHERE id=$id";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            header("Location:adminsignup.php");
        }else{
            echo("petición fallida");
        }
    }else{
        $sql = "UPDATE usuarios SET bloqueado = 'si' WHERE id=$id";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            header("Location:adminsignup.php");
        }else{
            echo("petición fallida");
        }
    }
}
if((isset($_GET['ID'])) & (!isset($_GET['bloqueo']))) {
    $id = $_GET['ID'];

    $id = $_GET['ID'];
    $sql = "DELETE FROM usuarios WHERE id = $id";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        header("Location:adminsignup.php");
    }else{
        echo("petición fallida");
    }
}
