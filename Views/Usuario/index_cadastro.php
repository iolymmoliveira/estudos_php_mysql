<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../style.css">
  <title>Cadastro || E-commerce</title>
</head>

<body>
  <header>
    <div>
      <img src="../../favicon2.png" alt="logo">
    </div>
  </header>
  <div class="titulo">
    <h3>Cadastro de Usuário</h3>
  </div>
  <section class="formulario">
    <form action="" method="post">
      <!-- <div class="form-info cadastro-sucesso">
        <p>Cadastro Efetuado!</p>
        <p>Faça Login informando o seu email e senha <a href="../index_login.php">aqui</a>.</p>
      </div> -->
      <!-- <div class="form-info email-existente">
        <p>O email escolhido já existe. Informe outro e tente novamente.</p>
      </div> -->
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
          <input type="password"  name="senha" placeholder="******">
        </div>
        <div class="form-info button">
          <button type="submit" name="cadastrar">Cadastrar</button>
        </div>
      </div>
    </form>
  </section>
</body>
</html>

<?php
  $path = $_SERVER['DOCUMENT_ROOT'].'/ecommerce';
    
  // //Salvar as informações no Banco de Dados:
  // //Incluir um unica vez o arquivo que faz a conexão com o BD
  
  include_once('../../Controllers/usuario_controller.php');

  if(isset($_POST['cadastrar'])) {
    //Armazena os valores informados no cadastro em uma variável
    $novoUsuario = new Usuario();
    $novoUsuario -> setNome($_POST['nome']);
    $novoUsuario -> setEmail($_POST['email']);
    $novoUsuario -> setSenha($_POST['senha']);
  }

  $controllerUsuario = new UsuarioController();
  $resposta = $controllerUsuario -> cadastrarUsuario($novoUsuario);

  if($resposta == 'Sucesso!') {
    header("Location: ecommerce/Views/index_login.php");
  } else {
    echo $resposta;
  }
 ?>