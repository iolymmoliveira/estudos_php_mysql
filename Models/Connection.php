<?php
  class Connection {
    public function getConnection() {
      
      //Dados da Conexão
      $bdHost = 'Localhost';
      $usuarioBD = 'root';
      $senhaBD = '';
      $nomeBD = 'ecommerce';

      //Criando a conexão
      $conectar = new mysqli($bdHost, $usuarioBD, $senhaBD, $nomeBD);

      if(!$conectar) 
        die ("Erro ao conectar com o Banco de Dados. O seguinte erro ocorreu -> " .mysqli_connect_error());
        return $conectar;  

    }
  }
?>
