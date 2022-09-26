<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../style.css">
  <title>E-commerce</title>
</head>
<body>
  <section class="formulario">
    <form action="" method="post">
      <div class="email-senha">
        <div>
          Nome : <input type="text" name="email" value="">
        </div>
        <div>
          Email :  <input type="text" name="email" value="">
        </div>
        <div>
          Senha : <input type="text" name="senha" value="">
        </div>
      </div>
      <div class="buttons">
        <div>
          <button type="submit" name="cadastrar">Cadastrar</button>
        </div>
      </div>
    </form>
  </section>

  <?php
    $path = $_SERVER['DOCUMENT_ROOT'].'/E-commerce';
    include_once($path."/Controllers/usuario_controller.php");
    
    if(isset($_POST['cadastrar'])){
      $objUsuario = new Usuario($_POST['nome'], $_POST['email'], $_POST['senha'], NULL);
      
      $controllerUsuario = new UsuarioController();

      $resposta = $controllerUsuario -> cadastrarUsuario($objUsuario);

      if($resposta == "Sucesso!") {
        header("Location: http://localhost/E-commerce/Views/listagem_produtos.php");
      } else {
      echo $resposta;
      }
    } 
       
  ?>

</body>
</html>