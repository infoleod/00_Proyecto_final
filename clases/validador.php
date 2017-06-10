<?php
class Validador{
  public function validarInformacion($informacion, RepositorioUsuarios $repo){
    $errores = [];

    /* valido el nombre, elimino espacios que puedan venir por el post y luego chequeo que haya ingresado algo dentro del campo */
    $nombre= trim($informacion["nombre"]);
    if (strlen($nombre) == 0) {
      $errores["nombre"]  = "Debe completar su nombre";
     }
      /* valido el apellido, elimino espacios que puedan venir por el post y luego chequeo que haya ingresado algo dentro del campo */
    $apellido=trim($informacion["apellido"]);
    if (strlen($apellido) == 0) {
      $errores["apellido"] = "Debe completar su apellido";
    }
    /* valido el Telefono, elimino espacios que puedan venir por el post y luego chequeo que haya ingresado algo dentro del campo */
    /*Ademas valido que el telefono tenga un minimo de 11 numeros(codigo de area+ telefono)*/
    $telefono =trim($informacion["telefono"]);
    if (strlen($telefono) == 0) {
      $errores["telefono"]= "Debe completar su telefono";
    }
    /*Valido usuario, minimo de informacion 6*/
    $usuario=trim($informacion["usuario"]);
    if (strlen($usuario) == 0) {
    $errores["usuario"] = "Complete un usuario";
    }
    if(buscarYdevolverUsuario($usuario) != false){
      $errores["usuario"] = "Este Usuario ya se encuentra en uso";
    }
    /*valido el mail, que sea mayor a uno el contenido, filtro con que sea un mail valido, luego busco el mail en la base para que ya no exista*/
    $mail = trim($informacion["mail"]);
    if (strlen($mail) == 0 ) {
      $errores["mail"]="Debe completar el mail";
    }
    elseif (! filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $errores["mail"]="Debe completar con un mail valido";
    }
    elseif ($repo->buscarPorMail($mail) != false) {
      $errores["mail"]="Este E-Mail ya está registrado";
    }
    /*Valido que el lo que entre entra en password y confirmacion de contraseña no sea vacio*/
    if ($informacion["password"] < 99999) {
      $errores["password"] = "Minimo 6 caracteres";
    }
    if($informacion["cpassword"]==""){
      $errores["cpassword"] = "Debe confirmar su contraseña";
    }
    /*confirmo que ambas sean las mismas*/
    if ($informacion["password"] != "" && $informacion["cpassword"]!== "" && $informacion["password"] !== $informacion["cpassword"]) {
      $errores["password"] = "la contraseña debe ser igual a su confirmación, pruebe nuevamente.";
    }
    return $errores;
    }

function validarLogin($informacion, RepositorioUsuarios $repo){
  $errores = [];

  $mail = trim($informacion["mail"]);

  if (strlen($mail) == 0) {
      $errores["mail"] = "No completo el campo mail";
  }elseif (! filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    $errores["mail"] = "El mail no es valido";
  }elseif ($repo->buscarPorMail($mail) == false) {
    $errores["mail"] = "Usuario no existe";
  }else {
    //usuario existe
    $usuario =$repo->buscarPorMail($mail);
    if (password_verify($informacion["password"], $usuario->getPassword()) == false) {
      $errores["mail"] = "Error de Login";
    }
  }

  return $errores
}

  // /*traigo informacion del json*/
  // function traerTodos() {
  //   $archivo = file_get_contents("usuarios.json");
  //   $usuariosJSON = explode(PHP_EOL, $archivo);
  //   array_pop($usuariosJSON);
  //   $usuariosFinal = [];
  //   foreach($usuariosJSON as $json) {
  //     $usuariosFinal[] = json_decode($json, true);
  //   }
  //   return $usuariosFinal;
  // }

  /*Con esta funcion asigno nuevo ID, el cual se utiliza a la hora de la creacion del usuario*/
  function traerNuevoId() {
  $usuarios = traerTodos();
  if (count($usuarios) == 0) {
    return 1;
  }
  $elUltimo = array_pop($usuarios);
  $id = $elUltimo["id"];
  return $id + 1;
  }

  /*buscar por usuario*/
  function buscarPorUsuario($usuario){
  $todos = traerTodos();
  foreach ($todos as $usuarioIndividual) {
      if($usuarioIndividual["usuario"] == $usuario){
      return $usuarioIndividual;
    }
  }
  return false;
  }

}
 ?>
