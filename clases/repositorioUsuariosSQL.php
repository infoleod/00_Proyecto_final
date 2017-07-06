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
      $sql = "INSERT INTO usuario value(default, :nombre, :apellido, :mail, :password, :usuario, :telefono)";
      $stmt = $this->conexion->prepare($sql);

      $stmt->bindValue(":nombre", $usuario->getNombre(), PDO::PARAM_STR);
      $stmt->bindValue(":apellido", $usuario->getApellido(), PDO::PARAM_STR);
      $stmt->bindValue(":mail", $usuario->getMail(), PDO::PARAM_STR);
      $stmt->bindValue(":password", $usuario->getPassword(), PDO::PARAM_STR);
      $stmt->bindValue(":usuario", $usuario->getUsuario(), PDO::PARAM_STR);
      $stmt->bindValue(":telefono", $usuario->getTelefono(), PDO::PARAM_STR);

      $stmt->execute();
    }

    public function traerTodos() {
      $sql = "Select * from usuario";
      $stmt = $this->conexion->prepare($sql);
      $stmt->execute();
      return Usuario::crearDesdeArrays($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public function buscarPorId($id) {
      $sql = "Select * from usuario Where id = :id";
      $stmt = $this->conexion->prepare($sql);
      $stmt->bindValue(":id", $id, PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      if($result != false){
          return Usuario::crearDesdeArray($result);
      }
      else{
        return NULL;
      }
    }

    function buscarPorUsuario($usuario) {
      $sql = "Select * from usuario Where usuario = :usuario";
      $stmt = $this->conexion->prepare($sql);
      $stmt->bindValue(":usuario", $usuario, PDO::PARAM_STR);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      if($result != false){
        return Usuario::crearDesdeArray($result);
      }
      else{
        return NULL;
      }
    }

    public function buscarPorMail($mail) {
      $sql = "Select * from usuario where mail = :mail";
      $stmt = $this->conexion->prepare($sql);
      $stmt->bindValue(":mail", $mail, PDO::PARAM_STR);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      if($result !=false){
          return Usuario::crearDesdeArray($result);
      }
      else{
        return NULL;
      }
    }



    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
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


    // Funcion que crea una nueva talba de SQL de usuarios
    public function borrarYCrearTablaUsuarios() {
      $sql = "DROP TABLE IF EXISTS zoomarket.usuario;

              CREATE TABLE zoomarket.usuario (
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                nombre VARCHAR(45) NOT NULL,
                apellido VARCHAR(45) NOT NULL,
                mail VARCHAR(150) NOT NULL,
                password VARCHAR(100) NULL,
                usuario VARCHAR(45) NOT NULL,
                telefono VARCHAR(45) NULL);";
      $stmt = $this->conexion->prepare($sql);
      $stmt->execute();
    }

    // Funcion que crea una nueva talba de SQL de usuarios
    public function insertarUsuarioEnTabla($arrayUsuario) {
      $sql = "INSERT INTO zoomarket.usuario (id, nombre, apellido, mail, password, usuario, telefono)
                   VALUES (:id, :nombre, :apellido, :mail, :password, :usuario, :telefono);";
      $stmt = $this->conexion->prepare($sql);
      $stmt->bindValue(":id", $arrayUsuario["id"], PDO::PARAM_INT);
      $stmt->bindValue(":nombre", $arrayUsuario["nombre"], PDO::PARAM_INT);
      $stmt->bindValue(":apellido", $arrayUsuario["apellido"], PDO::PARAM_INT);
      $stmt->bindValue(":mail", $arrayUsuario["mail"], PDO::PARAM_INT);
      $stmt->bindValue(":password", $arrayUsuario["password"], PDO::PARAM_INT);
      $stmt->bindValue(":usuario", $arrayUsuario["usuario"], PDO::PARAM_INT);
      $stmt->bindValue(":telefono", $arrayUsuario["telefono"], PDO::PARAM_INT);
      $stmt->execute();
    }

    public function insertarUsuariosJSONEnTabla() {
      $archivo = file_get_contents("usuarios.json");
      $usuariosJSON = explode(PHP_EOL, $archivo);
      array_pop($usuariosJSON);
      $usuariosFinal = [];
      foreach($usuariosJSON as $json) {
        $usuariosFinal[] = Usuario::crearDesdeArray(json_decode($json, true));
      }
      foreach ($usuariosFinal as $objetoUsuario) {
        $arrayUsuario = $objetoUsuario->crearArrayDesdeObjeto();

        $this->insertarUsuarioEnTabla($arrayUsuario);
      }
    }

    // public function contarUsuarios() {
    //   $sql = "SELECT count(id) AS cant_users FROM usuario";
    //   $query = $db->prepare($sql);
    //   $query->execute();
    //   $totalUsuarios = $query->fetch(PDO::FETCH_ASSOC);
    //   $json = json_encode($totalUsuarios);
    //   file_put_contents("usuarios-registrados.json", $json);
    // }


  }

?>
