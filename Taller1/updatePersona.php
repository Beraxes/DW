<?php
require("conexion.php");

try {

        $statement = $mbd->prepare("UPDATE Persona SET idCategoria = :idCategoria,  nombre = :nombre, apellido = :apellido, fechaHoraRegistro = :fechaHoraRegistro, fecha = :fecha, estatura = :estatura, email = :email WHERE idPersona = :idPersona");
    
        $statement->bindParam(':idPersona', $idPersona);
        $statement->bindParam(':idCategoria', $idCategoria);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':apellido', $apellido);
        $statement->bindParam(':fechaHoraRegistro', $fechaHoraRegistro);
        $statement->bindParam(':fecha', $fecha);
        $statement->bindParam(':estatura', $estatura);
        $statement->bindParam(':email', $email);
    
        $idPersona = $_POST['idPersona'];
        $idCategoria = $_POST['idCategoria'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fechaHoraRegistro = $_POST['fechaHoraRegistro'];
        $fecha = $_POST['fecha'];
        $estatura = $_POST['estatura'];
        $email = $_POST['email'];
    
        $statement->execute();
        header('Content-type:application/json;charset=utf-8');
        echo json_encode([
            "mensaje" => "Registro actualizado satisfactoriamente",
            "data" => [
                "id" => $idPersona,
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
    