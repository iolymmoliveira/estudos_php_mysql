<?php
  $path = $_SERVER['DOCUMENT_ROOT'].'/ecommerce';
  include_once('../Models/Usuario.php');

  class UsuarioController {
    public function validarUsuario($objUsuario) {
      if(validarEmail($objUsuario -> getEmail()) && validarSenha($objUsuario -> getSenha())) {
        return $objUsuario -> logar();
      }
    }

    public function cadastrarUsuario($novoUsuario) {
      if(validarEmail($novoUsuario -> getEmail()) && validarSenha($novoUsuario -> getSenha()) && validarNome($novoUsuario -> getNome())) {
        return $novoUsuario -> cadastrar();
      }
    }
  }

  function validarEmail($email) {
    if($email == null) {
      echo "O email é obrigatório!";
      return false;
    } else if(strlen($email) > 100) {
      echo "O endereço de e-mail deve conter no máximo 100 caracteres.";
      return false;
    } else {
      return true;
    }
  }

  function validarSenha($senha) {
    if ($senha == null) {
      echo "A senha é obrigatória!";
      return false;
    } else if (strlen($senha) > 100) {
      echo "A Senha deve conter no máximo 100 caracteres.";
      return false;
    } 
    return true;
  }

  function validarNome($nome) {
    if($nome == null) {
      echo "É obrigatório informar o Nome!";
      return false;
    } else if (strlen($nome) > 100) {
      echo "O Nome deve conter no máximo 100 caracteres.";
      return false;
    } else {
      return true;
    }
  }
