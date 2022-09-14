<?php
  include('../../../controller/login/loginController.php');

  if(!isset($_SESSION)) {
    session_start();
  }

  if(isset($_SESSION['id'])) {
    header('Location: ../config/config.php');
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ScheduleIt - Login</title>

    <link href="../../styles/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../styles/css/cover.css" rel="stylesheet">
  </head>
  <body class="text-center bg-light">
    <!-- HEADER -->
    <?php include '../parts/header.php';?>

    <div class="pt-5">
      <div style="width: 22rem;" class="pb-2 bg-white rounded container border">
        <div>
          <div class="py-2 text-center">
            <h2>Login</h2>
          </div>
          <?php
              // Exibir a mensagem de ERRO caso OCORRA
              if (isset($mensagem)) {  // Verifica se tem mensagem de ERRO
                  echo "<br><div class='alert alert-danger' role='alert'>
                          $mensagem
                        </div>";
              }
          ?>
          <form class="needs-validation" method="post" name="formCadastro" action="">
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
            <hr>
            <button type="submit" class="w-100 btn btn-primary btn-lg mb-1">Entrar</button>
            <a class="text-decoration-none" href="../cadastro/cadastro.php">Cadastre-se</a>
          </form>
        </div>
      </div>
    
      <!-- FOOTER -->
      <?php include '../parts/footer.php';?>
    </div>
  </body>
</html>
