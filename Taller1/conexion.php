<?php
try {

    // 1. Conexión 
    $mbd = new PDO('mysql:host=localhost;dbname=DWtaller1', 'root', '');

    // $mbd = null;
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>