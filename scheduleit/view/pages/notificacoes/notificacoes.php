<?php
  include(__DIR__ . '/../../../controller/protect.php');
  include(__DIR__ . '/../../../controller/notificacoes/funcoesNotificacoes.php');
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ScheduleIt - Notificações</title>

    <!-- Custom styles for this template -->
    <link href="/scheduleit/view/styles/css/cover.css" rel="stylesheet">
    <script src="/scheduleit/view/pages/notificacoes/script.js"></script>
  </head>

  <body class="bg-light">
    <!-- HEADER -->
    <?php include __DIR__ . '/../parts/header.php';?>

    <div class="container">
      <div class="p-3 bg-white rounded border">
        <h6 class="border-bottom border-gray pb-2 mb-0">Notificações</h6>
        <?php
          $arrHorarios = array(1 => '07:00', 2 => '08:00', 3 => '09:00', 4 => '10:00', 5 => '13:00', 6 => '14:00', 7 => '16:00', 8 => '16:00', 9 => '17:00');
          try {
            $con = conectarBDPDO();
            $sth = $con->prepare("SELECT * FROM notificacao, usuario WHERE idUsuario=".$_SESSION["id"]." AND notificacao.idFuncionario = usuario.id ORDER BY dataDMA, idHorario;");
            $sth->setFetchMode(PDO:: FETCH_OBJ);
            $sth->execute();
          } catch(PDOException $e) {
            echo "Error: ". $e->getMessage();
          }
          if ($sth->rowCount() > 0) {
            while($row=$sth->fetch()) {
              $dataDMA = addslashes($row->dataDMA);
              echo "<div class='position-relative media text-muted pt-3'>
                      <p class='media-body pb-3 mb-0 small lh-125 border-bottom border-gray'>
                        <strong class='d-block text-gray-dark'>$nome</strong>
                        Você tem um atendimento marcado com <strong class='text-gray-dark'>".$row->nome."</strong> para o dia <strong class='text-gray-dark'>".date("d/m/Y", strtotime($row->dataDMA))."</strong> às <strong class='text-gray-dark'>".$arrHorarios[$row->idHorario]."</strong> horas.
                      </p>
                      <span class='cornerIcon' onclick='redirect(\"$dataDMA\", $row->idFuncionario)'><i class='hoverIcon bi bi-eye'></i></span>
                    </div>";
            }
          } else {
            echo  "<br>
                  <div>
                    <div class='alert alert-warning text-center' role='alert'>
                        Você não possui notificações.
                    </div>
                  </div>";
          }
        ?>
      </div>
    </div>
    <?php include __DIR__ . '/../parts/footer.php';?>
  </body>
</html>
