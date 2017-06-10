<?php

require_once("repositorioUsuarios.php");
require_once("usuario.php");

class RepositorioUsuariosSQL extends RepositorioUsuarios {
  protected $conexion;

  public function __construct($conexion) {
    $this->conexion = $conexion;
  }

  public function guardarUsuario(Usuario $usuario) {
   $sql = "INSERT INTO zoomarket.usuario values(default, :nombre, :apellido, :mail, :usuario, :telefono, :password)";
   $stmt = $this->conexion->prepare($sql);

   $stmt->bindValue(":nombre", $usuario->getNombre(), PDO::PARAM_STR);
   $stmt->bindValue(":apellido", $usuario->getApellido(), PDO::PARAM_STR);
   $stmt->bindValue(":mail", $usuario->getMail(), PDO::PARAM_STR);
   $stmt->bindValue(":usuario", $usuario->getUsuario(), PDO::PARAM_STR);
   $stmt->bindValue(":telefono", $usuario->getTelefono(), PDO::PARAM_INT);
   $stmt->bindValue(":password", $usuario->getPassword(), PDO::PARAM_STR);

   $stmt->execute();
 }

 function traerTodos() {
    $sql = "Select * from zoomarket.usuario";

    $stmt = $this->conexion->prepare($sql);

    $stmt->execute();

    return Usuario::crearDesdeArrays($stmt->fetchAll(PDO::FETCH_ASSOC));
  }

  function buscarPorMail($mail) {
    $sql = "Select * from zoomarket.usuario where mail = :mail";

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
    $sql = "Select * from zoomarket.usuario where id = :id";

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
