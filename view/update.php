<?php

    include "../model/conexion.php";
    $id=$_GET["id"];
    
    $query = $conexion->query("SELECT * FROM usuarios WHERE id = $id") 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9Gkcname=""slK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<div class="container text-aligne-center">
    <form class="col-4" method="POST">
        <h2>Update registration</h2>
        <input type="hidden" name="id" value="<?= $_GET["id"]?>">
        <?php
        include "../controller/update_registration.php";
        while($datos = $query->fetch_object()){?>
        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" class="form-control" name="name" value="<?= $datos->name?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Lastname:</label>
            <input type="text" class="form-control" name="lastname" value="<?= $datos->lastname?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Age:</label>
            <input type="number" class="form-control" name="age" value="<?= $datos->age?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Country:</label>
            <input type="text" class="form-control" name="country" value="<?= $datos->country?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Date:</label>
            <input type="date" class="form-control" name="date" value="<?= $datos->date?>">
        </div>
        <?php
        }
        ?>
        
        <button type="submit" class="btn btn-primary bi bi-clipboard-plus" name="btnupdate" value="ok">Update</button>
        <a class="alert alert-warning" href="../index.php">Regresar</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>