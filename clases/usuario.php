<?php
  class Usuario {
    private $id;
    private $nombre;
    private $apellido;
    private $usuario;
    private $mail;
    private $password;
    private $telefono;

    public function __construct($id, $nombre, $apellido, $usuario, $mail, $password, $telefono) {
      $this->id = $id;
      $this->nombre = $nombre;
      $this->apellido = $apellido;
      $this->usuario = $usuario;
      $this->mail = $mail;
      $this->password = $password;
      $this->telefono = $telefono;
    }

    // Funcion que crea un nuevo Usuario de tipo Objeto desde un array de usuario
    public static function crearDesdeArray(Array $datos) {
      if (!isset($datos["id"])) {
        $datos["id"] = NULL;
      }
      return new Usuario(
        $datos["id"],
        $datos["nombre"],
        $datos["apellido"],
        $datos["usuario"],
        $datos["mail"],
        $datos["password"],
        $datos["telefono"]
      );
    }

    public static function crearDesdeArrays(Array $usuarios) {
      $usuariosFinal = [];
      foreach ($usuarios as $usuario) {
        $usuariosFinal[] = self::crearDesdeArray($usuario);
      }
      return $usuariosFinal;
    }

    // Funcion que convierte un Objeto de usuario en un Array
    // EX - toArray
    public function crearArrayDesdeObjeto() {
      return [
        "id"       => $this->getId(),
        "nombre"   => $this->getNombre(),
        "apellido" => $this->getApellido(),
        "usuario"  => $this->getUsuario(),
        "mail"     => $this->getMail(),
        "password" => $this->getPassword(),
        "telefono" => $this->getTelefono()
      ];
    }

    public function getId() {
      return $this->id;
    }
    public function setId($id){
      $this->id = $id;
    }

    public function setNombre($nombre) {
      $this->nombre = $nombre;
    }
    public function getNombre() {
      return $this->nombre;
    }

    public function setApellido($apellido) {
      $this->apellido = $apellido;
    }
    public function getApellido() {
      return $this->apellido;
    }

    public function setUsuario($usuario) {
      $this->usuario = $usuario;
    }
    public function getUsuario() {
      return $this->usuario;
    }

    public function setMail($mail) {
      $this->mail = $mail;
    }
    public function getMail() {
      return $this->mail;
    }

    public function setTelefono($telefono) {
      $this->telefono = $telefono;
    }
    public function getTelefono() {
      return $this->telefono;
    }

    public function getPassword() {
      return $this->password;
    }

  }

?>
