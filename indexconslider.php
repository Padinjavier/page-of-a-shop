<?php
session_start();
require "./php/database.php";
// para traer todos los testimonios
$stmt = $conn->prepare('select * from testimonios');
$stmt->execute();
$lista_imagenes = $stmt->fetchAll();


// para traer los datos del usuario que inicio seccion para que pueda dar su termimonio
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

if(!empty($_POST['testimonio'])){
    $nombre = $user['nombre'];
    $testi = $_POST['testimonio'];
    $punto = $_POST['punto'];
    $envio = "INSERT INTO testimonios (nombre, testimonio, puntuacion) VALUES ('$nombre','$testi','$punto')";
    $stmt = $conn->prepare($envio);
    if ($stmt->execute()) {
        header("Location:testimonios.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MenuProyecto</title>
    <!-- <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    

    
    <link rel="stylesheet" href="./assets/CSS/style.css" />
    <link rel="icon" href="./assets/img/logo.jpg" />




    <!-- para slider de testimonios -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css'>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js'></script>


  </head>
  <body>
    <!-- header start -->
    <header class="header">
      <figure class="logo"
        ><img src="./assets/img/logotrans1.png" width="110rem" height="50rem" alt=""
      /></figure>
      <!-- navigation menu start -->
      <nav class="navbar">
        <ul class="menu">
          <li class="menu-item">
            <a href="#"> Inicio</a>
          </li>
          <li class="menu-item">
            <a href="#">Sobre Nosotros</a>
          </li>
          <li class="menu-item">
            <a href="#">Testimonios</a>
          </li>
          <li class="menu-item menu-item-has-children">
            <a href="#" class="menu__link submenu-btn" data-toggle="sub-menu"
              >Nuestros servicios
              <i class="fa fa-angle-down plus" aria-hidden="true"></i
            ></a>
            <ul class="sub-menu">
              <li class="menu-item item-sub">
                <a href="#" class="menu__link menu__link--inside"
                  >Deportes de Aventura</a
                >
              </li>
              <li class="menu-item item-sub ps">
                <a href="#" class="menu__link menu__link--inside"
                  >Paseos turísticos</a
                >
              </li>
            </ul>
          </li>
          <li class="menu-item btn-position">
            <a href="https://wa.me/910089718/?text=Estoy%20interesado%20en%20ti%20beibi." target="_blank">Contáctanos <i class="fab fa-whatsapp"></i></a>
          </li>
        </ul>
      </nav>
      <!-- navigation menu end -->


      <div class="icons">
        <!-- dark-light -->
				<button class="switch" id="switch">
					<span><i class="fa-solid fa-sun"></i></span>
					<span><i class="fa-solid fa-moon"></i></span>
				</button>
        <!-- dark-light -->
        <div class="fa-solid fa-credit-card" id="cart-btn"></div>

        <div class="login" id="login-btn">
          <i class="fa-regular fa-user"></i>
        </div>

        <div class="boton-menu" id="menu-btn">
          <input id="abrir-cerrar" type="checkbox" value="" />
          <label for="abrir-cerrar" class="toggle-button"> </label>
        </div>
      </div>
      <!-- .icons-->
      <div class="shopping-cart">
        <h2>Precio de los deportes</h2>
        <div class="box">
          <img class="img-cart" src="./assets/img/canotaje.JPG" alt="canotaje" />
          <div class="content">
            <h3>Canotaje</h3>
            <span class="price">s/35.00 por persona</span>
          </div>
        </div>
        <!--.box-->

        <div class="box">
          <img class="img-cart" src="./assets/img/canopyboy.JPG" alt="canopy" />
          <div class="content">
            <h3>Canopy una línea</h3>
            <span class="price">s/40.00 por persona</span>
          </div>
        </div>
        <!--.box-->

        <div class="box">
          <img class="img-cart" src="./assets/img/canopyDos.JPG" alt="canopyDos" />
          <div class="content">
            <h3>Canopy dos líneas</h3>
            <span class="price">s/50.00 por persona</span>
          </div>
        </div>
        <!--.box-->

        <div class="box">
          <img class="img-cart" src="./assets/img/cuatrimoto.JPG" alt="cuatrimoto" />
          <div class="content">
            <h3>Cuatrimoto Doble</h3>
            <span class="price">s/40.00 por persona</span>
          </div>
        </div>
        <!--.box-->
        <div class="box">
          <img class="img-cart" src="./assets/img/rappel.JPG" alt="rappel" />
          <div class="content">
            <h3>Rappel</h3>
            <span class="price">s/35.00 por persona</span>
          </div>
        </div>
        <!--.box-->

        <a href="#" class="btn">Ver más</a>
      </div>

      <form action="" class="login-form">
        <h3>User</h3>
        <div class="container_login">
          <input type="email" placeholder="your email" class="box" />
          <input
            type="password"
            placeholder="your password"
            class="box"
            id="password"
          />

          <i class="fa-solid fa-eye active" onclick="mostrarContrasena()"></i>
          <i class="fa-solid fa-eye-slash" onclick="mostrarContrasena()"></i>
        </div>
        <p>forget your password <a href="#">Click here</a></p>
        <p>don't have an account <a href="./php/signup.php" target="_blank">Create now</a></p>
        <input type="submit" value="login now" class="btn background" />
      </form>
    </header>
    <!-- header fin -->
    <main>
      <section class="redes">
        <div class="media-icons">
          <a href="https://web.facebook.com/MJ-Adventure-Lunahuan%C3%A1-105332245187940" class="fb" target="_blank"><i class="fab fa-facebook"></i></a>
          <a href="#" class="in"><i class="fab fa-instagram"></i></a>
          <a href="https://web.facebook.com/messages/t/105332245187940" class="msg" target="_blank"
            ><i class="fa-brands fa-facebook-messenger"></i
          ></a>
          <a href="#" class="tiktok"><i class="fa-brands fa-tiktok"></i></a>
        </div>
      </section>

      <!-- sliderportada-inicio -->
      <section class="home">
        <img class="img-slider active" src="./assets/img/slider/portada1.webp" alt="portada" />
        <img class="img-slider" src="./assets/img/slider/portada2.webp" alt="portada2" />
        <img class="img-slider" src="./assets/img/slider/portada3.webp" alt="portada3" />

        <div class="contentSlider active">
          <h1>Disfruta del<br /><span>Canotaje</span></h1>
          <p>
            El miedo es la más grande discapacidad de todas, por eso ATRÉVETE y
            siente la seguridad con nosotros.
          </p>
          <!-- <a href="#">Leer más</a> -->
        </div>

        <div class="contentSlider">
          <h1>Diviérte en<br /><span>Lunahuaná</span></h1>
          <p>
            Si relajarte es lo que necesitas, pues visítanos en nuestra hermosa
            tierra de Lunahuaná y pasa un grandioso fin de semana.
          </p>
          <!-- <a href="#">Read More</a> -->
        </div>

        <div class="contentSlider">
          <h1>Disfruta tu<br /><span>Aventura</span></h1>
          <p>
            Disfruta de la compañía del sol, de los maravillosos deportes y del
            gran paisaje que encontrarás en el maravilloso pueblo de Lunahuaná.
          </p>
          <!-- <a href="#">Read More</a> -->
        </div>

        <div class="slider-navigation">
          <div class="nav-btn active"></div>
          <div class="nav-btn"></div>
          <div class="nav-btn"></div>
        </div>
      </section>
    </main>
    <!-- sliderportada-fin -->
    <div class="container-padding">
      <!-- section-sobre nosotros -->
      <section class="sobreNosotros" id="sobrenosotros"  data-aos="fade-left"  >
        <div class="sub-title"><h2>Sobre Nosotros</h2></div>
        <p >
          Somos una pequeña empresa familiar que ofrece distintos deportes de
          aventura y paseos turísticos en el distrito de Lunahuaná - Cañete, un
          lugar conocido turísticamente por su hermoso clima, por ser tranquilo
          y sobretodo por su gran paisaje natural. <br />
          Nuestro propósito principal es brindarle una gran aventura y sobretodo
          seguridad para que pueda guardarlo en sus mejores recuerdos. <br />
          <span>¡ Siéntase seguro con nosotros y visítenos !</span>
          <img data-aos="zoom-in" src="./assets/img/agencia.jpg" alt="img_agencia" />
        </p>
      </section>
      <!-- section-sobre nosotros -->
      <!-- section seguridad -->
      <section class="seguridad"  data-aos="fade-up" >
        <div class="sub-title"><h2>Contamos con la mejor seguridad</h2></div>
        <div class="sub-title">
          <p>
            Contamos con guías que tienen más de 10 años de experiencia y
            equipos renovados para su salvaguardar.
          </p>
        </div>
        <div class="sub">
          <div>
            <p>Casco</p>
            <figure>
              <img src="./assets/img/casco.webp" alt="casco" />
            </figure>
            <p>Todos los deportes</p>
          </div>
          <div >
            <p>Remo</p>
            <figure>
              <img src="./assets/img/remo.webp" alt="remo" />
            </figure>
            <p>Canotaje</p>
          </div>
          <div>
            <p>Guía</p>
            <figure>
              <img src="./assets/img/guia.webp" alt="guia" />
            </figure>
            <p>Canotaje- cuatrimoto- tour</p>
          </div>
          <div >
            <p>Certificaciones</p>
            <figure>
              <img src="./assets/img/certificado.webp" alt="certificado" />
            </figure>
            <p>Aprobado por MINCETUR</p>
          </div>
        </div>
      </section>
      <!-- section seguridad termina -->

      <!-- section gallery -->
      <section class="gallery" data-aos="fade-down">
        <div class="sub-title"  ><h2>Deportes de Aventura en Lunahuaná</h2></div>
        <div class="sub-title">
          <p>
            Relájate con los diferentes deportes de aventura como el canotaje,
            canopy, cuatrimotos, entre otros. <br />
            Despeja tu mente y diviértete con nosotros en el hermoso valle de
            Lunahuaná
          </p>
        </div>
        <div class="gallery-container" data-aos="fade-up" >
          <div class="gallery__item" >
            <img src="./assets/img/gallery/galeria1.webp" alt="" class="gallery__img" />
          </div>
          <div class="gallery__item" >
            <img src="./assets/img/gallery/galeria2.webp" alt="" class="gallery__img" />
          </div>
          <div class="gallery__item" >
            <img src="./assets/img/gallery/galeria3.webp" alt="" class="gallery__img" />
          </div>
          <div class="gallery__item" >
            <img src="./assets/img/gallery/galeria4.webp" alt="" class="gallery__img" />
          </div>
          <div class="gallery__item" >
            <img src="./assets/img/gallery/galeria5.webp" alt="" class="gallery__img" />
          </div>
          <div class="gallery__item" >
            <img src="./assets/img/gallery/galeria6.webp" alt="" class="gallery__img" />
          </div>
          <div class="gallery__item" >
            <img src="./assets/img/gallery/galeria7.webp" alt="" class="gallery__img" />
          </div>
          <div class="gallery__item" >
            <img src="./assets/img/gallery/galeria8.webp" alt="" class="gallery__img" />
          </div>
          <div class="gallery__item" >
            <img src="./assets/img/gallery/galeria9.webp" alt="" class="gallery__img" />
          </div>
        </div>
      </section>
      <!-- section gallery termina -->
      <!-- section testimonios -->
      <section class="section-testimonio" >
        <!-- <div class="arrow-slider">
          <i class="fa-solid fa-angle-left testileft"></i>
          <i class="fa-solid fa-angle-right testiright"></i>
        </div> -->
        <!-- estilo de las flechas -->
        <style>
          .slick-next:before, .slick-prev:before {
                font-size: 3rem;
                /* line-height: 1;
                opacity: .75; */
                color: #2196f3;
            }
            .slick-arrow{
                  visibility: hidden;
            }
            .slick-prev {
                left: -15px;
                z-index: 2;
            }
            .slick-next {
                right: -5px;
                z-index: 2;
            }
            .swiper-slide{
              height: 350px;
            }
            .testi-item{
              height: 100%;
              }
            .testimonials-text{
              height: 100%;
              display: flex;
              flex-direction: column;
              align-items: center;
              justify-content: space-around;
              }
              
              @media (min-width: 800px) {
                .slick-arrow{
                  visibility:visible
                }
              }
        </style>
        <div class="sub-title" data-aos="fade-down"><h2>Testimonios</h2></div>
        <div class="testimonials-carousel">
          <div class="swiper-wrapper slider-nav" data-aos="fade-right">
            <!-- trae los datos primero imprime todos del id 1 luego el 2 ... -->
          <?php
            foreach ($lista_imagenes as $datos) {
                $x="si";
                if(($datos['aprobado']) == $x){
                ?>
                <div class="swiper-slide">
                  <div class="testi-item">
                    <div class="testi-avatar">
                      <!-- <img src="./assets/img/testi1.png" alt="cliente" /> -->
                      
                      <img src="./assets/img/certificado.webp" alt="cliente" />
                    </div>
                    <div class="testimonials-text-before">
                      <i class="fa fa-quote-left"></i>
                    </div>
                    <div class="testimonials-text">
                      <div class="listing-rating" style="font-size: 17px;">
                      <?php
                      // se inicia i desde uno porque la puntuacion es de 1 a 5 imprime las estrellas doradas
                      $i=1;
                      while ($i <= $datos['puntuacion']){
                          echo "<i class='fa fa-star' style='color: #ffa500;'></i>";
                      $i++;
                      }
                      //de le suma uno a la puntuacion porque si son 3 estrellas la tercera ya es dorada falta 4 y 5
                      //pero si no se suma va a imprimer en negras a 3 4 5 
                      $datos['puntuacion']++;
                      while ($datos['puntuacion'] <= 5){
                          echo "<i class='fa fa-star'></i>";
                          $datos['puntuacion']++;
                      }                   
                        ?>
                      </div>
                      <!-- trae los tertimonios  -->
                      <p>
                        <?=$datos['testimonio']; ?>
                      </p>
                      <!-- trae el nombre del que dejo su testimonio -->
                      <div class="testimonials-avatar"><h3><?=$datos['nombre']; ?></h3></div>
                    </div>
                    <!-- .testimonials-text-->
                    <div class="testimonials-text-after">
                      <i class="fa fa-quote-right"></i>
                    </div>
                  </div>
                  <!-- .testi-item-->
                </div>

                <?php
                }
            }
            ?>
            <!-- .swiper-slide- three-->
          </div>
          <!-- .swiper-wrapper -->
        </div>
        <!-- .testimonials-carousel-->
      </section>
    </div>
    <!--.container-padding-->
    <!-- section ubicacion -->
    <div class="ubicacion">
      <div class="titulo">
        <p>Ubicanos en Lunahuaná</p>
        <i class="fa-solid fa-location-dot"></i>
      </div>
      <div class="mapa">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d243.00955300439674!2d-76.14160648364557!3d-12.962069519885972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2spe!4v1655104444634!5m2!1ses-419!2spe"
          width="400"
          height="300"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>
    </div>
    <!-- section ubicación-termina -->
    <footer class="pie-pagina">
      <div class="grupo-1">
        <div class="box">
          <figure>
            <img class="logofooter" src="./assets/img/logotrans1.png" alt="logo" />
          </figure>
        </div>

        <div class="box box-text">
          <h3>Información</h3>
          <p>Encuéntranos en Sta. Rosa Lunahuaná- Cañete</p>
          <h3>Horario de atención</h3>
          <p>08: 00 am - 05:00pm</p>
          <h3>Llámanos</h3>
          <p>994 726 609</p>
        </div>
        <div class="box">
          <h3>Código QR yape</h3>
          <img class="codigoqr" src="./assets/img/qr.png" alt="visa" />

          <h3>Medios de Pago</h3>
          <figure class="pagos">
            <img src="./assets/img/visa.png" alt="visa" />
            <img src="./assets/img/yape.png" alt="visa" />
          </figure>
        </div>
      </div>
      <div class="grupo-2">
        <small>&copy; 2022 <b>MJ</b> - Todos los derechos reservados</small>
      </div>
    </footer>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="./assets/JS/script.js"></script>
    
  </body>
</html>
