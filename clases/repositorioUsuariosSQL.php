<?php

  require_once("repositorioUsuarios.php");
  require_once("usuario.php");

  class RepositorioUsuariosSQL extends RepositorioUsuarios {
    protected $conexion;

    public function __construct($conexion) {
      $this->conexion = $conexion;
    }
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX  ACA Linea 8  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
    // --------------------------------------- FRAN -------------------------------------------
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
    public function guardarUsuario(Usuario $usuario) {
      if ($usuario->getId() == null) {
        $usuario->setId($this->traerNuevoId());
      }

      $json = json_encode($usuario->crearArrayDesdeObjeto());

      $json = $json . PHP_EOL;

      file_put_contents("usuarios.json", $json, FILE_APPEND);
    }

    public function traerTodos() {
      $sql = "Select * from usuario";
      $stmt = $this->conexion->prepare($sql);
      $stmt->execute();
      return Usuario::crearDesdeArrays($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public function buscarPorId($id) {
      $todos = $this->traerTodos();

      foreach ($todos as $usuario) {
        if ($usuario->getId() == $id) {
          return $usuario;
        }
      }

      return false;
    }

    public function buscarPorMail($mail) {
      $todos = $this->traerTodos();

      foreach ($todos as $usuario) {
        if ($usuario->getMail() == $mail) {
          return $usuario;
        }
      }

      return false;
    }

    private function traerNuevoId() {
      $usuarios = $this->traerTodos();

      if (count($usuarios) == 0) {
        return 1;
      }

      $elUltimo = array_pop($usuarios);

      $id = $elUltimo->getId();

      return $id + 1;
    }

    /*buscar por usuario*/
    function buscarPorUsuario($usuario) {
      $todos = traerTodos();
      foreach ($todos as $usuarioIndividual) {
        if ($usuarioIndividual["usuario"] == $usuario) {
          return $usuarioIndividual;
        }
      }
      return false;
    }






















































































































    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX  ACA Linea 200  XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
    // --------------------------------------- LEO --------------------------------------------
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
    // Busca el usuario pasado por parametro en el Archivo Json.
    // si lo encuentra devuelve el valor del Array del usuario, sino devuelve false
    public function buscarYdevolverUsuario($usuario) {
      $sql = "Select * from usuario where usuario = :usuario";
      $stmt = $this->conexion->prepare($sql);
      $stmt->bindValue(":usuario", $usuario, PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($result != false) {
        return Usuario::crearDesdeArray($result);
      } else {
        return NULL;
      }
    }


    // Busca el email pasado por parametro en el Archivo Json.
    // si lo encuentra devuelve el valor del Array del usuario, sino devuelve false
    public function buscarYdevolverEmail($email) {
      $sql = "Select * from usuario where mail = :mail";
      $stmt = $this->conexion->prepare($sql);
      $stmt->bindValue(":mail", $email, PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($result != false) {
        return Usuario::crearDesdeArray($result);
      } else {
        return NULL;
      }
    }
  }

?>
