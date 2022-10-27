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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="../../styles/css/cover.css" rel="stylesheet">
  <!-- Plugin CSS -->
  <link href="../../../resources/libraries/vanilla-calendar-2.1.1/build/vanilla-calendar.min.css" rel="stylesheet">
  <!-- Plugin JS -->
  <script src="../../../resources/libraries/vanilla-calendar-2.1.1/build/vanilla-calendar.min.js" defer></script>
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
                  </tr>
                </thead>
                <tbody class="">        
                  <tr class="">
                    <td scope="row">07:00 - 08:00</td>
                    <td></td>
                  </tr>
                  <tr class="table-danger">
                    <td scope="row">08:00 - 09:00</td>
                    <td>Pedro</td>
                  </tr>
                  <tr class="table-danger">
                    <td scope="row">09:00 - 10:00</td>
                    <td>Joaquim</td>
                  </tr>
                  <tr class="">
                    <td scope="row">12:00 - 13:00</td>
                    <td></td>
                  </tr>
                  <tr class="">
                    <td scope="row">13:00 - 14:00</td>
                    <td></td>
                  </tr>
                  <tr class="table-danger">
                    <td scope="row">14:00 - 15:00</td>
                    <td>João Pedro</td>
                  </tr>
                  <tr class="">
                    <td scope="row">15:00 - 16:00</td>
                    <td></td>
                  </tr>
                  <tr class="table-danger">
                    <td scope="row">16:00-17:00</td>
                    <td>Arthur</td>
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
