<?php 
include("./cabecera.php"); 


session_start();
if(isset($_POST['buttonDatNext'])|| (isset($_POST['resumen']))){
    $_SESSION['usuarioDato']=$_POST['usuarioDato'];
    $_SESSION['fechaDato']=$_POST['fechaDato'];
    $_SESSION['horaDato']=$_POST['horaDato'];
    header("Location: ./resumen.php");
}


$x=('datos.php');


include("./botones.php"); 
?>

<section class="datos">
    <h2>Datos del Cliente</h2>
    <!-- <form action="./datos.php" method="POST" class="formulario"> -->
        <div class="datos-form">
            <div class="container-usuario">
                <label>Usuario </label>
                <input type="text" placeholder="<?=$_SESSION['nombre']?> <?=$_SESSION['apellido']?>" value="<?=$_SESSION['nombre']?> <?=$_SESSION['apellido']?>" name="usuarioDato" onmousedown="return false"/>
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
</section>
</form>

<?php include("./pie.php"); ?>