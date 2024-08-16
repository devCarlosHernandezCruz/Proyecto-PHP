<?php


if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["name"]) and !empty($_POST["lastname"]) and !empty($_POST["age"]) and !empty($_POST["country"]) and !empty($_POST["date"])) {
        $name = $_POST["name"];
        $lastname = $_POST["lastname"];
        $age = $_POST["age"];
        $country = $_POST["country"];
        $date = $_POST["date"];

        $query = "SELECT * FROM usuarios WHERE name = '$name' AND lastname = '$lastname' AND age = $age AND country = '$country' AND date = '$date'";

        $result = mysqli_query($conexion, $query);

        if ($result) {
            if(mysqli_num_rows($result) > 0){
                echo '<div class="alert alert-warning">El usuario ya está registrado.</div>';
            }else{
                $sql = $conexion->query(" insert into usuarios (name, lastname, age, country, date) values ('$name', '$lastname', $age, '$country', '$date')");
                if ($sql == 1) {
                echo '
                    <div class="alert alert-success"> Registro realizado con exito</div>
                ';
                } else {
                    echo '
                        <div class="alert alert-danger"> Error en el sistema</div>
                    ';
                }
            }
        }
    } else {
        echo '
                <div class="alert alert-danger"> Campos incompletos </div>
            ';
    }
}
