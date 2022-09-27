<?php
require("conexion.php");

try {

    $statement = $mbd->prepare("SELECT * FROM Persona");
    $statement->execute();
    $Persona = $statement->fetchAll(PDO::FETCH_ASSOC);

    for ($i = 0; $i < count($Persona); $i++) {
        $statement = $mbd->prepare("SELECT * FROM Persona where idPersona = ". $Persona[$i]['idPersona']);
        $statement->execute();
        $persona = $statement->fetch(PDO::FETCH_ASSOC);
        $Persona[$i]['data_fk'] = $persona;
    }

    header('Content-type:application/json;charset=utf-8');
    echo json_encode($Persona);
} catch (PDOException $e) {
    header('Content-type:application/json;charset=utf-8');
    echo json_encode([
        'error' => [
            'codigo' => $e->getCode(),
            'mensaje' => $e->getMessage()
        ]
    ]);
}
