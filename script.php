<?php
  // Pagina de soporte de Objetos
  require_once("soporte.php");

  $ejecutado = "";

  // Llamamos a la funcion que valida si existe alguna cookie con nombre usuario
  // Si lo encuentra devuelve el usuario, sino devuelve False
  $usuarioHeader = Auth::chequeaCookieUsuario();

  if ($usuarioHeader) {
    header("Location:index.php");exit;
  } elseif (isset($_SESSION["usuario"])) {
    header("Location:index.php");exit;
  };

  if ($_POST) {
    // Selecciono crear tablas
    if (isset($_POST["crearTablas"])) {
      if ($dbTipo == 'sql') {
        $db->getRepositorioUsuarios()->borrarYCrearTablaUsuarios();
        $ejecutado = "crearTablas";
      };
    };

    // Inserto los datos
    if (isset($_POST["migrarUsuarios"])) {
      if ($dbTipo == 'sql') {
        $db->getRepositorioUsuarios()->insertarUsuariosJSONEnTabla();
        $ejecutado = "migrarUsuarios";
      };
    };

    // Piso el archivo soporte con el de JSON
    if (isset($_POST["cambiarAJSON"])) {
      $nuevoarchivo = fopen('soporte.php', "w+");
      fwrite($nuevoarchivo,'
<?php
  require_once("clases/autenticacion.php");
  require_once("clases/repositorioBdSQL.php");
  require_once("clases/repositorioBdJSON.php");
  require_once("clases/validador.php");

  $auth = Auth::crearAutenticacion();
  $validador = new Validador();

  $soporte = "json";

  switch ($soporte) {
    case \'sql\':
      $db = new RepositorioSQL();
      $dbTipo = \'sql\';
      break;

    case \'json\':
      $db = new RepositorioJson();
      $dbTipo = \'json\';
      break;
  }
?>
      ');
      fclose($nuevoarchivo);
      $ejecutado = "cambiarAJSON";
    };

    // Piso el archivo soporte con el de JSON
    if (isset($_POST["cambiarASQL"])) {
      $nuevoarchivo = fopen('soporte.php', "w+");
      fwrite($nuevoarchivo,'
<?php
  require_once("clases/autenticacion.php");
  require_once("clases/repositorioBdSQL.php");
  require_once("clases/repositorioBdJSON.php");
  require_once("clases/validador.php");

  $auth = Auth::crearAutenticacion();
  $validador = new Validador();

  $soporte = "sql";

  switch ($soporte) {
    case \'sql\':
      $db = new RepositorioSQL();
      $dbTipo = \'sql\';
      break;

    case \'json\':
      $db = new RepositorioJson();
      $dbTipo = \'json\';
      break;
  }
?>
      ');
      fclose($nuevoarchivo);
      $ejecutado = "cambiarASQL";
    };
  };


?>

<?php
  require_once("header.php");
?>
<!--                   El Header abre con todo el encabezado del HTML                     -->

    <!-- INICIO BODY -->
    <div class="body_login">
      <!-- <div class="body_login_princ_form_fondo">
        <img src="images/login-bkg.jpg" alt="login_bkg">
      </div> -->
      <div class="body_login_princ">
        <!-- Titulo iniciar sesion -->
        <div class="body_login_princ_titulo">
          <h2>Migración JSON a MySQL</h2>
        </div>
        <form class="body_login_princ_form" action="script.php" method="post" enctype="multipart/form-data">
          <div class="body_login_princ_form_renglones">
            <label></label>
            <?php if ($ejecutado == "crearTablas") { ?>
              <h3 style="color:red; padding:10px 0; background-color: lightGreen;">Se crearon las tablas de MySql</h3>
            <?php } else { ?>
              <button type="submit" name="crearTablas">Crear Tablas</button>
            <?php } ?>
          </div>
          <div class="body_login_princ_form_renglones">
            <label></label>
            <?php if ($ejecutado == "migrarUsuarios") { ?>
              <h3 style="color:red; padding:10px 0; background-color: lightGreen;">Se Migraron los usuarios desde JSON a MySql</h3>
            <?php } else { ?>
              <button type="submit" name="migrarUsuarios">Migrar usuarios JSON a MySQL</button>
            <?php } ?>
          </div>
          <div class="body_login_princ_form_renglones">
            <label></label>
            <?php if ($ejecutado == "cambiarAJSON") { ?>
              <h3 style="color:red; padding:10px 0; background-color: lightGreen;">Se cambio Permanentemente la base de datos a JSON</h3>
            <?php } else { ?>
              <button type="submit" name="cambiarAJSON">Cambiar a JSON</button>
            <?php } ?>
          </div>
          <div class="body_login_princ_form_renglones">
            <label></label>
            <?php if ($ejecutado == "cambiarASQL") { ?>
              <h3 style="color:red; padding:10px 0; background-color: lightGreen;">Se cambio Permanentemente la base de datos a MySql</h3>
            <?php } else { ?>
              <button type="submit" name="cambiarASQL">Cambiar a SQL</button>
            <?php } ?>
          </div>
        </form>
      </div>
    </div>
    <!-- FIN BODY -->

<!--                   El Footer cierra con todo el encabezado del HTML                     -->
<?php
  require_once("footer.php");
?>
