<?php
    if(!isset($_SESSION)) {
        session_start();
    }
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
      include "../parts/header.php";
      require_once "../../../controller/agenda/agenda.php";
    ?>
      <div class="container">
        <div class="bg-secondary rounded mb-2 text-center mx-auto title-cards">
            <p class="p-2 m-0 font-weight-bold text-white">Agenda - <?php echo $dados['nome']; ?></p>
        </div>
        <div class="d-flex justify-content-center">
          <div id="calendar" style="height: 400px;" class="border vanilla-calendar vanilla-calendar_default calendar-info me-2">
            <script>
              document.addEventListener('DOMContentLoaded', () => {
                const calendar =  new VanillaCalendar('#calendar', {
                  settings: {
                    lang: 'pt-BR',
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
                    <th></th>
                  </tr>
                </thead>
                <tbody class=""> 
                  <tr class="">
                    <td class="align-middle" scope="row">07:00 - 08:00</td>
                    <td class="align-middle"></td>
                    <td class="align-middle"><button class="btn btn-sm btn-outline-success" onclick="agendar(<?php echo $_GET['id'];?>, <?php echo $_SESSION['id'];?>, 17-11-2022, 1)">Agendar</button></td>
                  </tr>
                  <tr class="table-danger">
                    <td class="align-middle"scope="row">08:00 - 09:00</td>
                    <td class="align-middle">Pedro</td>
                    <td class="align-middle"><button class="btn btn-sm btn-outline-danger" disabled>Reservado</button></td>
                  </tr>
                  <tr class="table-danger">
                    <td class="align-middle" scope="row">09:00 - 10:00</td>
                    <td class="align-middle">Joaquim</td>
                    <td class="align-middle"><button class="btn btn-sm btn-outline-danger" disabled>Reservado</button></td>
                  </tr>
                  <tr class="">
                    <td class="align-middle" scope="row">10:00 - 11:00</td>
                    <td class="align-middle"></td>
                    <td class="align-middle"><button class="btn btn-sm btn-outline-success" onclick="agendar(<?php $_GET['id'];?>, <?php $_SESSION['id'];?>, 17-11-2022, 4)">Agendar</button></td>
                  </tr>
                  <tr class="">
                    <td class="align-middle" scope="row">13:00 - 14:00</td>
                    <td class="align-middle"></td>
                    <td class="align-middle"><button class="btn btn-sm btn-outline-success" onclick="agendar(<?php $_GET['id'];?>, <?php $_SESSION['id'];?>, 17-11-2022, 5)">Agendar</button></td>
                  </tr>
                  <tr class="table-danger">
                    <td class="align-middle" scope="row">14:00 - 15:00</td>
                    <td class="align-middle">João Pedro</td>
                    <td class="align-middle"><button class="btn btn-sm btn-outline-danger" disabled>Reservado</button></td>
                  </tr>
                  <tr class="">
                    <td class="align-middle" scope="row">15:00 - 16:00</td>
                    <td class="align-middle"></td>
                    <td class="align-middle"><button class="btn btn-sm btn-outline-success" onclick="agendar(<?php $_GET['id'];?>, <?php $_SESSION['id'];?>, 17-11-2022, 7)">Agendar</button></td>
                  </tr>
                  <tr class="table-danger">
                    <td class="align-middle" scope="row">16:00-17:00</td>
                    <td class="align-middle">Arthur</td>
                    <td class="align-middle"><button class="btn btn-sm btn-outline-danger" disabled>Reservado</button></td>
                  </tr>
                  <tr class="table-danger">
                    <td class="align-middle" scope="row">17:00-18:00</td>
                    <td class="align-middle">Arthur</td>
                    <td class="align-middle"><button class="btn btn-sm btn-outline-danger" disabled>Reservado</button></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    <?php include "../parts/footer.php"; ?>
  </body>
</html>
