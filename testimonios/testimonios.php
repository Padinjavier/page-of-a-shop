<?php
session_start();
require "../php/database.php";
// para traer todos los testimonios
$stmt = $conn->prepare('select * from testimonio');
$stmt->execute();
$lista_imagenes = $stmt->fetchAll();


// para traer los datoa del usuario que inicio seccion para que pueda dar su termimonio
if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT * FROM usuarios WHERE id = :id');
  $records->bindParam(':id', $_SESSION['user_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
  $user = null;
  if (count($results) > 0) {
    $user = $results;
  }
}

if(!empty($_POST['testimonio'])){
    $nombre = $user['nombre'];
    $testi = $_POST['testimonio'];
    $punto = $_POST['punto'];
    $envio = "INSERT INTO testimonio (nombre, testimonio, puntuacion) VALUES ('$nombre','$testi','$punto')";
    $stmt = $conn->prepare($envio);
    if ($stmt->execute()) {
        header("Location:testimonios.php");
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
    <title>Document</title>
    <link rel="stylesheet" href="./testimonios.css">
</head>
<body>
    <main>
        <form action="testimonios.php" method="post">
            <fieldset>
                <legend>Testimonios</legend>
                <label for="">Nombre</label>
                <input type="text" name="nombre" id="nombre" placeholder="<?=$user['nombre'] ?>" onmousedown="return false">
                <!-- <input type="text" name="nombre" id=""> -->
                <label for="">Testimonio</label>
                <input type="tel" name="testimonio" id="testimonio">
                <label for="">Puntuacion</label>
                <p class="clasificacion">
                    <input id="radio1" type="radio" name="estrellas" value="5">
                    <label for="radio1">★5</label>
                    <input id="radio2" type="radio" name="estrellas" value="4">
                    <label for="radio2">★4</label>
                    <input id="radio3" type="radio" name="estrellas" value="3">
                    <label for="radio3">★3</label>
                    <input id="radio4" type="radio" name="estrellas" value="2">
                    <label for="radio4">★2</label>
                    <input id="radio5" type="radio" name="estrellas" value="1">
                    <label for="radio5">★1</label>
                </p>

                <input type="submit" value="Enviar">
                
                <input type="text" name="punto" id="punto"  placeholder="3">
            </fieldset>
        </form>
            <?php
            foreach ($lista_imagenes as $datos) {
                $x="si";
                if(($datos['aprobado']) == $x){
                ?>
                <div class="resultados">
                    <h3><?=$datos['nombre']; ?></h3>
                    <p><?=$datos['testimonio']; ?></p>
                    <div class="estellas_resultado">
                    <?php
                    // se inicia i desde uno porque la puntuacion es de 1 a 5 imprime las estrellas doradas
                    $i=1;
                    while ($i <= $datos['puntuacion']){
                         echo "<p style='color: #ffa500;'>★</p>";
                    $i++;
                    }
                    //de le suma uno a la puntuacion porque si son 3 estrellas la tercera ya es dorada falta 4 y 5
                    //pero si no se suma va a imprimer en negras a 3 4 5 
                    $datos['puntuacion']++;
                    while ($datos['puntuacion'] <= 5){
                        echo "<p>★</p>";
                        $datos['puntuacion']++;
                   }                   
                    ?>
                    </div>
                </div>
                <?php
                }
            }
            ?>
    </main>
    
</body>
</html>
<script src="./testimonios.js"></script>
</html>