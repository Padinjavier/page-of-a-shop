<?php

session_start();

if (isset($_SESSION['user_id'])) {
  header('Location: index.php');
}
require 'database.php';

if (!empty($_POST['nombre']) && !empty($_POST['contraseña'])) {

  $records = $conn->prepare('SELECT id, nombre, apellido, contraseña FROM usuarios WHERE nombre = :nombre');
  $records->bindParam(':nombre', $_POST['nombre']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
  $message = '';

  if (count($results) > 0 && password_verify($_POST['contraseña'], $results['contraseña'])) {
    $_SESSION['user_id'] = $results['id'];
    header("Location:../testimonios.php");
    // require'../testimonios.php';
  } else {
    if (!password_verify($_POST['contraseña'], $results['contraseña'])) {
      $message = '<h3 id="lg-err"> contraseña incorrecta</h3>';
    }
    if (($_POST['nombre'] != $results['nombre'])) {
      $message = '<h3 id="lg-err"> usuario incorrecto</h3>';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../assets/CSS/login.css">
</head>

<body>
  <main>
    <div class="login" id="loginsignup">
      <figure class="desktop-img">
      </figure>
      <div class="mobill">
        <figure class="mobile-img">
          <img src="../assets/img/agencia.jpg" alt="">
        </figure>
        <form action="login.php" method="post" class="formulario">
          <p class="imput">
            <i class="fa-solid fa-user"></i>
            <input type="text" placeholder="" name="nombre" id="nombre" required>
            <label for="">Nombre de usuario</label>
          </p>
          <p class="imput">
            <i class="fa-solid fa-lock"></i>
            <input type="password" placeholder="" name="contraseña" id="password" required>
            <i class="fa-solid fa-eye active" onclick="mostrarContrasena()"></i>
            <i class="fa-solid fa-eye-slash" onclick="mostrarContrasena()"></i>
            <label for="">Contraseña</label>
          </p>
          <a class="btmlogin">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <input type="submit" value="Ingresar">
          </a>
        </form>
        <a href="./signup.php">
          <input type="button" value="Registrarce" id="btn-signup">
        </a>
      </div>
    </div>
    <?php if (!empty($message)) : ?>
      <?= $message ?>
    <?php endif; ?>
  </main>
</body>
<script src="./assets/js/login.js"></script>

</html>