<?php
  $cantUsuarios = 5;
?>

<!-- INICIO FOOTER -->
<footer class="footer">
  <div class="footer-div-superior">
    <div class="footer-container-1">
      <div id="cantUsuariosFooter">
        <span >¡¡¡ Ya somos <?php echo $cantUsuarios ?>!!!</span>
      </div>
    </div>
    <div class="footer-container">
      <form class="" action="" method="post">
        <div class="">
          Recibí las mejores ofertas de ZooMarket
        </div>
        <input class="footer-div-superior-mail" type="text" name="mailOfertas" value="">
        <input class="footer-div-superior-boton" type="submit" name="suscribirse" value="Suscribirse">

      </form>
    </div>
  </div>

  <div class="footer-div-medio">
    <div class="footer-container">
      <div class="footer-div-medio-izq">
        <div class="footer-div-medio-izq-logo">
          <img src="images/logo-zoo.png" alt="">
        </div>
        <div class="footer-div-medio-izq-leyenda">
          <span>El mejor lugar para tu mascota</span>
        </div>
      </div>
      <div class="footer-div-medio-med">
        <ul>
          <li><a href="#">Información corporativa</a></li>
          <li><a href="#">Condiciones de uso</a></li>
          <li><a href="#">Política de devolución</a></li>
          <li><a href="#">Formas de pago</a></li>
          <li><a href="#">Formas de envío</a></li>
          <li><a href="#">Información y medios de contacto</a></li>
          <li><a href="preguntas_frecuentes.php">Preguntas frecuentes</a></li>
          <li><a href="script.php"><button type="button" name="Administrador">Administrador</button></a></li>
        </ul>
        <br>
      </div>
      <div class="footer-div-medio-der">
        <h4>Seguinos en nuestras redes</h4>
        <ul>
          <li><a class="footer-div-medio-der-icon" href="https://www.facebook.com/" target="_blank"><img width="35px" src="images/facebook-logo-button.png"alt=""></a></li>
          <li><a class="footer-div-medio-der-icon" href="https://twitter.com/?lang=es" target="_blank"><img width ="35px" src="images/logo-twitter.png"alt=""></a></li>
          <li><a class="footer-div-medio-der-icon" href="https://www.instagram.com/?hl=es" target="_blank"><img width="35px" src="images/instagram-logo.png"alt=""></a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="footer-copyright">
    <div class="footer-container">
      copyright: Todos los derechos pertenecen a ZooMarket SA.
    </div>
  </div>
</footer>
</body>
</html>
