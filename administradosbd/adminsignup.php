<?php
require "../php/database.php";

session_start();
$messaje = "";

if (isset($_POST['login'])) {
    $records = $conn->prepare('SELECT * FROM zadministradores WHERE Email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    // tiempo de espera en segundos
    sleep(2);
    $results = $records->fetch(PDO::FETCH_ASSOC);

    if (count($results) > 0 && password_verify($_POST['password'], $results['Contraseña'])) {

        $_SESSION['user_id'] = $results['idAdministradores'];
        header("Location:./oo.php");
    } else {
        if (!password_verify($_POST['password'], $results['Contraseña'])) {
            $message = '<span id="lg-err"> contraseña incorrecta</span>';
        }
        if (($_POST['email'] != $results['email'])) {
            $message = '<span id="lg-err"> Correo incorrecto</span>';
        }
    }
}

if (isset($_POST['signup'])) {
    if (($_POST['contraseña'] == $_POST['Confirmacontraseña'])) {
        $records = $conn->prepare('SELECT * FROM zadministradores WHERE Email = :email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        // tiempo de espera en segundos
        sleep(2);
        $results = $records->fetch(PDO::FETCH_ASSOC);

        if (($_POST['email'] == $results['email'])) {
            $message = '<span id="lg-err">Correo ya vinvulado a una cuenta</span>';
        } else {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $numero = $_POST['numero'];
            $contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);
            $sql = "INSERT INTO zadministradores (Nombre, Apellido, Email , Numero, Contraseña) VALUES ('$nombre','$apellido','$email','$numero','$contraseña')";
            $stmt = $conn->prepare($sql);
            if ($stmt->execute()) {
                // tiempo de espera en segundos
                sleep(2);
                $records = $conn->prepare('SELECT * FROM zadministradores WHERE Email = :email');
                $records->bindParam(':email', $_POST['email']);
                $records->execute();
                // tiempo de espera en segundos
                sleep(2);
                $results = $records->fetch(PDO::FETCH_ASSOC);
                $_SESSION['user_id'] = $results['idAdministradores'];
                header("Location:./oo.php");
            } else {
                $message = 'Lo sentimos, estamos teniendo problemas el crear su cuenta';
            }
        }
    } else {
        $message = '<span id="lg-err">Las contraseñas no son iguales</span>';
    }
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
    <link rel="icon" href="../assets/img/foter&logo/logotrans1.png" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./indexadmin.css">
</head>

<body>
    <section class="contenlogin active">
        <div class="conten">
            <figure class="formlogin">
                <img src="../assets/img/gallery/galeria1.webp" alt="">
            </figure>
            <form action="adminsignup.php" method="post" class="login">
                <h2>Inicia sesion</h2>
                <p>
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" placeholder="Email" name="email" required="">
                </p>
                <p>
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" placeholder="Contraseña" name="password" id="passwordlogin" required="">
                    <i class="fa-solid fa-eye active ojologin" onclick="mostrarContrasenalogin()"></i>
                    <i class="fa-solid fa-eye-slash ojologinx" onclick="mostrarContrasenalogin()"></i>
                </p>
                <input type="submit" name="login">
                <?= $message; ?>
                <span>Registrate --> <span class="registrar">Registrar</span></span>
            </form>
        </div>
    </section>
    <section class="contensignup ">
        <div class="conten">
            <figure class="formsignup">
                <img src="../assets/img/gallery/galeria1.webp" alt="">
            </figure>
            <form action="adminsignup.php" method="post" class="signup">
                <span class="retroceder">
                    <a><i class="fa-solid fa-arrow-left" id="exitsignup"></i></a>
                    <h2 class="title">Registrarse</h2>
                </span>
                <p>
                    <i class="fa-solid fa-user"></i>
                    <input type="text" placeholder="Nombres" name="nombre" required="">
                </p>
                <p>
                    <i class="fa-solid fa-user"></i>
                    <input type="text" placeholder="Apellidos" name="apellido" required="">
                </p>
                <p>
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" placeholder="Email" name="email" required="">
                </p>
                <p>
                    <i class="fa-solid fa-mobile-screen-button"></i>
                    <input type="text" placeholder="Numero" name="numero" required="">
                </p>
                <p>
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" placeholder="Contraseña" name="contraseña" id="passwordsignup" minlength="6" required>
                    <i class="fa-solid fa-eye active ojosignup" onclick="mostrarContrasenasignup()"></i>
                    <i class="fa-solid fa-eye-slash ojosignupx" onclick="mostrarContrasenasignup()"></i>
                </p>
                <p>
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" placeholder="Confirmar Contraseña" name="Confirmacontraseña" id="confipasswordsignup" minlength="6" required>
                    <i class="fa-solid fa-eye active ojosignup2" onclick="mostrarContrasenasignupconfi()"></i>
                    <i class="fa-solid fa-eye-slash ojosignupx2" onclick="mostrarContrasenasignupconfi()"></i>
                </p>
                <?= $message; ?>
                <input type="submit" value="Registrar" name="signup">
            </form>
        </div>
    </section>
</body>
<script src="./indexadmin.js"></script>

</html>

</html>