<?php
function validarInformacion($informacion){
  $errores=[];
  $nombre= trim($informacion["nombre"]);
  if (strlen($nombre) == 0) {
    $errores["nombre"]  = "Debe completar su nombre";
   }
$apellido=trim($informacion["apellido"]);
if (strlen($apellido) == 0) {
  $errores["apellido"] = "Debe completar su apellido";
}
$telefono =trim($informacion["telefono"]);
if (strlen($telefono) == 0) {
  $errores["telefono"]= "Debe completar su telefono";
}
$mail = trim($informacion["mail"]);
if (strlen($mail) == 0) {
  $errores["mail"]="Debe completar el mail";
  }
  elseif (! filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    $errores["mail"]="Debe completar con un mail valido";
  }
  elseif (buscarPorMail($mail) != false) {
    $errores["mail"]="El mail ya existe";
  }
  if ($informacion["password"]=="") {
    $errores["password"] = "Llena la contraseña";
  }
  if($informacion["cpassword"]==""){
  $errores["cpassword"] = "Debe confirmar su contraseña";
}
if ($informacion["password"] != "" && $informacion["cpassword"]!== "" && $informacion["password"] !== $informacion["cpassword"]) {
  $errores["password"] = "la contraseña debe ser igual a su confirmación, pruebe nuevamente.";
}
return $errores;
}

function guardarImagen($imagenPefil, $errores){
  if ($_FILES[$imagenPefil]["error"] == UPLOAD_ERR_OK) {
    $nombre=$_FILES[$imagenPefil]["name"];
    $archivo=$_FILES[$imagenPefil]["tmp_name"];

    $ext = pathinfo("nombre", PATHINFO_EXTENSION);
    if ($ext== "jpg" || $ext == "jpeg" || $ext == "png") {
      $miArchivo = dirname(__FILE__);
      $miArchivo = $miArchivo . "/img/";
      $miArchivo = $miArchivo . $_POST["usuario"] . "." . $ext;
      move_uploaded_file($archivo, $miArchivo);
    }
    else {
      $errores["imgPerfil"] = "Sube tu foto de perfil";
    }
  }else {
    $errores["imgPerfil"] = "No se pudo subir la foto";
  }
  return $errores;
}
function guardarUsuario($usuario){
  $json= json_encode($usuario);
  $json=$json . PHP_EOL;

  file_put_contents("usuarios.json", $json, FILE_APPEND);
}

function crearUsuario($datos) {
  $usuario =[
    "nombre"=>$datos["nombre"],
    "apellido"=>$datos["apellido"],
    "usuario"=>$datos["usuario"],
    "telefono"=>$datos["telefono"],
    "mail"=>$datos["mail"],
    "password"=>password_hash($datos["password"], PASSWORD_DEFAULT)
  ];
  $usuario["id"] = traerNuevoId();

  return $usuario;
}

function traerTodos() {
  $archivo = file_get_contents("usuarios.json");
  $usuariosJSON = explode(PHP_EOL, $archivo);
  array_pop($usuariosJSON);
  $usuariosFinal = [];
  foreach($usuariosJSON as $json) {
    $usuariosFinal[] = json_decode($json, true);
  }

  return $usuariosFinal;
}
function traerNuevoId() {
  $usuarios = traerTodos();

  if (count($usuarios) == 0) {
    return 1;
  }

  $elUltimo = array_pop($usuarios);

  $id = $elUltimo["id"];

  return $id + 1;
}

function buscarPorMail($mail) {
  $todos = traerTodos();

  foreach ($todos as $usuario) {
    if ($usuario["mail"] == $mail) {
      return $usuario;
    }
  }

  return false;
}
 ?>
