<?php 
include("./cabecera.php"); 
$x= "datos.php";

session_start();
if((isset($_POST['buttonDatNext'])) || (isset($_POST['resumen']))) {
    // echo($_SESSION['suma']);
    $_SESSION['usuarioDato']=$_POST['usuarioDato'];
    $_SESSION['fechaDato']=$_POST['fechaDato'];
    $_SESSION['horaDato']=$_POST['horaDato'];
    header("Location: ./resumen.php");
}

?>

<section class="datos">
<?php include("./botones.php");?>
    <h2>Datos del Cliente</h2>
    <!-- <form action="./datos.php" method="POST" class="formulario"> -->
   
        <div class="datos-form">
            <div class="container-usuario">
                <label>Usuario </label>
                <input type="text" placeholder="usuarioautomatico" name="usuarioDato" />
            </div><!-- .container-usuario-->
            <div class="container-usuario">
                <label for="fecha">Fecha</label>
                <input id="fecha" type="date" name="fechaDato">
            </div>
            <div class="container-usuario">
                <label for="hora">Hora</label>
                <input id="hora" type="time" name="horaDato">
            </div>
        </div><!-- .datos-->

        <div class=" cambio--flex cambio">
            <a class="button" href="./servicios.php"> Antes<< </a>
            <input type="submit" class="button" name="buttonDatNext" value="Siguiente >>">
        </div>
    </form>
</section>

<?php include("./pie.php"); ?>