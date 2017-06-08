<?php
  require_once("repositorioBd.php");
  require_once("repositorioUsuariosJSON.php");

  class RepositorioJSON extends Repositorio {
    public function __construct() {
      $this->repositorioUsuarios = new RepositorioUsuariosJSON();
    }
  }
?>
