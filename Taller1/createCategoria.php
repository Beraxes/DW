<?php

include("conexion.php");

try {

        $statement = $mbd->prepare("INSERT INTO Categorias ( descripcion, funcion, estado) 
        VALUES (:descripcion, :funcion, :estado)");
    
        $statement->bindParam(':descripcion', $_POST['descripcion']);
        $statement->bindParam(':funcion', $_POST['funcion']);
        $statement->bindParam(':estado', $_POST['estado']);

        $statement->execute();
        $_POST['idCategorias'] = $mbd->lastInsertId();
    
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