<?php

  require_once("repositorioUsuarios.php");
  require_once("usuario.php");

  // Traigo datos del json
  function traerTodos() {
    $archivo = file_get_contents("usuarios.json");
    $usuariosJSON = explode(PHP_EOL, $archivo);
    array_pop($usuariosJSON);
    $usuariosFinal = [];

    // Y CADA LINEA LA CONVIERTO DE JSON A ARRAY
    foreach($usuariosJSON as $json) {
      $usuariosFinal[] = Usuario::crearDesdeArray(json_decode($json, true));
    }
    return $usuariosFinal;
  }


?>
