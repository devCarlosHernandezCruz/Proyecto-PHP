<?php

if (!empty($_POST["btnupdate"])) {
    if (!empty($_POST["name"]) && !empty($_POST["lastname"]) && !empty($_POST["age"]) && !empty($_POST["country"])) {
        
        $id = $_POST["id"];
        $name2 = $_POST["name"];
        $lastname2 = $_POST["lastname"];
        $age2 = $_POST["age"];
        $country2 = $_POST["country"];
        $date2 = $_POST["date"];
        
        // Consulta para verificar si el usuario existe
        $checkUser = $conexion->query("SELECT * FROM usuarios WHERE id = '$id'");
        
        if ($checkUser->num_rows > 0) {
            echo '
            <div class="alert alert-danger"> El usuario ya existe, no se puede actualizar. </div>
            ';
        } else {
            // Si el usuario no existe, se permite actualizar
            $sql = $conexion->query("UPDATE usuarios SET name='$name2', lastname='$lastname2', age='$age2', country='$country2', date='$date2' WHERE id='$id'");
            
            if ($sql) {
                header("Location: ../index.php");
            } else {
                echo '
                <div class="alert alert-danger"> Registro no se actualizó. </div>
                ';
            }
        }
    } else {
        echo '
        <div class="alert alert-warning"> Por favor, completa todos los campos. </div>
        ';
    }
}

?>