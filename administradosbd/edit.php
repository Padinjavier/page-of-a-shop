<?php
require '../database.php';
// echo($_GET['ID']);
$nombre = '';
$descripcion= '';
$disponibilidad = '';
$costo= '';

if  (isset($_GET['ID'])) {
    $id = $_GET['ID'];

    $records = $conn->prepare("SELECT * FROM servicios WHERE id = $id");
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

  if ($results['ID'] == $id) {
    $nombre=$results['NOMBRE'];
    $descripcion=$results['DESCRIPCION'];
    $disponibilidad=$results['DISPONIBILIDAD'];
    $costo=$results['COSTO'];
  }
}

if (isset($_POST['ACTUALIZAR'])) {
    $id = $_GET['id'];
    $nombre= $_POST['NOMBRE'];
    $descripcion = $_POST['DESCRIPCION'];
    $disponibilidad= $_POST['DISPONIBILIDAD'];
    $costo = $_POST['COSTO'];

    $sql = "UPDATE servicios SET NOMBRE = '$nombre', DESCRIPCION = '$descripcion', DISPONIBILIDAD = '$disponibilidad', COSTO = '$costo' WHERE ID=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $_SESSION['mensaje']='Guardado correctamente';
    $_SESSION['mensaje_type']='success';
    header("Location:index2.php");
  
}

?>



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
<div class="row" style="width: 1000px;">
        <div class="col-md-4 mx-auto " >
            <div class="card card-body">
                <form action="edit.php?id=<?php echo($_GET['ID']); ?>" method="POST" style="display: flex;flex-direction: column; gap:10px;">
                    <div class="form-group">
                        <input type="text" name="NOMBRE" class="form-control" value="<?php echo($nombre) ?>" placeholder="Actualiza el nombre del deporte" autofocus>
                     </div>
                     <div class="form-group" style="display: flex;flex-direction: column; gap:10px;">
                        <textarea name="DESCRIPCION"rows="2" class="form-control" placeholder="Actualiza la Descripcion"><?php echo($descripcion) ?></textarea>
                        <textarea name="DISPONIBILIDAD"rows="2" class="form-control"  placeholder="Actualiza los DISPONIBILIDAD"><?php echo($disponibilidad) ?></textarea>
                        <input type="text" name="COSTO" class="form-control" value="<?php echo($costo)?>" placeholder="Actualiza el Costo" autofocus>
                     </div>
                     <input type="submit" class="btn btn-success btn-block" name="ACTUALIZAR" value="ACTUALIZAR">
                </form>
            </div>
        </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>