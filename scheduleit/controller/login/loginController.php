<?php
  include('../../../model/conexaobd.php');

  if (isset($_GET['auth']) && $_GET['auth']==0) {
    $mensagem = "Você precisa estar logado.";
  } 

  if(isset($_POST['email']) || isset($_POST['senha'])) {
    $conexao = conectarBD();

    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $sql = "SELECT * FROM Usuario WHERE email = '$email' AND senha = '$senha'";
    $resultado = mysqli_query($conexao, $sql) or die("Falha na execução do código SQL: " . mysqli_error($conexao));

    $quantidade = mysqli_num_rows($resultado);

    if($quantidade == 1) {
        
        $usuario = mysqli_fetch_assoc($resultado);

        if(!isset($_SESSION)) {
            session_start();
        }
        
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        if($usuario['imagem']!=""){
          $_SESSION['imagem'] = $usuario['imagem'];
        }

        header("Location: ../notificacoes/notificacoes.php?");

    } else {
      $mensagem = "Dados inválidos.";
    }
  }
?>