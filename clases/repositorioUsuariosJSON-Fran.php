<?php

// require_once("repositorioUsuarios.php");
// require_once("usuarios.php");
//
// class RepositorioUsuariosJson extends RepositorioUsuarios {
//   public function guardarUsuario(Usuario $usuario) {
//     if ($usuario->getId() == null) {
//       $usuario->setId($this->traerNuevoId());
//     }
//
//     $json = json_encode($usuario->toArray());
//
//     $json = $json . PHP_EOL;
//
//     file_put_contents("usuarios.json", $json, FILE_APPEND);
//   }
//
//   public function traerTodos() {
//     // Leo el archivo
//     $archivo = file_get_contents("usuarios.json");
//
//     // Lo divido por enters
//     $usuariosJSON = explode(PHP_EOL, $archivo);
//     // Quito el enter del final
//     array_pop($usuariosJSON);
//
//     $usuariosFinal = [];
//
//     // Y CADA LINEA LA CONVIERTO DE JSON A ARRAY
//     foreach($usuariosJSON as $json) {
//       $usuariosFinal[] = Usuario::crearDesdeArray(json_decode($json, true));
//     }
//
//     return $usuariosFinal;
//   }
//
//   public function buscarPorId($id) {
//     $todos = $this->traerTodos();
//
//     foreach ($todos as $usuario) {
//       if ($usuario->getId() == $id) {
//         return $usuario;
//       }
//     }
//
//     return false;
//   }
//
//   public function buscarPorMail($mail) {
//     $todos = $this->traerTodos();
//
//     foreach ($todos as $usuario) {
//       if ($usuario->getMail() == $mail) {
//         return $usuario;
//       }
//     }
//
//     return false;
//   }
//
//   private function traerNuevoId() {
//     $usuarios = $this->traerTodos();
//
//     if (count($usuarios) == 0) {
//       return 1;
//     }
//
//     $elUltimo = array_pop($usuarios);
//
//     $id = $elUltimo->getId();
//
//     return $id + 1;
//   }
// }

?>
