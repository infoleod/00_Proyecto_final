<?php







?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>ZOOMarket</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <!-- INICIO HEADER -->
    <header class="header">
      <div class="header-barra">
        <img src="images/barra-horizontal.png" alt="barra">
      </div>
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

        <!-- INICIO Menu -->
        <div class="header-div-menu">
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
        <!-- FIN Menu -->

        <!-- INICIO Login -->
        <div class="header-div-login">
          <a href="login.php">LogIn</a>
          <a href="formulario.php">Registrarse</a>
        </div>
        <!-- FIN Login -->
      </div>
    </header>
    <!-- FIN HEADER -->

  </body>
</html>
