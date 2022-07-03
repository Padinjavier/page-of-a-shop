<?php

require '../php/database.php';

if(isset($_GET['ID'])) {
    $id = $_GET['ID'];

    $sql = "DELETE FROM servicios WHERE ID = $id";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        $_SESSION['mensaje']='Eliminado exitasamente';
        $_SESSION['mensaje_type']='danger';

        header("Location:index2.php");

    }else{
        die("peticion fallida");
    }
}

?>