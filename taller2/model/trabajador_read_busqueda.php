<?php

require("../config/conexion.php");

try {

    $statement = $mbd->prepare("SELECT * FROM trabajador WHERE id = :id");
    $statement->bindParam(':id', $id);
    $id = $_GET['id'];      
    $statement->execute();
    $busqueda = $statement->fetch(PDO::FETCH_ASSOC);

    header('Content-type:application/json;charset=utf-8');
    echo json_encode([
        "persona" => $busqueda,
        "mensaje" => "Esta es la persona que estaba buscando"
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
