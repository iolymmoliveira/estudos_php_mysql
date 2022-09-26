<?php

  $path = $_SERVER['DOCUMENT_ROOT'].'/E-commerce';
  include_once($path."/Models/Usuario.php");

  class UsuarioController {
    public function validarUsuario($objUsuario) {
      if (validarEmail ($objUsuario -> getEmail())) {
        return $objUsuario -> Login();
      }
      if ($objUsuario -> getSenha() == null || strlen($objUsuario -> getSenha()) > 100) {
        return "Senha Inválida!";
      }
    }

    public function cadastrarUsuario($objUsuario) {

    }

  }

  function validarEmail($email) {
    if ($email == null) {
      echo "O e-mail é obrigatório!";
      return false;
    } elseif (strlen($email) > 100) {
      echo "O e-mail deve conter no máximo 100 caracteres.";
      return false;
    } 
    return true;
  }

  //
  function validarSenha($senha) {
    if ($senha == null) {
      echo "A senha é obrigatória!";
      return false;
    } elseif (strlen($senha) > 100) {
      echo "A Senha cadastrada deve conter no máximo 100 caracteres.";
      return false;
    } 
    return true;
  }

?>