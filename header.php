<?php
  // Pagina de funciones
  require_once("funciones.php");

  if ($_POST) {
    // - BORRAR - BORRAR - BORRAR - BORRAR - BORRAR - BORRAR - BORRAR - BORRAR - BORRAR - BORRAR
    // - BORRAR - BORRAR - BORRAR - BORRAR - BORRAR - BORRAR - BORRAR - BORRAR - BORRAR - BORRAR
    // $recordarme = false;
    // if (isset($_POST["recordarme"])) {
    //   $recordarme = true;
    // };
    //
    // if (isset($_POST["logIn"])) {
    //   $usuarioForzado = "framlopez";
    //   $arrayUsuario = buscarYdevolverUsuario($usuarioForzado);
    //
    //   // var_dump($arrayUsuario);exit;
    //
    //   if ($arrayUsuario) {
    //     // Si el usuario quieren que lo recuerden guardamos las cookies
    //     $usuario = loguearUsuarioCookies($arrayUsuario,$recordarme);
    //
    //     header("Location:index.php");exit;
    //   };
    // };
    // - BORRAR - BORRAR - BORRAR - BORRAR - BORRAR - BORRAR - BORRAR - BORRAR - BORRAR - BORRAR
    // - BORRAR - BORRAR - BORRAR - BORRAR - BORRAR - BORRAR - BORRAR - BORRAR - BORRAR - BORRAR


    if (isset($_POST["logoff"])) {

      borrarCookies();
      unset($_POST);
      unset($_SESSION);
      unset($_COOKIE);

      session_destroy();

      header("Location:index.php");exit;
    };
  };

  // Variable que define el estado de los links de login
  $usuarioLogueado = false;
  // Llamamos a la funcion que valida si existe alguna cookie con nombre usuario
  // Si lo encuentra devuelve el usuario, sino devuelve False
  $usuario = chequeaCookieUsuario();

  if ($usuario) {
    //Buscamos que exista en la base de datos
    $arrayUsuario = buscarYdevolverUsuario($usuario);

    if ($arrayUsuario) {
      // La funcion loguearUsuarioCookie dentro valida si existe ese valor en la base de datos
      $recordarme = true;
      $usuarioLogueado = loguearUsuarioCookies($arrayUsuario,$recordarme);

      if ($usuarioLogueado) {
        $usuarioLogueado = "Hola " . $usuarioLogueado;
      };
    };
  } else {
    // Verificamos si tiene session activa, si es asi lo logueamos
    $usuarioLogueado = chequeaSessionUsuario();

    if ($usuarioLogueado) {
      $usuarioLogueado = "Hola " . $usuarioLogueado;
    };
  };

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>ZOOMarket</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  </head>
  <body>
    <!-- INICIO HEADER -->
    <header class="header">
      <!-- INICIO Login -->
      <div class="header-div-login">
        <div class="header-div">
          <!-- <div class="header-div-login-links">
            <a href="formulario.php">Registrarse</a>
            <a href="login.php">LogIn</a>
          </div> -->
          <?php
          // Si el usuario esta logueado lo saludamos
          // Si no le mostramos los datos del logi n
          if ($usuarioLogueado) { ?>
            <div class="header-div-login-links">
              <form class="header-div-login-links-logoff" action="index.php" method="post">
                <input type="submit" name="logoff" value="desloguearse">
                <input class="header-div-login-icons" type="image" name="carrito" src="images/header-carrito.png" border="0" alt="Submit">
                <input class="header-div-login-icons" type="image" name="miCuenta" src="images/header-avatar.png" border="0" alt="Submit">
              </form>
              <a href="#"><?=$usuarioLogueado?></a>
            </div>
          <?PHP } else { ?>
            <!-- <form class="borrar-solo-pruebas" action="index.php" method="post">
              <input type="submit" name="logIn" value="Loguear usuario">
              <input type="checkbox" name="recordarme" value="true">Recordarme
            </form> -->
            <div class="header-div-login-links">
              <a href="formulario.php">Registrarse</a>
              <a href="login.php">LogIn</a>
            </div>
          <?PHP }; ?>


        </div>
      </div>
      <!-- FIN Login -->
      <div class="header-div">
        <!-- INICIO Logo -->
        <div class="header-div-logo">
          <a href="index.php">
            <img class="header-div-logo-mobile-logo" src="images/prueba-logo.png" alt="logo-mini">
          </a>
          <a href="index.php">
            <img class="header-div-logo-desktop-logo" src="images/logo-zoo.png" alt="logo-desktop">
          </a>
        </div>
        <!-- FIN Logo -->

        <!-- INICIO Buscar -->
        <div class="header-div-buscar">
          <img class="header-div-logo-mobile-search" src="images/search-icono.png" alt="search-icon">
          <form class="form-buscar" action="index.php" method="post">
            <input type="text" name="buscar" placeholder="Buscar">
          </form>
        </div>
        <!-- FIN Buscar -->

      </div>

      <!-- INICIO Menu -->
      <div class="header-div-menu">
        <div class="header-div">
        <nav>
          <ul class="header-div-menu-icon">
            <li class="header-div-menu-icon-li" >
              <!-- ICONO De menu en Mobile -->
              <a href="#">
                <img class="header-div-logo-mobile-menu" src="images/menu-icon.png" alt="menu-icon">
              </a>

              <!-- SubMenu con Lista desplegable -->
              <ul class="header-div-menu-lista">
                <li><a class="header-div-menu-lista-login" href="login.php">LogIn</a></li>
                <li><a class="header-div-menu-lista-login" href="formulario.php">Registrarse</a></li>

                <!-- Productos -->
                <li>
                  <a href="#">Productos</a>
                  <ul class="header-div-menu-lista-principal">
                    <li>
                      <a href="#">Perros</a>
                      <ul class="header-div-menu-lista-secundario">
                        <li><a href="#">Cuchas</a></li>
                        <li><a href="#">Juguetes</a></li>
                        <li><a href="#">Comida</a></li>
                        <li><a href="#">Peluqueria</a></li>
                        <li><a href="#">Otros</a></li>
                      </ul>
                    </li>
                    <li><a href="#">Gatos</a></li>
                    <li><a href="#">Aves</a></li>
                    <li><a href="#">Exoticos</a></li>
                    <li><a href="#">Otros</a></li>
                  </ul>
                </li>
                <li><a href="#">Ofertas</a></li>
                <li><a href="#">Top 10</a></li>
                <li><a href="#">Comprar</a></li>
                <li><a href="#">Vender</a></li>
              </ul>
            </li>
          </ul>


        </nav>
      </div>
      </div>
      <!-- FIN Menu -->
    </header>
    <!-- FIN HEADER -->

  </body>
</html>
