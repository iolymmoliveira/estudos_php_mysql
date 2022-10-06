<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <title>Login || E-commerce</title>
</head>

<body>
  <header>
    <div>
      <img src="../favicon2.png" alt="logo">
    </div>
  </header>

  <div class="titulo">
    <h3>Login</h3>
  </div>

  <section class="formulario">
    <form action="" method="post">
      <!-- <div class="form-info cadastro-sucesso">
        <p>Dados corretos!</p>
      </div> -->
      <!-- <div class="form-info email-existente">
        <p>Senha ou email incorretos.</p> 
        <p>Tente novamente.</p>
      </div> -->
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
        <p>Novo por aqui? <a href="Usuario/index_cadastro.php">Crie uma conta!</a></p>
      </div>
    </form>
  </section>
</body>
</html>

<?php
  $path = $_SERVER['DOCUMENT_ROOT'].'/ecommerce';
  include_once('../Controllers/usuario_controller.php');

  if(isset($_POST['logar'])) {
    $objUsuario = new Usuario();
    $objUsuario -> setEmail($_POST['email']);
    $objUsuario -> setSenha($_POST['senha']);
  }

  $controllerUsuario = new UsuarioController();
  $resposta = $controllerUsuario -> validarUsuario($objUsuario);

  if($resposta == 'Sucesso!') {
    header("Location: ecommerce.php");
  } else {
    echo $resposta;
  }
?>
