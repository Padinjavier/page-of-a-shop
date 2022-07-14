<?php include("./cabecera.php"); 
// guardar valores seleccionados
if((isset($_POST['buttonCantNext'])) || (isset($_POST['datos']))){
    session_start();
    $canotaje=  ($_POST['cantCanotaje'])*(35);
    $rappel=  ($_POST['cantRappel'])*(40);
    $cuatrimotoSimple=  ($_POST['cantCSimple'])*(35);
    $cuatrimotoDoble=  ($_POST['cantCDoble'])*(40);
    $canopyUno=  ($_POST['cantCanopyUno'])*(40);
    $canopyDos=  ($_POST['cantCanopyDos'])*(50);

    $paseoDia=  ($_POST['cantPaseoD'])*(20);
    $paseoNoche=  ($_POST['cantPaseoN'])*(35);
    $caballo=  ($_POST['cantCaballo'])*(35);

    $suma=  $canotaje + $rappel +  $cuatrimotoSimple + $cuatrimotoDoble+ $canopyUno + $canopyDos +  $paseoDia + $paseoNoche+$caballo;
    $_SESSION["suma"]=$suma;

    header("Location:./datos.php");
}



?>

<section class="servicios">
    <h2>Nuestros Servicios</h2>
    <form action="servicios.php" method="POST" class="formulario">
        <div class="servicio-grid">
            <div class="deporte">
                <div class="deporte-texto">
                    <h3>Canotaje</h3>
                    <span>s/35.00</span>
                </div>
                <img src="./imgdeporte/canotaje.jpg" alt="canotaje">

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
                <img src="./imgdeporte/rappel.JPG" alt="rappel">

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
                <img src="./imgdeporte/cuatrimotosimple.JPG" alt="cuatrimotosimple">

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
                <img src="./imgdeporte/cuatrimotodoble.JPG" alt="cuatrimotodoble">

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
                <img src="./imgdeporte/canopyuno.JPG" alt="canopyuno">

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
                <img src="./imgdeporte/canopydos.JPG" alt="canopydos">
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
                <img src="./imgdeporte/diapaseo.jpg" alt="diapaseo">
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
                <img src="./imgdeporte/noche.jpg" alt="noche">
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
                <img src="./imgdeporte/caballos.jpg" alt="caballos">
                <div class="container">
                    <label>Cantidad: </label>
                    <input type="number" name="cantCaballo" id="" min="0" placeholder="0">
                </div>
            </div> <!-- .deporte-->
        </div> <!-- .servicio-grid-->

        <div class="cambio">
            <input type="submit" class="button" name="buttonCantNext" value="Siguiente >>">
        </div>
    </form>


</section>
<?php include("./pie.php"); ?>