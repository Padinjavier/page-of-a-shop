<?php

require "../php/database.php";
session_start();
if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT * FROM administradores WHERE idAdministradores =:id ');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
}else{
  header('Location:./adminsignup.php');
}
?>
<html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion/MJ Lunahuaná</title>
</head>

<body>
    <main>
        <h1>Bienvenido <?= $results['Nombre'] ?></h1>
        
            <a href="./cerraradmin.php">cerrar sesión</a>


        <aside>

        </aside>
        <section>

        </section>
    </main>
</body>

</html>

</html>