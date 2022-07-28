<?php
session_start();

require '../php/database.php';
echo $_GET['ID'];
echo $_GET['aprobado'];

if ((isset($_GET['ID'])) & (isset($_GET['aprobado']))) {
    $id = $_GET['ID'];
    $aprobado = $_GET['aprobado'];

    if ($aprobado == "si") {
        $sql = "UPDATE testimonio SET aprobado = 'no' WHERE idtesti=$id";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            // tiempo de espera en segundos
            sleep(2);
            header("Location:oo.php");
        } else {
            echo ("petición fallida");
        }
    } else {
        $sql = "UPDATE testimonio SET aprobado = 'si' WHERE idtesti=$id";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            // tiempo de espera en segundos
            sleep(2);
            header("Location:oo.php");
        } else {
            echo ("petición fallida");
        }
    }
}
if ((isset($_GET['ID'])) & (!isset($_GET['aprobado']))) {
    $id = $_GET['ID'];

    $sql = "DELETE FROM testimonio WHERE idtesti = $id";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        // tiempo de espera en segundos
        sleep(2);
        header("Location:oo.php");
    } else {
        echo ("petición fallida");
    }
}
