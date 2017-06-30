// // Carga la página y luego ejecuta:
// window.onload = function() {
//   // Botones que cambian los estilos visuales
//
//   // boton-desktop-default
//   var botonCambiarFondoDefault = document.getElementById("boton-desktop-default");
//   botonCambiarFondoDefault.onclick = function() {
//     var headerColor = document.querySelector(".header");
//     headerColor.style.background = "rgb(100, 200, 100)";
//
//     var headerMenuColor = document.querySelector(".header-div-menu");
//     headerMenuColor.style.background = "rgb(80, 80, 80)";
//
//     var headerMenuListaColor = document.querySelector(".header-div-menu-lista");
//     headerMenuListaColor.style.background = "rgb(80, 80, 80)";
//
//     var bodyColor = document.querySelector("body");
//     bodyColor.style.background = "white";
//
//     var productsBody = document.querySelectorAll(".products_body").forEach(
//       function(element){
//         element.style.background = 'white';
//       }
//     );
//   }
//
//   // boton-desktop-azul
//   var botonCambiarFondoAzul = document.getElementById("boton-desktop-azul");
//   botonCambiarFondoAzul.onclick = function() {
//     var headerColor = document.querySelector(".header");
//     headerColor.style.background = "rgb(100, 182, 200)";
//
//     var headerMenuColor = document.querySelector(".header-div-menu");
//     headerMenuColor.style.background = "rgb(143, 29, 11)";
//
//     var headerMenuListaColor = document.querySelector(".header-div-menu-lista");
//     headerMenuListaColor.style.background = "rgb(143, 29, 11)";
//
//     var bodyColor = document.querySelector("body");
//     bodyColor.style.background = "rgb(255, 254, 130)";
//
//     var productsBody = document.querySelectorAll(".products_body").forEach(
//       function(element){
//         element.style.background = 'rgb(255, 254, 130)';
//       }
//     );
//
//
//   }
//
//   // boton-desktop-gris
//   var botonCambiarFondoGris = document.getElementById("boton-desktop-gris");
//   botonCambiarFondoGris.onclick = function() {
//     var headerColor = document.querySelector(".header");
//     headerColor.style.background = "rgb(142, 142, 142)";
//
//     var headerMenuColor = document.querySelector(".header-div-menu");
//     headerMenuColor.style.background = "rgb(60, 179, 113)";
//
//     var headerMenuListaColor = document.querySelector(".header-div-menu-lista");
//     headerMenuListaColor.style.background = "rgb(60, 179, 113)";
//
//     var bodyColor = document.querySelector("body");
//     bodyColor.style.background = "rgb(227, 227, 227)";
//
//     var productsBody = document.querySelectorAll(".products_body").forEach(
//       function(element){
//         element.style.background = "rgb(227, 227, 227)";
//       }
//     );
//   }
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
// //
// //   // Eventos
// //   //   1. Crear una página HTML vacía con la estructura básica (html, head y body)
// //   //   2. Agregar un botón al html con la leyenda “Saludar”, que al cliquearlo (onclick) salte un alert diciendo “hola”.
// //   var botonSaludar = document.getElementById("botonSaludar");
// //
// //   botonSaludar.onclick = darClick;
// //
// //   function darClick() {
// //     // debugger;
// //     alert("hola");
// //   };
// //   //   4. Agregar una imagen cualquiera a la página, que al pasar el mouse por esta,
// //   //      se imprima por consola (“estoy viendo la imagen”);
// //   var imagenVader = document.getElementById("imagenVader");
// //
// //   imagenVader.onmouseover = function() {
// //     console.log("“estoy viendo la imagen”");
// //   }
// //
// //   //   5. Agregar otra imagen cualquiera a la página, que al hacer click con el mouse en esta,
// //   //      utilizando addEventListener, se imprima por consola (“estoy cliqueando la imagen”).
// //   var imagenYoda = document.getElementById("imagenYoda");
// //
// //   imagenYoda.addEventListener("click",funcClickeando);
// //
// //   function funcClickeando() {
// //     console.log("estoy cliqueando la imagen");
// //   }
// //
// //   //   6. Definir un ​ addEventListener ​ de forma tal que al hacer click en cualquier lado del
// //   //      body de la página (​ document.body ​ ), cambie el color de fondo de todo el body a rojo.
// //   //      Utilizar el ​ this ​ de la función del evento para esto.
// //   document.body.addEventListener("click",funcCambiarColorBody)
// //
// //   function funcCambiarColorBody() {
// //     this.style.background = "red";
// //   }
// //
// //   //   7. El usuario medio vueltero nos pide ahora remover este listener recientemente creado
// //   //      ya que no puede interactuar bien con la página.
// //   document.body.removeEventListener("click",funcCambiarColorBody);
// //
// //   //   8. Crear un formulario básico con un action que redirija a ​ www.google.com.ar​ .
// //   //      Con Javascript hacer que al hacer click en Enviar no se envíe el formulario, sino que salte
// //   //      un alert diciendo “No se puede realizar este envío”.
// //   var formularioReenvio = document.querySelector(".formulario");
// //
// //   var inputBoton = formularioReenvio.querySelector("button[type=submit]")
// //   var atributoABorrar = inputBoton.getAttribute("type");
// //   inputBoton.removeAttribute("type", atributoABorrar);
// //   inputBoton.setAttribute("type","button");
// //
// //   //   9. Al addEventListener creado en la imagen, agregarle que imprima en consola la ubicación del mouse en x e y.
// //   imagenYoda.addEventListener("click",funcUbicacionMouse);
// //
// //   function funcUbicacionMouse(event) {
// //     var x = event.clientX;
// //     var y = event.clientY;
// //     var coords = "X coords: " + x + ", Y coords: " + y;
// //     console.log(coords);
// //   }
// //
// //
// //   // Timers
// //   // 1. En una página HTML básica, (se puede utilizar la misma de Eventos), que pasado
// //   //    10 segundos en la página, aparezca un alert que diga “tiempo!”
// // //   setInterval(, 10000);
// // //
// // // function(){ alert("¡¡¡Tiempo!!!");
// //
// //
// //   // 2. Que aparezca un alert que diga “intervalo” cada 5 segundos en la página.
// //   //setInterval(function(){ alert("¡¡¡Tiempo!!!"); }, 10000);
// //
// //
// //   // 3. Hacer que solamente aparezca una vez sola el alert del ejercicio 1 y 2.
//
//
//
//
//
//
//
//
//
// }
