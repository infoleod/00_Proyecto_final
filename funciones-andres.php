<?php
  // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  // - INICIO - FUNCIONES ANDRES - XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
    
        function validarLogin($datos) {
    $errores = [];

    $mail = trim($datos["mail"]);

    if (strlen($mail) == 0) {
      $errores["mail"] = "mail incorrecto ";
    } else if (! filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $errores["mail"] = "El mail debe ser un mail";
    } else if (buscarPorMail($mail) == false) {
      $errores["mail"] = "No existe el usuario";
    } else {
      // Okey, el usuario existia
      $usuario = buscarPorMail($mail);
      if (password_verify($datos["password"], $usuario["password"]) == false) {
        $errores["mail"] = "Error de login";
      }
    }


    return $errores;
  }

  function loguear($usuario) {
    $_SESSION["usuario"] = $usuario["id"];
  }

  function estaLogueado() {
    return isset($_SESSION["usuario"]);
  }

  function usuarioLogueado() {
    return buscarPorId($_SESSION["usuario"]);
  }


  if(estaLogueado()) {
    header("location:index.php");exit;
  }

  $errores = [];

  if ($_POST) {
    $errores = validarLogin($_POST);

    if(empty($errores)) {
      $usuario = buscarPorMail($_POST["mail"]);
      loguear($usuario);

      if (isset($_POST["recordame"])) {
        setcookie("usuario", $usuario["id"], time() + 60 * 60 * 24 * 30);
      }

      header("location:index.php?id=" . $usuario["id"]);exit;
    }
  }

?>