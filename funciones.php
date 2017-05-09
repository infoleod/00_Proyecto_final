<?php
<<<<<<<

/*Inicio de la validacion de la registracion*/
=======
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// - INICIO - FUNCIONES LEO - XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

// Funcion que borra todas las Cookies
// Devuelve la variable $_COOKIE
function borrarCookies() {
  if ($_COOKIE) {
    $expira = time() - 3600;

    foreach($_COOKIE as $id => $cookie) {
      // unset($_COOKIE[$key]);
      setcookie($id, '', $expira);
    };
  };
  return $_COOKIE;
};

// Funcion que verifica segun las Cookies si el usuario esta logueado.
// devuelve IDUSER o FALSE
function chequeaCookieUsuario() {
  // Verificamos si existe una cookie con el idUser creada anteriormente.
  // Si existe, la utilizamos para loguear al usuario
  $return = false;
  if (isset($_COOKIE["idUser"])) {
    // Cambiamos la variable a True si la subfuncion loguear usuario funciono sin problemas
    $return = $_COOKIE["idUser"];
  }
  // Devolvemos el estado
  return $return;
};

// Funcion que verifica segun las Cookies si el usuario esta logueado.
// devuelve IDUSER o FALSE
function chequeaSessionUsuario() {
  // Verificamos si existe una cookie con el idUser creada anteriormente.
  // Si existe, la utilizamos para loguear al usuario
  $return = false;
  if (isset($_SESSION["idUser"])) {
    // Cambiamos la variable a True si la subfuncion loguear usuario funciono sin problemas
    $return = $_SESSION["idUser"];
  }
  // Devolvemos el estado
  return $return;
};

// Funcion que LOGUEA al usuario que se pase por parametro
// Para esto crea una cookie con el valor del idUser, asi como tambien lo carga en la variable session
function loguearUsuarioCookies($arrayUsuario,$recordarme) {
  $return = false;
  // Si devuelve algun valor es por que encontro al usuario guardado en la Cookie
  if ($arrayUsuario) {
    // Si la informacion del usuario es correcta,

    // Lo logueamos a travez de la variable SESSION
    foreach ($arrayUsuario as $id => $valor) {
      $_SESSION[$id] = $valor;
    };
    if ($recordarme) {
      // Guardamos el array con la informacion del usuario en las cookies
      guardarCookiesUsuario($arrayUsuario,$recordarme);
      // cambiamos la variable a True por que logueamos al usuario
    };
    $return = $arrayUsuario["idUser"];
  };
  // Devolvemos el estado
  return $return;
};

// Busca el usuario pasado por parametro en el Archivo Json.
// si lo encuentra devuelve el valor del Array del usuario, sino devuelve false
function buscarPorIdUser($idUser) {
  $todos = traerTodos();
  foreach ($todos as $usuario) {
    if ($usuario["idUser"] == $idUser) {
      // Quitamos el valor de la contraseña
      unset($usuario["contraseña"]);
      // Devolvemos el array completo del usuario
      return $usuario;
    }
  }
  return false;
};

//Funcion que guarda las cookies del usuario en la pc
function guardarCookiesUsuario($arrayUsuario,$recordarme) {
  // Si la variable $recordame es True guarda la cookie 1 Mes
  // sino cuando cierra el navegador la pierde.
  if ($recordarme) {
    $expira       = time() + (3600 *  24  * 30); // 1 Mes
    //Guardamos el array del usuario en las cookies
    foreach ($arrayUsuario as $id => $valor) {
      setcookie($id, $valor, $expira);
    };
    // } else {
    // //Guardamos el array del usuario en las cookies
    // foreach ($arrayUsuario as $id => $valor) {
    //   setcookie($id, $valor);
    // };
  };
};

//Funcion que LOGUEA al usuario que se pase por parametro
//Para esto crea una cookie con el valor del idUser, asi como tambien lo carga en la variable session
function loguearUsuario($idUser) {
  $return = false;
  //Verificamos si el usuario de la Cookie es valido.
  $arrayUsuario = buscarPorIdUser($idUser);
  $usuario      = $arrayUsuario["idUser"];
  //Si devuelve algun valor es por que encontro al usuario guardado en la Cookie
  if ($usuario) {
    //Si la informacion del usuario es correcta,
    //Lo logueamos a travez de la variable SESSION
    $_SESSION["idUser"] = $usuario;
    //Devolvemos el usuario logueado
    $return = $usuario;
  };
  //Devolvemos el estado
  return $return;
};

function desloguearUsuario($idUser) {
  session_start();
  unset($_SESSION[$idUser]);
  unset($_SESSION);
  // unset($_SESSION["nombre_cliente"]);
  session_destroy();
  // header("Location: index.php");
  // exit;
}

//Trae todos los usuarios del Json.
// generalmente se utiliza desde otras funciones.

// Se usa la funcion de FRAN 
              // function traerTodos() {
              //   $archivo        = file_get_contents("cookies.json");
              //   $usuariosJSON   = explode(PHP_EOL, $archivo);
              //   array_pop($usuariosJSON);
              //   $usuariosFinal  = [];
              //   foreach($usuariosJSON as $json) {
              //     $usuariosFinal[] = json_decode($json, true);
              //   }
              //   return $usuariosFinal;
              // };
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// - FIN - FUNCIONES LEO - XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX












// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// - INICIO - FUNCIONES FRAN - XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
>>>>>>>
function validarInformacion($informacion){
  $errores=[];
  /* valido el nombre, elimino espacios que puedan venir por el post y luego chequeo que haya ingresado algo dentro del campo */
  $nombre= trim($informacion["nombre"]);
  if (strlen($nombre) == 0) {
    $errores["nombre"]  = "Debe completar su nombre";
   }
<<<<<<<
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
=======
  $apellido=trim($informacion["apellido"]);
  if (strlen($apellido) == 0) {
    $errores["apellido"] = "Debe completar su apellido";
>>>>>>>
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
<<<<<<<
  /*Valido que el lo que entre entra en password y confirmacion de contraseña no sea vacio*/
  if ($informacion["password"]=="") {
    $errores["password"] = "Llena la contraseña";
=======
  if ($informacion["password"] != "" && $informacion["cpassword"]!== "" && $informacion["password"] !== $informacion["cpassword"]) {
    $errores["password"] = "la contraseña debe ser igual a su confirmación, pruebe nuevamente.";
>>>>>>>
  }
<<<<<<<
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
=======
  return $errores;
  }
>>>>>>>

<<<<<<<
function guardarImagen($imagenPefil, $errores){
  if ($_FILES[$imagenPefil]["error"] == UPLOAD_ERR_OK) {
    $nombre=$_FILES[$imagenPefil]["name"];
    $archivo=$_FILES[$imagenPefil]["tmp_name"];
    $ext = pathinfo("nombre", PATHINFO_EXTENSION);
=======
  function guardarImagen($imagenPefil, $errores){
    if ($_FILES[$imagenPefil]["error"] == UPLOAD_ERR_OK) {
      $nombre=$_FILES[$imagenPefil]["name"];
      $archivo=$_FILES[$imagenPefil]["tmp_name"];
>>>>>>>

<<<<<<<
    if ($ext === "jpg" || $ext === "jpeg" || $ext === "png") {
      $miArchivo = dirname(__FILE__);
      $miArchivo = $miArchivo . "/img/";
      $miArchivo = $miArchivo . $_POST["usuario"] . "." . $ext;
      move_uploaded_file($archivo, $miArchivo);
=======
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
>>>>>>>
    }
    return $errores;
  }
<<<<<<<
  return $errores;
}

/*funcion para guardar el usuario en el json, con lo que viene en usuario*/
function guardarUsuario($usuario){
  $json= json_encode($usuario);
  $json=$json . PHP_EOL;
=======

>>>>>>>

  function guardarUsuario($usuario){
    $json= json_encode($usuario);
    $json=$json . PHP_EOL;
    file_put_contents("usuarios.json", $json, FILE_APPEND);
  }

<<<<<<<
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
=======
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
>>>>>>>

<<<<<<<
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
=======
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
>>>>>>>
  }

<<<<<<<
  return $usuariosFinal;
}

/*Con esta funcion asigno nuevo ID, el cual se utiliza a la hora de la creacion del usuario*/
function traerNuevoId() {
  $usuarios = traerTodos();
=======

>>>>>>>


  function traerNuevoId() {
    $usuarios = traerTodos();

    if (count($usuarios) == 0) {
      return 1;
    }

    $elUltimo = array_pop($usuarios);

<<<<<<<
/*buscar por usuario*/

function buscarPorUsuario($usuario){
  $todos = traerTodos();
  foreach ($todos as $usuario) {
    if($usuario["usuario"] == $usuario){
      return $usuario;
    }
  }
return false;
}

/*Funcion buscar por mail, esta nos sirve para verificar si el mail ingresado no se repite en nuestra base*/
function buscarPorMail($mail) {
  $todos = traerTodos();
=======
    $id = $elUltimo["id"];
>>>>>>>

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
  // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  // - FIN - FUNCIONES FRAN - XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX












  // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  // - INICIO - FUNCIONES ANDRES - XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX








  // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  // - FIN - FUNCIONES ANDRES - XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
?>
