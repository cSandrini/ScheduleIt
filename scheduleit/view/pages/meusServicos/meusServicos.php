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

    <title>ScheduleIt - Meus Serviços</title>

    <link href="/scheduleit/view/styles/css/cover.css" rel="stylesheet">
    <script src="/scheduleit/view/pages/meusServicos/script.js"></script>
  </head>

  <body class="bg-light">
    <?php
      include __DIR__ . '/../parts/header.php';
      require_once  __DIR__ . "/../../../controller/mensagem.php";
    ?>

    <div class="container">
      <?php       
        //echo "<div> <div class='container p-0'>";
        //  mensagem('O convite expirou');
        //echo "</div>"; 
      ?>
      <div class="p-3 bg-white rounded border">
        <h6 class="border-bottom border-gray pb-2 mb-0">Meus Serviços</h6>
        <?php
          try {
            $con = conectarBDPDO();
            $sth = $con->prepare("SELECT * FROM funcionario WHERE idUsuario=".$_SESSION['id'].";");
            $sth->setFetchMode(PDO:: FETCH_OBJ);
            $sth->execute();
          } catch(PDOException $e) {
            echo "Error: ". $e->getMessage();
          }
          if ($sth->rowCount() > 0) {
            while($row=$sth->fetch()) {
              try {
                $sth2 = $con->prepare("SELECT nomeFantasia FROM sala WHERE idSala=".$row->idSala.";");
                $sth2->setFetchMode(PDO:: FETCH_OBJ);
                $sth2->execute();
                $row2=$sth2->fetch();
              } catch(PDOException $e) {
                echo "Error: ". $e->getMessage();
              }
              echo "<div class='notificacao position-relative text-muted pt-3 border-bottom'>
                      <p class='pb-3 mb-0 small lh-125 border-gray'>
                        Sala: <strong class='text-gray-dark'>".$row2->nomeFantasia."</strong>
                      </p>
                      <span class='btn btn-sm btn-danger btn-largar' onclick='largar($row->idSala, ".$_SESSION['id'].")'>Largar</span>
                      <span class='btn btn-sm btn-primary btn-visitar' onclick='visitar($row->idSala)'>Visitar</span>
                    </div>";
            }
          } else {
            echo  "<br>
                  <div>
                    <div class='alert alert-warning text-center' role='alert'>
                        Você não é funcionário de nenhuma sala
                    </div>
                  </div>";
          }
        ?>
      </div>
    </div>
    <?php include __DIR__ . '/../parts/footer.php';?>
  </body>
</html>
