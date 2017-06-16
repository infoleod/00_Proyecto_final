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

    // private function traerNuevoId() {
    //   $usuarios = $this->traerTodos();
    //
    //   if (count($usuarios) == 0) {
    //     return 1;
    //   }
    //
    //   $elUltimo = array_pop($usuarios);
    //
    //   $id = $elUltimo->getId();
    //
    //   return $id + 1;
    // }

    /*buscar por usuario*/






















































































































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


    // Funcion que crea una nueva talba de SQL de usuarios
    public function borrarYCrearTablaUsuarios() {
      $sql = "DROP TABLE IF EXISTS usuario;
              CREATE TABLE usuario (
                id int(11) NOT NULL DEFAULT '1',
                nombre varchar(45) NOT NULL,
                apellido varchar(45) NOT NULL,
                usuario varchar(45) NOT NULL,
                mail varchar(150) DEFAULT NULL,
                password char(100) DEFAULT NULL,
                telefono varchar(45) DEFAULT NULL,
                PRIMARY KEY (id)
              );";
      $stmt = $this->conexion->prepare($sql);
      $stmt->execute();
    }

    // Funcion que crea una nueva talba de SQL de usuarios
    public function insertarUsuarioEnTabla($arrayUsuario) {
      $sql = "INSERT INTO zoomarket.usuario (id, nombre, apellido, usuario, mail, password, telefono)
                   VALUES (:id, :nombre, :apellido, :usuario, :mail, :password, :telefono);";
      $stmt = $this->conexion->prepare($sql);
      $stmt->bindValue(":id", $arrayUsuario["id"], PDO::PARAM_INT);
      $stmt->bindValue(":nombre", $arrayUsuario["nombre"], PDO::PARAM_INT);
      $stmt->bindValue(":apellido", $arrayUsuario["apellido"], PDO::PARAM_INT);
      $stmt->bindValue(":usuario", $arrayUsuario["usuario"], PDO::PARAM_INT);
      $stmt->bindValue(":mail", $arrayUsuario["mail"], PDO::PARAM_INT);
      $stmt->bindValue(":password", $arrayUsuario["password"], PDO::PARAM_INT);
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







  }

?>
