<?php
require("conexion.php");

try {

    $statement = $mbd->prepare("DELETE FROM Persona WHERE idPersona = :idPersona");

    $statement->bindParam(':idPersona', $idPersona);

    $idPersona = $_POST['idPersona'];

    $statement->execute();
    header('Content-type:application/json;charset=utf-8');
    echo json_encode([
        "mensaje" => "Registro eliminado satisfactoriamnte",
        "data " => [
            "idPersona" => $idPersona,
        ]
    ]);
} catch (PDOException $e) {
    header('Content-type:application/json;charset=utf-8');
    echo json_encode([
        'error' => [
            'codigo' => $e->getCode(),
            'mensaje' => $e->getMessage()
        ]
    ]);
}
