<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Cadastro || E-commerce</title>
</head>

<body>
  <header>
    <div>
      <img src="favicon2.png" alt="logo">
    </div>
  </header>
  <div class="titulo">
    <h3>Cadastro de Usuário</h3>
  </div>
  <section class="formulario">
    <form action="" method="post">
      <div class="form-info cadastro-sucesso">
        <p>Cadastro Efetuado!</p>
        <p>Faça Login informando o seu email e senha <a href="../index_login.php">aqui</a>.</p>
      </div>
      <div class="form-info email-existente">
        <p>O email escolhido já existe. Informe outro e tente novamente.</p>
      </div>
      <div class="form-info">
        <div class="label">
          <label>Nome</label>
        </div>
        <div>
          <input type="text" name="nome" placeholder="Seu Nome Completo" value="">
        </div>
        <div class="label">
          <label>Email</label>
        </div>
        <div>
          <input type="text" name="email" placeholder="seuEmail@email.com" value="">
        </div>
        <div class="label">
          <label>Senha</label>
        </div>
        <div>
          <input type="password"  name="senha" placeholder="******" value="">
        </div>
        <div class="form-info button">
          <button type="submit" name="cadastrar">Cadastrar</button>
        </div>
      </div>
    </form>
  </section>

  <?php
    $path = $_SERVER['DOCUMENT_ROOT'].'ecommerce';
    include_once($path."/Controllers/usuario_controller.php");
    
    if(isset($_POST['cadastrar'])){
      $objUsuario = new Usuario($_POST['nome'], $_POST['email'], $_POST['senha'], NULL);
      
      $controllerUsuario = new UsuarioController();

      $resposta = $controllerUsuario -> cadastrarUsuario($objUsuario);

      if($resposta == "Sucesso!") {
        header("Location: http://localhost/ecommerce/Views/listagem_produtos.php");
      } else {
      echo $resposta;
      }
    } 
       
  ?>

</body>
</html>