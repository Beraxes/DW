<?php
require("conexion.php");

try {
        $statement = $mbd->prepare("SELECT * FROM Categorias WHERE idCategoria = ". $_POST['idCategoria']);
        $statement->execute();
        $post = $statement->fetch(PDO::FETCH_ASSOC);
    
        $statement = $mbd->prepare("DELETE FROM Categorias WHERE idCategoria = :idCategoria");
        $statement->bindParam(':idCategoria', $idCategoria);    
        $idCategoria = $_POST['idCategoria'];
        $statement->execute();
    
        header('Content-type:application/json;charset=utf-8');
        echo json_encode([
            "mensaje" => "Registro eliminado satisfactoriamnte",
            "data" => $post  
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
?>