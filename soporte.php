<?php
  require_once("clases/autenticacion.php");
  require_once("clases/repositorioBdSQL.php");
  require_once("clases/repositorioBdJSON.php");
  require_once("clases/validador.php");

  //$auth = Auth::crearAuth();
  $validador = new Validador();

  $soporte = "sql";

  switch ($soporte) {
    case 'sql':
      $db = new RepositorioSQL();
      break;

    case 'json':
      $db = new RepositorioJSON();
      break;
  }

?>
