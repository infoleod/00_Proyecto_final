<?php
  require_once("repositorioBd.php");
  require_once("repositorioUsuariosSQL.php");

  class RepositorioSQL extends Repositorio {

    protected $conexion;

    public function __construct() {

      // Credenciales Digital House.
      $dsn = "mysql:host=localhost;dbname=zoomarket;charset=utf8mb4;port:3306";
      $usuario = "debian-sys-maint";
      $password = "si3kl4VBU4MrsyXZ";

      // Computadoras Locales.
      // $dsn = "mysql:host=localhost;dbname=zoomarket;charset=utf8mb4;port:3306";
      // $usuario = "root";
      // $password = "";

      try {
        $this->conexion = new PDO($dsn, $usuario, $password);
      } catch (Exception $e) {

      }
      $this->repositorioUsuarios = new RepositorioUsuariosSQL($this->conexion);
    }
  }
?>
