<?php

class Usuario {
  private $nombre;
  private $mail;
  private $edad;
  private $pais;
  private $password;
  private $username;
  private $id;

  public function __construct($nombre, $mail, $edad, $pais, $password, $username, $id) {
    $this->nombre = $nombre;
    $this->mail = $mail;
    $this->edad = $edad;
    $this->pais = $pais;
    $this->password = $password;
    $this->username = $username;
    $this->id = $id;
  }

  public static function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
  }

  public static function crearDesdeArray(Array $datos) {
    if (!isset($datos["id"])) {
      $datos["id"] = NULL;
    }
    if (!isset($datos["usuario"])) {
      $datos["usuario"] = $datos["username"];
    }
    return new Usuario(
      $datos["nombre"],
      $datos["mail"],
      $datos["edad"],
      $datos["pais"],
      $datos["password"],
      $datos["usuario"],
      $datos["id"]
    );
  }

  public static function crearDesdeArrays(Array $usuarios) {
    $usuariosFinal = [];

    foreach ($usuarios as $usuario) {
      $usuariosFinal[] = self::crearDesdeArray($usuario);
    }

    return $usuariosFinal;
  }

  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function setMail($mail) {
    $this->mail = $mail;
  }

  public function getMail() {
    return $this->mail;
  }

  public function setPais($pais) {
    $this->pais = $pais;
  }

  public function getPais() {
    return $this->pais;
  }

  public function getEdad() {
    return $this->edad;
  }

  public function setEdad($edad){
    $this->edad = $edad;
  }

  public function setUsername($username) {
    $this->username = $username;
  }

  public function getUsername() {
    return $this->username;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getFoto() {
    $file = glob('img/'. $usuario->getUsername() .'.*');

    $file = $file[0];

    return $file;
  }

  public function guardarImagen($unaImagen, $errores) {
		if ($_FILES[$unaImagen]["error"] == UPLOAD_ERR_OK)
		{

			$nombre=$_FILES[$unaImagen]["name"];
			$archivo=$_FILES[$unaImagen]["tmp_name"];

			$ext = pathinfo($nombre, PATHINFO_EXTENSION);
      if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
  			$miArchivo = dirname(__FILE__);
  			$miArchivo = $miArchivo . "/../img/";
  			$miArchivo = $miArchivo . $this->username . "." . $ext;
  			move_uploaded_file($archivo, $miArchivo);
      }
      else {
        $errores["imgPerfil"] = "Ey, subi una foto. No cualquier cosa";
      }
		} else {
      //Acá hay error
      $errores["imgPerfil"] = "No se pudo subir la foto :(";
    }
    return $errores;
	}

  public function guardar(RepositorioUsuarios $repo) {
    $repo->guardarUsuario($this);
  }

  public function toArray() {
    return [
      "id" => $this->getId(),
      "nombre" => $this->getNombre(),
      "mail" => $this->getMail(),
      "password" => $this->getPassword(),
      "pais" => $this->getPais(),
      "edad" => $this->getEdad(),
      "username" => $this->getUsername()
    ];
  }

  public function getPassword() {
    return $this->password;
  }
}

 ?>
