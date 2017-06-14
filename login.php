<?php
  // Pagina de soporte de Objetos
  require_once("soporte.php");

  // Llamamos a la funcion que valida si existe alguna cookie con nombre usuario
  // Si lo encuentra devuelve el usuario, sino devuelve False
  $usuarioHeader = Auth::chequeaCookieUsuario();

  if ($usuarioHeader) {
    header("Location:index.php");exit;
  } elseif (isset($_SESSION["usuario"])) {
    header("Location:index.php");exit;
  };

  // Llamamos a la funcion que valida si existe alguna cookie con nombre usuario
  // Si lo encuentra devuelve el usuario, sino devuelve False
  $estaLogueado = $auth->estaLogueado();

  $usuario = "";
  $errores=[];

  if ($_POST) {
    if (isset($_POST["usuario"])) {
      $usuario      = $_POST["usuario"];
      $usuarioEmail = $usuario;

      // Sacamos los caracteres ilegales
      $usuarioEmail = filter_var($usuarioEmail, FILTER_SANITIZE_EMAIL);

      // Validamos el email
      if (!filter_var($usuarioEmail, FILTER_VALIDATE_EMAIL) === false) {
          // si es un email valido lo buscamos por email
          // Traemos el array del usuario
          $objetoUsuario = $db->getRepositorioUsuarios()->buscarYdevolverEmail($_POST["usuario"]);
      } else {
          // si no es un email lo buscamos por el usuario
          // Traemos el array del usuario
          $objetoUsuario = $db->getRepositorioUsuarios()->buscarYdevolverUsuario($_POST["usuario"]);
      };

      // Si lo encontramos verificamos el password
      if ($objetoUsuario) {

        $password = $objetoUsuario->getPassword();
        $passwordIngresado = $_POST["password"];

        // Verificamos el password
        if (password_verify($passwordIngresado , $password ) == true) {

          // Verificamos si el usuario quiere o no ser recordado
          $recordarme = false;
          if (isset($_POST["recordarme"])) {
            $recordarme = true;
          };

          // Si Existe el usuario y el Password es correcto.
          // logueamos al usuario y lo redirigimos al index pero logueado
          $usuario = $auth->loguearUsuarioCookies($objetoUsuario,$recordarme);

          header("Location:index.php");exit;

        } else {
          $errores["password"] = "El Password ingresado es incorrecto.";
        };
      } else {
        // Si no lo encuentra como usuario y el
        $errores["usuario"] = "El usuario ingresado no existe.";
      };
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
          <h2>Iniciar sesión</h2>
        </div>
        <form class="body_login_princ_form" action="login.php" method="post" enctype="multipart/form-data">
          <!-- imagen de fondo -->
          <!-- Usuario -->
          <div class="body_login_princ_form_renglones">
            <!-- Mensaje por si se equivoca al ingresar los datos -->
            <?php
            if (isset($errores["usuario"])) {
              echo "<span>" . $errores["usuario"] . "</span>";
            };
            ?>
          </div>
          <div class="body_login_princ_form_renglones">
            <label>Usuario</label>
            <input type="text" name="usuario" required class="class-sobre" placeholder="Usuario/e-mail" value=<?=$usuario?>>
            <br>
          </div>
          <!-- PassWord -->
          <div class="body_login_princ_form_renglones">
            <!-- Mensaje por si se equivoca al ingresar los datos -->
            <?php
            if (isset($errores["password"])) {
              echo "<span>" . $errores["password"] . "</span>";
            };
            ?>
          </div>
          <div class="body_login_princ_form_renglones">
            <label>Password</label>
            <input type="password" name="password" required class="class-sobre" placeholder="Password">
            <br>
          </div>
          <!-- Recordame -->
          <div class="body_login_princ_form_renglones_recordame">
            <label></label>
            <input type="checkbox" name="recordarme"value="true"><span>Recordarme</span>
            <br>
          </div>

          <div class="body_login_princ_form_renglones">
            <label></label>
            <button type="submit" name="enviar">Ingresar</button>
          </div>
          <div class="body_login_princ-registrate">
            <a href="formulario.php">
              <h2>¡ Registrate !</h2>
            </a>
          </div>
        </form>
      </div>
    </div>
    <!-- FIN BODY -->

<!--                   El Footer cierra con todo el encabezado del HTML                     -->
<?php
  require_once("footer.php");
?>
