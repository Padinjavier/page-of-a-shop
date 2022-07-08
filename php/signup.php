<?php

require 'database.php';

$message = '';

session_start();

if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['email']) && !empty($_POST['contraseña']) && !empty($_POST['Confirmacontraseña'])) {

    if (($_POST['contraseña'] == $_POST['Confirmacontraseña'])) {

        $records = $conn->prepare('SELECT id, nombre, apellido, email, contraseña FROM usuarios WHERE email = :email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        if (($_POST['email'] == $results['email'])) {
            $message = '<h3 id="lg-err">Este correo ya esta vinvulado a una cuenta</h3>';
        } else {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);
            // $contraseña = ($_POST['contraseña']);
            $sql = "INSERT INTO usuarios (nombre, apellido, email , contraseña) VALUES ('$nombre','$apellido','$email','$contraseña')";
            $stmt = $conn->prepare($sql);
            if ($stmt->execute()) {

                $records = $conn->prepare('SELECT id, nombre, apellido, email, contraseña FROM usuarios WHERE email = :email');
                $records->bindParam(':email', $_POST['email']);
                $records->execute();
                $results = $records->fetch(PDO::FETCH_ASSOC);

                $_SESSION['user_id'] = $results['id'];
                header("Location:../index.php");
            } else {
                $message = 'Lo sentimos, estamos teniendo problemas el crear su cuenta';
            }
        }
    } else {
        $message = '<h3 id="lg-err">Las contraseñas no son iguales</h3>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <link rel="stylesheet" href="../assets/CSS/signup.css">
</head>

<body>
    <main>
        <div class="signup" id="signup">
            <figure class="desktop-img"></figure>
            <div class="mobill">
                <figure class="mobile-img">
                    <img src="../assets/img/agencia.jpg" alt="">
                </figure>
                <span>
                    <a href="../index.php"><i class="fa-solid fa-arrow-left" id="exitsignup"></i></a>
                    <h2 class="title">Registrarse</h2>
                </span>
                <form action="signup.php" method="post">
                    <p>
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="" name="nombre" required>
                        <label for="">Nombres</label>
                    </p>
                    <p>
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="" name="apellido" required>
                        <label for="">Apellidos</label>
                    </p>
                    <p>
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder="" name="email" id="email" required>
                        <label for="" id="emailOK" class="">Email</label>
                    </p>
                    <!-- <p>
                        Sexo
                        <p>Mujer
                        <input type="checkbox" name="mujer" id=""></p>
                        <p>Hombre
                        <input type="checkbox" name="hombre" id=""></p>

                    </p> -->
                    <p>
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="" name="contraseña" id="password" required>
                        <i class="fa-solid fa-eye active" onclick="mostrarContrasena()"></i>
                        <i class="fa-solid fa-eye-slash" onclick="mostrarContrasena()"></i>
                        <label for="">contraseña</label>
                    </p>
                    <p>
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="" name="Confirmacontraseña" id="confipassword" required>
                        <i class="fa-solid fa-eye eye2 active" onclick="mostrarContrasenaa()"></i>
                        <i class="fa-solid fa-eye-slash eye22" onclick="mostrarContrasenaa()"></i>
                        <label for="">Confirma contraseña</label>
                    </p>

                    <input type="submit" value="Registrar">
                </form>
            </div>
        </div>
        <?php if (!empty($message)) : ?>
            <p> <?= $message ?></p>
        <?php endif; ?>
    </main>
</body>
<script src="../assets/JS/signup.js"></script>

</html>