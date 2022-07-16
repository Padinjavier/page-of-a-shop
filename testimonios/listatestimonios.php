<?php
session_start();
require "../php/database.php";
$records = $conn->prepare('SELECT * FROM testimonio');
$records->execute();
?>
<html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Aprobaciones</h1>
        <table>
            <thead>
                <tr>
                    <th>idtestimonio</th>
                    <th>Nombre</th>
                    <th>Testimonio</th>
                    <th>Puntuacion</th>
                    <th>Aprobado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while (($results = $records->fetch(PDO::FETCH_ASSOC))) { ?>
                    <tr>
                        <td><?php echo $results['idtesti']; ?></td>
                        <td><?php echo $results['nombre']; ?></td>
                        <td><?php echo $results['testimonio']; ?></td>
                        <td><?php echo $results['puntuacion']; ?></td>
                        <td><?php echo $results['aprobado']; ?></td>
                        <td>
                        <?php if(($results['aprobado']) == "si") {?>
                            <a href='aprobar.php?ID=<?php echo $results['idtesti']?>&apro=<?php echo $results['aprobado']?>'>Desaprobar</a>                         
                        <?php }else{?>
                            <a href='aprobar.php?ID=<?php echo $results['idtesti']?>&apro=<?php echo $results['aprobado']?>'>Aprobar</a> 
                            <?php }?>
                        </td>
                        <td>
                        <a href='eliminar.php?ID=<?php echo $results['idtesti']?>'>Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
</body>

</html>
<style>
    table {
        border: 2px solid black;

    }

    td {
        border: 1px solid gray;

    }
</style>

</html>