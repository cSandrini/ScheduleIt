<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }
            
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php?".$_SESSION['id']);

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

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
    <link rel="icon" href="../../../../favicon.ico">

    <title>EzBook - Cadastro</title>

    <!-- Bootstrap core CSS -->
    <link href="../../styles/css/bootstrap.min.css" rel="stylesheet">
    <script src="script.js"></script>

    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
  </head>
  <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
      <div class="inner">
        <h3 class="masthead-brand">EzBook</h3>
        <nav class="nav nav-masthead justify-content-center">
          <a class="nav-link active" href="#">EzBook - Exemplo</a>
          <a class="nav-link" href="#">Agendar</a>
          <a class="nav-link" href="#">Contato</a>
        </nav>
      </div>
    </header>
  <body class="text-center">
    <div class="container">
      <main>
        <div class="py-5 text-center">
          <h1>EzBook</h1><br>
          <h2>Login</h2>
        </div>
      </main>
      <div>
        <form class="needs-validation" method="post" name="formCadastro" action"">
          <div class="row g-3">
            <div class="col-12">
              <label for="email" class="form-label">E-mail </label>
              <input name="txtEmail" type="email" class="form-control" id="email" placeholder="exemplo@exp.com">
            </div>
            <div class="col-12">
              <label for="senha" class="form-label">Senha</label>
              <input name="txtSenha" type="password" class="form-control" id="senha" placeholder="" value="" required="">
            </div>
          </div>
          <hr class="col-12">
          <button type="submit" class="w-100 btn btn-primary btn-lg">Entrar</button>
        </form>
      </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">© 2022-2022 EzBook</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Sobre</a></li>
        <li class="list-inline-item"><a href="#">Termos de uso</a></li>
        <li class="list-inline-item"><a href="#">Ajuda</a></li>
      </ul>
    </footer>

  </body>
</html>
