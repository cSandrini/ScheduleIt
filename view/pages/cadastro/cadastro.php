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
          <h2>Cadastro</h2>
          <p class="lead"> Bem vindo, siga os passos para se cadastrar.</p>
        </div>
      </main>
      <div>
        <?php
            // Exibir a mensagem de ERRO caso OCORRA
            if (isset($_GET["msg"])) {  // Verifica se tem mensagem de ERRO
              $mensagem = $_GET["msg"];
              if ($mensagem=="Enviado com sucesso.") {
                echo "<div class='alert alert-success' role='alert'>
                        $mensagem
                      </div>";
              } else {
                echo "<div class='alert alert-danger' role='alert'>
                        $mensagem
                      </div>";
              }
                
            }
        ?>
        <form class="needs-validation" method="post" name="formCadastro" action="../../../controller/cadusuario.php" enctype="multipart/form-data">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="nome" class="form-label">Nome</label>
              <input name="txtNome" type="text" class="form-control" id="nome" placeholder="" value="" required="">
            </div>

            <div class="col-sm-6">
              <label for="sobrenome" class="form-label">Sobrenome</label>
              <input name="txtSobrenome" type="text" class="form-control" id="sobrenome" placeholder="" value="" required="">
            </div>

            <div class="col-sm-12">
              <label for="cpf" class="form-label">CPF</label>
              <input oninput="mCPF(this)" name="txtCpf" type="text" class="form-control" id="cpf" placeholder="xxx.xxx.xxx-xx" value="" required="">
            </div>

            <div class="col-12">
              <label for="numero" class="form-label">Número</label>
              <input onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" name="txtNumero" type="tel" class="form-control" id="numero" placeholder="(xx) x xxxx-xxxx" maxlength="15">
            </div>
            <div class="col-12">
              <label for="email" class="form-label">E-mail </label>
              <input name="txtEmail" type="email" class="form-control" id="email" placeholder="exemplo@exp.com">
            </div>
            <div class="col-sm-6">
              <label for="senha" class="form-label">Senha</label>
              <input name="txtSenha" type="password" class="form-control" id="senha" placeholder="" value="" required="">
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Confirme sua senha</label>
              <input name="txtSenhaConf" type="password" class="form-control" id="lastName" placeholder="" value="" required="">
            </div>
          </div>
          <hr class="my-4">
          <button type="submit" class="w-100 btn btn-primary btn-lg">Cadastrar</button>
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
