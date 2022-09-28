<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>E-commerce</title>
</head>
<body>
  <section class="formulario">
    <form action="" method="post">
      <div class="email-senha">
        <div>
          <h1>Login</h1>
        </div>
        <div>
          Email : <input type="text" name="email" value="">
        </div>
        <div>
          Senha : <input type="text" name="senha" value="">
        </div>
      </div>
      <div class="buttons">
        <div>
          <button type="submit" name="logar">Entrar</button>
        </div>
      </div>
      <div>
        <p>Não tem uma conta? </p>
        <p><a href="http://localhost/ecommerce/Views/Usuario/cadastro_usuario.php">Cadastre uma!</a></p>
      </div>
    </form>
  </section>

  <?php
    $path = $_SERVER['DOCUMENT_ROOT'].'/ecommerce';
    include_once($path."/Controllers/usuario_controller.php");

    echo($path);
    
    if(isset($_POST['logar'])){
      $objUsuario = new Usuario();
      $objUsuario -> setEmail($_POST['email']);
      $objUsuario -> setSenha($_POST['senha']);

      $controllerUsuario = new UsuarioController();

      $resposta = $controllerUsuario -> validarUsuario($objUsuario);

      if($resposta == "Sucesso!") {
        header("Location: http://localhost/ecommerce/Views/inicio.php");
      } else {
      echo $resposta;
      }
    } 
       
  ?>

</body>
</html>