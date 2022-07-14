<?php include("./cabecera.php"); 
session_start();
$usuario= $_SESSION['usuarioDato'];
$fecha=$_SESSION['fechaDato'];
$hora=$_SESSION['horaDato'];

$suma=$_SESSION['suma'];
?>

<section class="resumen">
    <h2>Resumen de reservación</h2>

    <p>usuarioDato <?= $usuario;?></p> <br>
    <p>fechaDato <?= $fecha;?></p> <br>
    <p>horaDato <?= $hora;?></p> <br>
    <p>suma <?= $suma;?></p>

    <div class="cambio--left cambio">
        <a class="button" href="./datos.php">Anterior >></a>
    </div>
</section>

<?php include("./pie.php"); ?>