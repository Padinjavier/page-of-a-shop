<?php include("./cabecera.php"); 
session_start();


$usuario= $_SESSION['usuarioDato'];
$fecha=$_SESSION['fechaDato'];
$hora=$_SESSION['horaDato'];

$suma=$_SESSION['suma'];

$x="resumen.php";

if(isset($_POST['enviar'])){
    $_SESSION['enviado']='se guardó en la base de datos';
    header("Location: prueba.php");
}
?>

<section class="resumen">
<?php include("./botones.php");?>
    <h2>Resumen de reservación</h2>

    <input type="submit" name="enviar" value="enviar" >

    <!-- datos para enviar al php -->
    <input type="text" class="prueba" placeholder="<?= $usuario;?>"/>
    <input type="text" class="prueba" placeholder="<?= $fecha;?>"/>
    <input type="text" class="prueba" placeholder="<?= $hora;?>"/>
    <input type="text" class="prueba" placeholder="<?= $suma;?>"/>

    <p>usuarioDato <?= $usuario;?></p> <br>
    <p>fechaDato <?= $fecha;?></p> <br>
    <p>horaDato <?= $hora;?></p> <br>
    <p>suma <?= $suma;?></p>
    
</form>
    <div class="cambio--left cambio">
        <a class="button" href="./datos.php">Anterior >></a>
    </div>
</section>

<?php include("./pie.php"); ?>