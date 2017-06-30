window.onload = function(){
  // Intervalo de 30 segundos que actualiza la cantidad de usuarios del Footer
  setInterval(ajaxCall, 30000);

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
  var textnode = document.createTextNode("CON AJAX" + cantUsuarios.cantidad);
  node.appendChild(textnode);
  elemento.appendChild(node);
}
