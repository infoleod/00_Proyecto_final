<?php
  // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  // - INICIO - FUNCIONES FRAN - XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  /*Inicio de la validacion de la registracion*/
  function validarInformacion($informacion){
    $errores=[];
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
  /*Valido usuario, minimo de datos 6*/
  /*$usuario=trim($informacion["usuario"]);
  if (strlen($usuario) >= 6) {
    $errores["usuario"] = "Minimo de datos de usuario 6 caracteres";
  }
  if(buscarPorUsuario($usuario) != false){
    $errores["usuario"] = "Ya existe el usuario";
  }*/
  /*valido el mail, que sea mayor a uno el contenido, filtro con que sea un mail valido, luego busco el mail en la base para que ya no exista*/
  $mail = trim($informacion["mail"]);
  if (strlen($mail) == 0 ) {
    $errores["mail"]="Debe completar el mail";
    }
    elseif (! filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $errores["mail"]="Debe completar con un mail valido";
    }
    elseif (buscarPorMail($mail) != false) {
      $errores["mail"]="El mail ya existe";
    }
    /*Valido que el lo que entre entra en password y confirmacion de contraseña no sea vacio*/
    if ($informacion["password"]=="") {
      $errores["password"] = "Llena la contraseña";
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
  /*funcion para guardar imagen, ingreso lo que viene en la funcion imagen y los errores encontrados previamente.
  */

  function guardarImagen($imagenPefil, $errores){
    if ($_FILES[$imagenPefil]["error"] == UPLOAD_ERR_OK) {
      $nombre=$_FILES[$imagenPefil]["name"];
      $archivo=$_FILES[$imagenPefil]["tmp_name"];
      $ext = pathinfo("nombre", PATHINFO_EXTENSION);

      if ($ext === "jpg" || $ext === "jpeg" || $ext === "png") {
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

  /*funcion para guardar el usuario en el json, con lo que viene en usuario*/
  function guardarUsuario($usuario){
    $json= json_encode($usuario);
    $json=$json . PHP_EOL;

    file_put_contents("usuarios.json", $json, FILE_APPEND);
  }

  /*funcion para crear el usuario con los datos que vinieron por post y hasheamos la la clave previamente. Traigo nuevo ID*/
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
  /*traigo datos del json*/
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
    foreach ($todos as $usuario) {
      if($usuario["usuario"] == $usuario){
        return $usuario;
      }
    }
    return false;
  };

  /*Funcion buscar por mail, esta nos sirve para verificar si el mail ingresado no se repite en nuestra base*/
  function buscarPorMail($mail) {
    $todos = traerTodos();

    foreach ($todos as $usuario) {
      if ($usuario["mail"] == $mail) {
        return $usuario;
      }
    }

    return false;
  };
?>
