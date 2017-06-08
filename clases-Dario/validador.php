<?php

class Validador {
  public function validarInformacion($informacion, RepositorioUsuarios $repo) {
    $errores = [];

    $nombre = trim($informacion["nombre"]);

    if (strlen($nombre) == 0) {
      $errores["nombre"] = "Che, no pusiste el nombre :(";
    }

    $usuario = trim($informacion["usuario"]);

    if (strlen($usuario) < 7) {
      $errores["usuario"] = "El usuario debe tener más de 7 caracteres";
    }

    $mail = trim($informacion["mail"]);

    if (strlen($mail) == 0) {
      $errores["mail"] = "Che, no pusiste el mail :(";
    } else if (! filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $errores["mail"] = "El mail debe ser un mail";
    } else if ($repo->buscarPorMail($mail) != false) {
      $errores["mail"] = "El mail ya existe";
    }

    $edad = trim($informacion["edad"]);
    if (!is_numeric($edad)) {
      $errores["edad"] = "Tu edad debe ser un número";
    }

    if ($informacion["password"] == "") {
      $errores["password"] = "Llena la contraseña";
    }
    if ($informacion["cpassword"] == "") {
      $errores["cpassword"] = "Confirmá tu contraseña";
    }
    if ($informacion["password"] != "" && $informacion["cpassword"] != "" && $informacion["password"] != $informacion["cpassword"]) {
      $errores["password"] = "Las dos contraseñas deben ser iguales";
    }

    return $errores;
  }

  function validarLogin($datos, RepositorioUSuarios $repo) {
    $errores = [];

    $mail = trim($datos["mail"]);

    if (strlen($mail) == 0) {
      $errores["mail"] = "Che, no pusiste el mail :(";
    } else if (! filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $errores["mail"] = "El mail debe ser un mail";
    } else if ($repo->buscarPorMail($mail) == false) {
      $errores["mail"] = "No existe el usuario";
    } else {
      // Okey, el usuario existia
      $usuario = $repo->buscarPorMail($mail);
      if (password_verify($datos["password"], $usuario->getPassword()) == false) {
        $errores["mail"] = "Error de login";
      }
    }


    return $errores;
  }
}

?>
