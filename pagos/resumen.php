<?php include("./cabecera.php"); 
session_start();
$usuario= $_SESSION['usuarioDato'];
$fecha=$_SESSION['fechaDato'];
$hora=$_SESSION['horaDato'];

$_SESSION['cantCanotaje'];
$_SESSION['cantRappel'];
$_SESSION['cantCSimple'];
$_SESSION['cantCDoble'];
$_SESSION['cantCanopyUno']; 
$_SESSION['cantCanopyDos']; 
$_SESSION['cantPaseoD'];
$_SESSION['cantPaseoN'];
$_SESSION['cantCaballo'];


echo($_SESSION["1"]);
echo("hola");

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