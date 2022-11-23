<?php
    include('../../../controller/protect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ScheduleIt - Agenda</title>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <link href="../../styles/css/cover.css" rel="stylesheet">
  <!-- Plugin CSS -->
  <link href="../../../resources/libraries/vanilla-calendar-2.1.1/build/vanilla-calendar.min.css" rel="stylesheet">
  <!-- Plugin JS -->
  <script src="../../../resources/libraries/vanilla-calendar-2.1.1/build/vanilla-calendar.min.js" defer></script>
  <script src="js.js"></script>
</head>
<body class="bg-light">
    <?php 
      if (!isset($_GET['dataDMA'])) {
        $currentDate = new DateTime();
        $_GET['dataDMA'] = $currentDate->format('Y-m-d');

      }
      include "../parts/header.php";
      require_once "../../../controller/agenda/agenda.php";

      $perm = false;
      if (isset($_SESSION["id"])) {
        try {
            $con = conectarBDPDO();
            $sth = $con->prepare("SELECT * FROM usuario WHERE id=".$_SESSION["id"].";");
            $sth->setFetchMode(PDO:: FETCH_OBJ);
            $sth->execute();
            $row=$sth->fetch();
            $permissao = $row->permissao;
        } catch(PDOException $e) {
            echo "Error: ". $e->getMessage();
        }
        $permissao = $row->permissao;
        if ($_SESSION["id"] == $_GET["id"] || $permissao == 9) {
            $perm = true;
        }
      }

    ?>
      <div class="container">
        <?php
        /*
          if($dados['imagem']) {
              echo "<img class='rounded' src='data:foto/jpeg;base64,".$dados['imagem']."' width='50' height='50'>";
          } else {
              echo "<img class='rounded' src='../../styles/blank.png' width='50' height='50'>";
          }  
        */
        ?>  
        <div class="bg-secondary rounded mb-2 text-center mx-auto title-cards">
          <p class="p-2 m-0 font-weight-bold text-white">Agenda - <?php echo $dados['nome']; ?></p>
        </div>
        <div class="d-flex justify-content-center">
          <div id="calendar" style="height: 400px;" class="border vanilla-calendar vanilla-calendar_default calendar-info me-2">
            <script>
              document.addEventListener('DOMContentLoaded', () => {
                const calendar =  new VanillaCalendar('#calendar', {
                  actions: {
                    clickDay(event, dates) {
                      window.location.href = "agenda.php?id="+<?php echo $_GET['id'];?>+"&dataDMA="+dates;
                    },
                  },
                  settings: {
                    lang: 'pt-BR',
                    selected: {
                      dates: ['<?php echo $_GET['dataDMA'];?>'],
                    },
                  },
                  type: 'default',
                });
                calendar.init();
              });
            </script>
          </div>
          <div style="height: 400px;" class="overflow-auto calendar-info bg-white border lh-1">
            <div class="">
              <table class="table table-hover m-0 p-0">
                <thead class="">
                  <tr>
                    <th scope="col">Horário</th>
                    <th scope="col">Nome</th>
                    <?php
                      if ($perm) {
                        echo "<th scope='col'></th>";
                      }
                      echo "<th scope='col'></th>";
                    ?>
                  </tr>
                </thead>
                <tbody class=""> 
                  <?php
                    $sth = $con->prepare("SELECT * FROM horario WHERE idFuncionario=".$_GET['id']." AND dataDMA='".$_GET['dataDMA']."' ORDER BY idHorario;");
                    $sth->setFetchMode(PDO:: FETCH_OBJ);
                    $sth->execute();

                    $arr = array();
                    $arrId = array();
                    while($row=$sth->fetch()) {
                      array_push($arr, array($row->idHorario, $row->disabilitado));
                      array_push($arrId, array($row->idHorario, $row->idUsuario));
                    }

                    $h=7;
                    for ($i=1; $i<=9; $i++) {
                      if (!empty($arr) && in_array(array($i, 'true'), $arr)) {
                        echo "<tr class='table-secondary'>
                                  <td class='align-middle' scope='row'>".$h.":00 - ".($h+1).":00</td>
                                  <td class='tdw align-middle'></td>
                                  <td class='align-middle text-end'><button class='btn btn-sm btn-outline-secondary' disabled>Disabilitado</button></td>";
                                if ($perm) {
                                  echo "<td class='p-0 align-middle'><button class='btn btn-sm btn-outline-secondary me-2' onclick='post(".$_GET['id'].",".$_SESSION['id'].",\"".$_GET['dataDMA']."\",$i,2)'><i class='bi bi-calendar-x'></i></button></td>";
                                }
                                echo "</tr>";
                      } else if (!empty($arr) && in_array(array($i, 'false'), $arr)) {
                        echo "<tr class='table-danger'>
                                <td class='align-middle' scope='row'>".$h.":00 - ".($h+1).":00</td>
                                <td class='tdw text-truncate align-middle'>Nome</td>";
                                if ($perm) {
                                  echo "<td class='align-middle text-end'><button class='btn btn-sm btn-outline-danger' onclick='post(".$_GET['id'].",".$_SESSION['id'].",\"".$_GET['dataDMA']."\",$i,2)'>Reservado</button></td>
                                        <td class='p-0 align-middle'><button class='btn btn-sm btn-outline-secondary me-2' onclick='post(".$_GET['id'].",".$_SESSION['id'].",\"".$_GET['dataDMA']."\",$i,4)'><i class='bi bi-calendar-x'></i></button></td>";
                                } else {
                                  if (!empty($arr) && in_array(array($i, $_SESSION['id']), $arrId)) {
                                    echo "<td class='align-middle text-end'><button class='btn btn-sm btn-outline-danger' onclick='post(".$_GET['id'].",".$_SESSION['id'].",\"".$_GET['dataDMA']."\",$i,2)'>Reservado</button></td>";
                                  } else {
                                    echo "<td class='align-middle text-end'><button class='btn btn-sm btn-outline-danger' disabled>Reservado</button></td>
                                    </tr>";
                                  }
                                }
                      } else {
                        echo "<tr>
                                <td class='align-middle' scope='row'>".$h.":00 - ".($h+1).":00</td>
                                <td class='tdw text-truncate align-middle'></td>
                                <td class='align-middle text-end'><button class='btn btn-sm btn-outline-success' onclick='post(".$_GET['id'].",".$_SESSION['id'].",\"".$_GET['dataDMA']."\",$i,1)'>Agendar</button></td>";
                              if ($perm) {
                                echo "<td class='p-0 align-middle'><button class='btn btn-sm btn-outline-secondary me-2' onclick='post(".$_GET['id'].",".$_SESSION['id'].",\"".$_GET['dataDMA']."\",$i,3)'><i class='bi bi-calendar-x'></i></button></td>";
                              }
                              echo "</tr>";
                      }
                      if ($i==4) {
                        $h+=3;
                      } else {
                        $h++;
                      }
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    <?php include "../parts/footer.php"; ?>
  </body>
</html>
