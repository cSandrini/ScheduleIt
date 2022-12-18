<?php
  include('../../../controller/protect.php');
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ScheduleIt - Cadastrar Sala</title>
    
    <script src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="../../styles/css/cover.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <!-- HEADER -->
    <?php 
      include '../parts/header.php';
      require_once "../../../controller/mensagem.php";
    ?>

    <div class="">
      <div style="width: 40rem;" class="pb-3 bg-white rounded container border">
        <div class="py-2 text-center">
          <h2>Cadastro de Sala</h2>
          <p class="lead"> Preencha os campos para cadastrar seu estabelecimento.</p>
        </div>
        <div class="text-left">
          <?php
            mensagem('Cadastrado com sucesso'); // Exibir a mensagem de ERRO caso OCORRA
          ?>
          <form class="needs-validation" method="post" name="formCadastro" action="../../../controller/cadastro/cadSala.php" enctype="multipart/form-data">
            
            <input style="display:none;" name="idProprietario" type="text" value="<?php echo $_SESSION['id'];?>"> 

            <div class="row g-3">

              <div class="col-sm-6">
                <label for="nome" class="form-label mb-0">Nome do Estabelecimento</label>
                <input name="txtNome" type="text" class="form-control" id="nome" placeholder="Nome" value="" required="">
              </div>

              <div class="col-sm-6">
                <label for="cnpj" class="form-label mb-0">CNPJ</label>
                <input name="txtCNPJ" oninput="mascara(this)" type="text" class="form-control" id="cnpj" placeholder="CNPJ" required="">
              </div>

              <div class="col-12">
                <label for="telefone" class="form-label mb-0">Telefone</label>
                <input onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" name="txtTelefone" type="tel" class="form-control" id="numero" placeholder="Número" maxlength="15" required="">
              </div>

              <div class="col-sm-6">
                <label for="cep" class="form-label mb-0">CEP</label>
                <input name="txtCEP" type="text" class="form-control" id="cep" placeholder="CEP" onblur="pesquisacep(this.value);" required="">
              </div>

              <div class="col-sm-6">
                <label for="endereco" class="form-label mb-0">Estado </label>
                <input name="txtEstado" class="form-control" id="uf" placeholder="Estado" required="">
              </div>

              <div class="col-sm-6">
                <label for="cidade" class="form-label mb-0">Cidade </label>
                <input name="txtCidade" class="form-control" id="cidade" placeholder="Cidade" required="">
              </div>

              <div class="col-sm-6">
                <label for="bairro" class="form-label mb-0">Bairro </label>
                <input name="txtBairro" class="form-control" id="bairro" placeholder="Bairro" required="">
              </div>

              <div class="col-sm-6">
                <label for="rua" class="form-label mb-0">Rua </label>
                <input name="txtRua" class="form-control" id="rua" placeholder="Rua" required="">
              </div>

              <div class="col-sm-6">
                <label for="numero" class="form-label mb-0">Número </label>
                <input name="txtNumero" class="form-control" id="numero" placeholder="Número" required="">
              </div>

              <div class="col-12">
                <label for="complemento" class="form-label mb-0">Complemento </label>
                <input name="txtComplemento" class="form-control" id="complemento" placeholder="Complemento" required=""> 
              </div>

              <div class="col-12">
                <label for="email" class="form-label mb-0">E-mail </label>
                <input name="txtEmail" type="email" class="form-control" id="email" placeholder="E-mail" required=""> 
              </div>

              <div class="col-12">
                <label for="email" class="form-label mb-0">Descrição</label>
                <textarea name="txtDescricao" rows="3" class="form-control" id="descricao" placeholder="Descricao" required="" maxlength="300"></textarea>
              </div>

              <div>
              <label for="cpf" class="form-label mb-0">Escolha uma logo</label>
                <input name="fileLogo" type="file" class="form-control mb-0" aria-label="Large file input example">
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
