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
   $this->apelludo=$apellido;
   $this->mail=$mail;
   $this->password=$password;
   $this->usuario=$usuario;
   $this->telefono=$telefono;
   $this->id=$id;
 }

public static function hashPassword($password){
    return password_hash($password,  PASSWORD_DEFAULT);
}
public static function crearDesdeArray(Array $informacion){
  if(!isset($informacion["id"])){
    $informacion["id"] = NULL;
  }
  if (!isset($informacion["id"])) {
    $informacion["usuario"] = $informacion["usuario"];
  }
  return new Usuario(
    $informacion["nombre"],
    $informacion["apellido"],
    $informacion["mail"],
    $informacion["telefono"],
    $informacion["password"],
    $informacion["usuario"],
    $informacion["id"]
  );
}
public static function crearDesdeArrays(Array $usuarios){
  $usuariosFinal = [];

  foreach ($usuarios as $usuario) {
    $usuariosFinal[] = self:: crearDesdeArray($usuario);
  }

  return $usuariosFinal;
}

public function setNombre($nombre){
  $this->nombre = $nombre;
}
public function getNombre(){
  $this->nombre = $nombre;
}
public function setApellido($apellido){
  $this->apellido = $apellido;
}
public function getApellido(){
  $this->apellido = $apellido;
}
public function setMail($mail){
  $this->mail = $mail;
}
public function getMail(){
  $this->mail = $mail;
}
public function setTelefono($telefono){
  $this->telefono = $telefono;
}
public function getTelefono(){
  $this->telefono = $telefono;
}
public function setUsuario($usuario){
  $this->usuario = $usuario;
}
public function getUsuario(){
  $this->usuario = $usuario;
}
public function setId($id){
  $this->id = $id;
}
public function getId(){
  $this->id = $id;
}
public function getFoto() {
  $file = glob('img/'. $usuario->getUsername() .'.*');

  $file = $file[0];

  return $file;
}
public function guardarImagen($imagenPerfil, $errores){
  if ($imagenPerfil["error"] == UPLOAD_ERR_OK) {
    $nombre=$imagenPerfil["name"];
    $archivo=$imagenPerfil["tmp_name"];
    $ext = pathinfo($nombre, PATHINFO_EXTENSION);

    if ($ext === "jpg" || $ext === "jpeg" || $ext === "png"){
      $miArchivo = "./img/";
      $miArchivo = $miArchivo . $_POST["usuario"] . "." . $ext;
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
public function toArray(){
return[
  "id"=>$this->getId(),
  "nombre"=>$this->getNombre(),
  "apellido"=>$this->getapellido(),
  "mail"=>$this->getMail(),
  "password"=>$this->getPassword(),
  "telefono"=>$this->getTelefono(),
  "usuario"=>$this->getUsuario()
];

}

public function getPassword(){
  return $this->password;
}

}




 ?>
