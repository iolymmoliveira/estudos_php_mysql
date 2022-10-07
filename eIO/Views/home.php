<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/style.css">
  <title>Home || E-commerce</title>
</head>

<body>
  <header>
    <div>
      <img src="./CSS/favicon2.png" alt="logo">
    </div>
  </header>

  <div class="titulo">
    <h3>Sistema de Login</h3>
  </div>

  <section class="formulario">
    <form action="" method="post">
      <div class="form-info email-existente">
        <p>Falha ao logar!</p> 
        <p>E-mail ou senha incorretos. Tente novamente!</p>
      </div>
      <div class="form-info">
        <div class="label">
          <label>E-mail</label>
        </div>
        <div>
          <input type="text" name="email" placeholder="seuEmailCadastrado@email.com" required value="">
        </div>
        <div class="label">
          <label>Senha</label>
        </div>
        <div>
          <input type="password" name="senha" placeholder="******" required value="">
        </div>
        <div class="form-info button">
          <button type="submit" name="logar">Entrar</button>
        </div>
      </div>
      <div class="form-info cadastrar">
        <p>Novo por aqui? <a href="./cadastro.php">Crie uma conta!</a></p>
      </div>
    </form>
  </section>
</body>
</html>

<?php
  $path = $_SERVER['DOCUMENT_ROOT'].'eIO';
  //Incluir um unica vez o arquivo que faz a conexão com o BD
  include_once('../Configuration/Connection.php');
  
  //Verifica se os campos existem
  if(isset($_POST['email']) && isset($_POST['senha'])) { 
    
    //Verifica se o campo e-mail está vazio
    if(strlen($_POST['email']) == 0) { 
      echo "Preencha seu e-mail";
    } 
    //Verifica se o campo senha está vazio
    else if(strlen($_POST['senha']) == 0) { 
      echo "Preencha sua senha";
    } 
    //Os campos email e senha preenchidos são armazenados em variáveis
    else {
      $email = $conexao->real_escape_string($_POST['email']);
      $senha = $conexao->real_escape_string($_POST['senha']);

      //Verificar se o e-mail e senha já estão cadastrados no BD
      $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' ";
      $sql_query = $conexao->query($sql_code) or die("Falha na execução da query SQL: ".$conexao->error);

      $quantidade = $sql_query->num_rows;

      //Se está cadastrado pode iniciar sessão
      if($quantidade == 1) {
        $usuario = $sql_query->fetch_assoc();

        if(!isset($_SESSION)){
          session_start();
        }

        $_SESSION['id'] = $usuario['id'];
        header("Location: ecommerce.php");

      } 
      //Se não está cadastrado é impedido de logar
      else {
        echo "Falha ao logar! E-mail ou senha incorretos!";
      }
    }
  }

?>
