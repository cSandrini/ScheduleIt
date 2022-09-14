<?php

include('../../../controller/protect.php');

?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EzBook - Notificações</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="offcanvas.css" rel="stylesheet">
    <script>
      function overlay(e) {

      }
    </script>
  </head>

  <body class="bg-light">
    <!-- HEADER -->
    <?php include '../parts/header.php';?>

    <!-- PERFIL -->
    <?php
      require_once '../../../model/conexaobd.php';
      require_once '../../../model/perfilDAO.php';
      
      $conexao = conectarBD();
      $dados = carregarConfig($conexao, $_SESSION['id']);
    ?>
    <main role="main" class="container">
      <form method="post" name="formCadastro" action="../../../controller/config/attusuario.php" enctype="multipart/form-data">

        <?php
          // Exibir a mensagem de ERRO caso OCORRA
          if (isset($_GET["msg"])) {  // Verifica se tem mensagem de ERRO
            $mensagem = $_GET["msg"];
            if ($mensagem=="0") {
              echo "<div class='mt-3 alert alert-success' role='alert'>
                      Alterações realizadas.
                    </div>";
            } else {
              echo "<div class='mt-3 alert alert-danger' role='alert'>
                      $mensagem
                    </div>";
            }
              
          }
        ?>
        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-primary rounded">
          <?php //CARREGAR IMAGEM DE PERFIL
            if(isset($_SESSION['imagem'])) {
              $imagemPerf=$_SESSION['imagem'];
              echo "<img class='mr-3 rounded' src='data:image/jpeg;base64,".base64_encode($imagemPerf)."' alt='' width='120' height='120'>";
            } else {
              echo "<img class='mr-3 rounded' src='blank.png' alt='' width='120' height='120'>";
            }
          ?>
          <div class="lh-100 mr-auto">
            <h6 class="mb-0 text-white lh-100"><?php echo $_SESSION['nome'];?></h6>
            <small>Since 2022</small>
            <div class="mb-3">
              <label for="imagemPerfil" class="form-label"><small>Editar Imagem de Perfil</small></label>
              <input name="imagemPerfil" class="form-control form-control-sm" id="imagemPerfil" type="file">
            </div>
          </div>
        </div>
        <div class="my-3 p-3 bg-white rounded">
          <h6 class="pb-2 mb-0">Configurações</h6>
            <table class="table border-bottom">
              <tbody>
                <!--REVER ISSO-->
                <input style="display:none;" name="id" type="text" value="<?php echo $_SESSION['id'];?>">

                <tr>
                  <td>
                    Nome
                  </td>
                  <td>
                    <input name="nome" readonly class="form-control form-control-sm" type="text" placeholder="<?php echo $dados['nome'];?>">
                  </td>
                </tr>
                <tr>
                  <td>
                    Sobrenome
                  </td>
                  <td>
                    <input name="sobrenome" readonly class="form-control form-control-sm" type="text" placeholder="<?php echo $dados['sobrenome'];?>">
                  </td>
                </tr>
                <tr>
                  <td>
                    CPF
                  </td>
                  <td>
                    <input name="cpf" readonly class="form-control form-control-sm" type="text" placeholder="<?php echo $dados['cpf'];?>">
                  </td>
                </tr>
                <tr>
                  <td>
                    Telefone
                  </td>
                  <td>
                    <input name="telefone" class="form-control form-control-sm" type="text" placeholder="<?php echo $dados['telefone'];?>">
                  </td>
                </tr>
                <tr>
                  <td>
                    Email
                  </td>
                  <td>
                    <input name="email" class="form-control form-control-sm" type="text" placeholder="<?php echo $dados['email'];?>">
                  </td>
                </tr>
                <tr>
                  <td>
                    Senha
                  </td>
                  <td>
                    <input name="senhaNova" class="form-control form-control-sm" type="password" placeholder="**********">
                  </td>
                </tr>
              </tbody>
            </table>
          <div class="d-flex">
            <button type="button" class="mx-auto btn btn-primary btn-sm w-25" data-bs-toggle="modal" data-bs-target="#inserirSenhaModal">Salvar</button>
          </div>
        </div>
        <div class="modal fade" id="inserirSenhaModal" tabindex="-1" role="dialog" aria-labelledby="inserirSenhaModal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="inserirSenhaModal">Confirmar alterações</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" 
    crossorigin="anonymous"></script>
  </body>
</html>
