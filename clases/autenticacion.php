<?php
  class Auth {
    public static $auth;

    public static function crearAutenticacion() {
      if (self::$auth == null) {
        self::$auth = new Auth();
      }
      return self::$auth;
    }

    private function __construct() {
        session_start();

        // if (isset($_COOKIE["idUser"])) {
        //   $this->loguear($_COOKIE["idUser"]);
        // }
    }

    // Funcion que verifica segun las Cookies si el usuario esta logueado.
    // devuelve IDUSER o FALSE
    public function chequeaCookieUsuario() {
      // Verificamos si existe una cookie con el usuario creada anteriormente.
      // Si existe, la utilizamos para loguear al usuario
      $return = false;
      if (isset($_COOKIE["usuario"])) {

        // Cambiamos la variable a True si la subfuncion loguear usuario funciono sin problemas
        $return = $_COOKIE["usuario"];
      };
      // Devolvemos el estado
      return $return;
    }

    // Funcion que verifica segun las Cookies si el usuario esta logueado.
    // devuelve IDUSER o FALSE
    public function chequeaSessionUsuario() {
      // Verificamos si existe una cookie con el usuario creada anteriormente.
      // Si existe, la utilizamos para loguear al usuario
      $return = false;
      if (isset($_SESSION["usuario"])) {
        // Cambiamos la variable a True si la subfuncion loguear usuario funciono sin problemas
        $return = $_SESSION["usuario"];
      }
      // Devolvemos el estado
      return $return;
    }

    public function estaLogueado() {
      $return = false;
      // Llamamos a la funcion que valida si existe alguna cookie con nombre usuario
      // Si lo encuentra devuelve el usuario, sino devuelve False
      $usuario = Auth::chequeaCookieUsuario();
      if ($usuario) {
        $return = $usuario;
      } else {
        if (isset($_SESSION["usuario"])) {
          $return = $_SESSION["usuario"];
        }
        return $return;
      }
     return isset($_SESSION["idUser"]);
    }

    // Funcion que LOGUEA al usuario que se pase por parametro
    // Para esto crea una cookie con el valor del usuario, asi como tambien lo carga en la variable session
    public function loguearUsuarioCookies($objetoUsuario,$recordarme) {
      $return = false;
      // Si devuelve algun valor es por que encontro al usuario guardado en la Cookie
      if ($objetoUsuario) {
        $arrayUsuario = $objetoUsuario->crearArrayDesdeObjeto();
        // Si la informacion del usuario es correcta,

        // Lo logueamos a travez de la variable SESSION
        foreach ($arrayUsuario as $id => $valor) {
          $_SESSION[$id] = $valor;
        };
        if ($recordarme) {
          // Guardamos el array con la informacion del usuario en las cookies
          $this->guardarCookiesUsuario($objetoUsuario,$recordarme);
          // cambiamos la variable a True por que logueamos al usuario
        };
        $return = $objetoUsuario->getUsuario();
      };
      // Devolvemos el estado
      return $return;
    }

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
    }

    //Funcion que guarda las cookies del usuario en la pc
    function guardarCookiesUsuario($objetoUsuario,$recordarme) {
      // Si la variable $recordame es True guarda la cookie 1 Mes
      // sino cuando cierra el navegador la pierde.
      if ($recordarme) {
        $expira       = time() + (3600 *  24  * 30); // 1 Mes
        $arrayUsuario = $objetoUsuario->crearArrayDesdeObjeto();

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
    }


    //
    // //Funcion que LOGUEA al usuario que se pase por parametro
    // //Para esto crea una cookie con el valor del usuario, asi como tambien lo carga en la variable session
    // function loguearUsuario($usuario) {
    //   $return = false;
    //   //Verificamos si el usuario de la Cookie es valido.
    //   $arrayUsuario = buscarPorUsuario($usuario);
    //   $usuario      = $arrayUsuario["usuario"];
    //   //Si devuelve algun valor es por que encontro al usuario guardado en la Cookie
    //   if ($usuario) {
    //     //Si la informacion del usuario es correcta,
    //     //Lo logueamos a travez de la variable SESSION
    //     $_SESSION["usuario"] = $usuario;
    //     //Devolvemos el usuario logueado
    //     $return = $usuario;
    //   };
    //   //Devolvemos el estado
    //   return $return;
    // };
    //
    // function desloguearUsuario($usuario) {
    //   session_start();
    //   unset($_SESSION[$usuario]);
    //   unset($_SESSION);
    //   // unset($_SESSION["nombre_cliente"]);
    //   session_destroy();
    //   // header("Location: index.php");
    //   // exit;
    // };


    // DARIO --------------------------------
    // public static function crearAuth() {
    //   if (self::$auth == null) {
    //     self::$auth = new Auth();
    //   }
    //   return self::$auth;
    // }
    //
    // private function __construct() {
    //     session_start();
    //
    //     if (isset($_COOKIE["idUser"])) {
    //       $this->loguear($_COOKIE["idUser"]);
    //     }
    // }
    //
    // public function loguear($id) {
    //   $_SESSION["idUser"] = $id;
    // }
    //
    // public function estaLogueado() {
    //  return isset($_SESSION["idUser"]);
    // }
    //
    // public function usuarioLogueado() {
    //  return buscarPorId($_SESSION["idUser"]);
    // }
    // DARIO --------------------------------





  }
?>
