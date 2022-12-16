<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ScheduleIt - Cadastro</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="script.js"></script>

    <link href="../../styles/css/cover.css" rel="stylesheet">
  </head>
  <body class="text-center bg-light">
    <!-- HEADER -->
    <?php 
      include '../parts/header.php';
      require_once "../../../controller/mensagem.php";
    ?>

    <div class="">
      <div class="cadastro pb-3 bg-white rounded container border">
        <div class="py-2 text-center">
          <h2>Cadastro</h2>
          <p class="lead"> Bem vindo, siga os passos para se cadastrar.</p>
        </div>
        <div class="text-left">
          <?php
            mensagem('Cadastrado com sucesso.'); // Exibir a mensagem de ERRO caso OCORRA
          ?>
          <form class="needs-validation" method="post" name="formCadastro" action="../../../controller/cadastro/cadUsuario.php" enctype="multipart/form-data">
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="nome" class="form-label mb-0">Nome</label>
                <input name="txtNome" type="text" class="form-control" id="nome" placeholder="Nome" value="" required="">
              </div>

              <div class="col-sm-6">
                <label for="sobrenome" class="form-label mb-0">Sobrenome</label>
                <input name="txtSobrenome" type="text" class="form-control" id="sobrenome" placeholder="Sobrenome" value="" required="">
              </div>

              <div class="col-sm-12">
                <label for="cpf" class="form-label mb-0">CPF</label>
                <input oninput="mCPF(this)" name="txtCpf" type="text" class="form-control" id="cpf" placeholder="CPF" value="" required="" maxlength="14">
              </div>

              <div class="col-12">
                <label for="telefone" class="form-label mb-0">Telefone</label>
                <input onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" name="txtTelefone" type="tel" class="form-control" id="telefone" placeholder="Telefone" maxlength="15">
              </div>
              <div class="col-12">
                <label for="email" class="form-label mb-0">E-mail </label>
                <input name="txtEmail" type="email" class="form-control" id="email" placeholder="E-mail">
              </div>
              <div class="col-sm-6">
                <label for="senha" class="form-label mb-0">Senha</label>
                <input name="txtSenha" type="password" class="form-control" id="senha" placeholder="Senha" value="" required="">
              </div>

              <div class="col-sm-6">
                <label for="lastName" class="form-label mb-0">Confirme sua senha</label>
                <input name="txtSenhaConf" type="password" class="form-control" id="lastName" placeholder="Confirme sua senha" value="" required="">
              </div>
            </div>
            <hr class="my-4">
            <button type="submit" class="w-100 btn btn-primary btn-lg">Cadastrar</button>
          </form>
        </div>
      </div>
      <p class="fsp mt-2 text-muted">Ao criar uma conta você concorda com nossos <a class="text-reset" href="">Termos de Uso</a> e <a class="text-reset" href="">Políticas de Privacidades</a>.</p>
    </div>  
    <!-- FOOTER -->
    <?php include '../parts/footer.php';?>       
  </body>
</html>
