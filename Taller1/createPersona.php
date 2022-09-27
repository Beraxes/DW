<?php
require("conexion.php");

try {

    $statement = $mbd->prepare("INSERT INTO Persona (idCategoria, nombre, apellido, fechaHoraRegistro, fecha, estatura, email) 
    VALUES (:idCategoria, :nombre, :apellido, :fechaHoraRegistro, :fecha, :estatura, :email)");

    $statement->bindParam(':idCategoria', $idCategoria);
    $statement->bindParam(':nombre', $nombre);
    $statement->bindParam(':apellido', $apellido);
    $statement->bindParam(':fechaHoraRegistro', $fechaHoraRegistro);
    $statement->bindParam(':fecha', $fecha);
    $statement->bindParam(':estatura', $estatura);
    $statement->bindParam(':email', $email);

    $idCategoria = $_POST['idCategoria'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fechaHoraRegistro = $_POST['fechaHoraRegistro'];
    $fecha = $_POST['fecha'];
    $estatura = $_POST['estatura'];
    $email = $_POST['email'];

    $statement->execute();
    $_POST['id'] = $mbd->lastInsertId();

    $statement = $mbd->prepare("SELECT * FROM Persona WHERE idPersona = ". $_POST['idCategoria']);
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
