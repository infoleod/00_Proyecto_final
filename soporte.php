<?php
  require_once("clases/autenticacion.php");
  require_once("clases/repositorioBdSQL.php");
  require_once("clases/repositorioBdJSON.php");
  require_once("clases/validador.php");

  $auth = Auth::crearAutenticacion();
  $validador = new Validador();

  $soporte = "json";

  switch ($soporte) {
    case 'sql':
      $db = new RepositorioSQL();
      break;

    case 'json':
      $db = new RepositorioJson();
      break;
  }

?>
