<?php
session_start();

require 'database.php';

if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT id, nombre, contraseña FROM usuarios WHERE id = :id');
  $records->bindParam(':id', $_SESSION['user_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $user = null;

  if (count($results) > 0) {
    $user = $results;
  }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>
  <link rel="stylesheet" href="../assets/css/home.css">

<body>
  <main>
    <?php if (!empty($user)) :  ?>
      <h1>Bienvenido <?= $user['nombre'] ?></h1>
      <a href="logout.php">cerrar sesión</a>
    <?php else : ?>
      <h1>Please Login or SignUp</h1>
      <a href="login.php">Login</a> or
      <a href="signup.php">SignUp</a>
    <?php endif; ?>
    <form action="home.php" method="post">
      <p><input type="text" name="comentario"></p>
      <p><input type="submit" value="Enviar"></p>
    </form>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d243.0093597488797!2d-76.14168565622201!3d-12.962267479829729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x910fe88d16425357%3A0x99e95ba8b5dc00b!2sCandela%20Tours%20Per%C3%BA!5e0!3m2!1ses-419!2spe!4v1654814217291!5m2!1ses-419!2spe" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </main>
</body>

</html>