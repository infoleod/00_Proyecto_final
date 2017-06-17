<?php
  class CrearBD {
    public static $crearBD;

    public static function crearBD() {
      if (self::$crearBD == null) {
        self::$crearBD = new CrearBD();
      }
      // Credenciales Digital House.
      // $dsn = "mysql:host=localhost;dbname=zoomarket;charset=utf8mb4;port:3306";
      // $dsn = "mysql:host=localhost;charset=utf8mb4;port:3306";
      // $usuario = "debian-sys-maint";
      // $password = "si3kl4VBU4MrsyXZ";

      // Computadoras Locales.
      $dsn = "mysql:host=localhost;charset=utf8mb4;port:3306";
      $usuario = "root";
      $password = "";

      try {
        $conexion = new PDO($dsn, $usuario, $password);
      } catch (Exception $e) {
        echo "ERROR";exit;
      }

      $sql = "CREATE DATABASE IF NOT EXISTS zoomarket; USE zoomarket;";
      $stmt = $conexion->prepare($sql);
      $stmt->execute();
      $stmt = null;
      $conexion = null;

      return self::$crearBD;
    }

    private function __construct() {

    }

  }

?>
