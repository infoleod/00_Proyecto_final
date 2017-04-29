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
    <!-- INCLUDE DEL HEADER ---------------------------------------------------->
    <?php
      require_once("header.php");
    ?>


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
        <form class="body_login_princ_form"action="" method="post">
          <!-- imagen de fondo -->
          <!-- Usuario -->
          <div class="body_login_princ_form_renglones">
            <label>Usuario</label>
            <input type="text" name="user" required class="class-sobre" placeholder="Usuario/e-mail">
            <br>
          </div>
          <!-- PassWord -->
          <div class="body_login_princ_form_renglones">
            <label>Password</label>
            <input type="password" name="pass" required class="class-sobre" placeholder="Password">
            <br>
          </div>

          <div class="body_login_princ_form_renglones">
            <label></label>
            <button type="submit" name="enviar">Ingresar</button>
          </div>
          <div class="body_login_princ-registrate">
            <a href="formulario.html">
              <h2>¡ Registrate !</h2>
            </a>
          </div>


        </form>
      </div>
    </div>
    <!-- FIN BODY -->


    <!-- INCLUDE DEL FOOTER ---------------------------------------------------->
    <?php
      require_once("footer.php");
    ?>


  </body>
</html>
