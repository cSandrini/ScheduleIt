<?php
  include(__DIR__ . '/../../../controller/protect.php');
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ScheduleIt - Configurações</title>

    <script src="/scheduleit/view/pages/config/script.js"></script>
    <script>
      $(document).keypress(function(event){
          var keycode = (event.keyCode ? event.keyCode : event.which);
          if(keycode == '13'){
            $('#inserirSenhaModal').modal('show'); 
          }
      });
    </script>
    <link href="/scheduleit/view/styles/css/cover.css" rel="stylesheet">
  </head>

  <body class="bg-light">
    <!-- HEADER -->
    <?php 
      include __DIR__ . '/../parts/header.php';
      require_once __DIR__ . "/../../../controller/mensagem.php";
    ?>

    <div class="modal" id="cropperModal" tabindex="-1" role="dialog" aria-labelledby="cropperModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Ajustar Imagem</h5>
            <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="text-center m-2">
            <?php include __DIR__ . "/../parts/crop/cropper.php"; ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="saveCrop()">Salvar Alterações</button>
          </div>
        </div>
      </div>
    </div>

    <!-- PERFIL -->
    <?php
      require_once __DIR__ . '/../../../model/usuarioDAO.php';
      // Obtem os dados d o usuário que aparecem no formulário.
      $conexao = conectarBD();
      $id=$_SESSION['id'];
      $dados = carregarConfig($conexao, $_SESSION['id']);
    ?>
    <main role="main" class="container">
      <form method="post" name="formAlterarUsuario" action="/attUsuario?id=<?php echo $_SESSION['id'];?>" enctype="multipart/form-data">
        <input style="display:none;" name="idUsuarioImagem" type="text" value="<?php echo $id;?>" required="">
        <?php
          mensagem('Alterações realizadas.')
        ?>
        <div class="d-flex align-items-center p-3 mb-3 text-white-50 bg-primary rounded">
          <?php //CARREGAR IMAGEM DE PERFIL
            require_once __DIR__ . '/../../../controller/config/funcoesUsuario.php';
            carregarDadosUsuario($id)
          ?>
          <div class="lh-100 me-auto divImg">
            <h6 class="mb-0 text-white lh-100"><?php echo $_SESSION['nome'];?></h6>
            <div class="mb-3">
              <label for="imgPerfil" class="form-label"><small>Editar Imagem de Perfil</small></label>
              <input name="imgPerfil" class="form-control form-control-sm" id="imgPerfil" type="file" value='' onchange="handleFileSelect()">
            </div>
          </div>
        </div>

        <div class="my-3 p-3 bg-white rounded">
          <h6 class="pb-2 mb-0">Configurações</h6>
            <table class="table border-bottom">
              <tbody>
                <tr>
                  <td>
                    Nome
                  </td>
                  <td>
                    <input name="txtNome" class="form-control form-control-sm" type="text" placeholder="<?php echo $dados['nome'];?>" value="">
                  </td>
                </tr>
                <tr>
                  <td>
                    Sobrenome
                  </td>
                  <td>
                    <input name="txtSobrenome" class="form-control form-control-sm" type="text"  placeholder="<?php echo $dados['sobrenome'];?>" value="">
                  </td>
                </tr>
                <tr>
                  <td>
                    CPF
                  </td>
                  <td>
                    <input name="txtCpf" class="form-control form-control-sm" type="text" placeholder="<?php echo $dados['cpf'];?>" value="">
                  </td>
                </tr>
                <tr>
                  <td>
                    Telefone
                  </td>
                  <td>
                    <input name="txtTelefone" class="form-control form-control-sm" type="text" placeholder="<?php echo $dados['telefone'];?>" value="">
                  </td>
                </tr>
                <tr>
                  <td>
                    Email
                  </td>
                  <td>
                    <input name="txtEmail" class="form-control form-control-sm" type="text" placeholder="<?php echo $dados['email'];?>"  value="">
                  </td>
                </tr>
                <tr>
                  <td>
                    Senha
                  </td>
                  <td>
                    <input name="txtSenha" class="form-control form-control-sm" type="password" placeholder="*****" value="">
                  </td>
                </tr>
              </tbody>
            </table>
          <div class="d-flex">
            <button type="button" class="mx-auto btn btn-primary w-25" data-bs-toggle="modal" data-bs-target="#inserirSenhaModal">Salvar</button>
          </div>
        </div>
        <div class="modal fade" id="inserirSenhaModal" tabindex="-1" role="dialog" aria-labelledby="inserirSenhaModal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Confirmar alterações</h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input id="senhaModal" name="senhaModal" class="form form-control" type="password" placeholder="Insira sua senha" required=""></input>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </main>
    <?php include __DIR__ . '/../parts/footer.php';?>
  </body>
</html>
