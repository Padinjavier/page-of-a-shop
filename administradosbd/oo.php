<?php

require "../php/database.php";
session_start();

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT * FROM zadministradores WHERE idAdministradores =:id ');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    // tiempo de espera en segundos
    sleep(1);
    $results = $records->fetch(PDO::FETCH_ASSOC);


    // tabla de los usuarios
    $usuario = $conn->prepare('SELECT * FROM usuarios');
    $usuario->execute();
    // tiempo de espera en segundos
    sleep(1);


    // tabla de los testimonios
    $testimonio = $conn->prepare('SELECT * FROM testimonio');
    $testimonio->execute();
    // tiempo de espera en segundos
    sleep(1);


    // tabla de los reservaciones
    $reservacion = $conn->prepare('SELECT * FROM reservaciones');
    $reservacion->execute();
    // tiempo de espera en segundos
    sleep(1);

} else {
    header('Location:./adminsignup.php');
}

?>
<html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración/MJ Lunahuaná</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../assets/img/foter&logo/logotrans1.png" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <section>
        <div class="titulo">
            <p class="btn-menu">
                <i class="fa-solid fa-bars active"></i>
                <i class="fa-solid fa-x "></i>
            </p>
            <h2>Administración MJ</h2>
            <h3>Bienvenido <?= $results['Nombre'] ?></h3>
        </div>
        <div class="contenedor">
            <aside class="menu">
                <ul>
                    <li class="usuario active">Usuarios</li>
                    <li class="testimonio">Testimonios</li>
                    <li class="reservacion">reservaciones</li>
                    <li class="pago">Pagos</li>
                    <li><a href="./cerraradmin.php">cerrar sesión</a></li>
                </ul>
            </aside>
            <div class="sombra"></div>
            <main>
                <section class="usuarios active">
                    <table>
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                                <th>Sexo</th>
                                <th>Bloqueado</th>
                                <th>Acción</th>
                                <th>Eliminacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // ejecutamos la petición a la tabla de usuarios
                            while (($usuarios = $usuario->fetch(PDO::FETCH_ASSOC))) { ?>
                                <tr>
                                    <td class="id"><?= $usuarios['id']; ?></td>
                                    <td><?= $usuarios['nombre']; ?></td>
                                    <td><?= $usuarios['apellido']; ?></td>
                                    <td><?= $usuarios['email']; ?></td>
                                    <td><?= $usuarios['sexo']; ?></td>
                                    <td><?= $usuarios['bloqueado']; ?></td>
                                    <td>
                                        <?php if (($usuarios['bloqueado']) == "no") { ?>
                                            <!-- metodo get usado por URL href -> id -> bloqueado -->
                                            <a href='editusuarios.php?ID=<?= $usuarios['id'] ?>&bloqueo=<?= $usuarios['bloqueado'] ?>'>Bloquear</a>
                                        <?php } else { ?>
                                            <a href='editusuarios.php?ID=<?= $usuarios['id'] ?>&bloqueo=<?= $usuarios['bloqueado'] ?>'>Desbloquear</a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href='editusuarios.php?ID=<?= $usuarios['id'] ?>'>Eliminar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </section>
                <section class="testimonios">
                    <table>
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Testimonio</th>
                                <th>Puntuación</th>
                                <th>Fecha</th>
                                <th>Aprobado</th>
                                <th>Acción</th>
                                <th>Eliminacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // ejecutamos la petición a la tabla de testimonios
                            while (($testimonios = $testimonio->fetch(PDO::FETCH_ASSOC))) { ?>
                                <tr>
                                    <td class="id"><?= $testimonios['idtesti']; ?></td>
                                    <td><?= $testimonios['nombre']; ?></td>
                                    <td><?= $testimonios['testimonio']; ?></td>
                                    <td><?= $testimonios['puntuacion']; ?></td>
                                    <td class="fecha"><?= $testimonios['fecha']; ?></td>
                                    <td class="aprobado"><?= $testimonios['aprobado']; ?></td>
                                    <td>
                                        <?php if (($testimonios['aprobado']) == "no") { ?>
                                            <!-- metodo get usado por URL href -> id -> aprobado -->
                                            <a href='edittestimonios.php?ID=<?= $testimonios['idtesti'] ?>&aprobado=<?= $testimonios['aprobado'] ?>'>Aprobar</a>
                                        <?php } else { ?>
                                            <a href='edittestimonios.php?ID=<?= $testimonios['idtesti'] ?>&aprobado=<?= $testimonios['aprobado'] ?>'>Desaprobar</a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href='edittestimonios.php?ID=<?= $testimonios['idtesti'] ?>'>Eliminar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </section>
                <section class="reservaciones">
                    <table>
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Cantidad Canotaje</th>
                                <th>Cantidad Rappel</th>
                                <th>Cantidad Cuatrimoto Simple</th>
                                <th>Cantidad Cuatrimoto Doble</th>
                                <th>Cantidad Canopy Uno</th>
                                <th>Cantidad Canopy Dos</th>
                                <th>Cantidad Paseo Dia</th>
                                <th>Cantidad Paseo Dia</th>
                                <th>Cantidad Paseo Dia</th>
                                <th>Pago total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // ejecutamos la petición a la tabla de testimonios
                            while (($reservaciones = $reservacion->fetch(PDO::FETCH_ASSOC))) { ?>
                                <tr>
                                    <td class="id"><?= $reservaciones['idpagos']; ?></td>
                                    <td><?= $reservaciones['nombres']; ?></td>
                                    <td><?= $reservaciones['apellidos']; ?></td>
                                    <td><?= $reservaciones['fecha']; ?></td>
                                    <td class="fecha"><?= $reservaciones['hora']; ?></td>
                                    <td class="aprobado"><?= $reservaciones['cantCanotaje']; ?></td>
                                    <td class="aprobado"><?= $reservaciones['cantRappel']; ?></td>
                                    <td class="aprobado"><?= $reservaciones['cantCuatrimotoSimple']; ?></td>
                                    <td class="aprobado"><?= $reservaciones['cantCuatrimotoDoble']; ?></td>
                                    <td class="aprobado"><?= $reservaciones['cantCanopyUno']; ?></td>
                                    <td class="aprobado"><?= $reservaciones['cantCanopyDos']; ?></td>
                                    <td class="aprobado"><?= $reservaciones['cantPaseoTurisDia']; ?></td>
                                    <td class="aprobado"><?= $reservaciones['cantPaseoTurisNoche']; ?></td>
                                    <td class="aprobado"><?= $reservaciones['cantPaseoCaballo']; ?></td>
                                    <td class="aprobado"><?= $reservaciones['precioTotal']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </section>

            </main>
        </div>
    </section>
</body>

</html>
<script src="./script.js"></script>

</html>