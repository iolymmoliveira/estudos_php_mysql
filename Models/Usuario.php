<?php

  $path = $_SERVER['DOCUMENT_ROOT'].'/E-commerce';
  include_once($path."/Conexao.php");

  class Usuario {
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $endereco;

    public function getEmail() {
      return $this -> email;
    }
    public function getSenha() {
      return $this -> senha;
    }
    public function getId() {
      return $this -> id;
    }
    public function getEndereco() {
      return $this -> endereco;
    }
    public function getNome() {
      return $this -> nome;
    }
    
    public function setEmail($email) {
      return $this -> email = $email;
    }
    public function setSenha($senha) {
      return $this -> senha = $senha;
    }
    public function setEndereco($endereco) {
      return $this -> endereco = $endereco;
    }
    public function setNome($nome) {
      return $this -> nome = $nome;
    }

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