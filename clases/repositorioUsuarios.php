<?php

  abstract class RepositorioUsuarios {
    public abstract function guardarUsuario(Usuario $usuario);
    public abstract function traerTodos();
    public abstract function buscarPorId($id);
    public abstract function buscarPorMail($mail);
  }

?>
