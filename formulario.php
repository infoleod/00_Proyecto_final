<?php

require_once("funciones.php");

$nombre="";
$apellido="";
$usuario="";
$mail="";
$telefono="";

$errores=[];
if($_POST){
  $errores= validarInformacion($_POST);
  if (count($errores) == 0) {
    $errores = guardarImagen("imgPerfil", $errores);
    if (count($errores)== 0) {
      $usuario = crearUsuario($_POST);
      guardarUsuario($usuario);
      header("Location:resgistrado.php");exit;
    }
  }
  if(!isset($errores["nombre"])){
    $nombre = $_POST["nombre"];
  }
  if (!isset($errores["apellido"])) {
    $apellido = $_POST["apellido"];
  }
  if (!isset($errores["mail"])) {
    $mail = $_POST["mail"];
    }
  if (!isset($errores["usuario"])) {
    $usuario = $_POST["usuario"];
  }
}

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
    <?php
    require_once("header.php");
     ?>

    <!-- INICIO BODY -->
    <div class="body_formulario">

        <div class= "registrateTitulo"><h2>Regístrate</h2>
        </div>
          <section class="partesFormulario">
          <form class="script.php"  method="post">

            <div class="partesFormularioACompletar">
              <div class="parametros"><label>Nombres</label>
              <div class="nombreCuadro">
              <input type="text" name="nombre" value="<?=$nombre?>" placeholder="Nombres"required>
              <?php if(isset($errores["nombre"])) {?>
                <span style="color:red">Error</span>
                <?php } ?>
              </div>
              </div>
                <div class="parametros"><label>Apellido</label>
                <div class="apellidoCuadro">
                <input type="text" name="apellido" value="<?=$apellido?>" placeholder="Apellido" required>
                <?php if(isset($errores["apellido"])) {?>
                  <span style="color:red">Error</span>
                  <?php } ?>
                </div>
                </div>
                <div class="parametros"><label>Usuario</label>
                  <?php if (isset($errores["usuario"])){
                    $errorEnUsuario = "error";
                  }
                  else {
                    $errorEnUsuario ="";
                  }?>
                <div class="usuarioCuadro">
                <input class="<?=$errorEnUsuario?>" type="text" name="usuario" value="<?=$usuario?>" required>
                </div>
                </div>
                <div class="parametros"><label>Foto de Perfil</label>
                <div class="fotoPerfilCuadro">
                <input type="file" name="imgPerfil" value=""  required>
                </div>
                </div>
                <div class="parametros">
                  <label>Teléfono (fijo o móvil)</label>
                  <div class="telefonoCuadro">
                  <input type="text" name="telefono" value="<?=$telefono?>" placeholder="Telefono (Fijo o móvil)"required >
                  <?php if(isset($errores["telefono"])) {?>
                    <span style="color:red">Error</span>
                    <?php } ?>
                  </div>
                  </div>
                <div class="parametros"><label>E-mail</label>
                <div class="emailCuadro">
                  <input type="text" name="mail" value="<?=$mail?>" placeholder="Email"required >
                </div>
                </div>
                <div class="parametros"><label>Contraseña</label>
                <div class="claveCuadro">
                  <input type="password" name="password" value="" placeholder="Contraseña" required >
                </div>
                </div>
              <div class="parametros"><label>Confirma contraseña</label>
                <div class="claveCuadro">
                <input type="password" name="cpassword" value="" placeholder="Confirma contraseña" required>
              </div>
              </div>

            </div>

          <div class="terminosYregistrame">
                 <div class="terminos"><h3>Al registrarme, declaro que soy mayor de edad y acepto los <a href="#">Términos y condiciones</a> y las <a href="#">Políticas de privacidad</a> de ZooMarket.</h3>
                 </div>
                 <div class="botonRegistrame">
                   <input type="submit" name="submit" value="Registrarme">
                 </div>
          </div>
          <div class="logueateEnRegistracion">
            <h2><a href="login.php">¡Logueate!</a></h2>
          </div>
        </form>
        </section>
          </div>


    </div>
    <!-- FIN BODY -->

<?php
require_once("footer.php");
 ?>

  </body>
</html>
