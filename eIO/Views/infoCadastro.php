<?php
  //Iniciar a Sessão
  if(!isset($_SESSION)) {
    session_start();
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/style.css">
  <title>Ecommerce</title>
</head>

<body>
  <header>
    <div>
      <img src="./CSS/favicon2.png" alt="logo">
    </div>
  </header>
  <div class="titulo">
    <h3>Bem Vindo! <?php echo $_SESSION['id']; ?></h3>
  </div>
  <section class="formulario">
    <form action="" method="post">
      <div class="form-info cadastro-sucesso">
        <p></p>
        <p></p>
      </div>
      <div class="form-info email-existente">
        <p></p>
      </div>
      <div class="form-info">
        <div class="form-info button">
          <button><a href="./infoCadastro.php">Visualizar Cadastro</a></button>
        </div>
        <div class="form-info button">
          <button><a href="./infoCadastro.php">Editar Cadastro</a></button>
        </div>
        <div class="form-info button">
          <button><a href="./infoCadastro.php">Excluir Cadastro</a></button>
        </div>
        <div class="form-info button">
          <button><a href="./home.php">Sair</a></button>
        </div>
      </div>
    </form>
  </section>
</body>

</html>