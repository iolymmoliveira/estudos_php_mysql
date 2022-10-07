<?php
  
  //Iniciar a Sessão
  if(!isset($_SESSION)) {
    session_start();
  }

  //Caso não haja uma Sessão de id
  if(!isset($_SESSION['id'])) {
    die("Você não pode acessar esta página porque não está logado! <p><a href=\"ecommerce.php\">Entrar</a></p>");
  }

?>