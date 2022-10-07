<!-- Arquivo que cria a Conexão com o Banco de Dados -->
<?php
  // class Connection {
  //   public function getConnection() {
      $hostname = 'localhost';
      $user = 'root';
      $password = '';
      $database = 'ecommerceIO';
    
      $conexao = new mysqli($hostname, $user, $password, $database);
    
      if($conexao->connect_errno) {
          die("Falha ao conectar ao Banco de Dados! (" . $conexao->connect_errno . ") " . $conexao->connect_error);
      } else {
        // echo "Sucesso!";
        return true;
        // header("Location: ../Views/login.php");
      }
  //   }
  // }
?>
