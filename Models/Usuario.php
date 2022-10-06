<?php

  $path = $_SERVER['DOCUMENT_ROOT'].'ecommerce';
  include_once('Connection.php');

  class Usuario {
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $endereco;

    public function getId() {
      return $this -> id;
    }
    public function getNome() {
      return $this -> nome;
    }
    public function getEmail() {
      return $this -> email;
    }
    public function getSenha() {
      return $this -> senha;
    }
    public function getEndereco() {
      return $this -> endereco;
    }

    public function setNome($nome) {
      return $this -> nome = $nome;
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
    
    public function logar() {
      $objConnection = new Connection();
      $conectar = $objConnection -> getConnection();

      $sql = "SELECT Id, Endereco, Email, Nome, Senha FROM usuarios WHERE Email = ' ''. $this->email . '''";
      $resposta = $conectar -> query($sql);
      $usuario = $resposta -> fetch_assoc();

      if (!$usuario) {
        echo "E-mail não cadastrado!";
      } else if ($usuario['Senha'] !== $this -> getSenha()) {
        echo "Senha Incorreta!";
      } else {
        echo "Sucesso!";
      }

      mysqli_close($conectar);
    }

    public function cadastrar() {
      $objConnection = new Connection();
      $conectar = $objConnection -> getConnection();

      //Verificar se o Usuário já existe no Banco de Dados
      $sql = "SELECT COUNT(*) AS total FROM usuarios WHERE Email = ' ''. $this.getEmail() . '''";
      $resultado = mysqli_query($conectar, $sql); //Executamos a query
      $linha = mysqli_fetch_assoc($resultado); 

      //Validar se o Usuário(email) já existe no Banco de Dados
      if ($linha['total'] > 0) { 
        $_SESSION['usuario_existe'] = true; //Criação de uma sessão para informar que o usuário já existe
        header('Location: ../Views/Usuario/index_cadastro.php'); //Redireciona
        exit;
      }

      //Realizar a inserção dos dados inseridos na tela de cadastro dentro tabela usuarios do BD 
      $sql = "INSERT INTO usuarios (email, endereco, nome, senha) VALUES ('$this -> email', '', '$this -> nome', '$this -> senha')";

      //Validar se a consulta será realizada com sucesso
      if($conectar -> query($sql) === true) {
      //O INSERT tendo funcionado com sucesso retorna true
      $_SESSION['status_cadastro'] = true;
      }

      //Encerra a conexão
      $conectar -> close();

      //Redirecionar para o cadastro
      header('Location: index_cadastro.php');
      exit;

      // if(mysqli_query($conectar, $sql)) {
      //   return "Sucesso";
      // } else {
      //   return "Erro!";
      // }

      // mysqli_close($conectar);
    }

  }
 

?>