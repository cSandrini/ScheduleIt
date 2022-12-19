<?php
    include(__DIR__.'/../../../controller/protect.php');
    header("Access-Control-Allow-Origin: *");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ScheduleIt - Agenda</title>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <link href="/scheduleit/view/styles/css/cover.css" rel="stylesheet">
  <!-- Plugin CSS -->
  <link href="/scheduleit/resources/libraries/vanilla-calendar-2.1.1/build/vanilla-calendar.min.css" rel="stylesheet">
  <!-- Plugin JS -->
  <script src="/scheduleit//resources/libraries/vanilla-calendar-2.1.1/build/vanilla-calendar.min.js" defer></script>
  <script src="/scheduleit/view/pages/agenda/js.js"></script>
</head>
<body class="bg-light">
    <?php 
      if (!isset($dataDMA)) {
        $currentDate = new DateTime();
        $dataDMA = $currentDate->format('Y-m-d');

      }
      include __DIR__."/../parts/header.php";
      require_once __DIR__."/../../../controller/agenda/agenda.php";

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
        if ($_SESSION["id"] == $id || $permissao == 9) {
            $perm = true;
        }
      }

    ?>
      <div class="container">
        <?php
        $currentDateT = new DateTime();
        $minMonth = $currentDateT;
        $minMonth->modify('first day of this month');
        $minMonth = $minMonth->format('Y-m-d');

        $maxMonth = $currentDateT;
        $maxMonth->modify('+3 months');
        $maxMonth->modify('last day of this month');
        $maxMonth = $maxMonth->format('Y-m-d');
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
        <div class="flex-block justify-content-center mb-2">
          <div id="calendar" class="border vanilla-calendar vanilla-calendar_default calendar-info me-2">
            <script>
              document.addEventListener('DOMContentLoaded', () => {
                const calendar =  new VanillaCalendar('#calendar', {
                  actions: {
                    clickDay(event, dates) {
                      window.location.href = "/agenda/"+<?php echo $id;?>+"/"+dates;
                    },
                  },
                  settings: {
                    range: {
                      min: '<?php echo $minMonth; ?>',
			                max: '<?php echo $maxMonth; ?>',
                    },
                    lang: 'pt-BR',
                    selected: {
                      dates: ['<?php echo $dataDMA;?>'],
                    },
                  },
                  type: 'default',
                });
                calendar.init();
              });
            </script>
          </div>
          <div class="overflow-auto bg-white border lh-1 horarios">
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
                    $sth = $con->prepare("SELECT * FROM horario, usuario WHERE idFuncionario=".$id." AND dataDMA='".$dataDMA."' AND horario.idUsuario = usuario.id ORDER BY idHorario;");
                    $sth->setFetchMode(PDO:: FETCH_OBJ);
                    $sth->execute();

                    $arr = array();
                    $arrId = array();
                    $arrNome = array();
                    while($row=$sth->fetch()) {
                      array_push($arr, array($row->idHorario, $row->desabilitado));
                      array_push($arrId, array($row->idHorario, $row->idUsuario));
                      $arrNome = $arrNome + array($row->idHorario => $row->nome) ;
                    }

                    $sth = $con->prepare("SELECT * FROM horario WHERE idFuncionario=".$id." AND dataDMA='".$dataDMA."' ORDER BY idHorario;");
                    $sth->setFetchMode(PDO:: FETCH_OBJ);
                    $sth->execute();
                    while($row=$sth->fetch()) {
                      array_push($arr, array($row->idHorario, $row->desabilitado));
                    }

                    $h=7;
                    for ($i=1; $i<=9; $i++) {
                      if (!empty($arr) && in_array(array($i, 'true'), $arr)) {
                        echo "<tr class='table-secondary'>
                                  <td class='align-middle' scope='row'>".$h.":00 - ".($h+1).":00</td>
                                  <td class='tdw align-middle'></td>
                                  <td class='align-middle text-end'><button class='btn btn-sm btn-outline-secondary' disabled>Desabilitado</button></td>";
                                if ($perm) {
                                  echo "<td class='p-0 align-middle'><button class='btn btn-sm btn-outline-secondary me-2' onclick='post(".$id.",".$_SESSION['id'].",\"".$dataDMA."\",$i,2)'><i class='bi bi-calendar-x'></i></button></td>";
                                }
                                echo "</tr>";
                      } else if (!empty($arr) && in_array(array($i, 'false'), $arr)) {
                        echo "<tr class='table-danger'>
                                <td class='align-middle' scope='row'>".$h.":00 - ".($h+1).":00</td>
                                <td class='tdw text-truncate align-middle'>".$arrNome[$i]."</td>";  
                                if ($perm) {
                                  echo "<td class='align-middle text-end'><button class='btn btn-sm btn-outline-danger' onclick='post(".$id.",".$_SESSION['id'].",\"".$dataDMA."\",$i,2)'>Reservado</button></td>
                                        <td class='p-0 align-middle'><button class='btn btn-sm btn-outline-secondary me-2' onclick='post(".$id.",".$_SESSION['id'].",\"".$dataDMA."\",$i,4)'><i class='bi bi-calendar-x'></i></button></td>";
                                } else {
                                  if (!empty($arr) && in_array(array($i, $_SESSION['id']), $arrId)) {
                                    echo "<td class='align-middle text-end'><button class='btn btn-sm btn-outline-danger' onclick='post(".$id.",".$_SESSION['id'].",\"".$dataDMA."\",$i,2)'>Reservado</button></td>";
                                  } else {
                                    echo "<td class='align-middle text-end'><button class='btn btn-sm btn-outline-danger' disabled>Reservado</button></td>
                                    </tr>";
                                  }
                                }
                      } else {
                        echo "<tr>
                                <td class='align-middle' scope='row'>".$h.":00 - ".($h+1).":00</td>
                                <td class='tdw text-truncate align-middle'></td>
                                <td class='align-middle text-end'><button class='btn btn-sm btn-outline-success' onclick='post(".$id.",".$_SESSION['id'].",\"".$dataDMA."\",$i,1)'>Agendar</button></td>";
                              if ($perm) {
                                echo "<td class='p-0 align-middle'><button class='btn btn-sm btn-outline-secondary me-2' onclick='post(".$id.",".$_SESSION['id'].",\"".$dataDMA."\",$i,3)'><i class='bi bi-calendar-x'></i></button></td>";
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
        <?php
          if($perm) {
            echo  "<div class='d-flex justify-content-center'>
                    <button class='btn btn-secondary me-2' onclick='disableAll(".$id.','.$_SESSION['id'].',"'.$dataDMA.'",3'.")'>Desabilitar Todos</button>
                    <button class='btn btn-secondary me-2' onclick='enableAll(".$id.','.$_SESSION['id'].',"'.$dataDMA.'",2'.")'>Habilitar Todos</button>
                    <button class='btn btn-secondary' onclick='redirectHorarios()'>Configurar Horarios</button>
                  </div>";
          }
        ?>
      </div>
    <?php include __DIR__."/../parts/footer.php"; ?>
  </body>
</html>
