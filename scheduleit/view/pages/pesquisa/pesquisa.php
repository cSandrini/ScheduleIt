<?php
    if(!isset($_SESSION)) {
        session_start();
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ScheduleIt - Pesquisa</title>
        <link href="/scheduleit/view/styles/css/cover.css" rel="stylesheet">
        <script src="/scheduleit/view/pages/pesquisa/script.js"></script>
    </head>
    <body class="bg-light">
        <!-- HEADER -->
        <?php   include __DIR__.'/../parts/header.php';
                require_once __DIR__.'/../../../model/conexaobd.php';
                $con = conectarBDPDO();?>

        <div class="container">
            <div class="row justify-content-center">
                <?php
                    include __DIR__."/../../../controller/salaDisplay.php";
                    require_once __DIR__.'/../../../controller/pesquisa/pesquisa.php';       
                ?>
            </div>
        </div>
        <!-- FOOTER -->
        <?php include __DIR__.'/../parts/footer.php';?>
    </body>
</html>