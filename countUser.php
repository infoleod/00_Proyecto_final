<?php

function contarUsuarios() {
  $dsn = "mysql:host=localhost;dbname=zoomarket;charset=utf8mb4;port:3306";
  $usuario = "debian-sys-maint";
  $password = "si3kl4VBU4MrsyXZ";

  try {
    $db = new PDO($dsn, $usuario, $password);
  } catch (Exception $e) {

  }
  $sql = 'SELECT count(id) AS cantidad FROM usuario';

  $query = $db->prepare($sql);

  $query->execute();

  $totalUsuarios = $query->fetch(PDO::FETCH_ASSOC);


  $json = json_encode($totalUsuarios);

  file_put_contents("usuarios-registrados.json", $json);
}
?>
