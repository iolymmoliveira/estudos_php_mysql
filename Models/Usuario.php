<?php

  $path = $_SERVER['DOCUMENT_ROOT'].'/E-commerce';
  include_once($path."/Conexao.php");

  class Usuario {
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $endereco;

    public function Login() {
      $objConexao = new Conexao();
      $conexao = $objConexao -> getConexao();

      $sql = "SELECT ID, Nome, Email, Senha FROM Usuarios WHERE Email = '' . $this -> getEmail() .'' ";

      $resposta = $conexao -> query($sql);
      $usuario = $resposta -> fetch_assoc();

      if (!$usuario) {
        echo "E-mail não cadastrado";
      } else if ($usuario['Senha'] !== $this -> getSenha()) {
        echo "Senha Incorreta!";
      } else {
        echo "Sucesso!";
      }

      mysqli_close($conexao);
    }

    public function cadastrar() {
      $objConexao = new Conexao();
      $conexao = $objConexao -> getConexao();

      $sql = "INSERT INTO Usuarios (Nome, Email, Senha) VALUES ('$this -> nome', '$this -> email', '$this -> senha')";

      if (mysqli_query($conexao, $sql)) {
        return "Sucesso!";
      } else {
        return "Erro";
      }
      mysqli_close($conexao);
    }
  }

 
?>