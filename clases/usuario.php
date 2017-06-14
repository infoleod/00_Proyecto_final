<?php
class Usuario{
  private $nombre;
  private $apellido;
  private $mail;
  private $password;
  private $usuario;
  private $telefono;
  private $id;

  public function __construct($nombre, $apellido, $mail, $password, $usuario, $telefono, $id){
    $this->nombre=$nombre;
    $this->apellido=$apellido;
    $this->mail=$mail;
    $this->password=$password;
    $this->usuario=$usuario;
    $this->telefono=$telefono;
    $this->id=$id;
  }

  public static function hashPassword($password){
      return password_hash($password,  PASSWORD_DEFAULT);
  }

  // Funcion que crea un nuevo Usuario de tipo Objeto desde un array de usuario
  public static function crearDesdeArray(Array $datos) {
    if (!isset($datos["id"])) {
      $datos["id"] = NULL;
    }
    return new Usuario(
      $datos["nombre"],
      $datos["apellido"],
      $datos["mail"],
      $datos["password"],
      $datos["usuario"],
      $datos["telefono"],
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

  // Funcion que convierte un Objeto de usuario en un Array
  // EX - toArray
  public function crearArrayDesdeObjeto() {
    return [
      "nombre"   => $this->getNombre(),
      "apellido" => $this->getApellido(),
      "mail"     => $this->getMail(),
      "password" => $this->getPassword(),
      "usuario"  => $this->getUsuario(),
      "telefono" => $this->getTelefono(),
      "id"       => $this->getId()
    ];
  }

  public function setNombre($nombre){
    $this->nombre = $nombre;
  }
  public function getNombre(){
    return $this->nombre;
  }
  public function setApellido($apellido){
    $this->apellido = $apellido;
  }
  public function getApellido(){
    return $this->apellido;
  }
  public function setMail($mail){
    $this->mail = $mail;
  }
  public function getMail(){
    return  $this->mail;
  }
  public function setTelefono($telefono){
    $this->telefono = $telefono;
  }
  public function getTelefono(){
    return $this->telefono;
  }
  public function setUsuario($usuario){
    $this->usuario = $usuario;
  }
  public function getUsuario(){
    return $this->usuario;
  }
  public function setId($id){
    $this->id = $id;
  }
  public function getId(){
    return $this->id;
  }
  public function getFoto() {
    $file = glob('img/'. $usuario->getUsername() .'.*');

    $file = $file[0];

    return $file;
  }
  public function guardarImagen($imagenPerfil, $errores){
    if ($_FILES[$imagenPerfil]["error"] == UPLOAD_ERR_OK) {
      $nombre=$_FILES[$imagenPerfil]["name"];
      $archivo=$_FILES[$imagenPerfil]["tmp_name"];
      $ext = pathinfo($nombre, PATHINFO_EXTENSION);

      if ($ext === "jpg" || $ext === "jpeg" || $ext === "png"){
        $miArchivo = dirname(__FILE__);
        $miArchivo = $miArchivo . "/../img/";
        $miArchivo = $miArchivo . $this->usuario . "." . $ext;
        move_uploaded_file($archivo, $miArchivo);
      } else {
        $errores["imgPerfil"] = "Sube tu foto de perfil";
      }
    } else {
      $errores["imgPerfil"] = "No se pudo subir la foto";
    }
    return $errores;
  }

  public function guardar (RepositorioUsuarios $repo){
    $repo->guardarUsuario($this);
  }
  public function crearArrayDesdeObjeto(){
  return[
    "nombre"=>$this->getNombre(),
    "apellido"=>$this->getapellido(),
    "mail"=>$this->getMail(),
    "password"=>$this->getPassword(),
    "usuario"=>$this->getUsuario(),
	"telefono"=>$this->getTelefono(),
    "id"=>$this->getId()
  ];

  }

  public function getPassword(){
    return $this->password;
  }

  }




 ?>
