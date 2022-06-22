<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScheduleIt - Reserva</title>
    <link rel="stylesheet" href="../../styles/css/bootstrap.min.css">
    <link rel="stylesheet" href="offcanvas.css">
</head>
<body class="bg-light">
  <?php include "../parts/header.php"; ?>
  <div class="container p-3">
      <div class="d-flex align-items-center p-3 text-white bg-secondary rounded">
        <img class='mr-3 rounded' src='assets/IMG/blank.png' alt='' width='48' height='48'>
        <div class="lh-100 mr-auto">
          <h6 class="mb-0 lh-100">Funcionário</h6>
          <small>Estabelecimento</small>
        </div>
        <a style="text-decoration:none;" class="btn btn-outline-light btn-sm" href="../sala/sala.php">Voltar</a>
      </div>
      
      <div class="mt-3">
        <div class="rounded border text-center">
          <table class="table table-hover bg-white mb-0">
            <thead>
            <tr>
              <th scope="col">Horário</th>
              <th scope="col">Status</th>
              <th></th>
            </tr>
            </thead>
            <tbody>        
              <tr class="table-info">
                <th scope="row">07:00 - 08:00</th>
                <td>Livre</td>
                <td><button class="btn btn-outline-dark">Reserve</button></td>
              </tr>
              <tr class="table-danger">
                <th scope="row">08:00 - 09:00</th>
                <td>Reservado</td>
                <td><button disabled class="btn btn-outline-dark">Reserve</button></td>
              </tr>
              <tr class="table-danger">
                <th scope="row">09:00 - 10:00</th>
                <td>Reservado</td>
                <td><button disabled class="btn btn-outline-dark">Reserve</button></td>
              </tr>
              <tr class="table-info">
                <th scope="row">12:00 - 13:00</th>
                <td>Livre</td>
                <td><button class="btn btn-outline-dark">Reserve</button></td>
              </tr>
              <tr class="table-info">
                <th scope="row">13:00 - 14:00</th>
                <td>Livre</td>
                <td><button class="btn btn-outline-dark">Reserve</button></td>
              </tr>
              <tr class="table-danger">
                <th scope="row">14:00 - 15:00</th>
                <td>Reservado</td>
                <td><button disabled class="btn btn-outline-dark">Reserve</button></td>
              </tr>
              <tr class="table-info">
                <th scope="row">15:00 - 16:00</th>
                <td>Livre</td>
                <td><button class="btn btn-outline-dark">Reserve</button></td>
              </tr>
              <tr class="table-danger">
                <th scope="row">16:00-17:00</th>
                <td>Reservado</td>
                <td><button disabled class="btn btn-outline-dark">Reserve</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
</html>