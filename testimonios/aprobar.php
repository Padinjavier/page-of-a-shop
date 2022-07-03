<?php

require '../php/database.php';
echo $_GET['ID'];
echo $_GET['apro'];
if(isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $apro = $_GET['apro'];

    if($apro=="si"){
        $sql = "UPDATE testimonios SET aprobado = 'no' WHERE idtesti=$id";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            header("Location:listatestimonios.php");
        }else{
            die("peticion fallida");
        }
    }else{
        $sql = "UPDATE testimonios SET aprobado = 'si' WHERE idtesti=$id";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            header("Location:listatestimonios.php");
        }else{
            die("peticion fallida");
        }
    }
}
?>