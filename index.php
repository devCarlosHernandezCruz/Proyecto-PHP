<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="refresh" content="1m">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9Gkcname=""slK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>

  <script>
    function borrar(){
      var respuesta = confirm("Estas seguro que quieres eliminar?");
      return respuesta
    }
  </script>

  <h1 class="text-center">CRUD PHP</h1>
  <?php
    include "model/conexion.php";
    include "controller/delete_registration.php";
    
  ?>

  <div class="container-fluid row">
    <form class="col-4" method="POST">
      <h2>New registration</h2>
      <?php
      include "controller/new_registration.php";
      ?>
      <div class="mb-3">
        <label class="form-label">Name:</label>
        <input type="text" class="form-control" name="name">
      </div>
      <div class="mb-3">
        <label class="form-label">Lastname:</label>
        <input type="text" class="form-control" name="lastname">
      </div>
      <div class="mb-3">
        <label class="form-label">Age:</label>
        <input type="number" class="form-control" name="age">
      </div>
      <div class="mb-3">
        <label class="form-label">Country:</label>
        <input type="text" class="form-control" name="country">
      </div>
      <div class="mb-3">
        <label class="form-label">Date:</label>
        <input type="date" class="form-control" name="date">
      </div>
      <button type="submit" class="btn btn-primary bi bi-clipboard-plus" name="btnregistrar" value="ok">Registrar</button>
    </form>
    <div class="col-8 p-4">
      <table class="table">
        <h3 class="text-center">Registros</h3>
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Last name</th>
            <th scope="col">Age</th>
            <th scope="col">Country</th>
            <th scope="col">Date</th>
            <th scope="col">Operaciones</th>
          </tr>
        </thead>
        <tbody>
        <?php
            include "model/conexion.php";
            $sql = $conexion->query("SELECT * FROM usuarios");
            if($sql->num_rows == 0){
              echo'
                <div class="alert alert-success">No existen registros en el sistema</div>
              ';
            }else{
            while($datos = $sql->fetch_object()){?>
              <tr>
              <th scope="row"> <?= $datos->id?></th>
              <td><?= $datos->name?></td>
              <td><?= $datos->lastname?></td>
              <td><?= $datos->age?></td>
              <td><?= $datos->country?></td>
                  <!-- Formatear la fecha -->
              <td><?= date("d/m/Y", strtotime($datos->date)); ?></td>
              <td>
                <a href="view/update.php?id=<?= $datos->id?>" class="btn btn-small btn-warning">Editar</a>
                <a onclick="return borrar()" href="index.php?id=<?= $datos->id ?>" class="btn btn-small btn-danger">Eliminar</a>
              </td>
            </tr>
              
          <?php
            }
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>