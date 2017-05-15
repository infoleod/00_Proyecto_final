<?php
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
    // Verificamos si existe una cookie con el usuario creada anteriormente.
    // Si existe, la utilizamos para loguear al usuario
    $return = false;
    if (isset($_COOKIE["usuario"])) {
      // Cambiamos la variable a True si la subfuncion loguear usuario funciono sin problemas
      $return = $_COOKIE["usuario"];
    }
    // Devolvemos el estado
    return $return;
  };

  // Funcion que verifica segun las Cookies si el usuario esta logueado.
  // devuelve IDUSER o FALSE
  function chequeaSessionUsuario() {
    // Verificamos si existe una cookie con el usuario creada anteriormente.
    // Si existe, la utilizamos para loguear al usuario
    $return = false;
    if (isset($_SESSION["usuario"])) {
      // Cambiamos la variable a True si la subfuncion loguear usuario funciono sin problemas
      $return = $_SESSION["usuario"];
    }
    // Devolvemos el estado
    return $return;
  };

  // Funcion que LOGUEA al usuario que se pase por parametro
  // Para esto crea una cookie con el valor del usuario, asi como tambien lo carga en la variable session
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
      $return = $arrayUsuario["usuario"];
    };
    // Devolvemos el estado
    return $return;
  };

  // Busca el usuario pasado por parametro en el Archivo Json.
  // si lo encuentra devuelve el valor del Array del usuario, sino devuelve false
  function buscarYdevolverUsuario($usuario) {
    $todos = traerTodos();

    foreach ($todos as $arrayUsuario) {
      if ($arrayUsuario["usuario"] == $usuario) {

        // Devolvemos el array completo del usuario
        return $arrayUsuario;
      }
    }
    return false;
  };

  // Busca el email pasado por parametro en el Archivo Json.
  // si lo encuentra devuelve el valor del Array del usuario, sino devuelve false
  function buscarYdevolverEmail($email) {
    $todos = traerTodos();

    foreach ($todos as $arrayUsuario) {
      if ($arrayUsuario["mail"] == $email) {

        // Devolvemos el array completo del usuario
        return $arrayUsuario;
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
  //Para esto crea una cookie con el valor del usuario, asi como tambien lo carga en la variable session
  function loguearUsuario($usuario) {
    $return = false;
    //Verificamos si el usuario de la Cookie es valido.
    $arrayUsuario = buscarPorUsuario($usuario);
    $usuario      = $arrayUsuario["usuario"];
    //Si devuelve algun valor es por que encontro al usuario guardado en la Cookie
    if ($usuario) {
      //Si la informacion del usuario es correcta,
      //Lo logueamos a travez de la variable SESSION
      $_SESSION["usuario"] = $usuario;
      //Devolvemos el usuario logueado
      $return = $usuario;
    };
    //Devolvemos el estado
    return $return;
  };

  function desloguearUsuario($usuario) {
    session_start();
    unset($_SESSION[$usuario]);
    unset($_SESSION);
    // unset($_SESSION["nombre_cliente"]);
    session_destroy();
    // header("Location: index.php");
    // exit;
  };
?>
