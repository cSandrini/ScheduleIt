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

    <title>ScheduleIt - Editar Sala</title>
    
    <script src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="../../styles/css/cover.css" rel="stylesheet">
  </head>
  <body class="text-center bg-light">
    <!-- HEADER -->
    <?php 
    include '../parts/header.php';
    require_once '../../../model/conexaobd.php';
    require_once '../../../model/salasDAO.php';

    $conexao = conectarBD();
    $dados = carregarMinhasSalas($conexao, $_SESSION['id']);
    ?>
    <div class="pt-5">
      <div style="width: 40rem;" class="pb-3 bg-white rounded container border">
        <div class="py-2 text-center">
          <h2>Ediçao de Sala</h2>
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
          <form class="needs-validation" method="post" name="formEditarSala" action="../../../controller/editarSala/attSala.php" enctype="multipart/form-data">
            
            <input style="display:none;" name="idProprietario" type="text" value="<?php echo $_SESSION['id'];?>"> 

            <div class="row g-3">

              <div class="col-sm-6">
                <label for="nomeFantasia" class="form-label mb-0">Nome do Estabelecimento</label>
                <input name="txtNome" type="text" class="form-control" id="nomeFantasia" placeholder="<?php echo $dados['nomeFantasia'];?>" value="" required="">
              </div>

              <div class="col-sm-6">
                <label for="cnpj" class="form-label mb-0">CNPJ</label>
                <input name="txtCNPJ" oninput="mascara(this)" type="text" class="form-control" id="cnpj" placeholder="<?php echo $dados['cnpj'];?>" required="">
              </div>

              <div class="col-12">
                <label for="telefone" class="form-label mb-0">Telefone</label>
                <input onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" name="txtTelefone" type="tel" class="form-control" id="numero" placeholder="<?php echo $dados['telefone'];?>" maxlength="15" required="">
              </div>

              <div class="col-sm-6">
                <label for="cep" class="form-label mb-0">CEP</label>
                <input name="txtCEP" type="text" class="form-control" id="cep" placeholder="<?php echo $dados['cep'];?>" onblur="pesquisacep(this.value);" required="">
              </div>

              <div class="col-sm-6">
                <label for="endereco" class="form-label mb-0">Estado </label>
                <input name="txtEstado" readonly class="form-control" id="uf" placeholder="<?php echo $dados['estado'];?>" required="">
              </div>

              <div class="col-sm-6">
                <label for="cidade" class="form-label mb-0">Cidade </label>
                <input name="txtCidade" readonly class="form-control" id="cidade" placeholder="<?php echo $dados['cidade'];?>" required="">
              </div>

              <div class="col-sm-6">
                <label for="bairro" class="form-label mb-0">Bairro </label>
                <input name="txtBairro" readonly class="form-control" id="bairro" placeholder="<?php echo $dados['bairro'];?>" required="">
              </div>

              <div class="col-sm-6">
                <label for="rua" class="form-label mb-0">Rua </label>
                <input name="txtRua" readonly class="form-control" id="rua" placeholder="<?php echo $dados['rua'];?>" required="">
              </div>

              <div class="col-sm-6">
                <label for="numero" class="form-label mb-0">Número </label>
                <input name="txtNumero" class="form-control" id="numero" placeholder="<?php echo $dados['numero'];?>" required="">
              </div>

              <div class="col-12">
                <label for="complemento" class="form-label mb-0">Complemento </label>
                <input name="txtComplemento" class="form-control" id="complemento" placeholder="<?php if(isset($dados['complemento'])){echo $dados['complemento'];} else {echo "Complemento";};?>" required=""> 
              </div>

              <div class="col-12">
                <label for="email" class="form-label mb-0">E-mail </label>
                <input name="txtEmail" type="email" class="form-control" id="email" placeholder="<?php echo $dados['email'];?>" required=""> 
              </div>

              <div class="col-12">
                <label for="email" class="form-label mb-0">Descrição</label>
                <textarea name="txtDescricao" rows="3" class="form-control" id="descricao" placeholder="<?php echo $dados['descricao'];?>" required="" maxlength="300"></textarea>
              </div>

            </div>
            <hr class="my-4">
            <button type="submit" class="w-100 btn btn-primary btn-lg">Editar</button>
          </form>
        </div>
      </div>

      <!-- FOOTER -->
      <?php include '../parts/footer.php';?>
    </div>         
  </body>
</html>
