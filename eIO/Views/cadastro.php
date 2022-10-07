<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/style.css">
  <title>Cadastro || E-commerce</title>
</head>

<body>
  <header>
    <div>
      <img src="./CSS/favicon2.png" alt="logo">
    </div>
  </header>
  <div class="titulo">
    <h3>Cadastro de Usuário</h3>
  </div>
  <section class="formulario">
    <form action="" method="post">
      <div class="form-info cadastro-sucesso">
        <p>Cadastro Efetuado com Sucesso!</p>
        <p>Faça Login informando o seu email e senha.</p>
      </div>
      <div class="form-info email-existente">
        <p>Este usuário já está cadastrado. Informe outro e tente novamente.</p>
      </div>
      <div class="form-info">
        <div class="label">
          <label>Nome</label>
        </div>
        <div>
          <input type="text" name="nome" placeholder="Nome Completo">
        </div>
        <div class="label">
          <label>E-mail</label>
        </div>
        <div>
          <input type="email" name="email" placeholder="seuMelhorEmail@email.com">
        </div>
        <div class="label">
          <label>Senha</label>
        </div>
        <div>
          <input type="password" name="senha" placeholder="******">
        </div>
        <div class="form-info button">
          <button type="submit" name="cadastrar">Cadastrar</button>
        </div>
      </div>
      <div class="form-info cadastrar">
        <p>Fazer login.  <a href="./home.php">Clique aqui!</a></p>
      </div>
    </form>
  </section>
</body>

</html>

<?php
$path = $_SERVER['DOCUMENT_ROOT'] . 'eIO';
//Incluir um unica vez o arquivo que faz a conexão com o BD
include_once('../Configuration/Connection.php');

//Verifica se os campos existem
if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
  //Verifica se o campo nome está vazio
  if(strlen($_POST['nome']) == 0) { 
    echo "Preencha seu nome";
  } //Verifica se o campo e-mail está vazio
  else if(strlen($_POST['email']) == 0) { 
    echo "Preencha sua e-mail";
  } 
  //Verifica se o campo senha está vazio
  else if(strlen($_POST['senha']) == 0) { 
    echo "Preencha sua senha";
  } 
  //Os campos email e senha preenchidos são armazenados em variáveis
  else {
    //Armazena os campos passados por POST em variáveis
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

    //Validação: Verifica se o usuário existe no BD
    $sql_code = "SELECT COUNT(*) AS total FROM usuarios WHERE email = '$email' OR nome = '$nome' ";
    $sql_query = mysqli_query($conexao, $sql_code);
    $quantidade = mysqli_fetch_assoc($sql_query);

    //Se o usuário já está cadastrado ele não pode se cadastrar e é redirecionado
    if($quantidade['total'] == 1) {
      echo "Usuário já está Cadastrado!";
    } else {
      $sql = "INSERT INTO usuarios (email, endereco, nome, senha) VALUES ('$email', '', '$nome', '$senha')";
      //Verificar se a query será executada
      if ($conexao->query($sql) === true) {
        echo "Usuário cadastrado com sucesso!";
      } else {
        echo "Erro" . mysqli_connect_error($conexao);
      }
    }
    
    mysqli_close($conexao);

    header('Location: cadastro.php');
  }
}
?>