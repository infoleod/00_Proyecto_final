<?php

?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial scale=1">
    <title>ZOOMarket</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>


  <body>

    <?php
    require_once("header.php");

     ?>

    <!-- INICIO BODY -->
    <div class="body_home">
      <div class="principalContenedorBanner">

      
        <div class="w3-content w3-display-container" style="">
                <img class="mySlides" src="images/gatoBanner.jpg" style="width:100%">
                <img class="mySlides" src="images/perroBanner.jpg" style="width:100%">
                <img class="mySlides" src="images/birdBanner.jpg" style="width:100%">
              <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
                  <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
                  <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
                  <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
                  <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
                  <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
              </div>
        </div>
      </div>
        <script>
              var slideIndex = 1;
              showDivs(slideIndex);

              function plusDivs(n) {
                showDivs(slideIndex += n);
              }

              function currentDiv(n) {
                showDivs(slideIndex = n);
              }

              function showDivs(n) {
                var i;
                var x = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("demo");
                if (n > x.length) {slideIndex = 1}
                if (n < 1) {slideIndex = x.length}
                for (i = 0; i < x.length; i++) {
                   x[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                   dots[i].className = dots[i].className.replace(" w3-white", "");
                }
                x[slideIndex-1].style.display = "block";
                dots[slideIndex-1].className += " w3-white";
                  }
        </script>

      <section class="body_products_grilla">
        <article class="products_body">
          <img src="./images/perro_portada_seccion.jpg" alt="">
          <div class="title.product">
            <a href="#">Perros!</a>
          </div>
        </article>
        <article class="products_body">
          <img src="./images/gato_portada_seccion.jpg" alt="">
          <div class="title.product">
            <a href="#">Gatos!</a>
          </div>
        </article>
        <article class="products_body">
          <img src="./images/cruza_portada.jpg" alt="">
          <div class="title.product">
            <a href="#">Ofertas!</a>
          </div>
        </article>
        <article class="products_body">
          <img src="./images/otras_mascotas_portada.jpg" alt="">
          <div class="title.product">
            <a href="#">Otras mascotas!</a>
          </div>
        </article>
      </section>
    </div>
    <!-- FIN BODY -->


<?php
require_once("footer.php");
 ?>

  </body>
</html>
