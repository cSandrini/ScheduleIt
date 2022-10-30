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
        <title>ScheduleIt - Home</title>
        <link href="../../styles/css/cover.css" rel="stylesheet">
        <script src="script.js"></script>
    </head>
    <body class="bg-light">
        <!-- HEADER -->
        <?php   include '../parts/header.php';
                require_once '../../../model/conexaobd.php';
                $con = conectarBDPDO();?>

        <div class="container pt-3">
            <div class="row justify-content-center">
                <?php
                    include "../../../controller/salaDisplay.php";
                    require_once '../../../controller/pesquisa/pesquisa.php';       
                ?>
            </div>
        </div>
        <!-- FOOTER -->
        <?php include '../parts/footer.php';?>
    </body>
</html>