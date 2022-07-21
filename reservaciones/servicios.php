<?php 
include("./cabecera.php"); 
// guardar valores seleccionados
if((isset($_POST['buttonCantNext'])) || (isset($_POST['datos']))){
    session_start();
    $_SESSION['cantCanotaje']= $_POST['cantCanotaje'];
    $_SESSION['cantRappel']= $_POST['cantRappel'];
    $_SESSION['cantCSimple']= $_POST['cantCSimple'];
    $_SESSION['cantCDoble']= $_POST['cantCDoble'];
    $_SESSION['cantCanopyUno']= $_POST['cantCanopyUno'];
    $_SESSION['cantCanopyDos']= $_POST['cantCanopyDos'];
    $_SESSION['cantPaseoD']= $_POST['cantPaseoD'];
    $_SESSION['cantPaseoN']= $_POST['cantPaseoN'];
    $_SESSION['cantCaballo']= $_POST['cantCaballo'];


    header("Location:./datos.php");
}

$x=('servicios.php');


include("./botones.php"); 
?>
<section class="servicios">
    <h2>Nuestros Servicios</h2>
    <!-- <form action="servicios.php" method="POST" class="formulario"> -->
        <div class="servicio-grid">
            <div class="deporte">
                <div class="deporte-texto">
                    <h3>Canotaje</h3>
                    <span>s/35.00</span>
                </div>
                <img src="../assets/img/imgpagos/canotaje.webp" alt="canotaje">

                <div class="container">
                    <label>Cantidad: </label>
                    <input type="number" name="cantCanotaje" id="" min="0" placeholder="0">
                </div>
            </div> <!-- .deporte-->

            <div class="deporte">
                <div class="deporte-texto">
                    <h3>Rappel</h3>
                    <span>s/40.00</span>
                </div>
                <img src="../assets/img/imgpagos/rappel.webp" alt="rappel">

                <div class="container">
                    <label>Cantidad: </label>
                    <input type="number" name="cantRappel" id="" min="0" placeholder="0">
                </div>
            </div> <!-- .deporte-->

            <div class="deporte">
                <div class="deporte-texto">
                    <h3>Cuatrimoto Simple</h3>
                    <span>s/35.00</span>
                </div>
                <img src="../assets/img/imgpagos/cuatrimotosimple.webp" alt="cuatrimotosimple">

                <div class="container">
                    <label>Cantidad: </label>
                    <input type="number" name="cantCSimple" id="" min="0" placeholder="0">
                </div>
            </div> <!-- .deporte-->

            <div class="deporte">
                <div class="deporte-texto">
                    <h3>Cuatrimoto Doble</h3>
                    <span>s/40.00</span>
                </div>
                <img src="../assets/img/imgpagos/cuatrimotodoble.webp" alt="cuatrimotodoble">

                <div class="container">
                    <label>Cantidad: </label>
                    <input type="number" name="cantCDoble" id="" min="0" placeholder="0">
                </div>
            </div> <!-- .deporte-->

            <div class="deporte">
                <div class="deporte-texto">
                    <h3>Canopy una línea</h3>
                    <span>s/40.00</span>
                </div>
                <img src="../assets/img/imgpagos/canopyuno.webp" alt="canopyuno">

                <div class="container">
                    <label>Cantidad: </label>
                    <input type="number" name="cantCanopyUno" id="" min="0" placeholder="0">
                </div>
            </div> <!-- .deporte-->

            <div class="deporte">
                <div class="deporte-texto">
                    <h3>Canopy dos líneas</h3>
                    <span>s/50.00</span>
                </div>
                <img src="../assets/img/imgpagos/canopydos.webp" alt="canopydos">
                <div class="container">
                    <label>Cantidad: </label>
                    <input type="number" name="cantCanopyDos" id="" min="0" placeholder="0">
                </div>
            </div> <!-- .deporte-->

            <div class="deporte">
                <div class="deporte-texto">
                    <h3>Paseo Turístico / Día</h3>
                    <span>s/20.00</span>
                </div>
                <img src="../assets/img/imgpagos/diapaseo.webp" alt="diapaseo">
                <div class="container">
                    <label>Cantidad: </label>
                    <input type="number" name="cantPaseoD" id="" min="0" placeholder="0">
                </div>
            </div> <!-- .deporte-->

            <div class="deporte">
                <div class="deporte-texto">
                    <h3>Paseo Turístico / Noche</h3>
                    <span>s/35.00</span>
                </div>
                <img src="../assets/img/imgpagos/noche.webp" alt="noche">
                <div class="container">
                    <label>Cantidad: </label>
                    <input type="number" name="cantPaseoN" id="" min="0" placeholder="0">
                </div>
            </div> <!-- .deporte-->

            <div class="deporte">
                <div class="deporte-texto">
                    <h3>Paseo a Caballo</h3>
                    <span>s/35.00</span>
                </div>
                <img src="../assets/img/imgpagos/caballos.webp" alt="caballos">
                <div class="container">
                    <label>Cantidad: </label>
                    <input type="number" name="cantCaballo" id="" min="0" placeholder="0">
                </div>
            </div> <!-- .deporte-->
        </div> <!-- .servicio-grid-->

        <div class="cambio">
            <input type="submit" class="button" name="buttonCantNext" value="Siguiente >>">
        </div>
    


</section>
</form>
<?php include("./pie.php"); ?>