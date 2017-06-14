<?php
  /*llamo funciones.php para utilizarlas dentro del codigo del formulario*/
  require_once("soporte.php");

  // Llamamos a la funcion que valida si existe alguna cookie con nombre usuario
  // Si lo encuentra devuelve el usuario, sino devuelve False
  $usuarioHeader = Auth::chequeaCookieUsuario();

  if ($usuarioHeader) {
    header("Location:index.php");exit;
  } else {
    if (isset($_SESSION["usuario"])) {
      header("Location:index.php");exit;
    }
  };

  $nombre="";
  $apellido="";
  $usuario="";
  $mail="";
  $telefono="";


  $errores=[];
  if($_POST){
    $errores= $validador->validarInformacion($_POST, $db->getRepositorioUsuarios());
    if (count($errores) == 0) {
      //no hay errores
      $usuario = $_POST;
      $usuario["password"] = Usuario::hashPassword($usuario["password"]);
      $usuario = Usuario::crearDesdeArray($usuario);
      $errores = $usuario->guardarImagen("imgPerfil",  $errores);
      if (count($errores)== 0) {
        $usuario->guardar($db->getRepositorioUsuarios());
        header("Location:registrado.php");exit;
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
    if (!isset($errores["telefono"])) {
      $telefono = $_POST["telefono"];
    }
  }
?>
<?php
  require_once("header.php");
?>
<!--                   El Header abre con todo el encabezado del HTML                     -->

    <!-- INICIO BODY -->
    <div class="body_formulario">
      <div class= "registrateTitulo"><h2>Regístrate</h2>
      </div>
      <section class="partesFormulario">
        <form action="formulario.php" class="script.php"  method="post" enctype="multipart/form-data">
          <div class="partesFormularioACompletar">
            <div class="parametros"><label>Nombres</label>
              <div class="nombreCuadro">
              <input type="text" name="nombre" value="<?=$nombre?>" placeholder="Nombres">
                <?php if(isset($errores["nombre"])) {?>
                  <span class="erroresFormulario">Debe completar su nombre</span>
                <?php } ?>
              </div>
            </div>
            <div class="parametros"><label>Apellido</label>
              <div class="apellidoCuadro">
                <input type="text" name="apellido" value="<?=$apellido?>" placeholder="Apellido" >
                <?php if(isset($errores["apellido"])) {?>
                  <span class="erroresFormulario">Debe completar el apellido</span>
                <?php } ?>
              </div>
            </div>
            <div class="parametros"><label>Usuario</label>
              <div class="cuadroUsuario">
                <input type="text" name="usuario" value="<?=$usuario?>" placeholder="Usuario" >
                <?php if(isset($errores["usuario"])) {?>
                  <span class="erroresFormulario"><?=$errores["usuario"]?></span>
                <?php } ?>
              </div>
            </div>
            <div class="parametros"><label>Foto de Perfil</label>
              <div class="fotoPerfilCuadro">
                <input type="file" name="imgPerfil" value=""  >
                  <?php if(isset($errores["imgPerfil"])){ ?>
                    <span class="erroresFormulario">Subí una imagen valida</span>
                  <?php } ?>
              </div>
            </div>
            <div class="parametros">
              <label>Teléfono (fijo o móvil)</label>
              <div class="telefonoCuadro">
                <input type="text" name="telefono" value="<?=$telefono?>" placeholder="Telefono (Fijo o móvil)">
                <?php if(isset($errores["telefono"])) {?>
                  <span class="erroresFormulario">Telefono incorrecto</span>
                <?php } ?>
              </div>
            </div>
            <div class="parametros"><label>E-mail</label>
              <div class="emailCuadro">
                <input type="text" name="mail" value="<?=$mail?>" placeholder="Email" >
                <?php if (isset($errores["mail"])) {?>
                  <span class="erroresFormulario"><?=$errores["mail"]?></span>
                <?php } ?>
              </div>
            </div>
            <div class="parametros"><label>Contraseña</label>
              <div class="claveCuadro">
                <input type="password" name="password" value="" placeholder="Contraseña" >
                <?php if (isset($errores["password"])) {?>
                  <span class="erroresFormulario"><?php echo $errores["password"]; ?></span>
                <?php } ?>
              </div>
            </div>
            <div class="parametros"><label>Confirma contraseña</label>
              <div class="claveCuadro">
                <input type="password" name="cpassword" value="" placeholder="Confirma contraseña" >
                <?php if (isset($errores["password"])) {?>
                  <span class="erroresFormulario">Confirmación erronea</span>
                <?php } ?>
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

<!--                   El Footer cierra con todo el encabezado del HTML                     -->
<?php
  require_once("footer.php");
?>
