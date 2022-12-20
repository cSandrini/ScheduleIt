<?php
    if(!isset($_SESSION)) {
        session_start();
    }
?>

<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ScheduleIt - Sala Não Encontrada</title>

        <link href="../../styles/css/cover.css" rel="stylesheet">
    </head>
    <body class="bg-light"> 
        <?php include __DIR__ . "/../parts/header.php"; ?>
        <div class="container p-0 mt-3 rounded">   
            <div style='margin-bottom:0!important' class='alert alert-danger text-center' role='alert'>
                Essa sala não existe.
            </div>
        </div>
        <?php include __DIR__ . "/../parts/footer.php"; ?>
    </body>
</html>