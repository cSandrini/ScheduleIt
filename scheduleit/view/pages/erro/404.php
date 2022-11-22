<?php
    if(!isset($_SESSION)) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScheduleIt - Erro</title>
    <link href="../../styles/css/cover.css" rel="stylesheet">
</head>

<body class="bg-light" style="max-height: 100rem;">
    <!-- HEADER -->
    <?php include '../parts/header.php'; ?>

    <!-- CONTEÚDO -->
    <img class="h-100 mx-auto" src="imgs/404.jpg" alt="404 Error">

    <!-- FOOTER -->
    <?php include '../parts/footer.php'; ?>
</body>
</html>