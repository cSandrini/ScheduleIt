<?php

include(__DIR__ . '/../../../controller/protect.php');

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ScheduleIt - Editar Sala</title>
    
    <script src="/scheduleit/view/pages/editarSala/script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="/scheduleit/view/styles/css/cover.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <!-- HEADER -->
    <?php 
      include __DIR__ . '/../parts/header.php';
      require_once __DIR__ . '/../../../model/conexaobd.php';
      require_once __DIR__ . '/../../../model/salasDAO.php';

      $conexao = conectarBD();
      $dados = carregarMinhasSalas($conexao, $_SESSION['id'], $idSala);
    ?>
    <div class="">
      <div class="cadastro text-center pb-3 bg-white rounded container border">
        <div class="py-2">
          <h2>Ediçao de Sala</h2>
        </div>
        <div class="text-center">
          <?php
              require_once __DIR__ . "/../../../controller/mensagem.php";
              mensagem('Editado com sucesso.');
          ?>
          <form class="needs-validation" method="post" name="formEditarSala" action="/attSala/<?php echo $idSala;?>" enctype="multipart/form-data">
            
            <input style="display:none;" name="idProprietario" type="text" value="<?php echo $_SESSION['id'];?>"> 

            <div class="row g-3">

              <div class="col-sm-6">
                <label for="nomeFantasia" class="form-label mb-0">Nome do Estabelecimento</label>
                <input name="txtNome" type="text" class="form-control" id="nomeFantasia" placeholder="<?php echo $dados['nomeFantasia'];?>" value="" >
              </div>

              <div class="col-sm-6">
                <label for="cnpj" class="form-label mb-0">CNPJ</label>
                <input name="txtCNPJ" oninput="mascara(this)" type="text" class="form-control" id="cnpj" placeholder="<?php echo $dados['cnpj'];?>" value=""  >
              </div>

              <div class="col-12">
                <label for="telefone" class="form-label mb-0">Telefone</label>
                <input onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" name="txtTelefone" type="tel" class="form-control" id="numero" placeholder="<?php echo $dados['telefone'];?>" value="" maxlength="15" >
              </div>

              <div class="col-sm-6">
                <label for="cep" class="form-label mb-0">CEP</label>
                <input name="txtCEP" type="text" class="form-control" id="cep" placeholder="<?php echo $dados['cep'];?>" value="" onblur="pesquisacep(this.value);" >
              </div>

              <div class="col-sm-6">
                <label for="endereco" class="form-label mb-0">Estado </label>
                <input name="txtEstado" class="form-control" id="uf" placeholder="<?php echo $dados['estado'];?>" value="" >
              </div>

              <div class="col-sm-6">
                <label for="cidade" class="form-label mb-0">Cidade </label>
                <input name="txtCidade" class="form-control" id="cidade" placeholder="<?php echo $dados['cidade'];?>" value="" >
              </div>

              <div class="col-sm-6">
                <label for="bairro" class="form-label mb-0">Bairro </label>
                <input name="txtBairro" class="form-control" id="bairro" placeholder="<?php echo $dados['bairro'];?>" value="" >
              </div>

              <div class="col-sm-6">
                <label for="rua" class="form-label mb-0">Rua </label>
                <input name="txtRua" class="form-control" id="rua" placeholder="<?php echo $dados['rua'];?>" value="" >
              </div>

              <div class="col-sm-6">
                <label for="numero" class="form-label mb-0">Número </label>
                <input name="txtNumero" class="form-control" id="numero" placeholder="<?php echo $dados['numero'];?>" value="" >
              </div>

              <div class="col-12">
                <label for="complemento" class="form-label mb-0">Complemento </label>
                <input name="txtComplemento" class="form-control" id="complemento" placeholder="<?php echo $dados['complemento'];?>" value="" > 
              </div>

              <div class="col-12">
                <label for="email" class="form-label mb-0">E-mail </label>
                <input name="txtEmail" type="email" class="form-control" id="email" placeholder="<?php echo $dados['email'];?>" value="" > 
              </div>

              <div class="col-12">
                <label for="descricao" class="form-label mb-0">Descrição</label>
                <textarea name="txtDescricao" rows="3" class="form-control" id="descricao" placeholder="<?php echo $dados['descricao'];?>"  maxlength="300" ></textarea>
              </div>

          

            </div>
          <hr class="my-3">
            <div class="text-end">
              <a href='../sala/sala.php?idSala=<?php echo $idSala;?>'><button type='button' class='btn btn-outline-danger btn-sm'>Cancelar</button></a>
              <button type="button" class="btn btn-primary btn-sm w-25" data-bs-toggle="modal" data-bs-target="#inserirSenhaModal">Salvar</button>
            </div>
        </div>
        <div class="modal fade" id="inserirSenhaModal" tabindex="-1" role="dialog" aria-labelledby="inserirSenhaModal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="inserirSenhaModal">Confirmar alterações</h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input name="senhaModal" class="form form-control" type="password" placeholder="Insira sua senha"></input>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
              </div>
            </div>
          </div>
        </div>
          </form>
        </div>
      </div>

      <!-- FOOTER -->
      <?php include __DIR__ . '/../parts/footer.php';?>
    </div>         
  </body>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" 
    crossorigin="anonymous"></script>

</html>
