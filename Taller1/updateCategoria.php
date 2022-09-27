<?php
require("conexion.php");

try {

        $statement = $mbd->prepare("UPDATE Categorias SET descripcion = :descripcion,  funcion = :funcion, estado = :estado WHERE idCategoria = :idCategoria");
    
        $statement->bindParam(':idCategoria', $_POST['idCategoria']);
        $statement->bindParam(':descripcion', $_POST['descripcion']);
        $statement->bindParam(':funcion', $_POST['funcion']);
        $statement->bindParam(':estado', $_POST['estado']);
    
        $statement->execute();
        header('Content-type:application/json;charset=utf-8');
        echo json_encode([
            "mensaje" => "Registro actualizado satisfactoriamente",
            "data" => [
                "idCategoria" => $_POST['idCategoria'],
                ':descripcion'=> $_POST['descripcion'],
                ':funcion'=> $_POST['funcion'],
                ':estado'=> $_POST['estado']
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
    