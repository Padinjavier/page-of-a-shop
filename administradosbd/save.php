<?php

require '../php/database.php';

if(isset($_POST['GUARDAR'])){
    $nombre=$_POST['NOMBRE'];
    $descripcion=$_POST['DESCRIPCION'];
    $disponibilidad=$_POST['DISPONIBILIDAD'];
    $costo=$_POST['COSTO'];

    $sql = "INSERT INTO servicios (NOMBRE, DESCRIPCION, DISPONIBILIDAD , COSTO) VALUES ('$nombre','$descripcion','$disponibilidad','$costo')";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
        $_SESSION['mensaje']='Guardado correctamente';
        $_SESSION['mensaje_type']='success';

        header("Location:index2.php");

    }else{
        die("peticion fallida");
    }

}

?>