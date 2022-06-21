<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>ScheduleIt - Agenda</title>
<link href="../../styles/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="text-center">
  <?php include "../parts/header.php"; ?>
  <div class="cover-container d-flex h-100mx-auto flex-column">
    <div class="container">
      <h3 class="mt-5">Minha Agenda</h3>
      <div class="mx-auto mb-3 col-sm-3 bg-info rounded">
        <h6 class="d-inline">Data:</h6>
        <h5 class="d-inline rounded">09/06/2022</h5>
      </div>
      <div class="border rounded">
        <table class="table table-hover mb-0">
          <thead class="">
            <tr>
              <th scope="col">Horário</th>
              <th scope="col">Nome</th>
            </tr>
          </thead>
          <tbody class="text-black">        
            <tr class="table-info">
              <th scope="row">07:00 - 08:00</th>
              <td></td>
            </tr>
            <tr class="table-danger">
              <th scope="row">08:00 - 09:00</th>
              <td>Pedro</td>
            </tr>
            <tr class="table-danger">
              <th scope="row">09:00 - 10:00</th>
              <td>Joaquim</td>
            </tr>
            <tr class="table-info">
              <th scope="row">12:00 - 13:00</th>
              <td></td>
            </tr>
            <tr class="table-info">
              <th scope="row">13:00 - 14:00</th>
              <td></td>
            </tr>
            <tr class="table-danger">
              <th scope="row">14:00 - 15:00</th>
              <td>João Pedro</td>
            </tr>
            <tr class="table-info">
              <th scope="row">15:00 - 16:00</th>
              <td></td>
            </tr>
            <tr class="table-danger">
              <th scope="row">16:00-17:00</th>
              <td>Arthur</td>
            </tr>
          </tbody>
        </table>
      </div>
      
    </div>
    <?php include "../parts/footer.php"; ?>
  </body>
</html>
