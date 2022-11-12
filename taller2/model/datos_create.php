<?php
require("../config/conexion.php");

try {

    $statement = $mbd->prepare("INSERT INTO datos (id_trabajador, direccion, barrio, fecha_ingreso, fecha_nacimiento, edad, estatura, email) 
    VALUES (:id_trabajador, :direccion, :barrio, :fecha_ingreso, :fecha_nacimiento, :edad, :estatura, :email)");

    $statement->bindParam(':id_trabajador', $id_trabajador);
    $statement->bindParam(':direccion', $direccion);
    $statement->bindParam(':barrio', $barrio);
    $statement->bindParam(':fecha_ingreso', $fecha_ingreso);
    $statement->bindParam(':fecha_nacimiento', $fecha_nacimiento);
    $statement->bindParam(':edad', $edad);
    $statement->bindParam(':estatura', $estatura);
    $statement->bindParam(':email', $email);

    $id_trabajador = $_POST['id_trabajador'];
    $direccion = $_POST['direccion'];
    $barrio = $_POST['barrio'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $edad = $_POST['edad'];
    $estatura = $_POST['estatura'];
    $email = $_POST['email'];

    $statement->execute();
    $_POST['id'] = $mbd->lastInsertId();

    $statement = $mbd->prepare("SELECT * FROM trabajador WHERE id = ". $_POST['id_trabajador']);
    $statement->execute();
    $data = $statement->fetch(PDO::FETCH_ASSOC);

    header('Content-type:application/json;charset=utf-8');
    echo json_encode($_POST);
} catch (PDOException $e) {
    header('Content-type:application/json;charset=utf-8');
    echo json_encode([
        'error' => [
            'codigo' => $e->getCode(),
            'mensaje' => $e->getMessage()
        ]
    ]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="../index.html"></a>
</body>
</html>