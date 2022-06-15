<?php
include('../../../model/conexaobd.php');

if (isset($_GET['auth']) && $_GET['auth']==0) {
  $mensagem = "Você precisa estar logado.";
} 

if(isset($_POST['email']) || isset($_POST['senha'])) {
  $conexao = conectarBD();

  $email = mysqli_real_escape_string($conexao, $_POST['email']);
  $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

  $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
  $resultado = mysqli_query($conexao, $sql) or die("Falha na execução do código SQL: " . mysqli_error($conexao));

  $quantidade = mysqli_num_rows($resultado);

  if($quantidade == 1) {
      
      $usuario = mysqli_fetch_assoc($resultado);

      if(!isset($_SESSION)) {
          session_start();
      }
      
      $_SESSION['id'] = $usuario['id'];
      $_SESSION['nome'] = $usuario['nome'];

      header('Location: ../notificacoes/index.php?');

  } else {
    $mensagem = "Dados inválidos.";
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EzBook - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="../../styles/css/bootstrap.min.css" rel="stylesheet">
    <script src="script.js"></script>

    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
  </head>
  <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <header class="masthead">
      <div class="inner">
        <h3 class="masthead-brand">EzBook</h3>
        <nav class="nav nav-masthead justify-content-center">
          <a class="nav-link" href="#">Agendar</a>
          <a class="nav-link" href="#">Contato</a>
        </nav>
      </div>
    </header>
  <body class="text-center">
    <div class="container">
      <main>
        <div class="py-5 text-center">
          <h2>Login</h2>
        </div>
      </main>
      <div>
        <?php
            // Exibir a mensagem de ERRO caso OCORRA
            if (isset($mensagem)) {  // Verifica se tem mensagem de ERRO
                echo "<br><div class='alert alert-danger' role='alert'>
                        $mensagem
                      </div>";
            }
        ?>
        <form class="needs-validation" method="post" name="formCadastro" action"">
          <div class="row g-3">
            <div class="col-12">
              <label for="email" class="form-label">E-mail </label>
              <input name="email" type="text" class="form-control" placeholder="E-mail" required="">
            </div>
            <div class="col-12">
              <label for="senha" class="form-label">Senha</label>
              <input name="senha" type="password" class="form-control" placeholder="Senha" required="">
            </div>
          </div>
          <hr class="col-12">
          <button type="submit" class="w-100 btn btn-primary btn-lg mb-2">Entrar</button>
          <a class="text-decoration-none" href="../cadastro/cadastro.php">Cadastre-se</a>
        </form>
      </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small mt-auto">
      <p class="mb-1">© 2022 EzBook</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Sobre</a></li>
        <li class="list-inline-item"><a href="#">Termos de uso</a></li>
        <li class="list-inline-item"><a href="#">Ajuda</a></li>
      </ul>
    </footer>

  </body>
</html>
