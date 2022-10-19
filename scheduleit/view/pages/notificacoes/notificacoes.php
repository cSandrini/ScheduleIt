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

    <title>ScheduleIt - Notificações</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="offcanvas.css" rel="stylesheet">
  </head>

  <body class="bg-light">
    <!-- HEADER -->
    <?php include '../parts/header.php';?>

    <div class="container pt-3">
      <div class="d-flex align-items-center p-3 text-white-50 bg-primary rounded">
        <?php //CARREGAR IMAGEM DE PERFIL
          carregarImagemPerfil();
        ?>
        <div class="lh-100 me-auto">
          <h6 class="mb-0 text-white lh-100"><?php echo $_SESSION['nome']; ?></h6>
          <small>Since 2022</small>
        </div>
        <a style="text-decoration:none;" class="btn btn-outline-light btn-sm" href="../config/config.php">Configurações</a>
      </div>

      <div class="my-3 p-3 bg-white rounded border">
        <h6 class="border-bottom border-gray pb-2 mb-0">Notificações</h6>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="me-2 rounded">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">@Usuário</strong>
            Notificações.
          </p>
        </div>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=e83e8c&fg=e83e8c&size=1" alt="" class="me-2 rounded">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">@Usuário</strong>
            Notificações.
          </p>
        </div>
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=6f42c1&fg=6f42c1&size=1" alt="" class="me-2 rounded">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">@Usuário</strong>
            Notificações.
          </p>
        </div>
        <small class="d-block text-right mt-3">
          <a href="#">Todas notificações</a>
        </small>
      </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="offcanvas.js"></script>
  </body>
</html>
