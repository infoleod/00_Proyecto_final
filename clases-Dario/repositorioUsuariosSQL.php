<?php

require_once("repositorioUsuarios.php");
require_once("usuario.php");

class RepositorioUsuariosSQL extends RepositorioUsuarios {
  protected $conexion;

  public function __construct($conexion) {
    $this->conexion = $conexion;
  }

  public function guardarUsuario(Usuario $usuario) {
   $sql = "INSERT INTO usuario values(default, :nombre, :username, :mail, :edad, :pais, :password)";
   $stmt = $this->conexion->prepare($sql);

   $stmt->bindValue(":nombre", $usuario->getNombre(), PDO::PARAM_STR);
   $stmt->bindValue(":username", $usuario->getUsername(), PDO::PARAM_STR);
   $stmt->bindValue(":mail", $usuario->getMail(), PDO::PARAM_STR);
   $stmt->bindValue(":edad", $usuario->getEdad(), PDO::PARAM_INT);
   $stmt->bindValue(":pais", $usuario->getPais(), PDO::PARAM_STR);
   $stmt->bindValue(":password", $usuario->getPassword(), PDO::PARAM_STR);

   $stmt->execute();
 }

 function traerTodos() {
    $sql = "Select * from usuario";

    $stmt = $this->conexion->prepare($sql);

    $stmt->execute();

    return Usuario::crearDesdeArrays($stmt->fetchAll(PDO::FETCH_ASSOC));
  }

  function buscarPorMail($mail) {
    $sql = "Select * from usuario where mail = :mail";

    $stmt = $this->conexion->prepare($sql);

    $stmt->bindValue(":mail", $mail, PDO::PARAM_STR);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result != false) {
        return Usuario::crearDesdeArray($result);
    }
    else {
      return NULL;
    }


  }

  function buscarPorId($id) {
    $sql = "Select * from usuario where id = :id";

    $stmt = $this->conexion->prepare($sql);

    $stmt->bindValue(":id", $id, PDO::PARAM_INT);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result != false) {
        return Usuario::crearDesdeArray($result);
    }
    else {
      return NULL;
    }
  }
}

?>
