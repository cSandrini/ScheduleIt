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
    <title>ScheduleIt - Home</title>
    <script src="/scheduleit/view/pages/home/script.js"></script>
    <link href="/scheduleit/view/styles/css/cover.css" rel="stylesheet">
</head>

<body class="bg-light">
    <!-- HEADER -->
    <?php
        include __DIR__ . '/../parts/header.php';
        include __DIR__ . '/../../../controller/home/funcoesHome.php';
    ?>


    <div class="container">
        <div class="selectsdiv row justify-content-center"> 
            <div id="sel1" class="selects col-2 p-0">
                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>Escolha um estado</option>
                    <option value="1">ES</option>
                    <option value="2">AM</option>
                    <option value="3">RR</option>
                </select>
            </div>
            <div class="selects col-2 p-0">
                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>Escolha uma cidade</option>
                    <option value="1">Colatina</option>
                    <option value="2">Vitória</option>
                    <option value="3">Linhares</option>
                </select>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <?php
                carregarSalas()
            ?>
        </div>
    </div>

    <!-- FOOTER -->
    <?php include __DIR__ . '/../parts/footer.php';?>
</body>
</html>