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
    <title>ScheduleIt - Template</title>
    <link href="scheduleit/view/styles/css/cover.css" rel="stylesheet">
</head>

<body class="bg-light">
    <!-- HEADER -->
    <?php include __DIR__.'/../parts/header.php'; ?>

    <!-- CONTEÚDO -->
    

    <!-- FOOTER -->
    <?php include __DIR__.'/../parts/footer.php'; ?>
</body>
</html>