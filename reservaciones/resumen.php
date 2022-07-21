<?php 


require "../php/database.php";


include("./cabecera.php");
session_start();
$usuario = $_SESSION['usuarioDato'];
$fecha = $_SESSION['fechaDato'];
$hora = $_SESSION['horaDato'];

$preciototal= (($_SESSION['cantCanotaje']*35)+($_SESSION['cantRappel']*40)+($_SESSION['cantCSimple']*35)+
        ($_SESSION['cantCDoble']*40)+($_SESSION['cantCanopyUno']*40)+($_SESSION['cantCanopyDos']*50)+
        ($_SESSION['cantPaseoD']*20)+($_SESSION['cantPaseoN']*35)+($_SESSION['cantCaballo']*35));

if(isset($_POST['enviar'])){

    $nombre= $_SESSION['nombre'];
    $apellido= $_SESSION['apellido'];

    $cantCanotaje= $_SESSION['cantCanotaje'];
    $cantRappel = $_SESSION['cantRappel'];
    $cantCSimple = $_SESSION['cantCSimple'];
    $cantCDoble = $_SESSION['cantCDoble'];
    $cantCanopyUno = $_SESSION['cantCanopyUno'];
    $cantCanopyDos = $_SESSION['cantCanopyDos'];
    $cantPaseoD = $_SESSION['cantPaseoD'];
    $cantPaseoN = $_SESSION['cantPaseoN'];
    $cantCaballo = $_SESSION['cantCaballo'];

    echo('aaa');

    $envio = "INSERT INTO reservaciones (nombres, apellidos, fecha, hora,cantCanotaje,cantRappel,cantCuatrimotoSimple, 
                cantCuatrimotoDoble,cantCanopyUno,cantCanopyDos,cantPaseoTurisDia, cantPaseoTurisNoche, cantPaseoCaballo,precioTotal) 
                VALUES ('$nombre','$apellido','$fecha','$hora','$cantCanotaje','$cantRappel','$cantCSimple','$cantCDoble','$cantCanopyUno',
                '$cantCanopyDos','$cantPaseoD','$cantPaseoN','$cantCaballo','$preciototal')";
    $stmt = $conn->prepare($envio);
    if ($stmt->execute()) {
        header("Location:../index.php");
    }
}
$x=('resumen.php');


include("./botones.php"); 
?>

<section class="resumen">
    <h2>Resumen de reservación</h2>
    <h3><?= $usuario?></h3>
    <p> Fecha : <?= $fecha;?></p>
    <P> Hora : <?= $hora;?></P> <br>
    <table class="table">
        <thead>
            <tr>
                <th>Deportes</th>
                <th># Personas</th>
                <th>Total por Deporte</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Canotaje</td>
                <td><?= $_SESSION['cantCanotaje']*1; ?></td>
                <td><?= $_SESSION['cantCanotaje']*35; ?></td>
            </tr>
            <tr>
                <td>Rappel</td>
                <td><?= $_SESSION['cantRappel']; ?></td>
                <td><?= $_SESSION['cantRappel']*40; ?></td>

            </tr>
            <tr>
                <td>Cuatrimoto Simple</td>
                <td><?= $_SESSION['cantCSimple']*1; ?></td>
                <td><?= $_SESSION['cantCSimple']*35; ?></td>
                
            </tr>
            <tr>
                <td>Cuatrimoto Doble</td>
                <td><?= $_SESSION['cantCDoble']*1; ?></td>
                <td><?= $_SESSION['cantCDoble']*40; ?></td>
            </tr>
            <tr>
                <td>Canopy de a uno</td>
                <td><?= $_SESSION['cantCanopyUno']*1; ?></td>
                <td><?= $_SESSION['cantCanopyUno']*40; ?></td>
            </tr>
            <tr>
                <td>Canopy de a dos</td>
                <td><?= $_SESSION['cantCanopyDos']*1; ?></td>
                <td><?= $_SESSION['cantCanopyDos']*50; ?></td>
            </tr>
            <tr>
                <td>Paseo de dia</td>
                <td><?= $_SESSION['cantPaseoD']*1; ?></td>
                <td><?= $_SESSION['cantPaseoD']*20; ?></td>
            </tr>
            <tr>
                <td>Paseo de noche</td>
                <td><?= $_SESSION['cantPaseoN']*1; ?></td>
                <td><?= $_SESSION['cantPaseoN']*35; ?></td>
            </tr>
            <tr>
                <td>Paseo a caballo</td>
                <td><?= $_SESSION['cantCaballo']*1; ?></td>
                <td><?= $_SESSION['cantCaballo']*35; ?></td>
            </tr>
            <tr class="total">
                <td>Total a Pagar</td>
                <td>-</td>
                <td> s/. <?= $preciototal; ?></td>
            </tr>
        </tbody>
    </table>
    <div class=" cambio--flex cambio">
            <a class="button" href="./datos.php"> Antes&lt;&lt; </a>
            <input type="submit" class="button" name="enviar" value="Enviar datos >>">
        </div>
</section>
</form>

<?php include("./pie.php"); ?>