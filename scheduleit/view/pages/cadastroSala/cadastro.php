<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ScheduleIt - Cadastro</title>
    
    <script src="script.js"></script>
    <link href="../../styles/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../styles/css/cover.css" rel="stylesheet">
  </head>
  <body class="text-center bg-light">
    <!-- HEADER -->
    <?php include '../parts/header.php';?>

    <div class="pt-5">
      <div style="width: 40rem;" class="pb-3 bg-white rounded container border">
        <div class="py-2 text-center">
          <h2>Cadastro de Sala</h2>
          <p class="lead"> Preencha os campos para cadastrar seu estabelecimento.</p>
        </div>
        <div class="text-left">
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
          <form class="needs-validation" method="post" name="formCadastro" action="../../../controller/cadastro/cadusuario.php" enctype="multipart/form-data">
            <div class="row g-3">
              <div class="col-sm-12">
                <label for="nome" class="form-label mb-0">Nome do Estabelecimento</label>
                <input name="txtNome" type="text" class="form-control" id="nome" placeholder="Nome" value="" required="">
              </div>

              <div class="col-12">
                <label for="numero" class="form-label mb-0">Número</label>
                <input onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" name="txtNumero" type="tel" class="form-control" id="numero" placeholder="Número" maxlength="15">
              </div>

              <div class="col-12">
                <label for="email" class="form-label mb-0">E-mail </label>
                <input name="txtEmail" type="email" class="form-control" id="email" placeholder="E-mail">
              </div>

              <div class="col-12">
                <label for="Endereco" class="form-label mb-0">Endereço </label>
                <input name="txtEndereco" type="endereco" class="form-control" id="endereco" placeholder="Endereço">
              </div>

            </div>
            <hr class="my-4">
            <button type="submit" class="w-100 btn btn-primary btn-lg">Cadastrar</button>
          </form>
        </div>
      </div>

      <!-- FOOTER -->
      <?php include '../parts/footer.php';?>
    </div>         
  </body>
</html>
