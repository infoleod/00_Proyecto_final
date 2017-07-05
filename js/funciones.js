window.onload = function(){
  ajaxCall();

  // Intervalo de 30 segundos que actualiza la cantidad de usuarios del Footer
  setInterval(ajaxCall, 3000);

  // Boton colores default
  var botonCambiarFondoDefault = document.getElementById("boton-desktop-default");
  botonCambiarFondoDefault.onclick = function() {
    var css = document.getElementById("cambiarCss");
    css.setAttribute("href","css/master.css");
  }

  // Boton colores default
  var botonCambiarFondoAzul = document.getElementById("boton-desktop-azul");
  botonCambiarFondoAzul.onclick = function() {
    var css = document.getElementById("cambiarCss");
    css.setAttribute("href","css/masterAzul.css");
  }

  // Boton colores default
  var botonCambiarFondoGris = document.getElementById("boton-desktop-gris");
  botonCambiarFondoGris.onclick = function() {
    var css = document.getElementById("cambiarCss");
    css.setAttribute("href","css/masterGris.css");
  }
  var myIndex = 0;
  carousel();

  function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
         x[i].style.display = "none";
      }
      myIndex++;
      if (myIndex > x.length) {myIndex = 1}
      x[myIndex-1].style.display = "block";
      setTimeout(carousel, 3000);
  }
  // var slideIndex = 1;
  // showDivs(slideIndex);
  //
  //     function plusDivs(n) {
  //       showDivs(slideIndex += n);
  //     }
  //
  //     function currentDiv(n) {
  //       showDivs(slideIndex = n);
  //     }

  // function showDivs(n) {
  //           var i;
  //           var x = document.getElementsByClassName("mySlides");
  //           var dots = document.getElementsByClassName("demo");
  //           if (n > x.length) {slideIndex = 1}
  //           if (n < 1) {slideIndex = x.length}
  //           for (i = 0; i < x.length; i++) {
  //              x[i].style.display = "none";
  //   }
  //         for (i = 0; i < dots.length; i++) {
  //            dots[i].className = dots[i].className.replace(" w3-white", "");
  //         }
  //         x[slideIndex-1].style.display = "block";
  //         dots[slideIndex-1].className += " w3-white";
  //     }

}

function ajaxCall(){
  var metodo          = "get";
  var archivo         = "usuarios-registrados.json"
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        //console.log(xmlhttp.responseText);
    		var objetoResultado = JSON.parse(xmlhttp.responseText);
    		actualizarUsuarios(objetoResultado);
  	}
  };
  xmlhttp.open(metodo, archivo, actualizarUsuarios);
  xmlhttp.send();
}

function actualizarUsuarios(cantUsuarios) {
  // Removemos la etiqueta
  var elemento = document.getElementById("cantUsuariosFooter");
  var nodo = elemento.children.item(0);
  elemento.removeChild(nodo);
  // Insertamos la nueva etiqueta
  var elemento = document.getElementById("cantUsuariosFooter");
  var node = document.createElement("span");
  var textnode = document.createTextNode("¡¡¡ Ya somos " + cantUsuarios.cantidad + " usuarios !!!");
  node.appendChild(textnode);
  elemento.appendChild(node);
}
