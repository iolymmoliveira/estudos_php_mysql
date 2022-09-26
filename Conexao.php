<?php
  class Conexao {
    public function getConexao() {
      //Dados da Conexão
      $host = 'localhost';
      $bd = 'ecommerce';
      $usuarioBD = 'root';
      $senhaBD = '';

      //Criando a Conexão
      $conexao = new mysqli($host, $bd, $usuarioBD, $senhaBD);
 
      //Verifica se foi possível se conectar com sucesso ao banco de dados
      if (!$conexao) die ("Erro de conexão com localhost, o seguinte erro ocorreu -> " .mysql_error());
      return $conexao;
    }
  }
?>