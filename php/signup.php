<?php

require 'database.php';

$message = '';

session_start();

if (isset($_POST['registrar'])){
    if (($_POST['contraseña'] == $_POST['Confirmacontraseña'])) {
        // $records = $conn->prepare('SELECT id, nombre, apellido, email, contraseña FROM usuarios WHERE email = :email');
        $records = $conn->prepare('SELECT * FROM usuarios WHERE email = :email');
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
            $sexo=$_POST['sexo'];
            // $contraseña = ($_POST['contraseña']);
            $sql = "INSERT INTO usuarios (nombre, apellido, email , contraseña, sexo) VALUES ('$nombre','$apellido','$email','$contraseña','$sexo')";
            $stmt = $conn->prepare($sql);
            if ($stmt->execute()) {
                $records = $conn->prepare('SELECT * FROM usuarios WHERE email = :email');
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
    <title>Registro</title>
    <link rel="stylesheet" href="../assets/CSS/signup.css">
    <link rel="icon" href="../assets/img/foter&logo/logotrans1.png" />
</head>

<body>
    <main>
        <div class="signup" id="signup">
            <figure class="desktop-img"></figure>
            <div class="mobill">
                <figure class="mobile-img">
                    <img src="../assets/img/seguridad/agencia.jpg" alt="">
                </figure>
                <span class="retroceder">
                    <a href="../index.php"><i class="fa-solid fa-arrow-left" id="exitsignup"></i></a>
                    <h2 class="title">Registrarse</h2>
                </span>
                <form action="signup.php" method="post">
                    <p>
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Nombres" name="nombre"  required>
                    </p>
                    <p>
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Apellidos" name="apellido" required>
                    </p>
                    <p>
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email" required>
                    </p>
                    <div class="genero">
                        <span>Sexo</span>
                        <div class="opciones">
                            <p>Mujer<input type="radio" name="sexo" value="f" required></p>
                            <p>Hombre<input type="radio" name="sexo" value="m" required></p>
                        </div>
                    </div>
                    <p>
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Contraseña" name="contraseña" id="password" required>
                        <i class="fa-solid fa-eye active" onclick="mostrarContrasena()"></i>
                        <i class="fa-solid fa-eye-slash" onclick="mostrarContrasena()"></i>
                    </p>
                    <p>
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Confirmar Contraseña" name="Confirmacontraseña" id="confipassword" required>
                        <i class="fa-solid fa-eye eye2 active" onclick="mostrarContrasenaa()"></i>
                        <i class="fa-solid fa-eye-slash eye22" onclick="mostrarContrasenaa()"></i>
                    </p>
                    <input type="submit" value="Registrar" name="registrar">
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