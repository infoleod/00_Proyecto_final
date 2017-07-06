
<?php
  require_once("clases/autenticacion.php");
  require_once("clases/repositorioBdSQL.php");
  require_once("clases/repositorioBdJSON.php");
  require_once("clases/validador.php");

  $auth = Auth::crearAutenticacion();
  $validador = new Validador();

  $soporte = "sql";

  global $db;

  switch ($soporte) {
    case 'sql':
      $db = new RepositorioSQL();
      $dbTipo = 'sql';
      break;

    case 'json':
      $db = new RepositorioJson();
      $dbTipo = 'json';
      break;
  }
?>
