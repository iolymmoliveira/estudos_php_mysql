<?php

  $path = $_SERVER['DOCUMENT_ROOT'].'ecommerceIO';
  include_once('./Configuration/Connection.php');

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
  }
?>