<?php

require '../php/database.php';

if(isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $sql = "DELETE FROM testimonio WHERE idtesti = $id";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        header("Location:listatestimonios.php");
    }else{
        die("peticion fallida");
    }
}
?>