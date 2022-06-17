<?php include("../database.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PHP MYSQL CRUD</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="index2.php" class="navbar-brand">PHP MYSQL CRUD</a>
        </div>
    </nav>
<main class="container p-4">

    <?php if(isset($_SESSION['mensaje'])): ?>
        <div class="alert alert-<?=$_SESSION['mensaje_type'] ?> alert-dismissible fade show" role="alert">
            <?=$_SESSION['mensaje'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php session_unset(); endif; ?>

    <div class="row">
        <div class="col-md-4" >
            <div class="card card-body">
                <form action="save.php" method="POST" style="display: flex;flex-direction: column; gap:10px;">
                    <div class="form-group">
                        <input type="text" name="NOMBRE" class="form-control" placeholder="Nombre del deporte" autofocus>
                     </div>
                     <div class="form-group" style="display: flex;flex-direction: column; gap:10px;">
                        <textarea name="DESCRIPCION"rows="2" class="form-control" placeholder="Descripcion"></textarea>
                        <textarea name="DISPONIBILIDAD"rows="2" class="form-control" placeholder="Disponibilidad"></textarea>
                        <input type="text" name="COSTO" class="form-control" placeholder="Costo" autofocus>
                     </div>
                     <input type="submit" class="btn btn-success btn-block" name="GUARDAR" value="GUARDAR">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bodrdered">
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>DESCRIPCION</th>
                        <th>DISPONIBILIDAD</th>
                        <th>COSTO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $records = $conn->prepare('SELECT * FROM servicios');
                        $records->execute();
                        while(($results = $records->fetch(PDO::FETCH_ASSOC))) { ?>
                        <tr>
                        <td><?php echo $results['NOMBRE']; ?></td>
                        <td><?php echo $results['DESCRIPCION']; ?></td>
                        <td><?php echo $results['DISPONIBILIDAD']; ?></td>
                        <td><?php echo $results['COSTO']; ?></td>
                        <td>
                        <a href="edit.php?ID=<?php echo $results['ID']?>" class="btn btn-secondary">
                            <i class="fas fa-marker"></i>
                        </a>
                        <a href="delet.php?ID=<?php echo $results['ID']?>" class="btn btn-danger">
                            <i class="far fa-trash-alt"></i>
                        </a>
                        </td>
                        </tr>
                    <?php }?>

                </tbody>
            </table>        
        </div>
    </div>
</main>




</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>











