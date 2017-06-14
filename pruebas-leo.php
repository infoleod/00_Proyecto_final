<?php

    // Credenciales Digital House.
    // $dsn = "mysql:host=localhost;dbname=zoomarket;charset=utf8mb4;port:3306";
    $dsn = "mysql:host=localhost;charset=utf8mb4;port:3306";
    $usuario = "debian-sys-maint";
    $password = "si3kl4VBU4MrsyXZ";

    // Computadoras Locales.
    // $dsn = "mysql:host=localhost;dbname=zoomarket;charset=utf8mb4;port:3306";
    // $usuario = "root";
    // $password = "";

    try {
      $conexion = new PDO($dsn, $usuario, $password);
    } catch (Exception $e) {
      echo "ERROR";exit;
    }

    $sql = "CREATE SCHEMA zoomarket;";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();







?>
